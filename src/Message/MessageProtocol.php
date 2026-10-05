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

namespace PddSdk\Message;

final class MessageProtocol
{
    public function connectionPath(string $clientId, #[\SensitiveParameter] string $secret, int $milliseconds): string
    {
        if ($clientId === '' || $secret === '' || $milliseconds <= 0 || PHP_INT_SIZE < 8) {
            throw new \InvalidArgumentException('Invalid message connection configuration.');
        }
        $digest = base64_encode(md5($clientId . $milliseconds . $secret));
        return '/message/' . rawurlencode($clientId) . '/' . $milliseconds . '/' . rawurlencode($digest);
    }

    public function heartbeat(int $milliseconds): string
    {
        return json_encode(['id' => $milliseconds, 'commandType' => 'HeartBeat', 'time' => $milliseconds], JSON_THROW_ON_ERROR);
    }

    public function decode(#[\SensitiveParameter] string $frame): ?Message
    {
        if (strlen($frame) > 1048576) {
            throw new \UnexpectedValueException('Message frame is too large.');
        }
        $data = json_decode($frame, true, 32, JSON_THROW_ON_ERROR | JSON_BIGINT_AS_STRING);
        if (! is_array($data) || ! is_string($data['commandType'] ?? null)) {
            throw new \UnexpectedValueException('Invalid message envelope.');
        }
        if (in_array($data['commandType'], ['HeartBeat', 'Ack'], true)) {
            return null;
        }
        if ($data['commandType'] !== 'Common' || ! is_array($data['message'] ?? null)) {
            throw new \UnexpectedValueException('Unsupported server command.');
        }
        $message = $data['message'];
        $type = $message['type'] ?? null;
        if (! is_string($type) || ! preg_match('/^[A-Za-z0-9_.:-]{1,128}$/D', $type) || ! is_string($message['content'] ?? null)) {
            throw new \UnexpectedValueException('Invalid business message.');
        }
        $mall = $this->integer($message['mallID'] ?? null);
        $content = json_decode($message['content'], true, 32, JSON_THROW_ON_ERROR | JSON_BIGINT_AS_STRING);
        if (! is_array($content) || ! str_starts_with(ltrim($message['content']), '{')) {
            throw new \UnexpectedValueException('Invalid business content.');
        }
        if (isset($content['mall_id']) && (string) $content['mall_id'] !== (string) $mall) {
            throw new \UnexpectedValueException('Message merchant mismatch.');
        }
        return new Message(
            $this->integer($data['id'] ?? null),
            $type,
            (string) $mall,
            $content,
            isset($data['sendTime']) ? $this->integer($data['sendTime']) : null,
        );
    }

    public function acknowledge(Message $message, int $milliseconds): string
    {
        return json_encode([
            'id' => $message->id, 'commandType' => 'Ack', 'time' => $milliseconds,
            'sendTime' => $message->sendTime, 'type' => $message->type, 'mallID' => (int) $message->mallId,
        ], JSON_THROW_ON_ERROR);
    }

    private function integer(mixed $value): int
    {
        if ((! is_int($value) && ! is_string($value)) || filter_var($value, FILTER_VALIDATE_INT, ['options' => ['min_range' => 1]]) === false) {
            throw new \UnexpectedValueException('Invalid message identity.');
        }
        return (int) $value;
    }
}
