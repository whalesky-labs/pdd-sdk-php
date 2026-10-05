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

/** Optional driver: requires Swoole's coroutine HTTP client. Ordinary RPC clients do not load it. */
final class SwooleMessageTransport implements MessageTransportInterface
{
    private ?\Swoole\Coroutine\Http\Client $client = null;
    private string $fragments = '';
    private bool $fragmented = false;

    /** TLS verification is mandatory, including when a private CA is supplied for testing. */
    public function __construct(
        private readonly string $host = 'message-api.pinduoduo.com',
        private readonly int $port = 443,
        private readonly ?string $caFile = null,
    ) {
        if ($host === '' || strpbrk($host, "/\\\r\n") !== false || $port < 1 || $port > 65535) {
            throw new \InvalidArgumentException('Invalid message endpoint.');
        }
    }

    public function connect(#[\SensitiveParameter] string $path): void
    {
        if (! class_exists(\Swoole\Coroutine\Http\Client::class) || \Swoole\Coroutine::getCid() < 0) {
            throw new \RuntimeException('Message reception requires a Swoole coroutine.');
        }
        $this->close();
        $this->client = new \Swoole\Coroutine\Http\Client($this->host, $this->port, true);
        $settings = [
            'connect_timeout' => 10, 'timeout' => 10, 'ssl_verify_peer' => true,
            'ssl_allow_self_signed' => false, 'ssl_host_name' => $this->host,
            'websocket_mask' => true, 'websocket_compression' => false,
            'package_max_length' => 1048590,
        ];
        if ($this->caFile !== null) {
            $settings['ssl_cafile'] = $this->caFile;
        }
        $this->client->set($settings);
        if (! @$this->client->upgrade($path) || $this->client->statusCode !== 101) {
            $this->close();
            throw new \RuntimeException('Message WebSocket handshake failed.');
        }
    }

    public function receive(float $timeout): ?string
    {
        if (! is_finite($timeout) || $timeout <= 0) {
            throw new \InvalidArgumentException('Receive timeout must be positive and finite.');
        }
        if ($this->client === null) {
            throw new \RuntimeException('Message connection is not open.');
        }
        $frame = @$this->client->recv($timeout);
        if ($frame === false) {
            foreach (['SOCKET_ETIMEDOUT', 'SOCKET_EAGAIN', 'SOCKET_EWOULDBLOCK'] as $constant) {
                if ($this->client->connected && defined($constant) && $this->client->errCode === constant($constant)) {
                    return null;
                }
            }
            throw new \RuntimeException('Message connection receive failed.');
        }
        if ($frame === '') {
            throw new \RuntimeException('Message connection closed by server.');
        }
        if (! $frame instanceof \Swoole\WebSocket\Frame) {
            throw new \RuntimeException('Message connection returned no WebSocket frame.');
        }
        if ($frame->opcode === WEBSOCKET_OPCODE_CLOSE) {
            throw new \RuntimeException('Message connection closed by server.');
        }
        if ($frame->opcode === WEBSOCKET_OPCODE_PING) {
            if (! @$this->client->push($frame->data, WEBSOCKET_OPCODE_PONG, SWOOLE_WEBSOCKET_FLAG_FIN | SWOOLE_WEBSOCKET_FLAG_MASK)) {
                throw new \RuntimeException('Message connection pong failed.');
            }
            return null;
        }
        if ($frame->opcode === WEBSOCKET_OPCODE_PONG) {
            return null;
        }
        if ($frame->opcode === WEBSOCKET_OPCODE_TEXT && ! $this->fragmented) {
            $this->fragments = '';
        } elseif ($frame->opcode !== 0 || ! $this->fragmented) {
            throw new \UnexpectedValueException('Unsupported WebSocket frame.');
        }
        $this->fragments .= $frame->data;
        if (strlen($this->fragments) > 1048576) {
            throw new \UnexpectedValueException('Message frame is too large.');
        }
        $this->fragmented = ! $frame->finish;
        if ($this->fragmented) {
            return null;
        }
        $message = $this->fragments;
        $this->fragments = '';
        return $message;
    }

    public function send(#[\SensitiveParameter] string $frame): void
    {
        if ($this->client === null || ! @$this->client->push($frame, WEBSOCKET_OPCODE_TEXT, SWOOLE_WEBSOCKET_FLAG_FIN | SWOOLE_WEBSOCKET_FLAG_MASK)) {
            throw new \RuntimeException('Message connection send failed.');
        }
    }

    public function close(): void
    {
        $client = $this->client;
        $this->client = null;
        if ($client !== null && $client->connected) {
            @$client->push('', WEBSOCKET_OPCODE_CLOSE, SWOOLE_WEBSOCKET_FLAG_FIN | SWOOLE_WEBSOCKET_FLAG_MASK);
        }
        $client?->close();
        $this->client = null;
        $this->fragments = '';
        $this->fragmented = false;
    }
}
