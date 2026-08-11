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

namespace PddSdk\Config;

use PddSdk\Exception\ValidationException;

final class Config
{
    public function __construct(
        private readonly string $clientId,
        private readonly string $clientSecret,
        private readonly ?string $accessToken = null,
        private readonly string $baseUrl = 'https://gw-api.pinduoduo.com/api/router',
        private readonly string $tokenUrl = 'https://open-api.pinduoduo.com/oauth/token',
        private readonly string $merchantAuthorizeUrl = 'https://mms.pinduoduo.com/open.html',
        private readonly string $ddkAuthorizeUrl = 'https://jinbao.pinduoduo.com/open.html',
        private readonly string $mobileAuthorizeUrl = 'https://mai.pinduoduo.com/h5-login.html',
        private readonly float $connectTimeout = 5.0,
        private readonly float $readTimeout = 30.0,
        private readonly bool $autoDetectRuntime = true,
        private readonly string $userAgent = 'pdd-sdk-php/1.0.0-dev',
    ) {
        $this->assertNonEmpty($this->clientId, 'clientId');
        $this->assertNonEmpty($this->clientSecret, 'clientSecret');
        $this->assertHttpUrl($this->baseUrl, 'baseUrl');
        $this->assertHttpUrl($this->tokenUrl, 'tokenUrl');
        $this->assertHttpUrl($this->merchantAuthorizeUrl, 'merchantAuthorizeUrl');
        $this->assertHttpUrl($this->ddkAuthorizeUrl, 'ddkAuthorizeUrl');
        $this->assertHttpUrl($this->mobileAuthorizeUrl, 'mobileAuthorizeUrl');

        if ($this->accessToken !== null && trim($this->accessToken) === '') {
            throw new ValidationException('accessToken cannot be blank when provided.');
        }

        if ($this->connectTimeout <= 0) {
            throw new ValidationException('connectTimeout must be greater than 0.');
        }

        if ($this->readTimeout <= 0) {
            throw new ValidationException('readTimeout must be greater than 0.');
        }
    }

    /**
     * @param array<string, mixed> $config
     */
    public static function fromArray(array $config): self
    {
        return new self(
            clientId: (string) ($config['clientId'] ?? ''),
            clientSecret: (string) ($config['clientSecret'] ?? ''),
            accessToken: isset($config['accessToken']) ? (string) $config['accessToken'] : null,
            baseUrl: (string) ($config['baseUrl'] ?? 'https://gw-api.pinduoduo.com/api/router'),
            tokenUrl: (string) ($config['tokenUrl'] ?? 'https://open-api.pinduoduo.com/oauth/token'),
            merchantAuthorizeUrl: (string) ($config['merchantAuthorizeUrl'] ?? 'https://mms.pinduoduo.com/open.html'),
            ddkAuthorizeUrl: (string) ($config['ddkAuthorizeUrl'] ?? 'https://jinbao.pinduoduo.com/open.html'),
            mobileAuthorizeUrl: (string) ($config['mobileAuthorizeUrl'] ?? 'https://mai.pinduoduo.com/h5-login.html'),
            connectTimeout: (float) ($config['connectTimeout'] ?? 5.0),
            readTimeout: (float) ($config['readTimeout'] ?? 30.0),
            autoDetectRuntime: (bool) ($config['autoDetectRuntime'] ?? true),
            userAgent: (string) ($config['userAgent'] ?? 'pdd-sdk-php/1.0.0-dev'),
        );
    }

    public function clientId(): string
    {
        return $this->clientId;
    }

    public function clientSecret(): string
    {
        return $this->clientSecret;
    }

    public function accessToken(): ?string
    {
        return $this->accessToken;
    }

    public function baseUrl(): string
    {
        return $this->baseUrl;
    }

    public function tokenUrl(): string
    {
        return $this->tokenUrl;
    }

    public function merchantAuthorizeUrl(): string
    {
        return $this->merchantAuthorizeUrl;
    }

    public function ddkAuthorizeUrl(): string
    {
        return $this->ddkAuthorizeUrl;
    }

    public function mobileAuthorizeUrl(): string
    {
        return $this->mobileAuthorizeUrl;
    }

    public function connectTimeout(): float
    {
        return $this->connectTimeout;
    }

    public function readTimeout(): float
    {
        return $this->readTimeout;
    }

    public function autoDetectRuntime(): bool
    {
        return $this->autoDetectRuntime;
    }

    public function userAgent(): string
    {
        return $this->userAgent;
    }

    private function assertNonEmpty(string $value, string $field): void
    {
        if (trim($value) === '') {
            throw new ValidationException(sprintf('%s cannot be blank.', $field));
        }
    }

    private function assertHttpUrl(string $value, string $field): void
    {
        $scheme = parse_url($value, PHP_URL_SCHEME);
        if (!in_array($scheme, ['http', 'https'], true)) {
            throw new ValidationException(sprintf('%s must be an HTTP or HTTPS URL.', $field));
        }
    }
}
