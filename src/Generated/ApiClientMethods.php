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

namespace PddSdk\Generated;

use PddSdk\Api\AfterSales\PddNextoneLogisticsWarehouseUpdate;
use PddSdk\Api\AfterSales\PddRdcPddgeniusSendgoodsCancel;
use PddSdk\Api\AfterSales\PddRefundAddressListGet;
use PddSdk\Api\AfterSales\PddRefundAgree;
use PddSdk\Api\AfterSales\PddRefundExchangeShipping;
use PddSdk\Api\AfterSales\PddRefundImagesGet;
use PddSdk\Api\AfterSales\PddRefundInformationGet;
use PddSdk\Api\AfterSales\PddRefundListIncrementGet;
use PddSdk\Api\AfterSales\PddRefundReturngoodsAgree;
use PddSdk\Api\AfterSales\PddRefundStatusCheck;
use PddSdk\Api\ArkDataTransfer\PddErpOrderListGet;
use PddSdk\Api\ArkDataTransfer\PddErpOubListGet;
use PddSdk\Api\ArkDataTransfer\PddErpRefundListGet;
use PddSdk\Api\Ddk\PddDdkCashgiftCreate;
use PddSdk\Api\Ddk\PddDdkCashgiftDataQuery;
use PddSdk\Api\Ddk\PddDdkCashgiftStatusUpdate;
use PddSdk\Api\Ddk\PddDdkCmsPromUrlGenerate;
use PddSdk\Api\Ddk\PddDdkGoodsDetail;
use PddSdk\Api\Ddk\PddDdkGoodsPidGenerate;
use PddSdk\Api\Ddk\PddDdkGoodsPidQuery;
use PddSdk\Api\Ddk\PddDdkGoodsPromotionRightAuth;
use PddSdk\Api\Ddk\PddDdkGoodsPromotionUrlGenerate;
use PddSdk\Api\Ddk\PddDdkGoodsRecommendGet;
use PddSdk\Api\Ddk\PddDdkGoodsSearch;
use PddSdk\Api\Ddk\PddDdkGoodsZsUnitUrlGen;
use PddSdk\Api\Ddk\PddDdkMemberAuthorityQuery;
use PddSdk\Api\Ddk\PddDdkOrderDetailGet;
use PddSdk\Api\Ddk\PddDdkOrderListIncrementGet;
use PddSdk\Api\Ddk\PddDdkOrderListRangeGet;
use PddSdk\Api\Ddk\PddDdkPidMediaidBind;
use PddSdk\Api\Ddk\PddDdkPromotionGoodsQuery;
use PddSdk\Api\Ddk\PddDdkReportImgUpload;
use PddSdk\Api\Ddk\PddDdkReportVideoUpload;
use PddSdk\Api\Ddk\PddDdkReportVideoUploadPart;
use PddSdk\Api\Ddk\PddDdkReportVideoUploadPartComplete;
use PddSdk\Api\Ddk\PddDdkReportVideoUploadPartInit;
use PddSdk\Api\Ddk\PddDdkResourceUrlGen;
use PddSdk\Api\Ddk\PddDdkRpPromUrlGenerate;
use PddSdk\Api\Ddk\PddDdkStatisticsDataQuery;
use PddSdk\Api\Ddk\PddDdkTmcActivityList;
use PddSdk\Api\Ddk\PddDdkUrlShortParse;
use PddSdk\Api\Ddk\PddDdkWeappQrcodeUrlGen;
use PddSdk\Api\DdkTools\PddDdkAllOrderListIncrementGet;
use PddSdk\Api\DdkTools\PddDdkOauthCashgiftCreate;
use PddSdk\Api\DdkTools\PddDdkOauthCashgiftStatusUpdate;
use PddSdk\Api\DdkTools\PddDdkOauthCmsPromUrlGenerate;
use PddSdk\Api\DdkTools\PddDdkOauthGoodsDetail;
use PddSdk\Api\DdkTools\PddDdkOauthGoodsPidGenerate;
use PddSdk\Api\DdkTools\PddDdkOauthGoodsPidQuery;
use PddSdk\Api\DdkTools\PddDdkOauthGoodsPromUrlGenerate;
use PddSdk\Api\DdkTools\PddDdkOauthGoodsRecommendGet;
use PddSdk\Api\DdkTools\PddDdkOauthGoodsSearch;
use PddSdk\Api\DdkTools\PddDdkOauthGoodsZsUnitUrlGen;
use PddSdk\Api\DdkTools\PddDdkOauthMemberAuthorityQuery;
use PddSdk\Api\DdkTools\PddDdkOauthOrderDetailGet;
use PddSdk\Api\DdkTools\PddDdkOauthOrderListIncrementGet;
use PddSdk\Api\DdkTools\PddDdkOauthPidMediaidBind;
use PddSdk\Api\DdkTools\PddDdkOauthResourceUrlGen;
use PddSdk\Api\DdkTools\PddDdkOauthRpPromUrlGenerate;
use PddSdk\Api\DdkTools\PddDdkOauthWeappQrcodeUrlGen;
use PddSdk\Api\ElectronicWaybill\PddCloudPrint;
use PddSdk\Api\ElectronicWaybill\PddCloudprintCustomaresGet;
use PddSdk\Api\ElectronicWaybill\PddCloudPrinterBind;
use PddSdk\Api\ElectronicWaybill\PddCloudPrinterSetting;
use PddSdk\Api\ElectronicWaybill\PddCloudPrinterStatusQuery;
use PddSdk\Api\ElectronicWaybill\PddCloudprintStdtemplatesGet;
use PddSdk\Api\ElectronicWaybill\PddCloudPrintTaskQuery;
use PddSdk\Api\ElectronicWaybill\PddCloudPrintVerifyCode;
use PddSdk\Api\ElectronicWaybill\PddWaybillCancel;
use PddSdk\Api\ElectronicWaybill\PddWaybillGet;
use PddSdk\Api\ElectronicWaybill\PddWaybillQueryByWaybillcode;
use PddSdk\Api\ElectronicWaybill\PddWaybillSearch;
use PddSdk\Api\ElectronicWaybill\PddWaybillUpdate;
use PddSdk\Api\Finance\PddFinanceBalanceDailyBillUrlGet;
use PddSdk\Api\Goods\PddDeleteDraftCommit;
use PddSdk\Api\Goods\PddDeleteGoodsCommit;
use PddSdk\Api\Goods\PddGoodsAdd;
use PddSdk\Api\Goods\PddGoodsAuthorizationCats;
use PddSdk\Api\Goods\PddGoodsCatRuleGet;
use PddSdk\Api\Goods\PddGoodsCatsGet;
use PddSdk\Api\Goods\PddGoodsCatTemplateGet;
use PddSdk\Api\Goods\PddGoodsChildSkuEdit;
use PddSdk\Api\Goods\PddGoodsCommitDetailGet;
use PddSdk\Api\Goods\PddGoodsCommitListGet;
use PddSdk\Api\Goods\PddGoodsCommitStatusGet;
use PddSdk\Api\Goods\PddGoodsCountryGet;
use PddSdk\Api\Goods\PddGoodsCpsMallUnitChange;
use PddSdk\Api\Goods\PddGoodsCpsMallUnitQuery;
use PddSdk\Api\Goods\PddGoodsCpsUnitChange;
use PddSdk\Api\Goods\PddGoodsCpsUnitCreate;
use PddSdk\Api\Goods\PddGoodsCpsUnitDelete;
use PddSdk\Api\Goods\PddGoodsCpsUnitQuery;
use PddSdk\Api\Goods\PddGoodsDetailGet;
use PddSdk\Api\Goods\PddGoodsEditGoodsCommit;
use PddSdk\Api\Goods\PddGoodsFileInfoGet;
use PddSdk\Api\Goods\PddGoodsFilespaceImageUpload;
use PddSdk\Api\Goods\PddGoodsGetRelation;
use PddSdk\Api\Goods\PddGoodsImageUpload;
use PddSdk\Api\Goods\PddGoodsImgUpload;
use PddSdk\Api\Goods\PddGoodsInformationGet;
use PddSdk\Api\Goods\PddGoodsInformationUpdate;
use PddSdk\Api\Goods\PddGoodsLatestCommitStatusGet;
use PddSdk\Api\Goods\PddGoodsListGet;
use PddSdk\Api\Goods\PddGoodsLogisticsSerTemplateDetail;
use PddSdk\Api\Goods\PddGoodsLogisticsSerTemplateList;
use PddSdk\Api\Goods\PddGoodsLogisticsTemplateCreate;
use PddSdk\Api\Goods\PddGoodsLogisticsTemplateGet;
use PddSdk\Api\Goods\PddGoodsMaterialCreate;
use PddSdk\Api\Goods\PddGoodsMaterialDelete;
use PddSdk\Api\Goods\PddGoodsMaterialQuery;
use PddSdk\Api\Goods\PddGoodsOptGet;
use PddSdk\Api\Goods\PddGoodsOuterCatMappingGet;
use PddSdk\Api\Goods\PddGoodsPriceCheck;
use PddSdk\Api\Goods\PddGoodsQuantityUpdate;
use PddSdk\Api\Goods\PddGoodsSaleStatusSet;
use PddSdk\Api\Goods\PddGoodsSizespecClassGet;
use PddSdk\Api\Goods\PddGoodsSizespecMetaGet;
use PddSdk\Api\Goods\PddGoodsSizespecTemplatesGet;
use PddSdk\Api\Goods\PddGoodsSkuPriceUpdate;
use PddSdk\Api\Goods\PddGoodsSkusGet;
use PddSdk\Api\Goods\PddGoodsSnImgUpload;
use PddSdk\Api\Goods\PddGoodsSpecGet;
use PddSdk\Api\Goods\PddGoodsSpecIdGet;
use PddSdk\Api\Goods\PddGoodsSpuGet;
use PddSdk\Api\Goods\PddGoodsSpuSearch;
use PddSdk\Api\Goods\PddGoodsSubmitGoodsCommit;
use PddSdk\Api\Goods\PddGoodsTemplatePropertyValueSearch;
use PddSdk\Api\Goods\PddGoodsVideoUpload;
use PddSdk\Api\Goods\PddGooodsSkuMeasurementList;
use PddSdk\Api\Goods\PddOneExpressCostTemplate;
use PddSdk\Api\International\PddCustomsSendGoodsRecord;
use PddSdk\Api\International\PddMallInfoBondedWarehouseGet;
use PddSdk\Api\International\PddOverseaClearanceGet;
use PddSdk\Api\International\PddOverseaDeclarationFailNotify;
use PddSdk\Api\Invoice\PddEinvoiceInfoQuery;
use PddSdk\Api\Invoice\PddInvoiceApplicationQuery;
use PddSdk\Api\Invoice\PddInvoiceDetailInvalid;
use PddSdk\Api\Invoice\PddInvoiceDetailUpload;
use PddSdk\Api\Logistics\PddConsoWaybillInterceptApply;
use PddSdk\Api\Logistics\PddCrossCabinetRecycleOrder;
use PddSdk\Api\Logistics\PddCrossPackStoreOperateNotification;
use PddSdk\Api\Logistics\PddDeliveryReceiptImageUpload;
use PddSdk\Api\Logistics\PddLogisticsAddressGet;
use PddSdk\Api\Logistics\PddLogisticsAvailableCompanyRecommend;
use PddSdk\Api\Logistics\PddLogisticsCompaniesGet;
use PddSdk\Api\Logistics\PddLogisticsIsvTraceNotifySub;
use PddSdk\Api\Logistics\PddLogisticsOnlineSend;
use PddSdk\Api\Logistics\PddLogisticsOrdertraceGet;
use PddSdk\Api\Logistics\PddTailExpressSyncJt;
use PddSdk\Api\Logistics\PddTailRuralExpressTraceSync;
use PddSdk\Api\Marketing\PddPromotionGoodsCouponListGet;
use PddSdk\Api\Marketing\PddPromotionLimitedActivityCancel;
use PddSdk\Api\Marketing\PddPromotionLimitedActivityCreate;
use PddSdk\Api\Marketing\PddPromotionLimitedDiscountListGet;
use PddSdk\Api\Marketing\PddPromotionLimitedQualifiedGoodsGet;
use PddSdk\Api\Marketing\PddPromotionLimitedQualifiedSkuGet;
use PddSdk\Api\Marketing\PddPromotionMerchantCouponListGet;
use PddSdk\Api\MerchantShipping\PddLogisticsOnlinedeliveryCourierQuery;
use PddSdk\Api\MerchantShipping\PddLogisticsOnlinedeliveryPaymentStatus;
use PddSdk\Api\MerchantShipping\PddLogisticsOnlinedeliveryPredictPrice;
use PddSdk\Api\MerchantShipping\PddLogisticsOnlinedeliveryReceiptCancel;
use PddSdk\Api\MerchantShipping\PddLogisticsOnlinedeliveryReceiptCreate;
use PddSdk\Api\MerchantShipping\PddLogisticsOnlinedeliveryReceiptDetail;
use PddSdk\Api\MerchantShipping\PddLogisticsOnlinedeliveryReceiptList;
use PddSdk\Api\MerchantShipping\PddLogisticsOnlinedeliveryReceiptNotPayList;
use PddSdk\Api\MerchantShipping\PddLogisticsOnlinedeliveryReceiptTriggerPay;
use PddSdk\Api\MerchantShipping\PddLogisticsOnlinedeliverySendAddressQuery;
use PddSdk\Api\MerchantShipping\PddLogisticsOnlinedeliverySubsibyAppealResult;
use PddSdk\Api\MerchantShipping\PddLogisticsOnlinedeliverySubsibyShipbillSend;
use PddSdk\Api\MerchantShipping\PddLogisticsOnlinedeliverySubsibyWeightAppeal;
use PddSdk\Api\Message\PddPmcAccrueQuery;
use PddSdk\Api\Message\PddPmcUserCancel;
use PddSdk\Api\Message\PddPmcUserGet;
use PddSdk\Api\Message\PddPmcUserPermit;
use PddSdk\Api\Order\PddErpOrderSync;
use PddSdk\Api\Order\PddMilleQueryBuyOrderSplitBillAmount;
use PddSdk\Api\Order\PddOrderAccountAttachmentUpload;
use PddSdk\Api\Order\PddOrderBasicListGet;
use PddSdk\Api\Order\PddOrderInformationGet;
use PddSdk\Api\Order\PddOrderListGet;
use PddSdk\Api\Order\PddOrderMergeShipOrderGroup;
use PddSdk\Api\Order\PddOrderNoteUpdate;
use PddSdk\Api\Order\PddOrderNumberListIncrementGet;
use PddSdk\Api\Order\PddOrderPromiseInfoGet;
use PddSdk\Api\Order\PddOrderPromotionGet;
use PddSdk\Api\Order\PddOrderReviewInfo;
use PddSdk\Api\Order\PddOrderSearchOrder;
use PddSdk\Api\Order\PddOrderServiceBenefitUpdate;
use PddSdk\Api\Order\PddOrderSpecificOrderInformationGet;
use PddSdk\Api\Order\PddOrderStatusGet;
use PddSdk\Api\Order\PddOrderSubmallInformationGet;
use PddSdk\Api\Order\PddOrderSubmallListGet;
use PddSdk\Api\Order\PddOrderTradeinInfo;
use PddSdk\Api\Order\PddOrderTradeinPostSn;
use PddSdk\Api\Order\PddOrderUpdateAddress;
use PddSdk\Api\Order\PddOrderUploadDeliveryFeature;
use PddSdk\Api\Order\PddOrderUploadExtraLogistics;
use PddSdk\Api\Order\PddOrderUploadRelationLogistics;
use PddSdk\Api\Order\PddOrderVirtualInformationGet;
use PddSdk\Api\Order\PddSurveyQuerySpecialSurvey;
use PddSdk\Api\ServiceMarket\PddServicemarketContractSearch;
use PddSdk\Api\ServiceMarket\PddServicemarketSettlementbillGet;
use PddSdk\Api\ServiceMarket\PddServicemarketTradelistGet;
use PddSdk\Api\ServiceMarket\PddVasOrderSearch;
use PddSdk\Api\Shop\PddMallCpsProtocolStatusQuery;
use PddSdk\Api\Shop\PddMallInfoGet;
use PddSdk\Api\Shop\PddMallNotificationTypeShowCheck;
use PddSdk\Api\Shop\PddTraceSourceQueryGoodsInfo;
use PddSdk\Api\Shop\PddTraceSourceUploadCodeInfo;
use PddSdk\Api\Shop\PddTraceSourceUploadPlanInfo;
use PddSdk\Api\Sms\PddOpenMsgSendResultReceive;
use PddSdk\Api\Sms\PddOpenMsgServiceSendExpressMsg;
use PddSdk\Api\SmsProvider\PddSmsDetailbillPush;
use PddSdk\Api\Store\PddMallInfoGroupAddStorePost;
use PddSdk\Api\Store\PddMallInfoGroupListStoreGet;
use PddSdk\Api\Store\PddMallInfoGroupQueryPost;
use PddSdk\Api\Store\PddMallInfoGroupRemoveStoreGet;
use PddSdk\Api\Store\PddMallInfoStoreCreatePostNopoi;
use PddSdk\Api\Store\PddMallInfoStoreGet;
use PddSdk\Api\Store\PddMallInfoStoreUpdatePostNopoi;
use PddSdk\Api\Store\PddQrpayPayeeRegister;
use PddSdk\Api\Tools\PddOpenDecryptBatch;
use PddSdk\Api\Tools\PddOpenDecryptMaskBatch;
use PddSdk\Api\Tools\PddOpenKmsEncryptBatch;
use PddSdk\Api\Tools\PddOpenVirtualNumberCheck;
use PddSdk\Api\Tools\PddPopAuthTokenCreate;
use PddSdk\Api\Tools\PddPopMallBindRelationReport;
use PddSdk\Api\Tools\PddPopMallBindTicketGet;
use PddSdk\Api\Tools\PddPopMallBindTokenGet;
use PddSdk\Api\Tools\PddTimeGet;
use PddSdk\Api\Travel\PddServiceAftersalesAppointNotify;
use PddSdk\Api\Travel\PddTicketAreacodeGet;
use PddSdk\Api\Travel\PddTicketGoodsQuery;
use PddSdk\Api\Travel\PddTicketGoodsUpload;
use PddSdk\Api\Travel\PddTicketOrderCreateNotifycation;
use PddSdk\Api\Travel\PddTicketOrderRefundNotifycation;
use PddSdk\Api\Travel\PddTicketScenicGet;
use PddSdk\Api\Travel\PddTicketSkuRuleAdd;
use PddSdk\Api\Travel\PddTicketSkuRuleEdit;
use PddSdk\Api\Travel\PddTicketSkuRuleGet;
use PddSdk\Api\Travel\PddTicketVerificationNotifycation;
use PddSdk\Api\VideoRecommendation\PddVivodeskwindowQueryresources;
use PddSdk\Api\Virtual\PddSimAuthIdSync;
use PddSdk\Api\Virtual\PddSimDirectOrderPush;
use PddSdk\Api\Virtual\PddSimProcessResultNotify;
use PddSdk\Api\Virtual\PddSimSerialNoValidate;
use PddSdk\Api\Virtual\PddVirtualGameServerQuery;
use PddSdk\Api\Virtual\PddVirtualMobileChargeNotify;
use PddSdk\Api\Virtual\PddWarrantyOrdersIncrementGet;
use PddSdk\Api\Voucher\PddReservedMedicineLogisticsUpload;
use PddSdk\Api\Voucher\PddVoucherAppointmentInfoSend;
use PddSdk\Api\Voucher\PddVoucherOtaCardPrepareVerification;
use PddSdk\Api\Voucher\PddVoucherOtaCardVerification;
use PddSdk\Api\Voucher\PddVoucherPhysicalGoodsSend;
use PddSdk\Api\Voucher\PddVoucherRealtimeVerifySync;
use PddSdk\Api\Voucher\PddVoucherVirtualCardBatchAdd;
use PddSdk\Api\Voucher\PddVoucherVirtualCardVerification;
use PddSdk\Api\Voucher\PddVoucherVoucherComplain;
use PddSdk\Api\Voucher\PddVoucherVoucherInfoSend;
use PddSdk\Api\Warehouse\PddExpressAddDepot;
use PddSdk\Api\Warehouse\PddExpressChangeDepotInfo;
use PddSdk\Api\Warehouse\PddExpressDepotInfoGet;
use PddSdk\Api\Warehouse\PddExpressDepotListGet;
use PddSdk\Api\Warehouse\PddExpressSearchDepot;
use PddSdk\Api\Warehouse\PddStockGoodsIdToSkuQuery;
use PddSdk\Api\Warehouse\PddStockWareCreate;
use PddSdk\Api\Warehouse\PddStockWareDelete;
use PddSdk\Api\Warehouse\PddStockWareDetailQuery;
use PddSdk\Api\Warehouse\PddStockWareInfoList;
use PddSdk\Api\Warehouse\PddStockWareList;
use PddSdk\Api\Warehouse\PddStockWareMove;
use PddSdk\Api\Warehouse\PddStockWareSkuUpdate;
use PddSdk\Api\Warehouse\PddStockWareUpdate;
use PddSdk\Api\Warehouse\PddStockWareWarehouseQuery;
use PddSdk\Api\WaybillPrinting\PddFdsOrderGet;
use PddSdk\Api\WaybillPrinting\PddFdsOrderListGet;
use PddSdk\Api\WaybillPrinting\PddFdsRoleGet;
use PddSdk\Api\WaybillPrinting\PddFdsWaybillCancel;
use PddSdk\Api\WaybillPrinting\PddFdsWaybillGet;
use PddSdk\Api\WaybillPrinting\PddFdsWaybillReturn;
use PddSdk\Api\WaybillPrinting\PddFdsWaybillReturnSlave;
use PddSdk\Api\WeMedia\PddLiveImgMallUpload;
use PddSdk\Api\WeMedia\PddLiveVideoMallCreate;
use PddSdk\Api\WeMedia\PddLiveVideoMallQuerymallvideoauditstatus;
use PddSdk\Api\WeMedia\PddLiveVideoMallUploadPart;
use PddSdk\Api\WeMedia\PddLiveVideoMallUploadPartComplete;
use PddSdk\Api\WeMedia\PddLiveVideoMallUploadPartInit;
use PddSdk\Client\PendingRequest;

