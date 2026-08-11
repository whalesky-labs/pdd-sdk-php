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

namespace PddSdk\Client\Pipeline;

use JsonSerializable;
use PddSdk\Config\Config;
use PddSdk\Exception\ValidationException;
use PddSdk\Signing\Md5Signer;
use PddSdk\Signing\SignerInterface;
use PddSdk\Support\ClockInterface;
use PddSdk\Support\Json;
use PddSdk\Support\SystemClock;

final class RequestFactory
{
    private const RESERVED_PARAMETERS = [
        'access_token',
        'client_id',
        'data_type',
        'sign',
        'timestamp',
        'type',
        'version',
    ];

    public function __construct(
        private readonly Config $config,
        private readonly SignerInterface $signer = new Md5Signer(),
        private readonly ClockInterface $clock = new SystemClock(),
    ) {}

    /**
     * @param array<string, mixed> $parameters
     *
     * @return array<string, scalar>
     */
    public function build(
        string $type,
        array $parameters,
        ?string $accessToken = null,
        string $version = 'V1',
        string $dataType = 'JSON',
    ): array {
        if (trim($type) === '') {
            throw new ValidationException('type cannot be blank.');
        }

        $reserved = array_intersect(array_keys($parameters), self::RESERVED_PARAMETERS);
        if ($reserved !== []) {
            throw new ValidationException(sprintf(
                'Business parameters cannot override public parameter(s): %s.',
                implode(', ', $reserved),
            ));
        }

        $payload = $this->normalizeParameters($parameters);
        $payload['client_id'] = $this->config->clientId();
        $payload['data_type'] = strtoupper($dataType);
        $payload['timestamp'] = $this->clock->timestamp();
        $payload['type'] = $type;
        $payload['version'] = strtoupper($version);

        $resolvedAccessToken = $accessToken ?? $this->config->accessToken();
        if ($resolvedAccessToken !== null) {
            if (trim($resolvedAccessToken) === '') {
                throw new ValidationException('accessToken cannot be blank when provided.');
            }
            $payload['access_token'] = $resolvedAccessToken;
        }

        $payload['sign'] = $this->signer->sign($payload, $this->config->clientSecret());

        return $payload;
    }

    /**
     * @param array<string, mixed> $parameters
     *
     * @return array<string, scalar>
     */
    private function normalizeParameters(array $parameters): array
    {
        $normalized = [];
        foreach ($parameters as $key => $value) {
            if (!is_string($key) || trim($key) === '') {
                throw new ValidationException('Request parameter names must be non-empty strings.');
            }

            if ($value === null || $value === '') {
                continue;
            }

            if (is_bool($value)) {
                $normalized[$key] = $value ? 'true' : 'false';
                continue;
            }

            if (is_scalar($value)) {
                $normalized[$key] = $value;
                continue;
            }

            if (is_array($value) || $value instanceof JsonSerializable) {
                $normalized[$key] = Json::encode($value);
                continue;
            }

            throw new ValidationException(sprintf('Unsupported value for request parameter "%s".', $key));
        }

        return $normalized;
    }
}
