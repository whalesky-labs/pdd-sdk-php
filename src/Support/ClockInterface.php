<?php

declare(strict_types=1);

namespace PddSdk\Support;

interface ClockInterface
{
    public function timestamp(): int;
}
