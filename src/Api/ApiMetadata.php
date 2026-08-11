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

namespace PddSdk\Api;

final class ApiMetadata
{
    public function __construct(
        public readonly string $type,
        public readonly string $name,
        public readonly OfficialCategory $category,
        public readonly string $documentUrl,
    ) {}
}
