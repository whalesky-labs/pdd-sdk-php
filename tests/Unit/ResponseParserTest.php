<?php

declare(strict_types=1);

namespace PddSdk\Tests\Unit;

use PddSdk\Client\Pipeline\ResponseParser;
use PddSdk\Exception\ApiException;
use PddSdk\Exception\TransportException;
use PHPUnit\Framework\TestCase;

final class ResponseParserTest extends TestCase
{
    public function testParserReturnsSuccessfulPayloadWithoutInventingEnvelope(): void
    {
        $payload = (new ResponseParser())->parse(200, '{"erp_order_sync_response":{"result":true}}');

        self::assertTrue($payload['erp_order_sync_response']['result']);
    }

    public function testParserMapsOfficialErrorResponse(): void
    {
        try {
            (new ResponseParser())->parse(200, '{"error_response":{"error_code":10019,"sub_code":"access_token_invalid","sub_msg":"token invalid"}}');
            self::fail('Expected API exception was not thrown.');
        } catch (ApiException $exception) {
            self::assertSame('10019', $exception->platformCode());
            self::assertSame('access_token_invalid', $exception->subCode());
            self::assertSame('token invalid', $exception->getMessage());
        }
    }

    public function testParserKeepsNonJsonHttpFailureAsTransportException(): void
    {
        try {
            (new ResponseParser())->parse(502, '<html>bad gateway</html>');
            self::fail('Expected transport exception was not thrown.');
        } catch (TransportException $exception) {
            self::assertSame(502, $exception->getCode());
            self::assertSame('<html>bad gateway</html>', $exception->rawResponseBody());
        }
    }
}