trait ApiClientMethods
{
    public function pddCloudPrint(): PendingRequest
    {
        return $this->createPendingRequest(PddCloudPrint::class);
    }

    public function pddCloudPrintTaskQuery(): PendingRequest
    {
        return $this->createPendingRequest(PddCloudPrintTaskQuery::class);
    }

    public function pddCloudPrintVerifyCode(): PendingRequest
    {
        return $this->createPendingRequest(PddCloudPrintVerifyCode::class);
    }

    public function pddCloudPrinterBind(): PendingRequest
    {
        return $this->createPendingRequest(PddCloudPrinterBind::class);
    }

    public function pddCloudPrinterSetting(): PendingRequest
    {
        return $this->createPendingRequest(PddCloudPrinterSetting::class);
    }

    public function pddCloudPrinterStatusQuery(): PendingRequest
    {
        return $this->createPendingRequest(PddCloudPrinterStatusQuery::class);
    }

    public function pddCloudprintCustomaresGet(): PendingRequest
    {
        return $this->createPendingRequest(PddCloudprintCustomaresGet::class);
    }

    public function pddCloudprintStdtemplatesGet(): PendingRequest
    {
        return $this->createPendingRequest(PddCloudprintStdtemplatesGet::class);
    }

    public function pddConsoWaybillInterceptApply(): PendingRequest
    {
        return $this->createPendingRequest(PddConsoWaybillInterceptApply::class);
    }

