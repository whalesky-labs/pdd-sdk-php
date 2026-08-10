<?php

declare(strict_types=1);

namespace PddSdk\Generated;

use PddSdk\Api\Order\PddErpOrderSync;
use PddSdk\Client\PendingRequest;

trait ApiClientMethods
{
    public function pddErpOrderSync(): PendingRequest
    {
        return $this->createPendingRequest(PddErpOrderSync::class);
    }
}
