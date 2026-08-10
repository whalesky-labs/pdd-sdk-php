<?php

declare(strict_types=1);

namespace PddSdk\Auth;

enum AuthorizationType: string
{
    case Merchant = 'merchant';
    case Ddk = 'ddk';
    case Mobile = 'mobile';
}
