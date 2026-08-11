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

namespace PddSdk\Client;

use PddSdk\Api\ApiMetadata;
use PddSdk\Exception\ValidationException;

abstract class RpcRequest
{
    final public function __construct(
        private readonly PddClient $client,
    ) {}

    abstract public static function metadata(): ApiMetadata;

    /**
     * @param array<string, mixed> $parameters
     *
     * @return array<string, mixed>
     */
    final public function execute(array $parameters = [], ?string $accessToken = null): array
    {
        $this->validate($parameters);

        return $this->client->rawRequest(
            static::metadata()->type,
            $parameters,
            $accessToken,
        );
    }

    /**
     * @param array<string, mixed> $parameters
     */
    protected function validate(array $parameters): void {}

    /**
     * @param array<string, mixed> $parameters
     */
    final protected function requireParameters(array $parameters, string ...$required): void
    {
        $missing = [];
        foreach ($required as $name) {
            if (!array_key_exists($name, $parameters) || $parameters[$name] === null || $parameters[$name] === '') {
                $missing[] = $name;
            }
        }

        if ($missing !== []) {
            throw new ValidationException(sprintf(
                '%s requires parameter(s): %s.',
                static::metadata()->type,
                implode(', ', $missing),
            ));
        }
    }
}