    public function pddCrossCabinetRecycleOrder(): PendingRequest
    {
        return $this->createPendingRequest(PddCrossCabinetRecycleOrder::class);
    }

    public function pddCrossPackStoreOperateNotification(): PendingRequest
    {
        return $this->createPendingRequest(PddCrossPackStoreOperateNotification::class);
    }

    public function pddCustomsSendGoodsRecord(): PendingRequest
    {
        return $this->createPendingRequest(PddCustomsSendGoodsRecord::class);
    }

    public function pddDdkAllOrderListIncrementGet(): PendingRequest
    {
        return $this->createPendingRequest(PddDdkAllOrderListIncrementGet::class);
    }

    public function pddDdkCashgiftCreate(): PendingRequest
    {
        return $this->createPendingRequest(PddDdkCashgiftCreate::class);
    }

    public function pddDdkCashgiftDataQuery(): PendingRequest
    {
        return $this->createPendingRequest(PddDdkCashgiftDataQuery::class);
    }

    public function pddDdkCashgiftStatusUpdate(): PendingRequest
    {
        return $this->createPendingRequest(PddDdkCashgiftStatusUpdate::class);
    }

    public function pddDdkCmsPromUrlGenerate(): PendingRequest
    {
        return $this->createPendingRequest(PddDdkCmsPromUrlGenerate::class);
    }

    public function pddDdkGoodsDetail(): PendingRequest
    {
        return $this->createPendingRequest(PddDdkGoodsDetail::class);
    }

