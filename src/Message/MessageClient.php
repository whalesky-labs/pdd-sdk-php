<?php

declare(strict_types=1);
/**
 * This file is part of Pinduoduo Open Platform SDK for PHP.
 *
 * @link     https://github.com/whalesky-labs/pdd-sdk-php
 * @document https://github.com/whalesky-labs/pdd-sdk-php
 * @contact  westng
 * @license  https://github.com/whalesky-labs/pdd-sdk-php#license
 */

namespace PddSdk\Message;

use PddSdk\Config\Config;

final class MessageClient
{
    private readonly \Closure $clock;
    private readonly \Closure $monotonicClock;
    private bool $listening = false;
    private int $lastAuthentication = 0;

    public function __construct(
        private readonly Config $config,
        private readonly MessageTransportInterface $transport,
        ?callable $clock = null,
        private readonly int $heartbeatMilliseconds = 5000,
        private readonly int $idleMilliseconds = 60000,
        ?callable $monotonicClock = null,
    ) {
        if ($heartbeatMilliseconds < 1000 || $idleMilliseconds <= $heartbeatMilliseconds) {
            throw new \InvalidArgumentException('Invalid message heartbeat configuration.');
        }
        $this->clock = \Closure::fromCallable($clock ?? static fn(): int => (int) floor(microtime(true) * 1000));
        $this->monotonicClock = \Closure::fromCallable($monotonicClock ?? $clock ?? static fn(): int => (int) (hrtime(true) / 1000000));
    }

    /**
     * One connection session. The host controls restart/backoff and reloads credentials between sessions.
     * Handler MUST return true after durable acceptance. Exceptions/false/null never produce an ACK.
     *
     * @param callable(Message): mixed $handler
     * @param callable(): bool $keepRunning
     */
    public function listen(callable $handler, callable $keepRunning): void
    {
        if ($this->listening) {
            throw new \LogicException('Message receiver already has an active session.');
        }
        if (! $keepRunning()) {
            return;
        }
        $this->listening = true;
        $protocol = new MessageProtocol();
        $failure = null;
        try {
            $this->lastAuthentication = max(($this->clock)(), $this->lastAuthentication + 1);
            $this->transport->connect($protocol->connectionPath($this->config->clientId(), $this->config->clientSecret(), $this->lastAuthentication));
            $lastReceived = $lastHeartbeat = ($this->monotonicClock)();
            while ($keepRunning()) {
                $now = ($this->monotonicClock)();
                if ($now - $lastReceived >= $this->idleMilliseconds) {
                    throw new \RuntimeException('Message connection timed out.');
                }
                if ($now - $lastHeartbeat >= $this->heartbeatMilliseconds) {
                    $this->transport->send($protocol->heartbeat(($this->clock)()));
                    $lastHeartbeat = $now;
                }
                $raw = $this->transport->receive(1.0);
                if ($raw === null) {
                    continue;
                }
                $lastReceived = ($this->monotonicClock)();
                $message = $protocol->decode($raw);
                if ($message === null) {
                    continue;
                }
                if ($handler($message) !== true) {
                    throw new \RuntimeException('Message was not durably accepted.');
                }
                $this->transport->send($protocol->acknowledge($message, ($this->clock)()));
            }
        } catch (\Throwable $error) {
            $failure = $error;
            throw $error;
        } finally {
            try {
                $this->transport->close();
            } catch (\Throwable $error) {
                if ($failure === null) {
                    throw $error;
                }
            } finally {
                $this->listening = false;
            }
        }
    }
}
