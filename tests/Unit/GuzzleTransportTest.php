<?php

declare(strict_types=1);

namespace PddSdk\Tests\Unit;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Promise\PromiseInterface;
use GuzzleHttp\Psr7\Response;
use PddSdk\Config\Config;
use PddSdk\Runtime\RuntimeProfile;
use PddSdk\Transport\GuzzleTransport;
use PHPUnit\Framework\TestCase;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

final class GuzzleTransportTest extends TestCase
{
    public function testFpmKeepsConnectionsAlive(): void
    {
        $httpClient = $this->recordingHttpClient();
        $transport = new GuzzleTransport($httpClient, new Config('client', 'secret'), new RuntimeProfile('fpm'));

        $transport->send('POST', 'https://example.com');

        self::assertSame('keep-alive', $httpClient->requests[0]['options']['headers']['Connection']);
    }

    public function testSwooleClosesConnections(): void
    {
        $httpClient = $this->recordingHttpClient();
        $transport = new GuzzleTransport($httpClient, new Config('client', 'secret'), new RuntimeProfile('swoole'));

        $transport->send('POST', 'https://example.com');

        self::assertSame('close', $httpClient->requests[0]['options']['headers']['Connection']);
    }

    public function testRuntimeDetectionCanBeDisabled(): void
    {
        $httpClient = $this->recordingHttpClient();
        $config = new Config('client', 'secret', autoDetectRuntime: false);
        $transport = new GuzzleTransport($httpClient, $config, new RuntimeProfile('swoole'));

        $transport->send('POST', 'https://example.com');

        self::assertArrayNotHasKey('Connection', $httpClient->requests[0]['options']['headers']);
    }

    private function recordingHttpClient(): ClientInterface
    {
        return new class implements ClientInterface {
            /**
             * @var list<array{method:string, uri:string, options:array<string, mixed>}>
             */
            public array $requests = [];

            public function send(RequestInterface $request, array $options = []): ResponseInterface
            {
                throw new \BadMethodCallException('Not used.');
            }

            public function sendAsync(RequestInterface $request, array $options = []): PromiseInterface
            {
                throw new \BadMethodCallException('Not used.');
            }

            public function request(string $method, $uri = '', array $options = []): ResponseInterface
            {
                $this->requests[] = ['method' => $method, 'uri' => (string) $uri, 'options' => $options];

                return new Response(200, [], '{}');
            }

            public function requestAsync(string $method, $uri = '', array $options = []): PromiseInterface
            {
                throw new \BadMethodCallException('Not used.');
            }

            public function getConfig(?string $option = null): mixed
            {
                return null;
            }
        };
    }
}