    public function pddDdkGoodsPidGenerate(): PendingRequest
    {
        return $this->createPendingRequest(PddDdkGoodsPidGenerate::class);
    }

    public function pddDdkGoodsPidQuery(): PendingRequest
    {
        return $this->createPendingRequest(PddDdkGoodsPidQuery::class);
    }

    public function pddDdkGoodsPromotionRightAuth(): PendingRequest
    {
        return $this->createPendingRequest(PddDdkGoodsPromotionRightAuth::class);
    }

    public function pddDdkGoodsPromotionUrlGenerate(): PendingRequest
    {
        return $this->createPendingRequest(PddDdkGoodsPromotionUrlGenerate::class);
    }

    public function pddDdkGoodsRecommendGet(): PendingRequest
    {
        return $this->createPendingRequest(PddDdkGoodsRecommendGet::class);
    }

    public function pddDdkGoodsSearch(): PendingRequest
    {
        return $this->createPendingRequest(PddDdkGoodsSearch::class);
    }

    public function pddDdkGoodsZsUnitUrlGen(): PendingRequest
    {
        return $this->createPendingRequest(PddDdkGoodsZsUnitUrlGen::class);
    }

    public function pddDdkMemberAuthorityQuery(): PendingRequest
    {
        return $this->createPendingRequest(PddDdkMemberAuthorityQuery::class);
    }

    public function pddDdkOauthCashgiftCreate(): PendingRequest
    {
        return $this->createPendingRequest(PddDdkOauthCashgiftCreate::class);
    }

    public function pddDdkOauthCashgiftStatusUpdate(): PendingRequest
    {
        return $this->createPendingRequest(PddDdkOauthCashgiftStatusUpdate::class);
    }

    public function pddDdkOauthCmsPromUrlGenerate(): PendingRequest
    {
        return $this->createPendingRequest(PddDdkOauthCmsPromUrlGenerate::class);
    }

    public function pddDdkOauthGoodsDetail(): PendingRequest
    {
        return $this->createPendingRequest(PddDdkOauthGoodsDetail::class);
    }

    public function pddDdkOauthGoodsPidGenerate(): PendingRequest
    {
        return $this->createPendingRequest(PddDdkOauthGoodsPidGenerate::class);
    }

    public function pddDdkOauthGoodsPidQuery(): PendingRequest
    {
        return $this->createPendingRequest(PddDdkOauthGoodsPidQuery::class);
    }

    public function pddDdkOauthGoodsPromUrlGenerate(): PendingRequest
    {
        return $this->createPendingRequest(PddDdkOauthGoodsPromUrlGenerate::class);
    }

    public function pddDdkOauthGoodsRecommendGet(): PendingRequest
    {
        return $this->createPendingRequest(PddDdkOauthGoodsRecommendGet::class);
    }

    public function pddDdkOauthGoodsSearch(): PendingRequest
    {
        return $this->createPendingRequest(PddDdkOauthGoodsSearch::class);
    }

    public function pddDdkOauthGoodsZsUnitUrlGen(): PendingRequest
    {
        return $this->createPendingRequest(PddDdkOauthGoodsZsUnitUrlGen::class);
    }

    public function pddDdkOauthMemberAuthorityQuery(): PendingRequest
    {
        return $this->createPendingRequest(PddDdkOauthMemberAuthorityQuery::class);
    }

    public function pddDdkOauthOrderDetailGet(): PendingRequest
    {
        return $this->createPendingRequest(PddDdkOauthOrderDetailGet::class);
    }

    public function pddDdkOauthOrderListIncrementGet(): PendingRequest
    {
        return $this->createPendingRequest(PddDdkOauthOrderListIncrementGet::class);
    }

    public function pddDdkOauthPidMediaidBind(): PendingRequest
    {
        return $this->createPendingRequest(PddDdkOauthPidMediaidBind::class);
    }

    public function pddDdkOauthResourceUrlGen(): PendingRequest
    {
        return $this->createPendingRequest(PddDdkOauthResourceUrlGen::class);
    }

    public function pddDdkOauthRpPromUrlGenerate(): PendingRequest
    {
        return $this->createPendingRequest(PddDdkOauthRpPromUrlGenerate::class);
    }

    public function pddDdkOauthWeappQrcodeUrlGen(): PendingRequest
    {
        return $this->createPendingRequest(PddDdkOauthWeappQrcodeUrlGen::class);
    }

    public function pddDdkOrderDetailGet(): PendingRequest
    {
        return $this->createPendingRequest(PddDdkOrderDetailGet::class);
    }

    public function pddDdkOrderListIncrementGet(): PendingRequest
    {
        return $this->createPendingRequest(PddDdkOrderListIncrementGet::class);
    }

    public function pddDdkOrderListRangeGet(): PendingRequest
    {
        return $this->createPendingRequest(PddDdkOrderListRangeGet::class);
    }

    public function pddDdkPidMediaidBind(): PendingRequest
    {
        return $this->createPendingRequest(PddDdkPidMediaidBind::class);
    }

    public function pddDdkPromotionGoodsQuery(): PendingRequest
    {
        return $this->createPendingRequest(PddDdkPromotionGoodsQuery::class);
    }

    public function pddDdkReportImgUpload(): PendingRequest
    {
        return $this->createPendingRequest(PddDdkReportImgUpload::class);
    }

    public function pddDdkReportVideoUpload(): PendingRequest
    {
        return $this->createPendingRequest(PddDdkReportVideoUpload::class);
    }

    public function pddDdkReportVideoUploadPart(): PendingRequest
    {
        return $this->createPendingRequest(PddDdkReportVideoUploadPart::class);
    }

    public function pddDdkReportVideoUploadPartComplete(): PendingRequest
    {
        return $this->createPendingRequest(PddDdkReportVideoUploadPartComplete::class);
    }

    public function pddDdkReportVideoUploadPartInit(): PendingRequest
    {
        return $this->createPendingRequest(PddDdkReportVideoUploadPartInit::class);
    }

    public function pddDdkResourceUrlGen(): PendingRequest
    {
        return $this->createPendingRequest(PddDdkResourceUrlGen::class);
    }

    public function pddDdkRpPromUrlGenerate(): PendingRequest
    {
        return $this->createPendingRequest(PddDdkRpPromUrlGenerate::class);
    }

    public function pddDdkStatisticsDataQuery(): PendingRequest
    {
        return $this->createPendingRequest(PddDdkStatisticsDataQuery::class);
    }

    public function pddDdkTmcActivityList(): PendingRequest
    {
        return $this->createPendingRequest(PddDdkTmcActivityList::class);
    }

    public function pddDdkUrlShortParse(): PendingRequest
    {
        return $this->createPendingRequest(PddDdkUrlShortParse::class);
    }

    public function pddDdkWeappQrcodeUrlGen(): PendingRequest
    {
        return $this->createPendingRequest(PddDdkWeappQrcodeUrlGen::class);
    }

    public function pddDeleteDraftCommit(): PendingRequest
    {
        return $this->createPendingRequest(PddDeleteDraftCommit::class);
    }

    public function pddDeleteGoodsCommit(): PendingRequest
    {
        return $this->createPendingRequest(PddDeleteGoodsCommit::class);
    }

    public function pddDeliveryReceiptImageUpload(): PendingRequest
    {
        return $this->createPendingRequest(PddDeliveryReceiptImageUpload::class);
    }

    public function pddEinvoiceInfoQuery(): PendingRequest
    {
        return $this->createPendingRequest(PddEinvoiceInfoQuery::class);
    }

    public function pddErpOrderListGet(): PendingRequest
    {
        return $this->createPendingRequest(PddErpOrderListGet::class);
    }

    public function pddErpOrderSync(): PendingRequest
    {
        return $this->createPendingRequest(PddErpOrderSync::class);
    }

    public function pddErpOubListGet(): PendingRequest
    {
        return $this->createPendingRequest(PddErpOubListGet::class);
    }

    public function pddErpRefundListGet(): PendingRequest
    {
        return $this->createPendingRequest(PddErpRefundListGet::class);
    }

    public function pddExpressAddDepot(): PendingRequest
    {
        return $this->createPendingRequest(PddExpressAddDepot::class);
    }

    public function pddExpressChangeDepotInfo(): PendingRequest
    {
        return $this->createPendingRequest(PddExpressChangeDepotInfo::class);
    }

    public function pddExpressDepotInfoGet(): PendingRequest
    {
        return $this->createPendingRequest(PddExpressDepotInfoGet::class);
    }

    public function pddExpressDepotListGet(): PendingRequest
    {
        return $this->createPendingRequest(PddExpressDepotListGet::class);
    }

