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

namespace PddSdk\Tests\Integration;

use GuzzleHttp\Client;
use PddSdk\Client\PddClient;
use PddSdk\Config\Config;
use PddSdk\Transport\GuzzleTransport;
use PHPUnit\Framework\TestCase;

final class LiveApiTest extends TestCase
{
    private ?RecordingTransport $recordingTransport = null;

    public function testCanGetPinduoduoSystemTime(): void
    {
        $this->requireTarget('time-get');

        $response = $this->invoke('pdd.time.get', function (): array {
            return $this->client()->pddTimeGet()->send();
        });

        $payload = $response['time_get_response'] ?? null;
        self::assertIsArray($payload, 'PDD time query returned no time_get_response.');
        self::assertNotSame('', (string) ($payload['request_id'] ?? ''), 'PDD time response has no request ID.');
        self::assertGreaterThan(0, (int) ($payload['time'] ?? 0), 'PDD time response has no timestamp.');
    }

    public function testCanGetAuthorizedMallInformation(): void
    {
        $this->requireTarget('mall-info-get');

        $response = $this->invoke('pdd.mall.info.get', function (): array {
            return $this->client(true)->pddMallInfoGet()->send();
        });

        $payload = $response['mall_info_get_response'] ?? null;
        self::assertIsArray($payload, 'PDD mall query returned no mall_info_get_response.');
        self::assertNotSame('', (string) ($payload['request_id'] ?? ''), 'PDD mall response has no request ID.');
        self::assertNotSame('', trim((string) ($payload['mall_name'] ?? '')), 'PDD mall response has no mall name.');
    }

    private function requireTarget(string $target): void
    {
        $targets = array_map('trim', explode(',', $this->environment('PDD_INTEGRATION_TARGETS')));
        if (!in_array($target, $targets, true)) {
            self::markTestSkipped('Integration target is not enabled: ' . $target);
        }
    }

    private function client(bool $withAccessToken = false): PddClient
    {
        $clientId = $this->environment('PDD_CLIENT_ID');
        $clientSecret = $this->environment('PDD_CLIENT_SECRET');
        $options = [
            'autoDetectRuntime' => false,
            'baseUrl' => $this->environment('PDD_BASE_URL', 'https://gw-api.pinduoduo.com/api/router'),
        ];
        if ($withAccessToken) {
            $options['accessToken'] = $this->environment('PDD_ACCESS_TOKEN');
        }

        $config = Config::fromArray([
            ...$options,
            'clientId' => $clientId,
            'clientSecret' => $clientSecret,
        ]);
        $this->recordingTransport = new RecordingTransport(new GuzzleTransport(new Client(), $config));

        return new PddClient($clientId, $clientSecret, $options, $this->recordingTransport);
    }

    /**
     * @param callable(): array<string, mixed> $operation
     *
     * @return array<string, mixed>
     */
    private function invoke(string $api, callable $operation): array
    {
        try {
            $response = $operation();
            $this->printExchange($api);

            return $response;
        } catch (\Throwable $exception) {
            $this->printExchange($api);
            $message = $exception->getMessage();
            foreach (['PDD_CLIENT_ID', 'PDD_CLIENT_SECRET', 'PDD_ACCESS_TOKEN'] as $name) {
                $value = getenv($name);
                if ($value === false || $value === '') {
                    continue;
                }

                $message = str_replace([(string) $value, rawurlencode((string) $value)], '[redacted]', $message);
            }

            $message = (string) preg_replace(
                '/((?:^|[?&\s])(?:access_token|client_id|client_secret|refresh_token|sign)=)[^&\s]+/i',
                '$1[redacted]',
                $message,
            );
            $message = (string) preg_replace(
                '/("(?:access_token|client_id|client_secret|refresh_token|sign)"\s*:\s*")[^"]+("?)/i',
                '$1[redacted]$2',
                $message,
            );

            self::fail(sprintf('Live PDD API request failed (%s): %s', get_class($exception), $message));
        }
    }

    private function printExchange(string $api): void
    {
        $request = $this->recordingTransport?->safeRequest();
        $requestJson = json_encode(
            $request,
            JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES,
        );
        if ($requestJson === false) {
            self::fail('Unable to encode PDD request information: ' . json_last_error_msg());
        }

        $responseBody = $this->recordingTransport?->rawResponseBody() ?? '（未收到响应）';
        fwrite(
            STDOUT,
            PHP_EOL . '接口：' . $api . PHP_EOL
            . '拼多多原始请求（已脱敏）：' . PHP_EOL . $requestJson . PHP_EOL
            . '拼多多原始响应：' . PHP_EOL . $responseBody . PHP_EOL,
        );
    }

    private function environment(string $name, ?string $default = null): string
    {
        $value = getenv($name);
        if ($value === false || trim((string) $value) === '') {
            if ($default !== null) {
                return $default;
            }

            self::fail('Missing required integration environment variable: ' . $name);
        }

        return trim((string) $value);
    }
}
