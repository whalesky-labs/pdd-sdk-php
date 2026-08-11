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

namespace PddSdk\Support;

use JsonException;
use PddSdk\Exception\ValidationException;

final class Json
{
    public static function encode(mixed $value): string
    {
        try {
            return json_encode($value, JSON_THROW_ON_ERROR | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
        } catch (JsonException $exception) {
            throw new ValidationException('Failed to encode request parameter as JSON.', previous: $exception);
        }
    }

    /**
     * @return array<string, mixed>
     */
    public static function decode(string $value): array
    {
        try {
            $decoded = json_decode($value, true, 512, JSON_THROW_ON_ERROR);
        } catch (JsonException $exception) {
            throw new ValidationException('Failed to decode JSON response.', previous: $exception, rawResponseBody: $value);
        }

        if (!is_array($decoded)) {
            throw new ValidationException('JSON response must decode to an object.', rawResponseBody: $value);
        }

        return $decoded;
    }
}