    public function pddExpressSearchDepot(): PendingRequest
    {
        return $this->createPendingRequest(PddExpressSearchDepot::class);
    }

    public function pddFdsOrderGet(): PendingRequest
    {
        return $this->createPendingRequest(PddFdsOrderGet::class);
    }

    public function pddFdsOrderListGet(): PendingRequest
    {
        return $this->createPendingRequest(PddFdsOrderListGet::class);
    }

    public function pddFdsRoleGet(): PendingRequest
    {
        return $this->createPendingRequest(PddFdsRoleGet::class);
    }

    public function pddFdsWaybillCancel(): PendingRequest
    {
        return $this->createPendingRequest(PddFdsWaybillCancel::class);
    }

    public function pddFdsWaybillGet(): PendingRequest
    {
        return $this->createPendingRequest(PddFdsWaybillGet::class);
    }

    public function pddFdsWaybillReturn(): PendingRequest
    {
        return $this->createPendingRequest(PddFdsWaybillReturn::class);
    }

    public function pddFdsWaybillReturnSlave(): PendingRequest
    {
        return $this->createPendingRequest(PddFdsWaybillReturnSlave::class);
    }

    public function pddFinanceBalanceDailyBillUrlGet(): PendingRequest
    {
        return $this->createPendingRequest(PddFinanceBalanceDailyBillUrlGet::class);
    }

    public function pddGoodsAdd(): PendingRequest
    {
        return $this->createPendingRequest(PddGoodsAdd::class);
    }

    public function pddGoodsAuthorizationCats(): PendingRequest
    {
        return $this->createPendingRequest(PddGoodsAuthorizationCats::class);
    }

    public function pddGoodsCatRuleGet(): PendingRequest
    {
        return $this->createPendingRequest(PddGoodsCatRuleGet::class);
    }

    public function pddGoodsCatTemplateGet(): PendingRequest
    {
        return $this->createPendingRequest(PddGoodsCatTemplateGet::class);
    }

    public function pddGoodsCatsGet(): PendingRequest
    {
        return $this->createPendingRequest(PddGoodsCatsGet::class);
    }

    public function pddGoodsChildSkuEdit(): PendingRequest
    {
        return $this->createPendingRequest(PddGoodsChildSkuEdit::class);
    }

    public function pddGoodsCommitDetailGet(): PendingRequest
    {
        return $this->createPendingRequest(PddGoodsCommitDetailGet::class);
    }

    public function pddGoodsCommitListGet(): PendingRequest
    {
        return $this->createPendingRequest(PddGoodsCommitListGet::class);
    }

    public function pddGoodsCommitStatusGet(): PendingRequest
    {
        return $this->createPendingRequest(PddGoodsCommitStatusGet::class);
    }

    public function pddGoodsCountryGet(): PendingRequest
    {
        return $this->createPendingRequest(PddGoodsCountryGet::class);
    }

    public function pddGoodsCpsMallUnitChange(): PendingRequest
    {
        return $this->createPendingRequest(PddGoodsCpsMallUnitChange::class);
    }

    public function pddGoodsCpsMallUnitQuery(): PendingRequest
    {
        return $this->createPendingRequest(PddGoodsCpsMallUnitQuery::class);
    }

    public function pddGoodsCpsUnitChange(): PendingRequest
    {
        return $this->createPendingRequest(PddGoodsCpsUnitChange::class);
    }

    public function pddGoodsCpsUnitCreate(): PendingRequest
    {
        return $this->createPendingRequest(PddGoodsCpsUnitCreate::class);
    }

    public function pddGoodsCpsUnitDelete(): PendingRequest
    {
        return $this->createPendingRequest(PddGoodsCpsUnitDelete::class);
    }

    public function pddGoodsCpsUnitQuery(): PendingRequest
    {
        return $this->createPendingRequest(PddGoodsCpsUnitQuery::class);
    }

    public function pddGoodsDetailGet(): PendingRequest
    {
        return $this->createPendingRequest(PddGoodsDetailGet::class);
    }

    public function pddGoodsEditGoodsCommit(): PendingRequest
    {
        return $this->createPendingRequest(PddGoodsEditGoodsCommit::class);
    }

    public function pddGoodsFileInfoGet(): PendingRequest
    {
        return $this->createPendingRequest(PddGoodsFileInfoGet::class);
    }

    public function pddGoodsFilespaceImageUpload(): PendingRequest
    {
        return $this->createPendingRequest(PddGoodsFilespaceImageUpload::class);
    }

    public function pddGoodsGetRelation(): PendingRequest
    {
        return $this->createPendingRequest(PddGoodsGetRelation::class);
    }

    public function pddGoodsImageUpload(): PendingRequest
    {
        return $this->createPendingRequest(PddGoodsImageUpload::class);
    }

    public function pddGoodsImgUpload(): PendingRequest
    {
        return $this->createPendingRequest(PddGoodsImgUpload::class);
    }

    public function pddGoodsInformationGet(): PendingRequest
    {
        return $this->createPendingRequest(PddGoodsInformationGet::class);
    }

    public function pddGoodsInformationUpdate(): PendingRequest
    {
        return $this->createPendingRequest(PddGoodsInformationUpdate::class);
    }

    public function pddGoodsLatestCommitStatusGet(): PendingRequest
    {
        return $this->createPendingRequest(PddGoodsLatestCommitStatusGet::class);
    }

    public function pddGoodsListGet(): PendingRequest
    {
        return $this->createPendingRequest(PddGoodsListGet::class);
    }

    public function pddGoodsLogisticsSerTemplateDetail(): PendingRequest
    {
        return $this->createPendingRequest(PddGoodsLogisticsSerTemplateDetail::class);
    }

    public function pddGoodsLogisticsSerTemplateList(): PendingRequest
    {
        return $this->createPendingRequest(PddGoodsLogisticsSerTemplateList::class);
    }

    public function pddGoodsLogisticsTemplateCreate(): PendingRequest
    {
        return $this->createPendingRequest(PddGoodsLogisticsTemplateCreate::class);
    }

    public function pddGoodsLogisticsTemplateGet(): PendingRequest
    {
        return $this->createPendingRequest(PddGoodsLogisticsTemplateGet::class);
    }

    public function pddGoodsMaterialCreate(): PendingRequest
    {
        return $this->createPendingRequest(PddGoodsMaterialCreate::class);
    }

    public function pddGoodsMaterialDelete(): PendingRequest
    {
        return $this->createPendingRequest(PddGoodsMaterialDelete::class);
    }

    public function pddGoodsMaterialQuery(): PendingRequest
    {
        return $this->createPendingRequest(PddGoodsMaterialQuery::class);
    }

    public function pddGoodsOptGet(): PendingRequest
    {
        return $this->createPendingRequest(PddGoodsOptGet::class);
    }

    public function pddGoodsOuterCatMappingGet(): PendingRequest
    {
        return $this->createPendingRequest(PddGoodsOuterCatMappingGet::class);
    }

    public function pddGoodsPriceCheck(): PendingRequest
    {
        return $this->createPendingRequest(PddGoodsPriceCheck::class);
    }

    public function pddGoodsQuantityUpdate(): PendingRequest
    {
        return $this->createPendingRequest(PddGoodsQuantityUpdate::class);
    }

    public function pddGoodsSaleStatusSet(): PendingRequest
    {
        return $this->createPendingRequest(PddGoodsSaleStatusSet::class);
    }

    public function pddGoodsSizespecClassGet(): PendingRequest
    {
        return $this->createPendingRequest(PddGoodsSizespecClassGet::class);
    }

    public function pddGoodsSizespecMetaGet(): PendingRequest
    {
        return $this->createPendingRequest(PddGoodsSizespecMetaGet::class);
    }

    public function pddGoodsSizespecTemplatesGet(): PendingRequest
    {
        return $this->createPendingRequest(PddGoodsSizespecTemplatesGet::class);
    }

    public function pddGoodsSkuPriceUpdate(): PendingRequest
    {
        return $this->createPendingRequest(PddGoodsSkuPriceUpdate::class);
    }

    public function pddGoodsSkusGet(): PendingRequest
    {
        return $this->createPendingRequest(PddGoodsSkusGet::class);
    }

    public function pddGoodsSnImgUpload(): PendingRequest
    {
        return $this->createPendingRequest(PddGoodsSnImgUpload::class);
    }

    public function pddGoodsSpecGet(): PendingRequest
    {
        return $this->createPendingRequest(PddGoodsSpecGet::class);
    }

    public function pddGoodsSpecIdGet(): PendingRequest
    {
        return $this->createPendingRequest(PddGoodsSpecIdGet::class);
    }

