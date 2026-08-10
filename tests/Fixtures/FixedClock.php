<?php

declare(strict_types=1);

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
