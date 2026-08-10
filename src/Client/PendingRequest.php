<?php

declare(strict_types=1);

namespace PddSdk\Client;

final class PendingRequest
{
    /**
     * @param array<string, mixed> $parameters
     */
    public function __construct(
        private readonly RpcRequest $request,
        private array $parameters = [],
        private ?string $accessToken = null,
    ) {}

    /**
     * @param array<string, mixed> $parameters
     */
    public function setParams(array $parameters): self
    {
        $this->parameters = $parameters;

        return $this;
    }

    /**
     * @param array<string, mixed> $parameters
     */
    public function mergeParams(array $parameters): self
    {
        $this->parameters = array_merge($this->parameters, $parameters);

        return $this;
    }

    public function setAccessToken(?string $accessToken): self
    {
        $this->accessToken = $accessToken;

        return $this;
    }

    /**
     * @return array<string, mixed>
     */
    public function send(): array
    {
        return $this->request->execute($this->parameters, $this->accessToken);
    }
}