    public function pddGoodsSpuGet(): PendingRequest
    {
        return $this->createPendingRequest(PddGoodsSpuGet::class);
    }

    public function pddGoodsSpuSearch(): PendingRequest
    {
        return $this->createPendingRequest(PddGoodsSpuSearch::class);
    }

    public function pddGoodsSubmitGoodsCommit(): PendingRequest
    {
        return $this->createPendingRequest(PddGoodsSubmitGoodsCommit::class);
    }

    public function pddGoodsTemplatePropertyValueSearch(): PendingRequest
    {
        return $this->createPendingRequest(PddGoodsTemplatePropertyValueSearch::class);
    }

    public function pddGoodsVideoUpload(): PendingRequest
    {
        return $this->createPendingRequest(PddGoodsVideoUpload::class);
    }

    public function pddGooodsSkuMeasurementList(): PendingRequest
    {
        return $this->createPendingRequest(PddGooodsSkuMeasurementList::class);
    }

    public function pddInvoiceApplicationQuery(): PendingRequest
    {
        return $this->createPendingRequest(PddInvoiceApplicationQuery::class);
    }

    public function pddInvoiceDetailInvalid(): PendingRequest
    {
        return $this->createPendingRequest(PddInvoiceDetailInvalid::class);
    }

    public function pddInvoiceDetailUpload(): PendingRequest
    {
        return $this->createPendingRequest(PddInvoiceDetailUpload::class);
    }

    public function pddLiveImgMallUpload(): PendingRequest
    {
        return $this->createPendingRequest(PddLiveImgMallUpload::class);
    }

    public function pddLiveVideoMallCreate(): PendingRequest
    {
        return $this->createPendingRequest(PddLiveVideoMallCreate::class);
    }

    public function pddLiveVideoMallQuerymallvideoauditstatus(): PendingRequest
    {
        return $this->createPendingRequest(PddLiveVideoMallQuerymallvideoauditstatus::class);
    }

    public function pddLiveVideoMallUploadPart(): PendingRequest
    {
        return $this->createPendingRequest(PddLiveVideoMallUploadPart::class);
    }

    public function pddLiveVideoMallUploadPartComplete(): PendingRequest
    {
        return $this->createPendingRequest(PddLiveVideoMallUploadPartComplete::class);
    }

    public function pddLiveVideoMallUploadPartInit(): PendingRequest
    {
        return $this->createPendingRequest(PddLiveVideoMallUploadPartInit::class);
    }

    public function pddLogisticsAddressGet(): PendingRequest
    {
        return $this->createPendingRequest(PddLogisticsAddressGet::class);
    }

    public function pddLogisticsAvailableCompanyRecommend(): PendingRequest
    {
        return $this->createPendingRequest(PddLogisticsAvailableCompanyRecommend::class);
    }

    public function pddLogisticsCompaniesGet(): PendingRequest
    {
        return $this->createPendingRequest(PddLogisticsCompaniesGet::class);
    }

    public function pddLogisticsIsvTraceNotifySub(): PendingRequest
    {
        return $this->createPendingRequest(PddLogisticsIsvTraceNotifySub::class);
    }

    public function pddLogisticsOnlineSend(): PendingRequest
    {
        return $this->createPendingRequest(PddLogisticsOnlineSend::class);
    }

    public function pddLogisticsOnlinedeliveryCourierQuery(): PendingRequest
    {
        return $this->createPendingRequest(PddLogisticsOnlinedeliveryCourierQuery::class);
    }

    public function pddLogisticsOnlinedeliveryPaymentStatus(): PendingRequest
    {
        return $this->createPendingRequest(PddLogisticsOnlinedeliveryPaymentStatus::class);
    }

    public function pddLogisticsOnlinedeliveryPredictPrice(): PendingRequest
    {
        return $this->createPendingRequest(PddLogisticsOnlinedeliveryPredictPrice::class);
    }

    public function pddLogisticsOnlinedeliveryReceiptCancel(): PendingRequest
    {
        return $this->createPendingRequest(PddLogisticsOnlinedeliveryReceiptCancel::class);
    }

    public function pddLogisticsOnlinedeliveryReceiptCreate(): PendingRequest
    {
        return $this->createPendingRequest(PddLogisticsOnlinedeliveryReceiptCreate::class);
    }

    public function pddLogisticsOnlinedeliveryReceiptDetail(): PendingRequest
    {
        return $this->createPendingRequest(PddLogisticsOnlinedeliveryReceiptDetail::class);
    }

    public function pddLogisticsOnlinedeliveryReceiptList(): PendingRequest
    {
        return $this->createPendingRequest(PddLogisticsOnlinedeliveryReceiptList::class);
    }

    public function pddLogisticsOnlinedeliveryReceiptNotPayList(): PendingRequest
    {
        return $this->createPendingRequest(PddLogisticsOnlinedeliveryReceiptNotPayList::class);
    }

    public function pddLogisticsOnlinedeliveryReceiptTriggerPay(): PendingRequest
    {
        return $this->createPendingRequest(PddLogisticsOnlinedeliveryReceiptTriggerPay::class);
    }

    public function pddLogisticsOnlinedeliverySendAddressQuery(): PendingRequest
    {
        return $this->createPendingRequest(PddLogisticsOnlinedeliverySendAddressQuery::class);
    }

    public function pddLogisticsOnlinedeliverySubsibyAppealResult(): PendingRequest
    {
        return $this->createPendingRequest(PddLogisticsOnlinedeliverySubsibyAppealResult::class);
    }

    public function pddLogisticsOnlinedeliverySubsibyShipbillSend(): PendingRequest
    {
        return $this->createPendingRequest(PddLogisticsOnlinedeliverySubsibyShipbillSend::class);
    }

    public function pddLogisticsOnlinedeliverySubsibyWeightAppeal(): PendingRequest
    {
        return $this->createPendingRequest(PddLogisticsOnlinedeliverySubsibyWeightAppeal::class);
    }

    public function pddLogisticsOrdertraceGet(): PendingRequest
    {
        return $this->createPendingRequest(PddLogisticsOrdertraceGet::class);
    }

    public function pddMallCpsProtocolStatusQuery(): PendingRequest
    {
        return $this->createPendingRequest(PddMallCpsProtocolStatusQuery::class);
    }

    public function pddMallInfoBondedWarehouseGet(): PendingRequest
    {
        return $this->createPendingRequest(PddMallInfoBondedWarehouseGet::class);
    }

    public function pddMallInfoGet(): PendingRequest
    {
        return $this->createPendingRequest(PddMallInfoGet::class);
    }

    public function pddMallInfoGroupAddStorePost(): PendingRequest
    {
        return $this->createPendingRequest(PddMallInfoGroupAddStorePost::class);
    }

    public function pddMallInfoGroupListStoreGet(): PendingRequest
    {
        return $this->createPendingRequest(PddMallInfoGroupListStoreGet::class);
    }

    public function pddMallInfoGroupQueryPost(): PendingRequest
    {
        return $this->createPendingRequest(PddMallInfoGroupQueryPost::class);
    }

    public function pddMallInfoGroupRemoveStoreGet(): PendingRequest
    {
        return $this->createPendingRequest(PddMallInfoGroupRemoveStoreGet::class);
    }

    public function pddMallInfoStoreCreatePostNopoi(): PendingRequest
    {
        return $this->createPendingRequest(PddMallInfoStoreCreatePostNopoi::class);
    }

    public function pddMallInfoStoreGet(): PendingRequest
    {
        return $this->createPendingRequest(PddMallInfoStoreGet::class);
    }

    public function pddMallInfoStoreUpdatePostNopoi(): PendingRequest
    {
        return $this->createPendingRequest(PddMallInfoStoreUpdatePostNopoi::class);
    }

    public function pddMallNotificationTypeShowCheck(): PendingRequest
    {
        return $this->createPendingRequest(PddMallNotificationTypeShowCheck::class);
    }

    public function pddMilleQueryBuyOrderSplitBillAmount(): PendingRequest
    {
        return $this->createPendingRequest(PddMilleQueryBuyOrderSplitBillAmount::class);
    }

    public function pddNextoneLogisticsWarehouseUpdate(): PendingRequest
    {
        return $this->createPendingRequest(PddNextoneLogisticsWarehouseUpdate::class);
    }

    public function pddOneExpressCostTemplate(): PendingRequest
    {
        return $this->createPendingRequest(PddOneExpressCostTemplate::class);
    }

