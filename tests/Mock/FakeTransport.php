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

namespace PddSdk\Tests\Mock;

use PddSdk\Transport\TransportInterface;

final class FakeTransport implements TransportInterface
{
    /**
     * @var list<array{method:string, url:string, options:array<string, mixed>}>
     */
    public array $requests = [];

    /**
     * @param list<array{status:int, headers?:array<string, list<string>>, body:string}> $responses
     */
    public function __construct(
        private array $responses,
    ) {}

    public function send(string $httpMethod, string $url, array $options = []): array
    {
        $this->requests[] = [
            'method' => $httpMethod,
            'url' => $url,
            'options' => $options,
        ];
        $response = array_shift($this->responses);
        if ($response === null) {
            throw new \LogicException('Fake transport has no queued response.');
        }

        return [
            'status' => $response['status'],
            'headers' => $response['headers'] ?? [],
            'body' => $response['body'],
        ];
    }
}
