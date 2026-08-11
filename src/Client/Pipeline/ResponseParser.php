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

namespace PddSdk\Client\Pipeline;

use PddSdk\Exception\ApiException;
use PddSdk\Exception\TransportException;
use PddSdk\Exception\ValidationException;
use PddSdk\Support\Json;

final class ResponseParser
{
    /**
     * @return array<string, mixed>
     */
    public function parse(int $httpStatus, string $body): array
    {
        try {
            $payload = Json::decode($body);
        } catch (ValidationException $exception) {
            if ($httpStatus < 200 || $httpStatus >= 300) {
                throw new TransportException(
                    sprintf('Unexpected HTTP status %d.', $httpStatus),
                    $httpStatus,
                    $exception,
                    $body,
                );
            }

            throw $exception;
        }

        if (isset($payload['error_response']) && is_array($payload['error_response'])) {
            $error = $payload['error_response'];
            $message = (string) ($error['sub_msg'] ?? $error['error_msg'] ?? 'Pinduoduo API request failed.');
            $platformCode = (string) ($error['error_code'] ?? '');
            $subCode = isset($error['sub_code']) ? (string) $error['sub_code'] : null;

            throw new ApiException($message, $platformCode, $subCode, $payload, $body);
        }

        if ($httpStatus < 200 || $httpStatus >= 300) {
            throw new TransportException(
                sprintf('Unexpected HTTP status %d.', $httpStatus),
                $httpStatus,
                rawResponseBody: $body,
            );
        }

        return $payload;
    }
}
