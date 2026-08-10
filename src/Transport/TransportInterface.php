<?php

declare(strict_types=1);

namespace PddSdk\Transport;

interface TransportInterface
{
    /**
     * @param array<string, mixed> $options
     *
     * @return array{status:int, headers:array<string, list<string>>, body:string}
     */
    public function send(string $httpMethod, string $url, array $options = []): array;
}
