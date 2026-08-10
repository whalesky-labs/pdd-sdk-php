<?php

declare(strict_types=1);

namespace PddSdk\Api\Order;

use PddSdk\Api\ApiMetadata;
use PddSdk\Api\OfficialCategory;
use PddSdk\Client\RpcRequest;

/** ERP 打单信息同步。 */
final class PddErpOrderSync extends RpcRequest
{
    public static function metadata(): ApiMetadata
    {
        return new ApiMetadata(
            type: 'pdd.erp.order.sync',
            name: 'erp打单信息同步',
            category: OfficialCategory::Order,
            documentUrl: 'https://open.pinduoduo.com/application/document/api?id=pdd.erp.order.sync',
        );
    }

    protected function validate(array $parameters): void
    {
        $this->requireParameters(
            $parameters,
            'order_sn',
            'order_state',
            'waybill_no',
            'logistics_id',
        );
    }
}
