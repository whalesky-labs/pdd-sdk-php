<?php

declare(strict_types=1);

namespace PddSdk\Tests\Unit;

use PddSdk\Api\OfficialCategory;
use PddSdk\Api\Order\PddErpOrderSync;
use PHPUnit\Framework\TestCase;

final class OfficialCatalogTest extends TestCase
{
    public function testEveryOfficialCategoryHasMatchingIdNameAndNamespace(): void
    {
        $catalog = json_decode(
            (string) file_get_contents(dirname(__DIR__, 2) . '/resources/official-api-catalog.json'),
            true,
            512,
            JSON_THROW_ON_ERROR,
        );

        self::assertCount(27, $catalog['categories']);
        foreach ($catalog['categories'] as $category) {
            $enum = OfficialCategory::from($category['id']);
            self::assertSame($category['name'], $enum->label());
            self::assertSame($category['namespace'], $enum->namespaceSegment());
        }
    }

    public function testErpOrderSyncUsesItsOfficialOrderCategory(): void
    {
        $catalog = json_decode(
            (string) file_get_contents(dirname(__DIR__, 2) . '/resources/official-api-catalog.json'),
            true,
            512,
            JSON_THROW_ON_ERROR,
        );
        $official = $catalog['apis']['pdd.erp.order.sync'];
        $metadata = PddErpOrderSync::metadata();

        self::assertSame('订单API', $official['category_name']);
        self::assertSame('Order', $official['namespace']);
        self::assertSame($official['category_id'], $metadata->category->value);
        self::assertSame($official['document_url'], $metadata->documentUrl);
    }
}
