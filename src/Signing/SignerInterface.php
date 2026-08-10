<?php

declare(strict_types=1);

namespace PddSdk\Signing;

interface SignerInterface
{
    /**
     * @param array<string, scalar> $parameters
     */
    public function sign(array $parameters, string $clientSecret): string;
}
