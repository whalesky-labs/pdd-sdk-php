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

namespace PddSdk\Tests\Unit;

use PddSdk\Client\PddClient;
use PddSdk\Config\Config;
use PddSdk\Message\Message;
use PddSdk\Message\MessageClient;
use PddSdk\Message\MessageProtocol;
use PddSdk\Message\MessageTransportInterface;
use PHPUnit\Framework\TestCase;

final class MessageClientTest extends TestCase
{
    private function frame(): string
    {
        return json_encode([
            'id' => 9007199254740993, 'commandType' => 'Common', 'sendTime' => 1700000000123,
            'message' => ['type' => 'pdd_trade_TradeConfirmed', 'mallID' => 100, 'content' => '{"mall_id":100,"tid":"order-test"}'],
        ], JSON_THROW_ON_ERROR);
    }

    public function testAuthenticationPathMatchesReferenceEncoding(): void
    {
        self::assertSame(
            '/message/app/1700000000000/OTgxODMwNDI2NWZiN2NiNzA2NzIxOTI0ZjJlMDMxMjE%3D',
            (new MessageProtocol())->connectionPath('app', 'secret', 1700000000000),
        );
    }

    public function testAckPreservesLargeIdAndFollowsDurableAcceptance(): void
    {
        $transport = new MemoryMessageTransport([$this->frame()]);
        $client = new MessageClient(new Config('app', 'test-secret'), $transport, static fn(): int => 1700000001000);
        $client->listen(function (Message $message) use ($transport): bool {
            self::assertSame('order-test', $message->content['tid']);
            self::assertSame([], $transport->sent);
            $transport->events[] = 'committed';
            return true;
        }, fn(): bool => $transport->reads < 1);
        self::assertSame(['committed', 'Ack'], $transport->events);
        $ack = json_decode($transport->sent[0], true, 512, JSON_THROW_ON_ERROR);
        self::assertSame(9007199254740993, $ack['id']);
        self::assertSame(1700000000123, $ack['sendTime']);
        self::assertSame(100, $ack['mallID']);
        self::assertTrue($transport->closed);
    }

    public function testHandlerFailureAndFalseNeverAcknowledge(): void
    {
        foreach ([false, true, null, 1] as $throw) {
            $transport = new MemoryMessageTransport([$this->frame()]);
            $client = (new PddClient('app', 'secret'))->messages($transport);
            try {
                $client->listen(static function () use ($throw): mixed {
                    if ($throw === true) {
                        throw new \RuntimeException('storage failed');
                    }
                    return $throw;
                }, fn(): bool => $transport->reads < 1);
                self::fail('unaccepted message acknowledged');
            } catch (\RuntimeException) {
                self::assertSame([], $transport->sent);
                self::assertTrue($transport->closed);
            }
        }
    }

    public function testControlFramesDoNotReachBusinessHandler(): void
    {
        $transport = new MemoryMessageTransport(['{"commandType":"HeartBeat"}', '{"commandType":"Ack"}']);
        $called = false;
        (new PddClient('app', 'secret'))->messages($transport)->listen(function () use (&$called): bool {
            $called = true;
            return true;
        }, fn(): bool => $transport->reads < 2);
        self::assertFalse($called);
        self::assertSame([], $transport->sent);
    }

    public function testMerchantMismatchAndUnknownCommandAreRejected(): void
    {
        foreach (['{"commandType":"Unknown"}', str_replace('"mallID":100', '"mallID":101', $this->frame())] as $frame) {
            try {
                (new MessageProtocol())->decode($frame);
                self::fail('invalid frame accepted');
            } catch (\UnexpectedValueException) {
                self::assertTrue(true);
            }
        }
    }

    public function testHeartbeatAndIdleTimeoutCloseUnresponsiveConnection(): void
    {
        $transport = new MemoryMessageTransport([]);
        $time = 1700000000000;
        $client = new MessageClient(new Config('app', 'secret'), $transport, static fn(): int => 1700000000000, 5000, 15000, static function () use (&$time): int {
            return $time += 5000;
        });
        try {
            $client->listen(static fn(): bool => true, static fn(): bool => true);
            self::fail('idle connection stayed open');
        } catch (\RuntimeException $error) {
            self::assertSame('Message connection timed out.', $error->getMessage());
        }
        self::assertSame(['HeartBeat', 'HeartBeat'], $transport->events);
        self::assertTrue($transport->closed);
    }

