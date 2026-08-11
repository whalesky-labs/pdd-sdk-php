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

use PddSdk\Signing\Md5Signer;
use PHPUnit\Framework\TestCase;

final class Md5SignerTest extends TestCase
{
    public function testSignerMatchesPinduoduoCanonicalAlgorithm(): void
    {
        $parameters = [
            'client_id' => 'test-client',
            'data_type' => 'JSON',
            'logistics_id' => 9,
            'order_sn' => '240101-1',
            'order_state' => 1,
            'timestamp' => 1720000000,
            'type' => 'pdd.erp.order.sync',
            'version' => 'V1',
            'waybill_no' => 'SF123',
        ];

        self::assertSame(
            'CC0F30530BBAC3FD67608391D61E370C',
            (new Md5Signer())->sign($parameters, 'test-secret'),
        );
    }

    public function testSignerIgnoresExistingSignAndEmptyStringValues(): void
    {
        $signer = new Md5Signer();

        self::assertSame(
            $signer->sign(['client_id' => 'a'], 'secret'),
            $signer->sign(['client_id' => 'a', 'sign' => 'old', 'empty' => ''], 'secret'),
        );
    }
}
