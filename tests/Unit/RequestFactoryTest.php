<?php

declare(strict_types=1);

namespace PddSdk\Tests\Unit;

use PddSdk\Client\Pipeline\RequestFactory;
use PddSdk\Config\Config;
use PddSdk\Exception\ValidationException;
use PddSdk\Signing\Md5Signer;
use PddSdk\Tests\Fixtures\FixedClock;
use PHPUnit\Framework\TestCase;

final class RequestFactoryTest extends TestCase
{
    public function testFactoryBuildsSignedGatewayParameters(): void
    {
        $factory = new RequestFactory(
            new Config('test-client', 'test-secret'),
            new Md5Signer(),
            new FixedClock(1720000000),
        );

        $payload = $factory->build('pdd.erp.order.sync', [
            'order_sn' => '240101-1',
            'order_state' => 1,
            'waybill_no' => 'SF123',
            'logistics_id' => 9,
        ]);

        self::assertSame('test-client', $payload['client_id']);
        self::assertSame('JSON', $payload['data_type']);
        self::assertSame(1720000000, $payload['timestamp']);
        self::assertSame('V1', $payload['version']);
        self::assertArrayNotHasKey('access_token', $payload);
        self::assertSame('CC0F30530BBAC3FD67608391D61E370C', $payload['sign']);
    }

    public function testFactoryUsesDefaultAccessTokenAndNormalizesStructuredValues(): void
    {
        $factory = new RequestFactory(
            new Config('client', 'secret', 'token'),
            new Md5Signer(),
            new FixedClock(1),
        );

        $payload = $factory->build('pdd.test', [
            'enabled' => true,
            'request' => ['order_sn' => '1'],
        ]);

        self::assertSame('token', $payload['access_token']);
        self::assertSame('true', $payload['enabled']);
        self::assertSame('{"order_sn":"1"}', $payload['request']);
    }

    public function testFactoryRejectsBusinessOverridesOfPublicParameters(): void
    {
        $factory = new RequestFactory(new Config('client', 'secret'));

        $this->expectException(ValidationException::class);
        $factory->build('pdd.test', ['client_id' => 'attacker']);
    }
}