    public function pddOpenDecryptBatch(): PendingRequest
    {
        return $this->createPendingRequest(PddOpenDecryptBatch::class);
    }

    public function pddOpenDecryptMaskBatch(): PendingRequest
    {
        return $this->createPendingRequest(PddOpenDecryptMaskBatch::class);
    }

    public function pddOpenKmsEncryptBatch(): PendingRequest
    {
        return $this->createPendingRequest(PddOpenKmsEncryptBatch::class);
    }

    public function pddOpenMsgSendResultReceive(): PendingRequest
    {
        return $this->createPendingRequest(PddOpenMsgSendResultReceive::class);
    }

    public function pddOpenMsgServiceSendExpressMsg(): PendingRequest
    {
        return $this->createPendingRequest(PddOpenMsgServiceSendExpressMsg::class);
    }

    public function pddOpenVirtualNumberCheck(): PendingRequest
    {
        return $this->createPendingRequest(PddOpenVirtualNumberCheck::class);
    }

    public function pddOrderAccountAttachmentUpload(): PendingRequest
    {
        return $this->createPendingRequest(PddOrderAccountAttachmentUpload::class);
    }

    public function pddOrderBasicListGet(): PendingRequest
    {
        return $this->createPendingRequest(PddOrderBasicListGet::class);
    }

    public function pddOrderInformationGet(): PendingRequest
    {
        return $this->createPendingRequest(PddOrderInformationGet::class);
    }

    public function pddOrderListGet(): PendingRequest
    {
        return $this->createPendingRequest(PddOrderListGet::class);
    }

    public function pddOrderMergeShipOrderGroup(): PendingRequest
    {
        return $this->createPendingRequest(PddOrderMergeShipOrderGroup::class);
    }

    public function pddOrderNoteUpdate(): PendingRequest
    {
        return $this->createPendingRequest(PddOrderNoteUpdate::class);
    }

    public function pddOrderNumberListIncrementGet(): PendingRequest
    {
        return $this->createPendingRequest(PddOrderNumberListIncrementGet::class);
    }

    public function pddOrderPromiseInfoGet(): PendingRequest
    {
        return $this->createPendingRequest(PddOrderPromiseInfoGet::class);
    }

    public function pddOrderPromotionGet(): PendingRequest
    {
        return $this->createPendingRequest(PddOrderPromotionGet::class);
    }

    public function pddOrderReviewInfo(): PendingRequest
    {
        return $this->createPendingRequest(PddOrderReviewInfo::class);
    }

    public function pddOrderSearchOrder(): PendingRequest
    {
        return $this->createPendingRequest(PddOrderSearchOrder::class);
    }

    public function pddOrderServiceBenefitUpdate(): PendingRequest
    {
        return $this->createPendingRequest(PddOrderServiceBenefitUpdate::class);
    }

    public function pddOrderSpecificOrderInformationGet(): PendingRequest
    {
        return $this->createPendingRequest(PddOrderSpecificOrderInformationGet::class);
    }

    public function pddOrderStatusGet(): PendingRequest
    {
        return $this->createPendingRequest(PddOrderStatusGet::class);
    }

    public function pddOrderSubmallInformationGet(): PendingRequest
    {
        return $this->createPendingRequest(PddOrderSubmallInformationGet::class);
    }

    public function pddOrderSubmallListGet(): PendingRequest
    {
        return $this->createPendingRequest(PddOrderSubmallListGet::class);
    }

    public function pddOrderTradeinInfo(): PendingRequest
    {
        return $this->createPendingRequest(PddOrderTradeinInfo::class);
    }

    public function pddOrderTradeinPostSn(): PendingRequest
    {
        return $this->createPendingRequest(PddOrderTradeinPostSn::class);
    }

    public function pddOrderUpdateAddress(): PendingRequest
    {
        return $this->createPendingRequest(PddOrderUpdateAddress::class);
    }

    public function pddOrderUploadDeliveryFeature(): PendingRequest
    {
        return $this->createPendingRequest(PddOrderUploadDeliveryFeature::class);
    }

    public function pddOrderUploadExtraLogistics(): PendingRequest
    {
        return $this->createPendingRequest(PddOrderUploadExtraLogistics::class);
    }

    public function pddOrderUploadRelationLogistics(): PendingRequest
    {
        return $this->createPendingRequest(PddOrderUploadRelationLogistics::class);
    }

    public function pddOrderVirtualInformationGet(): PendingRequest
    {
        return $this->createPendingRequest(PddOrderVirtualInformationGet::class);
    }

    public function pddOverseaClearanceGet(): PendingRequest
    {
        return $this->createPendingRequest(PddOverseaClearanceGet::class);
    }

    public function pddOverseaDeclarationFailNotify(): PendingRequest
    {
        return $this->createPendingRequest(PddOverseaDeclarationFailNotify::class);
    }

    public function pddPmcAccrueQuery(): PendingRequest
    {
        return $this->createPendingRequest(PddPmcAccrueQuery::class);
    }

    public function pddPmcUserCancel(): PendingRequest
    {
        return $this->createPendingRequest(PddPmcUserCancel::class);
    }

    public function pddPmcUserGet(): PendingRequest
    {
        return $this->createPendingRequest(PddPmcUserGet::class);
    }

    public function pddPmcUserPermit(): PendingRequest
    {
        return $this->createPendingRequest(PddPmcUserPermit::class);
    }

    public function pddPopAuthTokenCreate(): PendingRequest
    {
        return $this->createPendingRequest(PddPopAuthTokenCreate::class);
    }

    public function pddPopMallBindRelationReport(): PendingRequest
    {
        return $this->createPendingRequest(PddPopMallBindRelationReport::class);
    }

    public function pddPopMallBindTicketGet(): PendingRequest
    {
        return $this->createPendingRequest(PddPopMallBindTicketGet::class);
    }

    public function pddPopMallBindTokenGet(): PendingRequest
    {
        return $this->createPendingRequest(PddPopMallBindTokenGet::class);
    }

    public function pddPromotionGoodsCouponListGet(): PendingRequest
    {
        return $this->createPendingRequest(PddPromotionGoodsCouponListGet::class);
    }

    public function pddPromotionLimitedActivityCancel(): PendingRequest
    {
        return $this->createPendingRequest(PddPromotionLimitedActivityCancel::class);
    }

    public function pddPromotionLimitedActivityCreate(): PendingRequest
    {
        return $this->createPendingRequest(PddPromotionLimitedActivityCreate::class);
    }

    public function pddPromotionLimitedDiscountListGet(): PendingRequest
    {
        return $this->createPendingRequest(PddPromotionLimitedDiscountListGet::class);
    }

    public function pddPromotionLimitedQualifiedGoodsGet(): PendingRequest
    {
        return $this->createPendingRequest(PddPromotionLimitedQualifiedGoodsGet::class);
    }

    public function pddPromotionLimitedQualifiedSkuGet(): PendingRequest
    {
        return $this->createPendingRequest(PddPromotionLimitedQualifiedSkuGet::class);
    }

    public function pddPromotionMerchantCouponListGet(): PendingRequest
    {
        return $this->createPendingRequest(PddPromotionMerchantCouponListGet::class);
    }

    public function pddQrpayPayeeRegister(): PendingRequest
    {
        return $this->createPendingRequest(PddQrpayPayeeRegister::class);
    }

    public function pddRdcPddgeniusSendgoodsCancel(): PendingRequest
    {
        return $this->createPendingRequest(PddRdcPddgeniusSendgoodsCancel::class);
    }

    public function pddRefundAddressListGet(): PendingRequest
    {
        return $this->createPendingRequest(PddRefundAddressListGet::class);
    }

    public function pddRefundAgree(): PendingRequest
    {
        return $this->createPendingRequest(PddRefundAgree::class);
    }

    public function pddRefundExchangeShipping(): PendingRequest
    {
        return $this->createPendingRequest(PddRefundExchangeShipping::class);
    }

    public function pddRefundImagesGet(): PendingRequest
    {
        return $this->createPendingRequest(PddRefundImagesGet::class);
    }

    public function pddRefundInformationGet(): PendingRequest
    {
        return $this->createPendingRequest(PddRefundInformationGet::class);
    }

    public function pddRefundListIncrementGet(): PendingRequest
    {
        return $this->createPendingRequest(PddRefundListIncrementGet::class);
    }

    public function pddRefundReturngoodsAgree(): PendingRequest
    {
        return $this->createPendingRequest(PddRefundReturngoodsAgree::class);
    }

    public function pddRefundStatusCheck(): PendingRequest
    {
        return $this->createPendingRequest(PddRefundStatusCheck::class);
    }

