<?php

declare(strict_types=1);

namespace PddSdk\Signing;

final class Md5Signer implements SignerInterface
{
    public function sign(array $parameters, string $clientSecret): string
    {
        unset($parameters['sign']);
        $parameters = array_filter(
            $parameters,
            static fn(mixed $value): bool => $value !== '',
        );
        ksort($parameters, SORT_STRING);

        $input = $clientSecret;
        foreach ($parameters as $key => $value) {
            $input .= $key . (string) $value;
        }
        $input .= $clientSecret;

        return strtoupper(md5($input));
    }
}
