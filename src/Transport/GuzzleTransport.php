<?php

declare(strict_types=1);

namespace PddSdk\Transport;

use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\GuzzleException;
use PddSdk\Config\Config;
use PddSdk\Exception\TransportException;
use PddSdk\Runtime\RuntimeProfile;

final class GuzzleTransport implements TransportInterface
{
    private readonly RuntimeProfile $runtime;

    public function __construct(
        private readonly ClientInterface $client,
        private readonly Config $config,
        ?RuntimeProfile $runtime = null,
    ) {
        $this->runtime = $runtime ?? RuntimeProfile::detect();
    }

    public function send(string $httpMethod, string $url, array $options = []): array
    {
        $headers = [
            'Accept' => 'application/json',
            'Pdd-Sdk-Type' => 'PHP',
            'Pdd-Sdk-Version' => '1.0.0-dev',
            'User-Agent' => $this->config->userAgent(),
        ];
        if (isset($options['headers']) && is_array($options['headers'])) {
            $headers = array_merge($headers, $options['headers']);
        }

        $requestOptions = $options;
        $requestOptions['headers'] = $headers;
        $requestOptions['connect_timeout'] ??= $this->config->connectTimeout();
        $requestOptions['timeout'] ??= $this->config->readTimeout();
        $requestOptions['http_errors'] ??= false;
        $requestOptions = $this->applyRuntimeOptions($requestOptions);

        try {
            $response = $this->client->request(strtoupper($httpMethod), $url, $requestOptions);
        } catch (GuzzleException $exception) {
            throw new TransportException('HTTP transport failed: ' . $exception->getMessage(), previous: $exception);
        }

        return [
            'status' => $response->getStatusCode(),
            'headers' => $response->getHeaders(),
            'body' => (string) $response->getBody(),
        ];
    }

    /**
     * @param array<string, mixed> $options
     *
     * @return array<string, mixed>
     */
    private function applyRuntimeOptions(array $options): array
    {
        if (!$this->config->autoDetectRuntime()) {
            return $options;
        }

        if ($this->runtime->shouldReuseConnections()) {
            $options['headers']['Connection'] ??= 'keep-alive';

            return $options;
        }

        $options['headers']['Connection'] ??= 'close';
        if (defined('CURLOPT_FORBID_REUSE')) {
            $options['curl'][CURLOPT_FORBID_REUSE] ??= true;
        }
        if (defined('CURLOPT_FRESH_CONNECT')) {
            $options['curl'][CURLOPT_FRESH_CONNECT] ??= true;
        }

        return $options;
    }
}
