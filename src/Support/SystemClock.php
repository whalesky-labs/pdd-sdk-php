<?php

declare(strict_types=1);

namespace PddSdk\Support;

final class SystemClock implements ClockInterface
{
    public function timestamp(): int
    {
        return time();
    }
}
