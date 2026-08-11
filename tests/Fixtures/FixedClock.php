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

namespace PddSdk\Tests\Fixtures;

use PddSdk\Support\ClockInterface;

final class FixedClock implements ClockInterface
{
    public function __construct(
        private readonly int $value,
    ) {}

    public function timestamp(): int
    {
        return $this->value;
    }
}