    public function pddReservedMedicineLogisticsUpload(): PendingRequest
    {
        return $this->createPendingRequest(PddReservedMedicineLogisticsUpload::class);
    }

    public function pddServiceAftersalesAppointNotify(): PendingRequest
    {
        return $this->createPendingRequest(PddServiceAftersalesAppointNotify::class);
    }

    public function pddServicemarketContractSearch(): PendingRequest
    {
        return $this->createPendingRequest(PddServicemarketContractSearch::class);
    }

    public function pddServicemarketSettlementbillGet(): PendingRequest
    {
        return $this->createPendingRequest(PddServicemarketSettlementbillGet::class);
    }

    public function pddServicemarketTradelistGet(): PendingRequest
    {
        return $this->createPendingRequest(PddServicemarketTradelistGet::class);
    }

    public function pddSimAuthIdSync(): PendingRequest
    {
        return $this->createPendingRequest(PddSimAuthIdSync::class);
    }

    public function pddSimDirectOrderPush(): PendingRequest
    {
        return $this->createPendingRequest(PddSimDirectOrderPush::class);
    }

    public function pddSimProcessResultNotify(): PendingRequest
    {
        return $this->createPendingRequest(PddSimProcessResultNotify::class);
    }

    public function pddSimSerialNoValidate(): PendingRequest
    {
        return $this->createPendingRequest(PddSimSerialNoValidate::class);
    }

    public function pddSmsDetailbillPush(): PendingRequest
    {
        return $this->createPendingRequest(PddSmsDetailbillPush::class);
    }

    public function pddStockGoodsIdToSkuQuery(): PendingRequest
    {
        return $this->createPendingRequest(PddStockGoodsIdToSkuQuery::class);
    }

    public function pddStockWareCreate(): PendingRequest
    {
        return $this->createPendingRequest(PddStockWareCreate::class);
    }

    public function pddStockWareDelete(): PendingRequest
    {
        return $this->createPendingRequest(PddStockWareDelete::class);
    }

    public function pddStockWareDetailQuery(): PendingRequest
    {
        return $this->createPendingRequest(PddStockWareDetailQuery::class);
    }

    public function pddStockWareInfoList(): PendingRequest
    {
        return $this->createPendingRequest(PddStockWareInfoList::class);
    }

    public function pddStockWareList(): PendingRequest
    {
        return $this->createPendingRequest(PddStockWareList::class);
    }

    public function pddStockWareMove(): PendingRequest
    {
        return $this->createPendingRequest(PddStockWareMove::class);
    }

    public function pddStockWareSkuUpdate(): PendingRequest
    {
        return $this->createPendingRequest(PddStockWareSkuUpdate::class);
    }

    public function pddStockWareUpdate(): PendingRequest
    {
        return $this->createPendingRequest(PddStockWareUpdate::class);
    }

    public function pddStockWareWarehouseQuery(): PendingRequest
    {
        return $this->createPendingRequest(PddStockWareWarehouseQuery::class);
    }

    public function pddSurveyQuerySpecialSurvey(): PendingRequest
    {
        return $this->createPendingRequest(PddSurveyQuerySpecialSurvey::class);
    }

    public function pddTailExpressSyncJt(): PendingRequest
    {
        return $this->createPendingRequest(PddTailExpressSyncJt::class);
    }

    public function pddTailRuralExpressTraceSync(): PendingRequest
    {
        return $this->createPendingRequest(PddTailRuralExpressTraceSync::class);
    }

    public function pddTicketAreacodeGet(): PendingRequest
    {
        return $this->createPendingRequest(PddTicketAreacodeGet::class);
    }

    public function pddTicketGoodsQuery(): PendingRequest
    {
        return $this->createPendingRequest(PddTicketGoodsQuery::class);
    }

    public function pddTicketGoodsUpload(): PendingRequest
    {
        return $this->createPendingRequest(PddTicketGoodsUpload::class);
    }

    public function pddTicketOrderCreateNotifycation(): PendingRequest
    {
        return $this->createPendingRequest(PddTicketOrderCreateNotifycation::class);
    }

    public function pddTicketOrderRefundNotifycation(): PendingRequest
    {
        return $this->createPendingRequest(PddTicketOrderRefundNotifycation::class);
    }

    public function pddTicketScenicGet(): PendingRequest
    {
        return $this->createPendingRequest(PddTicketScenicGet::class);
    }

    public function pddTicketSkuRuleAdd(): PendingRequest
    {
        return $this->createPendingRequest(PddTicketSkuRuleAdd::class);
    }

    public function pddTicketSkuRuleEdit(): PendingRequest
    {
        return $this->createPendingRequest(PddTicketSkuRuleEdit::class);
    }

    public function pddTicketSkuRuleGet(): PendingRequest
    {
        return $this->createPendingRequest(PddTicketSkuRuleGet::class);
    }

    public function pddTicketVerificationNotifycation(): PendingRequest
    {
        return $this->createPendingRequest(PddTicketVerificationNotifycation::class);
    }

    public function pddTimeGet(): PendingRequest
    {
        return $this->createPendingRequest(PddTimeGet::class);
    }

    public function pddTraceSourceQueryGoodsInfo(): PendingRequest
    {
        return $this->createPendingRequest(PddTraceSourceQueryGoodsInfo::class);
    }

    public function pddTraceSourceUploadCodeInfo(): PendingRequest
    {
        return $this->createPendingRequest(PddTraceSourceUploadCodeInfo::class);
    }

    public function pddTraceSourceUploadPlanInfo(): PendingRequest
    {
        return $this->createPendingRequest(PddTraceSourceUploadPlanInfo::class);
    }

    public function pddVasOrderSearch(): PendingRequest
    {
        return $this->createPendingRequest(PddVasOrderSearch::class);
    }

    public function pddVirtualGameServerQuery(): PendingRequest
    {
        return $this->createPendingRequest(PddVirtualGameServerQuery::class);
    }

    public function pddVirtualMobileChargeNotify(): PendingRequest
    {
        return $this->createPendingRequest(PddVirtualMobileChargeNotify::class);
    }

    public function pddVivodeskwindowQueryresources(): PendingRequest
    {
        return $this->createPendingRequest(PddVivodeskwindowQueryresources::class);
    }

    public function pddVoucherAppointmentInfoSend(): PendingRequest
    {
        return $this->createPendingRequest(PddVoucherAppointmentInfoSend::class);
    }

    public function pddVoucherOtaCardPrepareVerification(): PendingRequest
    {
        return $this->createPendingRequest(PddVoucherOtaCardPrepareVerification::class);
    }

    public function pddVoucherOtaCardVerification(): PendingRequest
    {
        return $this->createPendingRequest(PddVoucherOtaCardVerification::class);
    }

    public function pddVoucherPhysicalGoodsSend(): PendingRequest
    {
        return $this->createPendingRequest(PddVoucherPhysicalGoodsSend::class);
    }

    public function pddVoucherRealtimeVerifySync(): PendingRequest
    {
        return $this->createPendingRequest(PddVoucherRealtimeVerifySync::class);
    }

    public function pddVoucherVirtualCardBatchAdd(): PendingRequest
    {
        return $this->createPendingRequest(PddVoucherVirtualCardBatchAdd::class);
    }

    public function pddVoucherVirtualCardVerification(): PendingRequest
    {
        return $this->createPendingRequest(PddVoucherVirtualCardVerification::class);
    }

    public function pddVoucherVoucherComplain(): PendingRequest
    {
        return $this->createPendingRequest(PddVoucherVoucherComplain::class);
    }

    public function pddVoucherVoucherInfoSend(): PendingRequest
    {
        return $this->createPendingRequest(PddVoucherVoucherInfoSend::class);
    }

    public function pddWarrantyOrdersIncrementGet(): PendingRequest
    {
        return $this->createPendingRequest(PddWarrantyOrdersIncrementGet::class);
    }

    public function pddWaybillCancel(): PendingRequest
    {
        return $this->createPendingRequest(PddWaybillCancel::class);
    }

    public function pddWaybillGet(): PendingRequest
    {
        return $this->createPendingRequest(PddWaybillGet::class);
    }

    public function pddWaybillQueryByWaybillcode(): PendingRequest
    {
        return $this->createPendingRequest(PddWaybillQueryByWaybillcode::class);
    }

    public function pddWaybillSearch(): PendingRequest
    {
        return $this->createPendingRequest(PddWaybillSearch::class);
    }

    public function pddWaybillUpdate(): PendingRequest
    {
        return $this->createPendingRequest(PddWaybillUpdate::class);
    }
}
