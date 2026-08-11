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

namespace PddSdk\Tests\Integration;

use PddSdk\Transport\TransportInterface;

final class RecordingTransport implements TransportInterface
{
    /** @var array{method:string, url:string, options:array<string, mixed>}|null */
    private ?array $request = null;

    /** @var array{status:int, headers:array<string, list<string>>, body:string}|null */
    private ?array $response = null;

    public function __construct(
        private readonly TransportInterface $transport,
    ) {}

    public function send(string $httpMethod, string $url, array $options = []): array
    {
        $this->request = [
            'method' => strtoupper($httpMethod),
            'url' => $url,
            'options' => $options,
        ];
        $this->response = $this->transport->send($httpMethod, $url, $options);

        return $this->response;
    }

    /**
     * @return array{method:string, url:string, form_params:array<string, mixed>}|null
     */
    public function safeRequest(): ?array
    {
        if ($this->request === null) {
            return null;
        }

        $formParameters = $this->request['options']['form_params'] ?? [];
        if (!is_array($formParameters)) {
            $formParameters = [];
        }

        foreach (['access_token', 'client_id', 'client_secret', 'refresh_token', 'sign'] as $sensitiveName) {
            if (array_key_exists($sensitiveName, $formParameters)) {
                $formParameters[$sensitiveName] = '[REDACTED]';
            }
        }

        return [
            'method' => $this->request['method'],
            'url' => $this->request['url'],
            'form_params' => $formParameters,
        ];
    }

    public function rawResponseBody(): ?string
    {
        return $this->response['body'] ?? null;
    }
}
