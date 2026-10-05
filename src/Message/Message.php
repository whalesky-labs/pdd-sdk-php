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

namespace PddSdk\Message;

final class Message
{
    /** @param array<string, mixed> $content */
    public function __construct(
        public readonly int $id,
        public readonly string $type,
        public readonly string $mallId,
        public readonly array $content,
        public readonly ?int $sendTime,
    ) {}
}
