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
