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

namespace PddSdk\Api;

enum OfficialCategory: int
{
    case Order = 1;
    case AfterSales = 2;
    case Logistics = 3;
    case Virtual = 4;
    case Goods = 5;
    case Ddk = 12;
    case DdkTools = 13;
    case Marketing = 15;
    case Voucher = 16;
    case Invoice = 17;
    case Shop = 18;
    case Tools = 20;
    case Warehouse = 21;
    case Message = 22;
    case ElectronicWaybill = 23;
    case Finance = 24;
    case Sms = 26;
    case ServiceMarket = 30;
    case SmsProvider = 32;
    case WaybillPrinting = 43;
    case Store = 46;
    case International = 48;
    case Travel = 49;
    case WeMedia = 57;
    case VideoRecommendation = 62;
    case ArkDataTransfer = 64;
    case MerchantShipping = 65;

    public function label(): string
    {
        return match ($this) {
            self::Order => '订单API',
            self::AfterSales => '售后API',
            self::Logistics => '物流API',
            self::Virtual => '虚拟类目API',
            self::Goods => '商品API',
            self::Ddk => '多多客API',
            self::DdkTools => '多多客工具API',
            self::Marketing => '营销API',
            self::Voucher => '卡券API',
            self::Invoice => '发票服务API',
            self::Shop => '店铺API',
            self::Tools => '工具API',
            self::Warehouse => '仓储API',
            self::Message => '消息服务API',
            self::ElectronicWaybill => '电子面单API',
            self::Finance => '财务API',
            self::Sms => '短信服务API',
            self::ServiceMarket => '服务市场API',
            self::SmsProvider => '短信供应商API',
            self::WaybillPrinting => '电子面单代打API',
            self::Store => '门店API',
            self::International => '多多国际API',
            self::Travel => '旅游门票API',
            self::WeMedia => '自媒体API',
            self::VideoRecommendation => '视频推荐API',
            self::ArkDataTransfer => '方舟数据传输API',
            self::MerchantShipping => '商家寄件API',
        };
    }

    public function namespaceSegment(): string
    {
        return $this->name;
    }
}
