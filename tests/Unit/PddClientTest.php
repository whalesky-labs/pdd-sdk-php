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

use PddSdk\Client\PddClient;
use PddSdk\Exception\ValidationException;
use PddSdk\Tests\Mock\FakeTransport;
use PHPUnit\Framework\TestCase;

final class PddClientTest extends TestCase
{
    public function testOrderApiUsesOfficialGatewayAndDefaultToken(): void
    {
        $transport = new FakeTransport([
            ['status' => 200, 'body' => '{"erp_order_sync_response":{"result":true}}'],
        ]);
        $client = new PddClient('client', 'secret', ['accessToken' => 'token'], $transport);

        $response = $client->pddErpOrderSync()
            ->setParams([
                'order_sn' => '240101-1',
                'order_state' => 1,
                'waybill_no' => 'SF123',
                'logistics_id' => 9,
            ])
            ->send();

        self::assertTrue($response['erp_order_sync_response']['result']);
        self::assertSame('POST', $transport->requests[0]['method']);
        self::assertSame('https://gw-api.pinduoduo.com/api/router', $transport->requests[0]['url']);
        self::assertSame('pdd.erp.order.sync', $transport->requests[0]['options']['form_params']['type']);
        self::assertSame('token', $transport->requests[0]['options']['form_params']['access_token']);
        self::assertMatchesRegularExpression('/^[A-F0-9]{32}$/', $transport->requests[0]['options']['form_params']['sign']);
    }

    public function testOrderApiValidatesOfficialRequiredParametersBeforeTransport(): void
    {
        $transport = new FakeTransport([]);
        $client = new PddClient('client', 'secret', [], $transport);

        $this->expectException(ValidationException::class);
        $client->pddErpOrderSync()->setParams(['order_sn' => '1'])->send();
    }

    public function testOptionsCannotOverrideConstructorCredentials(): void
    {
        $this->expectException(ValidationException::class);
        $this->expectExceptionMessage('Unsupported client option(s): clientId.');

        new PddClient('client', 'secret', ['clientId' => 'other'], new FakeTransport([]));
    }
}
