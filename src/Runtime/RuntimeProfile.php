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

namespace PddSdk\Runtime;

final class RuntimeProfile
{
    public function __construct(
        private readonly string $name,
    ) {}

    public static function detect(): self
    {
        if (class_exists(\Swoole\Coroutine::class) || class_exists(\Swoole\Runtime::class)) {
            return new self('swoole');
        }

        if (class_exists(\OpenSwoole\Coroutine::class) || class_exists(\OpenSwoole\Runtime::class)) {
            return new self('openswoole');
        }

        if (str_contains(PHP_SAPI, 'fpm')) {
            return new self('fpm');
        }

        if (str_contains(PHP_SAPI, 'cli')) {
            return new self('cli');
        }

        return new self(PHP_SAPI === '' ? 'unknown' : PHP_SAPI);
    }

    public function name(): string
    {
        return $this->name;
    }

    public function isLongRunningWorker(): bool
    {
        return in_array($this->name, ['swoole', 'openswoole'], true);
    }

    public function shouldReuseConnections(): bool
    {
        return !$this->isLongRunningWorker();
    }
}
