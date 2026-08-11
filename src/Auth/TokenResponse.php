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

final class TokenResponse
{
    /**
     * @param array<string, mixed> $raw
     */
    public function __construct(
        public readonly string $accessToken,
        public readonly ?string $refreshToken,
        public readonly ?int $expiresIn,
        public readonly ?int $refreshExpiresIn,
        public readonly ?int $ownerId,
        public readonly ?string $ownerName,
        public readonly array $raw,
    ) {}
}
