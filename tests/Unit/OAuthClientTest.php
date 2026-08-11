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

namespace PddSdk\Tests\Unit;

use PddSdk\Auth\AuthorizationType;
use PddSdk\Client\PddClient;
use PddSdk\Tests\Mock\FakeTransport;
use PHPUnit\Framework\TestCase;

final class OAuthClientTest extends TestCase
{
    public function testBuildMerchantAuthorizeUrl(): void
    {
        $client = new PddClient('client-id', 'secret', [], new FakeTransport([]));

        self::assertSame(
            'https://mms.pinduoduo.com/open.html?response_type=code&client_id=client-id&redirect_uri=https%3A%2F%2Fexample.com%2Fcallback&state=csrf',
            $client->oauth()->buildAuthorizeUrl('https://example.com/callback', 'csrf'),
        );
    }

    public function testBuildDdkAuthorizeUrl(): void
    {
        $client = new PddClient('client-id', 'secret', [], new FakeTransport([]));

        self::assertStringStartsWith(
            'https://jinbao.pinduoduo.com/open.html?',
            $client->oauth()->buildAuthorizeUrl('https://example.com/callback', type: AuthorizationType::Ddk),
        );
    }

    public function testExchangeCodeUsesJsonAndNormalizesToken(): void
    {
        $transport = new FakeTransport([
            [
                'status' => 200,
                'body' => '{"access_token":"access","refresh_token":"refresh","expires_in":3600,"owner_id":123,"owner_name":"shop"}',
            ],
        ]);
        $client = new PddClient('client-id', 'secret', [], $transport);

        $token = $client->oauth()->getAccessToken('code', 'https://example.com/callback', 'csrf');

        self::assertSame('access', $token->accessToken);
        self::assertSame('refresh', $token->refreshToken);
        self::assertSame(123, $token->ownerId);
        self::assertSame('https://open-api.pinduoduo.com/oauth/token', $transport->requests[0]['url']);
        self::assertSame('application/json', $transport->requests[0]['options']['headers']['Content-Type']);
        self::assertStringNotContainsString('access', $transport->requests[0]['options']['body']);
    }
}
