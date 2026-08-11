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

namespace PddSdk\Auth;

use PddSdk\Client\Pipeline\ResponseParser;
use PddSdk\Config\Config;
use PddSdk\Exception\ValidationException;
use PddSdk\Support\Json;
use PddSdk\Transport\TransportInterface;

final class OAuthClient
{
    public function __construct(
        private readonly Config $config,
        private readonly TransportInterface $transport,
        private readonly ResponseParser $responseParser,
    ) {}

    public function buildAuthorizeUrl(
        string $redirectUri,
        ?string $state = null,
        AuthorizationType $type = AuthorizationType::Merchant,
    ): string {
        if (trim($redirectUri) === '') {
            throw new ValidationException('redirectUri cannot be blank.');
        }

        $baseUrl = match ($type) {
            AuthorizationType::Merchant => $this->config->merchantAuthorizeUrl(),
            AuthorizationType::Ddk => $this->config->ddkAuthorizeUrl(),
            AuthorizationType::Mobile => $this->config->mobileAuthorizeUrl(),
        };
        $query = [
            'response_type' => 'code',
            'client_id' => $this->config->clientId(),
            'redirect_uri' => $redirectUri,
        ];
        if ($state !== null && $state !== '') {
            $query['state'] = $state;
        }
        if ($type === AuthorizationType::Mobile) {
            $query['view'] = 'h5';
        }

        return $baseUrl . '?' . http_build_query($query, '', '&', PHP_QUERY_RFC3986);
    }

    public function getAccessToken(string $code, string $redirectUri, ?string $state = null): TokenResponse
    {
        if (trim($code) === '') {
            throw new ValidationException('code cannot be blank.');
        }

        return $this->requestToken([
            'client_id' => $this->config->clientId(),
            'client_secret' => $this->config->clientSecret(),
            'grant_type' => 'authorization_code',
            'code' => $code,
            'redirect_uri' => $redirectUri,
            'state' => $state,
        ]);
    }

    public function refreshAccessToken(string $refreshToken, ?string $state = null): TokenResponse
    {
        if (trim($refreshToken) === '') {
            throw new ValidationException('refreshToken cannot be blank.');
        }

        return $this->requestToken([
            'client_id' => $this->config->clientId(),
            'client_secret' => $this->config->clientSecret(),
            'grant_type' => 'refresh_token',
            'refresh_token' => $refreshToken,
            'state' => $state,
        ]);
    }

    /**
     * @param array<string, string|null> $parameters
     */
    private function requestToken(array $parameters): TokenResponse
    {
        $parameters = array_filter($parameters, static fn(?string $value): bool => $value !== null && $value !== '');
        $response = $this->transport->send('POST', $this->config->tokenUrl(), [
            'headers' => ['Content-Type' => 'application/json'],
            'body' => Json::encode($parameters),
        ]);
        $payload = $this->responseParser->parse($response['status'], $response['body']);
        $accessToken = trim((string) ($payload['access_token'] ?? ''));
        if ($accessToken === '') {
            throw new ValidationException('Missing access_token in OAuth response.', rawResponseBody: $response['body']);
        }

        return new TokenResponse(
            accessToken: $accessToken,
            refreshToken: isset($payload['refresh_token']) ? (string) $payload['refresh_token'] : null,
            expiresIn: isset($payload['expires_in']) ? (int) $payload['expires_in'] : null,
            refreshExpiresIn: isset($payload['refresh_expires_in']) ? (int) $payload['refresh_expires_in'] : null,
            ownerId: isset($payload['owner_id']) ? (int) $payload['owner_id'] : null,
            ownerName: isset($payload['owner_name']) ? (string) $payload['owner_name'] : null,
            raw: $payload,
        );
    }
}