    public function testReconnectUsesFreshAuthenticationTimestamp(): void
    {
        $transport = new MemoryMessageTransport([]);
        $time = 1700000000000;
        $client = new MessageClient(new Config('app', 'secret'), $transport, static function () use (&$time): int {
            return ++$time;
        });
        $checks = 0;
        $client->listen(static fn(): bool => true, static function () use (&$checks): bool {
            return ++$checks === 1;
        });
        $checks = 0;
        $client->listen(static fn(): bool => true, static function () use (&$checks): bool {
            return ++$checks === 1;
        });
        self::assertNotSame($transport->paths[0], $transport->paths[1]);
        self::assertStringContainsString('/message/app/1700000000001/', $transport->paths[0]);
        self::assertStringContainsString('/message/app/1700000000003/', $transport->paths[1]);
    }
    public function testAckFailureClosesAndRedeliveryRunsHandlerAgain(): void
    {
        $transport = new MemoryMessageTransport([$this->frame(), $this->frame()]);
        $transport->failSend = true;
        $client = (new PddClient('app', 'secret'))->messages($transport);
        $accepted = 0;
        $handler = static function () use (&$accepted): bool {
            ++$accepted;
            return true;
        };
        try {
            $client->listen($handler, static fn(): bool => true);
            self::fail('ACK failure ignored');
        } catch (\RuntimeException $error) {
            self::assertSame('send failed', $error->getMessage());
            self::assertTrue($transport->closed);
        }
        $transport->failSend = false;
        $client->listen($handler, fn(): bool => $transport->reads < 2);
        self::assertSame(2, $accepted);
        self::assertCount(1, $transport->sent);
        self::assertNotSame($transport->paths[0], $transport->paths[1]);
    }

    public function testStoppedReceiverDoesNotConnect(): void
    {
        $transport = new MemoryMessageTransport([]);
        (new PddClient('app', 'secret'))->messages($transport)->listen(static fn(): bool => true, static fn(): bool => false);
        self::assertSame([], $transport->paths);
    }

    public function testStopDuringHandlerFinishesAcceptedAck(): void
    {
        $transport = new MemoryMessageTransport([$this->frame()]);
        $running = true;
        (new PddClient('app', 'secret'))->messages($transport)->listen(static function () use (&$running): bool {
            $running = false;
            return true;
        }, static function () use (&$running): bool {
            return $running;
        });
        self::assertSame(['Ack'], $transport->events);
        self::assertTrue($transport->closed);
    }

    public function testReadAndConnectFailuresCloseWithoutAck(): void
    {
        foreach (['failConnect', 'failRead'] as $failure) {
            $transport = new MemoryMessageTransport([]);
            $transport->{$failure} = true;
            try {
                (new PddClient('app', 'secret'))->messages($transport)->listen(static fn(): bool => true, static fn(): bool => true);
                self::fail('transport failure ignored');
            } catch (\RuntimeException) {
                self::assertTrue($transport->closed);
                self::assertSame([], $transport->sent);
            }
        }
    }

    public function testClockRollbackDoesNotPreventIdleTimeout(): void
    {
        $transport = new MemoryMessageTransport([]);
        $wall = 1700000000000;
        $ticks = 0;
        $client = new MessageClient(
            new Config('app', 'secret'),
            $transport,
            static function () use (&$wall): int {
                return $wall -= 5000;
            },
            1000,
            3000,
            static function () use (&$ticks): int {
                return $ticks += 1000;
            },
        );
        try {
            $client->listen(static fn(): bool => true, static fn(): bool => true);
            self::fail('idle connection stayed open');
        } catch (\RuntimeException $error) {
            self::assertSame('Message connection timed out.', $error->getMessage());
        }
        self::assertTrue($transport->closed);
    }

    public function testInvalidAndOversizedFramesNeverAck(): void
    {
        foreach (['{', str_repeat('x', 1048577), str_replace('9007199254740993', '9223372036854775808', $this->frame()), str_replace('9007199254740993', '1.5', $this->frame())] as $frame) {
            $transport = new MemoryMessageTransport([$frame]);
            try {
                (new PddClient('app', 'secret'))->messages($transport)->listen(static fn(): bool => true, fn(): bool => $transport->reads < 1);
                self::fail('invalid frame accepted');
            } catch (\JsonException|\UnexpectedValueException) {
                self::assertSame([], $transport->sent);
                self::assertTrue($transport->closed);
            }
        }
    }

    public function testSigned64BitMaximumAndContentBigintsRemainExact(): void
    {
        $frame = str_replace(['9007199254740993', 'order-test'], ['9223372036854775807', '9223372036854775808'], $this->frame());
        $message = (new MessageProtocol())->decode($frame);
        self::assertSame(PHP_INT_MAX, $message->id);
        self::assertSame('9223372036854775808', $message->content['tid']);
        self::assertStringContainsString('"id":9223372036854775807', (new MessageProtocol())->acknowledge($message, 1));
    }

}

final class MemoryMessageTransport implements MessageTransportInterface
{
    public array $sent = [];
    public array $events = [];
    public array $paths = [];
    public int $reads = 0;
    public bool $closed = false;
    public bool $failSend = false;
    public bool $failConnect = false;
    public bool $failRead = false;
    public function __construct(private array $frames) {}
    public function connect(#[\SensitiveParameter] string $path): void
    {
        if ($this->failConnect) {
            throw new \RuntimeException('connect failed');
        }
        $this->paths[] = $path;
    }
    public function receive(float $timeout): ?string
    {
        if ($this->failRead) {
            throw new \RuntimeException('read failed');
        }
        ++$this->reads;
        return array_shift($this->frames);
    }
    public function send(string $frame): void
    {
        if ($this->failSend) {
            throw new \RuntimeException('send failed');
        }
        $this->sent[] = $frame;
        $this->events[] = json_decode($frame, true)['commandType'];
    }
    public function close(): void
    {
        $this->closed = true;
    }
}
