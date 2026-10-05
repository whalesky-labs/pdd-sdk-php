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

namespace PddSdk\Tests\Transport;

use PddSdk\Message\SwooleMessageTransport;
use PHPUnit\Framework\TestCase;

final class SwooleMessageTransportTest extends TestCase
{
    private string $directory;

    protected function setUp(): void
    {
        if (! extension_loaded('swoole') || ! extension_loaded('openssl')) {
            self::markTestSkipped('Requires Swoole and OpenSSL.');
        }
        $this->directory = sys_get_temp_dir() . '/pdd-tls-' . bin2hex(random_bytes(8));
        mkdir($this->directory, 0700);
        $caKey = openssl_pkey_new(['private_key_bits' => 2048, 'digest_alg' => 'sha256']);
        $caCsr = openssl_csr_new(['commonName' => 'SDK test CA'], $caKey, ['digest_alg' => 'sha256']);
        $ca = openssl_csr_sign($caCsr, null, $caKey, 1, ['digest_alg' => 'sha256']);
        openssl_x509_export_to_file($ca, $this->directory . '/ca.pem');
        $key = openssl_pkey_new(['private_key_bits' => 2048, 'digest_alg' => 'sha256']);
        $csr = openssl_csr_new(['commonName' => 'localhost'], $key, ['digest_alg' => 'sha256']);
        $cert = openssl_csr_sign($csr, $ca, $caKey, 1, ['digest_alg' => 'sha256']);
        openssl_x509_export_to_file($cert, $this->directory . '/cert.pem');
        openssl_pkey_export_to_file($key, $this->directory . '/key.pem');
    }

    protected function tearDown(): void
    {
        if (isset($this->directory)) {
            foreach (glob($this->directory . '/*') as $file) {
                unlink($file);
            }
            rmdir($this->directory);
        }
    }

    private function server(string $scenario, callable $test): array
    {
        $process = proc_open([PHP_BINARY, dirname(__DIR__) . '/Fixtures/message-ws-server.php', $this->directory . '/cert.pem', $this->directory . '/key.pem', $scenario], [0 => ['pipe', 'r'], 1 => ['pipe', 'w'], 2 => ['pipe', 'w']], $pipes);
        self::assertIsResource($process);
        fclose($pipes[0]);
        $address = trim(fgets($pipes[1]));
        $port = (int) substr(strrchr($address, ':'), 1);
        $error = null;
        try {
            \Swoole\Coroutine\run(function () use ($test, $port, &$error): void {
                try {
                    $test($port);
                } catch (\Throwable $caught) {
                    $error = $caught;
                }
            });
        } finally {
            $output = stream_get_contents($pipes[1]);
            $stderr = stream_get_contents($pipes[2]);
            fclose($pipes[1]);
            fclose($pipes[2]);
            $status = proc_close($process);
        }
        if ($error !== null) {
            throw $error;
        }
        self::assertSame(0, $status, $stderr);
        return $output === '' ? [] : json_decode($output, true, 512, JSON_THROW_ON_ERROR);
    }

    public function testRealTlsFragmentationPingMaskingAndGracefulClose(): void
    {
        $result = $this->server('success', function (int $port): void {
            $transport = new SwooleMessageTransport('localhost', $port, $this->directory . '/ca.pem');
            try {
                $transport->connect('/synthetic');
                $frame = null;
                for ($i = 0; $i < 4 && $frame === null; ++$i) {
                    $frame = $transport->receive(0.5);
                }
                self::assertSame('{"commandType":"HeartBeat"}', $frame);
                $transport->send('{"commandType":"Ack"}');
            } finally {
                $transport->close();
                $transport->close();
            }
        });
        self::assertSame([10, 1, 8], $result['opcodes']);
        self::assertSame('probe', $result['payloads'][0]);
        self::assertSame('{"commandType":"Ack"}', $result['payloads'][1]);
    }

    public function testUntrustedCertificateAndWrongHostnameAreRejected(): void
    {
        foreach ([['localhost', null], ['127.0.0.1', $this->directory . '/ca.pem']] as [$host, $ca]) {
            $this->server('success', static function (int $port) use ($host, $ca): void {
                $transport = new SwooleMessageTransport($host, $port, $ca);
                try {
                    $transport->connect('/synthetic');
                    self::fail('Invalid TLS certificate accepted');
                } catch (\RuntimeException $error) {
                    self::assertSame('Message WebSocket handshake failed.', $error->getMessage());
                } finally {
                    $transport->close();
                }
            });
        }
    }

    public function testTimeoutAndRemoteCloseAreDistinct(): void
    {
        $this->server('timeout', function (int $port): void {
            $transport = new SwooleMessageTransport('localhost', $port, $this->directory . '/ca.pem');
            try {
                $transport->connect('/synthetic');
                self::assertNull($transport->receive(0.02));
                try {
                    $transport->receive(1.0);
                    self::fail('Remote close ignored');
                } catch (\RuntimeException $error) {
                    self::assertStringContainsString('closed', $error->getMessage());
                }
            } finally {
                $transport->close();
            }
        });
    }

    public function testHandshakeRejectionAndBinaryFrameFailClosed(): void
    {
        foreach (['reject', 'binary'] as $scenario) {
            $this->server($scenario, function (int $port) use ($scenario): void {
                $transport = new SwooleMessageTransport('localhost', $port, $this->directory . '/ca.pem');
                try {
                    $transport->connect('/synthetic');
                    $transport->receive(1.0);
                    self::fail('Invalid server response accepted');
                } catch (\RuntimeException|\UnexpectedValueException $error) {
                    self::assertSame($scenario === 'reject' ? 'Message WebSocket handshake failed.' : 'Unsupported WebSocket frame.', $error->getMessage());
                } finally {
                    $transport->close();
                }
            });
        }
    }
}
