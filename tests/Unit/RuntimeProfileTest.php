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

use PddSdk\Runtime\RuntimeProfile;
use PHPUnit\Framework\TestCase;

final class RuntimeProfileTest extends TestCase
{
    public function testFpmReusesConnections(): void
    {
        $profile = new RuntimeProfile('fpm');

        self::assertFalse($profile->isLongRunningWorker());
        self::assertTrue($profile->shouldReuseConnections());
    }

    public function testSwooleAndOpenSwooleAvoidCrossRequestReuse(): void
    {
        foreach (['swoole', 'openswoole'] as $runtime) {
            $profile = new RuntimeProfile($runtime);
            self::assertTrue($profile->isLongRunningWorker());
            self::assertFalse($profile->shouldReuseConnections());
        }
    }
}
