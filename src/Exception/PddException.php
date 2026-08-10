<?php

declare(strict_types=1);

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
