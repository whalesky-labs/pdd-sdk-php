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

interface MessageTransportInterface
{
    /** The signed path is sensitive and must never be logged. */
    public function connect(#[\SensitiveParameter] string $path): void;
    /** null means timeout without a frame; connection failures must throw. */
    public function receive(float $timeout): ?string;
    public function send(#[\SensitiveParameter] string $frame): void;
    /** Idempotent cleanup, including partially opened connections; should not throw. */
    public function close(): void;
}
