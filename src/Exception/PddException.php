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

namespace PddSdk\Exception;

use RuntimeException;

class PddException extends RuntimeException
{
    public function __construct(
        string $message = '',
        int $code = 0,
        ?\Throwable $previous = null,
        private readonly ?string $rawResponseBody = null,
    ) {
        parent::__construct($message, $code, $previous);
    }

    public function rawResponseBody(): ?string
    {
        return $this->rawResponseBody;
    }
}
