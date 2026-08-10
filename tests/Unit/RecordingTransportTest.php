<?php

declare(strict_types=1);

namespace PddSdk\Tests\Unit;

use PddSdk\Tests\Integration\RecordingTransport;
use PddSdk\Tests\Mock\FakeTransport;
use PHPUnit\Framework\TestCase;

final class RecordingTransportTest extends TestCase
{
    public function testItRecordsSafeRequestAndRawResponse(): void
    {
        $transport = new RecordingTransport(new FakeTransport([
            ['status' => 200, 'body' => '{"time_get_response":{"time":123}}'],
        ]));

        $transport->send('post', 'https://example.com/router', [
            'form_params' => [
                'access_token' => 'token-value',
                'client_id' => 'client-value',
                'sign' => 'signature-value',
                'type' => 'pdd.time.get',
            ],
        ]);

        self::assertSame([
            'method' => 'POST',
            'url' => 'https://example.com/router',
            'form_params' => [
                'access_token' => '[REDACTED]',
                'client_id' => '[REDACTED]',
                'sign' => '[REDACTED]',
                'type' => 'pdd.time.get',
            ],
        ], $transport->safeRequest());
        self::assertSame('{"time_get_response":{"time":123}}', $transport->rawResponseBody());
    }
}
