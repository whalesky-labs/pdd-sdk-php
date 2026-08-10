<?php

declare(strict_types=1);

namespace PddSdk\Exception;

final class ApiException extends PddException
{
    /**
     * @param array<string, mixed> $responsePayload
     */
    public function __construct(
        string $message,
        private readonly string $platformCode,
        private readonly ?string $subCode,
        private readonly array $responsePayload,
        string $rawResponseBody,
    ) {
        parent::__construct($message, is_numeric($platformCode) ? (int) $platformCode : 0, rawResponseBody: $rawResponseBody);
    }

    public function platformCode(): string
    {
        return $this->platformCode;
    }

    public function subCode(): ?string
    {
        return $this->subCode;
    }

    /**
     * @return array<string, mixed>
     */
    public function responsePayload(): array
    {
        return $this->responsePayload;
    }
}
