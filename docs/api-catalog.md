# 官方接口目录

> 本文件由 `composer generate:api` 根据拼多多官方接口目录自动生成，请勿手动修改。

当前包含 **27 个官方分类、287 个接口**。

## 订单API

命名空间：`PddSdk\Api\Order`，共 26 个接口。

| 官方接口 | 客户端方法 | 请求类 |
| --- | --- | --- |
| [`pdd.erp.order.sync`](https://open.pinduoduo.com/application/document/api?id=pdd.erp.order.sync) | `pddErpOrderSync()` | `PddErpOrderSync` |
| [`pdd.mille.query.buy.order.split.bill.amount`](https://open.pinduoduo.com/application/document/api?id=pdd.mille.query.buy.order.split.bill.amount) | `pddMilleQueryBuyOrderSplitBillAmount()` | `PddMilleQueryBuyOrderSplitBillAmount` |
| [`pdd.order.account.attachment.upload`](https://open.pinduoduo.com/application/document/api?id=pdd.order.account.attachment.upload) | `pddOrderAccountAttachmentUpload()` | `PddOrderAccountAttachmentUpload` |
| [`pdd.order.basic.list.get`](https://open.pinduoduo.com/application/document/api?id=pdd.order.basic.list.get) | `pddOrderBasicListGet()` | `PddOrderBasicListGet` |
| [`pdd.order.information.get`](https://open.pinduoduo.com/application/document/api?id=pdd.order.information.get) | `pddOrderInformationGet()` | `PddOrderInformationGet` |
| [`pdd.order.list.get`](https://open.pinduoduo.com/application/document/api?id=pdd.order.list.get) | `pddOrderListGet()` | `PddOrderListGet` |
| [`pdd.order.merge.ship.order.group`](https://open.pinduoduo.com/application/document/api?id=pdd.order.merge.ship.order.group) | `pddOrderMergeShipOrderGroup()` | `PddOrderMergeShipOrderGroup` |
| [`pdd.order.note.update`](https://open.pinduoduo.com/application/document/api?id=pdd.order.note.update) | `pddOrderNoteUpdate()` | `PddOrderNoteUpdate` |
| [`pdd.order.number.list.increment.get`](https://open.pinduoduo.com/application/document/api?id=pdd.order.number.list.increment.get) | `pddOrderNumberListIncrementGet()` | `PddOrderNumberListIncrementGet` |
| [`pdd.order.promise.info.get`](https://open.pinduoduo.com/application/document/api?id=pdd.order.promise.info.get) | `pddOrderPromiseInfoGet()` | `PddOrderPromiseInfoGet` |
| [`pdd.order.promotion.get`](https://open.pinduoduo.com/application/document/api?id=pdd.order.promotion.get) | `pddOrderPromotionGet()` | `PddOrderPromotionGet` |
| [`pdd.order.review.info`](https://open.pinduoduo.com/application/document/api?id=pdd.order.review.info) | `pddOrderReviewInfo()` | `PddOrderReviewInfo` |
| [`pdd.order.search.order`](https://open.pinduoduo.com/application/document/api?id=pdd.order.search.order) | `pddOrderSearchOrder()` | `PddOrderSearchOrder` |
| [`pdd.order.service.benefit.update`](https://open.pinduoduo.com/application/document/api?id=pdd.order.service.benefit.update) | `pddOrderServiceBenefitUpdate()` | `PddOrderServiceBenefitUpdate` |
| [`pdd.order.specific.order.information.get`](https://open.pinduoduo.com/application/document/api?id=pdd.order.specific.order.information.get) | `pddOrderSpecificOrderInformationGet()` | `PddOrderSpecificOrderInformationGet` |
| [`pdd.order.status.get`](https://open.pinduoduo.com/application/document/api?id=pdd.order.status.get) | `pddOrderStatusGet()` | `PddOrderStatusGet` |
| [`pdd.order.submall.information.get`](https://open.pinduoduo.com/application/document/api?id=pdd.order.submall.information.get) | `pddOrderSubmallInformationGet()` | `PddOrderSubmallInformationGet` |
| [`pdd.order.submall.list.get`](https://open.pinduoduo.com/application/document/api?id=pdd.order.submall.list.get) | `pddOrderSubmallListGet()` | `PddOrderSubmallListGet` |
| [`pdd.order.tradein.info`](https://open.pinduoduo.com/application/document/api?id=pdd.order.tradein.info) | `pddOrderTradeinInfo()` | `PddOrderTradeinInfo` |
| [`pdd.order.tradein.post.sn`](https://open.pinduoduo.com/application/document/api?id=pdd.order.tradein.post.sn) | `pddOrderTradeinPostSn()` | `PddOrderTradeinPostSn` |
| [`pdd.order.update.address`](https://open.pinduoduo.com/application/document/api?id=pdd.order.update.address) | `pddOrderUpdateAddress()` | `PddOrderUpdateAddress` |
| [`pdd.order.upload.delivery.feature`](https://open.pinduoduo.com/application/document/api?id=pdd.order.upload.delivery.feature) | `pddOrderUploadDeliveryFeature()` | `PddOrderUploadDeliveryFeature` |
| [`pdd.order.upload.extra.logistics`](https://open.pinduoduo.com/application/document/api?id=pdd.order.upload.extra.logistics) | `pddOrderUploadExtraLogistics()` | `PddOrderUploadExtraLogistics` |
| [`pdd.order.upload.relation.logistics`](https://open.pinduoduo.com/application/document/api?id=pdd.order.upload.relation.logistics) | `pddOrderUploadRelationLogistics()` | `PddOrderUploadRelationLogistics` |
| [`pdd.order.virtual.information.get`](https://open.pinduoduo.com/application/document/api?id=pdd.order.virtual.information.get) | `pddOrderVirtualInformationGet()` | `PddOrderVirtualInformationGet` |
| [`pdd.survey.query.special.survey`](https://open.pinduoduo.com/application/document/api?id=pdd.survey.query.special.survey) | `pddSurveyQuerySpecialSurvey()` | `PddSurveyQuerySpecialSurvey` |

## 售后API

命名空间：`PddSdk\Api\AfterSales`，共 10 个接口。

| 官方接口 | 客户端方法 | 请求类 |
| --- | --- | --- |
| [`pdd.nextone.logistics.warehouse.update`](https://open.pinduoduo.com/application/document/api?id=pdd.nextone.logistics.warehouse.update) | `pddNextoneLogisticsWarehouseUpdate()` | `PddNextoneLogisticsWarehouseUpdate` |
| [`pdd.rdc.pddgenius.sendgoods.cancel`](https://open.pinduoduo.com/application/document/api?id=pdd.rdc.pddgenius.sendgoods.cancel) | `pddRdcPddgeniusSendgoodsCancel()` | `PddRdcPddgeniusSendgoodsCancel` |
| [`pdd.refund.address.list.get`](https://open.pinduoduo.com/application/document/api?id=pdd.refund.address.list.get) | `pddRefundAddressListGet()` | `PddRefundAddressListGet` |
| [`pdd.refund.agree`](https://open.pinduoduo.com/application/document/api?id=pdd.refund.agree) | `pddRefundAgree()` | `PddRefundAgree` |
| [`pdd.refund.exchange.shipping`](https://open.pinduoduo.com/application/document/api?id=pdd.refund.exchange.shipping) | `pddRefundExchangeShipping()` | `PddRefundExchangeShipping` |
| [`pdd.refund.images.get`](https://open.pinduoduo.com/application/document/api?id=pdd.refund.images.get) | `pddRefundImagesGet()` | `PddRefundImagesGet` |
| [`pdd.refund.information.get`](https://open.pinduoduo.com/application/document/api?id=pdd.refund.information.get) | `pddRefundInformationGet()` | `PddRefundInformationGet` |
| [`pdd.refund.list.increment.get`](https://open.pinduoduo.com/application/document/api?id=pdd.refund.list.increment.get) | `pddRefundListIncrementGet()` | `PddRefundListIncrementGet` |
| [`pdd.refund.returngoods.agree`](https://open.pinduoduo.com/application/document/api?id=pdd.refund.returngoods.agree) | `pddRefundReturngoodsAgree()` | `PddRefundReturngoodsAgree` |
| [`pdd.refund.status.check`](https://open.pinduoduo.com/application/document/api?id=pdd.refund.status.check) | `pddRefundStatusCheck()` | `PddRefundStatusCheck` |

## 物流API

命名空间：`PddSdk\Api\Logistics`，共 12 个接口。

| 官方接口 | 客户端方法 | 请求类 |
| --- | --- | --- |
| [`pdd.conso.waybill.intercept.apply`](https://open.pinduoduo.com/application/document/api?id=pdd.conso.waybill.intercept.apply) | `pddConsoWaybillInterceptApply()` | `PddConsoWaybillInterceptApply` |
| [`pdd.cross.cabinet.recycle.order`](https://open.pinduoduo.com/application/document/api?id=pdd.cross.cabinet.recycle.order) | `pddCrossCabinetRecycleOrder()` | `PddCrossCabinetRecycleOrder` |
| [`pdd.cross.pack.store.operate.notification`](https://open.pinduoduo.com/application/document/api?id=pdd.cross.pack.store.operate.notification) | `pddCrossPackStoreOperateNotification()` | `PddCrossPackStoreOperateNotification` |
| [`pdd.delivery.receipt.image.upload`](https://open.pinduoduo.com/application/document/api?id=pdd.delivery.receipt.image.upload) | `pddDeliveryReceiptImageUpload()` | `PddDeliveryReceiptImageUpload` |
| [`pdd.logistics.address.get`](https://open.pinduoduo.com/application/document/api?id=pdd.logistics.address.get) | `pddLogisticsAddressGet()` | `PddLogisticsAddressGet` |
| [`pdd.logistics.available.company.recommend`](https://open.pinduoduo.com/application/document/api?id=pdd.logistics.available.company.recommend) | `pddLogisticsAvailableCompanyRecommend()` | `PddLogisticsAvailableCompanyRecommend` |
| [`pdd.logistics.companies.get`](https://open.pinduoduo.com/application/document/api?id=pdd.logistics.companies.get) | `pddLogisticsCompaniesGet()` | `PddLogisticsCompaniesGet` |
| [`pdd.logistics.isv.trace.notify.sub`](https://open.pinduoduo.com/application/document/api?id=pdd.logistics.isv.trace.notify.sub) | `pddLogisticsIsvTraceNotifySub()` | `PddLogisticsIsvTraceNotifySub` |
| [`pdd.logistics.online.send`](https://open.pinduoduo.com/application/document/api?id=pdd.logistics.online.send) | `pddLogisticsOnlineSend()` | `PddLogisticsOnlineSend` |
| [`pdd.logistics.ordertrace.get`](https://open.pinduoduo.com/application/document/api?id=pdd.logistics.ordertrace.get) | `pddLogisticsOrdertraceGet()` | `PddLogisticsOrdertraceGet` |
| [`pdd.tail.express.sync.jt`](https://open.pinduoduo.com/application/document/api?id=pdd.tail.express.sync.jt) | `pddTailExpressSyncJt()` | `PddTailExpressSyncJt` |
| [`pdd.tail.rural.express.trace.sync`](https://open.pinduoduo.com/application/document/api?id=pdd.tail.rural.express.trace.sync) | `pddTailRuralExpressTraceSync()` | `PddTailRuralExpressTraceSync` |

## 虚拟类目API

命名空间：`PddSdk\Api\Virtual`，共 7 个接口。

| 官方接口 | 客户端方法 | 请求类 |
| --- | --- | --- |
| [`pdd.sim.auth.id.sync`](https://open.pinduoduo.com/application/document/api?id=pdd.sim.auth.id.sync) | `pddSimAuthIdSync()` | `PddSimAuthIdSync` |
| [`pdd.sim.direct.order.push`](https://open.pinduoduo.com/application/document/api?id=pdd.sim.direct.order.push) | `pddSimDirectOrderPush()` | `PddSimDirectOrderPush` |
| [`pdd.sim.process.result.notify`](https://open.pinduoduo.com/application/document/api?id=pdd.sim.process.result.notify) | `pddSimProcessResultNotify()` | `PddSimProcessResultNotify` |
| [`pdd.sim.serial.no.validate`](https://open.pinduoduo.com/application/document/api?id=pdd.sim.serial.no.validate) | `pddSimSerialNoValidate()` | `PddSimSerialNoValidate` |
| [`pdd.virtual.game.server.query`](https://open.pinduoduo.com/application/document/api?id=pdd.virtual.game.server.query) | `pddVirtualGameServerQuery()` | `PddVirtualGameServerQuery` |
| [`pdd.virtual.mobile.charge.notify`](https://open.pinduoduo.com/application/document/api?id=pdd.virtual.mobile.charge.notify) | `pddVirtualMobileChargeNotify()` | `PddVirtualMobileChargeNotify` |
| [`pdd.warranty.orders.increment.get`](https://open.pinduoduo.com/application/document/api?id=pdd.warranty.orders.increment.get) | `pddWarrantyOrdersIncrementGet()` | `PddWarrantyOrdersIncrementGet` |

## 商品API

命名空间：`PddSdk\Api\Goods`，共 56 个接口。

| 官方接口 | 客户端方法 | 请求类 |
| --- | --- | --- |
| [`pdd.delete.draft.commit`](https://open.pinduoduo.com/application/document/api?id=pdd.delete.draft.commit) | `pddDeleteDraftCommit()` | `PddDeleteDraftCommit` |
| [`pdd.delete.goods.commit`](https://open.pinduoduo.com/application/document/api?id=pdd.delete.goods.commit) | `pddDeleteGoodsCommit()` | `PddDeleteGoodsCommit` |
| [`pdd.goods.add`](https://open.pinduoduo.com/application/document/api?id=pdd.goods.add) | `pddGoodsAdd()` | `PddGoodsAdd` |
| [`pdd.goods.authorization.cats`](https://open.pinduoduo.com/application/document/api?id=pdd.goods.authorization.cats) | `pddGoodsAuthorizationCats()` | `PddGoodsAuthorizationCats` |
| [`pdd.goods.cat.rule.get`](https://open.pinduoduo.com/application/document/api?id=pdd.goods.cat.rule.get) | `pddGoodsCatRuleGet()` | `PddGoodsCatRuleGet` |
| [`pdd.goods.cat.template.get`](https://open.pinduoduo.com/application/document/api?id=pdd.goods.cat.template.get) | `pddGoodsCatTemplateGet()` | `PddGoodsCatTemplateGet` |
| [`pdd.goods.cats.get`](https://open.pinduoduo.com/application/document/api?id=pdd.goods.cats.get) | `pddGoodsCatsGet()` | `PddGoodsCatsGet` |
| [`pdd.goods.child.sku.edit`](https://open.pinduoduo.com/application/document/api?id=pdd.goods.child.sku.edit) | `pddGoodsChildSkuEdit()` | `PddGoodsChildSkuEdit` |
| [`pdd.goods.commit.detail.get`](https://open.pinduoduo.com/application/document/api?id=pdd.goods.commit.detail.get) | `pddGoodsCommitDetailGet()` | `PddGoodsCommitDetailGet` |
| [`pdd.goods.commit.list.get`](https://open.pinduoduo.com/application/document/api?id=pdd.goods.commit.list.get) | `pddGoodsCommitListGet()` | `PddGoodsCommitListGet` |
| [`pdd.goods.commit.status.get`](https://open.pinduoduo.com/application/document/api?id=pdd.goods.commit.status.get) | `pddGoodsCommitStatusGet()` | `PddGoodsCommitStatusGet` |
| [`pdd.goods.country.get`](https://open.pinduoduo.com/application/document/api?id=pdd.goods.country.get) | `pddGoodsCountryGet()` | `PddGoodsCountryGet` |
| [`pdd.goods.cps.mall.unit.change`](https://open.pinduoduo.com/application/document/api?id=pdd.goods.cps.mall.unit.change) | `pddGoodsCpsMallUnitChange()` | `PddGoodsCpsMallUnitChange` |
| [`pdd.goods.cps.mall.unit.query`](https://open.pinduoduo.com/application/document/api?id=pdd.goods.cps.mall.unit.query) | `pddGoodsCpsMallUnitQuery()` | `PddGoodsCpsMallUnitQuery` |
| [`pdd.goods.cps.unit.change`](https://open.pinduoduo.com/application/document/api?id=pdd.goods.cps.unit.change) | `pddGoodsCpsUnitChange()` | `PddGoodsCpsUnitChange` |
| [`pdd.goods.cps.unit.create`](https://open.pinduoduo.com/application/document/api?id=pdd.goods.cps.unit.create) | `pddGoodsCpsUnitCreate()` | `PddGoodsCpsUnitCreate` |
| [`pdd.goods.cps.unit.delete`](https://open.pinduoduo.com/application/document/api?id=pdd.goods.cps.unit.delete) | `pddGoodsCpsUnitDelete()` | `PddGoodsCpsUnitDelete` |
| [`pdd.goods.cps.unit.query`](https://open.pinduoduo.com/application/document/api?id=pdd.goods.cps.unit.query) | `pddGoodsCpsUnitQuery()` | `PddGoodsCpsUnitQuery` |
| [`pdd.goods.detail.get`](https://open.pinduoduo.com/application/document/api?id=pdd.goods.detail.get) | `pddGoodsDetailGet()` | `PddGoodsDetailGet` |
| [`pdd.goods.edit.goods.commit`](https://open.pinduoduo.com/application/document/api?id=pdd.goods.edit.goods.commit) | `pddGoodsEditGoodsCommit()` | `PddGoodsEditGoodsCommit` |
| [`pdd.goods.file.info.get`](https://open.pinduoduo.com/application/document/api?id=pdd.goods.file.info.get) | `pddGoodsFileInfoGet()` | `PddGoodsFileInfoGet` |
| [`pdd.goods.filespace.image.upload`](https://open.pinduoduo.com/application/document/api?id=pdd.goods.filespace.image.upload) | `pddGoodsFilespaceImageUpload()` | `PddGoodsFilespaceImageUpload` |
| [`pdd.goods.get.relation`](https://open.pinduoduo.com/application/document/api?id=pdd.goods.get.relation) | `pddGoodsGetRelation()` | `PddGoodsGetRelation` |
| [`pdd.goods.image.upload`](https://open.pinduoduo.com/application/document/api?id=pdd.goods.image.upload) | `pddGoodsImageUpload()` | `PddGoodsImageUpload` |
| [`pdd.goods.img.upload`](https://open.pinduoduo.com/application/document/api?id=pdd.goods.img.upload) | `pddGoodsImgUpload()` | `PddGoodsImgUpload` |
| [`pdd.goods.information.get`](https://open.pinduoduo.com/application/document/api?id=pdd.goods.information.get) | `pddGoodsInformationGet()` | `PddGoodsInformationGet` |
| [`pdd.goods.information.update`](https://open.pinduoduo.com/application/document/api?id=pdd.goods.information.update) | `pddGoodsInformationUpdate()` | `PddGoodsInformationUpdate` |
| [`pdd.goods.latest.commit.status.get`](https://open.pinduoduo.com/application/document/api?id=pdd.goods.latest.commit.status.get) | `pddGoodsLatestCommitStatusGet()` | `PddGoodsLatestCommitStatusGet` |
| [`pdd.goods.list.get`](https://open.pinduoduo.com/application/document/api?id=pdd.goods.list.get) | `pddGoodsListGet()` | `PddGoodsListGet` |
| [`pdd.goods.logistics.ser.template.detail`](https://open.pinduoduo.com/application/document/api?id=pdd.goods.logistics.ser.template.detail) | `pddGoodsLogisticsSerTemplateDetail()` | `PddGoodsLogisticsSerTemplateDetail` |
| [`pdd.goods.logistics.ser.template.list`](https://open.pinduoduo.com/application/document/api?id=pdd.goods.logistics.ser.template.list) | `pddGoodsLogisticsSerTemplateList()` | `PddGoodsLogisticsSerTemplateList` |
| [`pdd.goods.logistics.template.create`](https://open.pinduoduo.com/application/document/api?id=pdd.goods.logistics.template.create) | `pddGoodsLogisticsTemplateCreate()` | `PddGoodsLogisticsTemplateCreate` |
| [`pdd.goods.logistics.template.get`](https://open.pinduoduo.com/application/document/api?id=pdd.goods.logistics.template.get) | `pddGoodsLogisticsTemplateGet()` | `PddGoodsLogisticsTemplateGet` |
| [`pdd.goods.material.create`](https://open.pinduoduo.com/application/document/api?id=pdd.goods.material.create) | `pddGoodsMaterialCreate()` | `PddGoodsMaterialCreate` |
| [`pdd.goods.material.delete`](https://open.pinduoduo.com/application/document/api?id=pdd.goods.material.delete) | `pddGoodsMaterialDelete()` | `PddGoodsMaterialDelete` |
| [`pdd.goods.material.query`](https://open.pinduoduo.com/application/document/api?id=pdd.goods.material.query) | `pddGoodsMaterialQuery()` | `PddGoodsMaterialQuery` |
| [`pdd.goods.opt.get`](https://open.pinduoduo.com/application/document/api?id=pdd.goods.opt.get) | `pddGoodsOptGet()` | `PddGoodsOptGet` |
| [`pdd.goods.outer.cat.mapping.get`](https://open.pinduoduo.com/application/document/api?id=pdd.goods.outer.cat.mapping.get) | `pddGoodsOuterCatMappingGet()` | `PddGoodsOuterCatMappingGet` |
| [`pdd.goods.price.check`](https://open.pinduoduo.com/application/document/api?id=pdd.goods.price.check) | `pddGoodsPriceCheck()` | `PddGoodsPriceCheck` |
| [`pdd.goods.quantity.update`](https://open.pinduoduo.com/application/document/api?id=pdd.goods.quantity.update) | `pddGoodsQuantityUpdate()` | `PddGoodsQuantityUpdate` |
| [`pdd.goods.sale.status.set`](https://open.pinduoduo.com/application/document/api?id=pdd.goods.sale.status.set) | `pddGoodsSaleStatusSet()` | `PddGoodsSaleStatusSet` |
| [`pdd.goods.sizespec.class.get`](https://open.pinduoduo.com/application/document/api?id=pdd.goods.sizespec.class.get) | `pddGoodsSizespecClassGet()` | `PddGoodsSizespecClassGet` |
| [`pdd.goods.sizespec.meta.get`](https://open.pinduoduo.com/application/document/api?id=pdd.goods.sizespec.meta.get) | `pddGoodsSizespecMetaGet()` | `PddGoodsSizespecMetaGet` |
| [`pdd.goods.sizespec.templates.get`](https://open.pinduoduo.com/application/document/api?id=pdd.goods.sizespec.templates.get) | `pddGoodsSizespecTemplatesGet()` | `PddGoodsSizespecTemplatesGet` |
| [`pdd.goods.sku.price.update`](https://open.pinduoduo.com/application/document/api?id=pdd.goods.sku.price.update) | `pddGoodsSkuPriceUpdate()` | `PddGoodsSkuPriceUpdate` |
| [`pdd.goods.skus.get`](https://open.pinduoduo.com/application/document/api?id=pdd.goods.skus.get) | `pddGoodsSkusGet()` | `PddGoodsSkusGet` |
| [`pdd.goods.sn.img.upload`](https://open.pinduoduo.com/application/document/api?id=pdd.goods.sn.img.upload) | `pddGoodsSnImgUpload()` | `PddGoodsSnImgUpload` |
| [`pdd.goods.spec.get`](https://open.pinduoduo.com/application/document/api?id=pdd.goods.spec.get) | `pddGoodsSpecGet()` | `PddGoodsSpecGet` |
| [`pdd.goods.spec.id.get`](https://open.pinduoduo.com/application/document/api?id=pdd.goods.spec.id.get) | `pddGoodsSpecIdGet()` | `PddGoodsSpecIdGet` |
| [`pdd.goods.spu.get`](https://open.pinduoduo.com/application/document/api?id=pdd.goods.spu.get) | `pddGoodsSpuGet()` | `PddGoodsSpuGet` |
| [`pdd.goods.spu.search`](https://open.pinduoduo.com/application/document/api?id=pdd.goods.spu.search) | `pddGoodsSpuSearch()` | `PddGoodsSpuSearch` |
| [`pdd.goods.submit.goods.commit`](https://open.pinduoduo.com/application/document/api?id=pdd.goods.submit.goods.commit) | `pddGoodsSubmitGoodsCommit()` | `PddGoodsSubmitGoodsCommit` |
| [`pdd.goods.template.property.value.search`](https://open.pinduoduo.com/application/document/api?id=pdd.goods.template.property.value.search) | `pddGoodsTemplatePropertyValueSearch()` | `PddGoodsTemplatePropertyValueSearch` |
| [`pdd.goods.video.upload`](https://open.pinduoduo.com/application/document/api?id=pdd.goods.video.upload) | `pddGoodsVideoUpload()` | `PddGoodsVideoUpload` |
| [`pdd.gooods.sku.measurement.list`](https://open.pinduoduo.com/application/document/api?id=pdd.gooods.sku.measurement.list) | `pddGooodsSkuMeasurementList()` | `PddGooodsSkuMeasurementList` |
| [`pdd.one.express.cost.template`](https://open.pinduoduo.com/application/document/api?id=pdd.one.express.cost.template) | `pddOneExpressCostTemplate()` | `PddOneExpressCostTemplate` |

## 多多客API

命名空间：`PddSdk\Api\Ddk`，共 29 个接口。

| 官方接口 | 客户端方法 | 请求类 |
| --- | --- | --- |
| [`pdd.ddk.cashgift.create`](https://open.pinduoduo.com/application/document/api?id=pdd.ddk.cashgift.create) | `pddDdkCashgiftCreate()` | `PddDdkCashgiftCreate` |
| [`pdd.ddk.cashgift.data.query`](https://open.pinduoduo.com/application/document/api?id=pdd.ddk.cashgift.data.query) | `pddDdkCashgiftDataQuery()` | `PddDdkCashgiftDataQuery` |
| [`pdd.ddk.cashgift.status.update`](https://open.pinduoduo.com/application/document/api?id=pdd.ddk.cashgift.status.update) | `pddDdkCashgiftStatusUpdate()` | `PddDdkCashgiftStatusUpdate` |
| [`pdd.ddk.cms.prom.url.generate`](https://open.pinduoduo.com/application/document/api?id=pdd.ddk.cms.prom.url.generate) | `pddDdkCmsPromUrlGenerate()` | `PddDdkCmsPromUrlGenerate` |
| [`pdd.ddk.goods.detail`](https://open.pinduoduo.com/application/document/api?id=pdd.ddk.goods.detail) | `pddDdkGoodsDetail()` | `PddDdkGoodsDetail` |
| [`pdd.ddk.goods.pid.generate`](https://open.pinduoduo.com/application/document/api?id=pdd.ddk.goods.pid.generate) | `pddDdkGoodsPidGenerate()` | `PddDdkGoodsPidGenerate` |
| [`pdd.ddk.goods.pid.query`](https://open.pinduoduo.com/application/document/api?id=pdd.ddk.goods.pid.query) | `pddDdkGoodsPidQuery()` | `PddDdkGoodsPidQuery` |
| [`pdd.ddk.goods.promotion.right.auth`](https://open.pinduoduo.com/application/document/api?id=pdd.ddk.goods.promotion.right.auth) | `pddDdkGoodsPromotionRightAuth()` | `PddDdkGoodsPromotionRightAuth` |
| [`pdd.ddk.goods.promotion.url.generate`](https://open.pinduoduo.com/application/document/api?id=pdd.ddk.goods.promotion.url.generate) | `pddDdkGoodsPromotionUrlGenerate()` | `PddDdkGoodsPromotionUrlGenerate` |
| [`pdd.ddk.goods.recommend.get`](https://open.pinduoduo.com/application/document/api?id=pdd.ddk.goods.recommend.get) | `pddDdkGoodsRecommendGet()` | `PddDdkGoodsRecommendGet` |
| [`pdd.ddk.goods.search`](https://open.pinduoduo.com/application/document/api?id=pdd.ddk.goods.search) | `pddDdkGoodsSearch()` | `PddDdkGoodsSearch` |
| [`pdd.ddk.goods.zs.unit.url.gen`](https://open.pinduoduo.com/application/document/api?id=pdd.ddk.goods.zs.unit.url.gen) | `pddDdkGoodsZsUnitUrlGen()` | `PddDdkGoodsZsUnitUrlGen` |
| [`pdd.ddk.member.authority.query`](https://open.pinduoduo.com/application/document/api?id=pdd.ddk.member.authority.query) | `pddDdkMemberAuthorityQuery()` | `PddDdkMemberAuthorityQuery` |
| [`pdd.ddk.order.detail.get`](https://open.pinduoduo.com/application/document/api?id=pdd.ddk.order.detail.get) | `pddDdkOrderDetailGet()` | `PddDdkOrderDetailGet` |
| [`pdd.ddk.order.list.increment.get`](https://open.pinduoduo.com/application/document/api?id=pdd.ddk.order.list.increment.get) | `pddDdkOrderListIncrementGet()` | `PddDdkOrderListIncrementGet` |
| [`pdd.ddk.order.list.range.get`](https://open.pinduoduo.com/application/document/api?id=pdd.ddk.order.list.range.get) | `pddDdkOrderListRangeGet()` | `PddDdkOrderListRangeGet` |
| [`pdd.ddk.pid.mediaid.bind`](https://open.pinduoduo.com/application/document/api?id=pdd.ddk.pid.mediaid.bind) | `pddDdkPidMediaidBind()` | `PddDdkPidMediaidBind` |
| [`pdd.ddk.promotion.goods.query`](https://open.pinduoduo.com/application/document/api?id=pdd.ddk.promotion.goods.query) | `pddDdkPromotionGoodsQuery()` | `PddDdkPromotionGoodsQuery` |
| [`pdd.ddk.report.img.upload`](https://open.pinduoduo.com/application/document/api?id=pdd.ddk.report.img.upload) | `pddDdkReportImgUpload()` | `PddDdkReportImgUpload` |
| [`pdd.ddk.report.video.upload`](https://open.pinduoduo.com/application/document/api?id=pdd.ddk.report.video.upload) | `pddDdkReportVideoUpload()` | `PddDdkReportVideoUpload` |
| [`pdd.ddk.report.video.upload.part`](https://open.pinduoduo.com/application/document/api?id=pdd.ddk.report.video.upload.part) | `pddDdkReportVideoUploadPart()` | `PddDdkReportVideoUploadPart` |
| [`pdd.ddk.report.video.upload.part.complete`](https://open.pinduoduo.com/application/document/api?id=pdd.ddk.report.video.upload.part.complete) | `pddDdkReportVideoUploadPartComplete()` | `PddDdkReportVideoUploadPartComplete` |
| [`pdd.ddk.report.video.upload.part.init`](https://open.pinduoduo.com/application/document/api?id=pdd.ddk.report.video.upload.part.init) | `pddDdkReportVideoUploadPartInit()` | `PddDdkReportVideoUploadPartInit` |
| [`pdd.ddk.resource.url.gen`](https://open.pinduoduo.com/application/document/api?id=pdd.ddk.resource.url.gen) | `pddDdkResourceUrlGen()` | `PddDdkResourceUrlGen` |
| [`pdd.ddk.rp.prom.url.generate`](https://open.pinduoduo.com/application/document/api?id=pdd.ddk.rp.prom.url.generate) | `pddDdkRpPromUrlGenerate()` | `PddDdkRpPromUrlGenerate` |
| [`pdd.ddk.statistics.data.query`](https://open.pinduoduo.com/application/document/api?id=pdd.ddk.statistics.data.query) | `pddDdkStatisticsDataQuery()` | `PddDdkStatisticsDataQuery` |
| [`pdd.ddk.tmc.activity.list`](https://open.pinduoduo.com/application/document/api?id=pdd.ddk.tmc.activity.list) | `pddDdkTmcActivityList()` | `PddDdkTmcActivityList` |
| [`pdd.ddk.url.short.parse`](https://open.pinduoduo.com/application/document/api?id=pdd.ddk.url.short.parse) | `pddDdkUrlShortParse()` | `PddDdkUrlShortParse` |
| [`pdd.ddk.weapp.qrcode.url.gen`](https://open.pinduoduo.com/application/document/api?id=pdd.ddk.weapp.qrcode.url.gen) | `pddDdkWeappQrcodeUrlGen()` | `PddDdkWeappQrcodeUrlGen` |

## 多多客工具API

命名空间：`PddSdk\Api\DdkTools`，共 18 个接口。

| 官方接口 | 客户端方法 | 请求类 |
| --- | --- | --- |
| [`pdd.ddk.all.order.list.increment.get`](https://open.pinduoduo.com/application/document/api?id=pdd.ddk.all.order.list.increment.get) | `pddDdkAllOrderListIncrementGet()` | `PddDdkAllOrderListIncrementGet` |
| [`pdd.ddk.oauth.cashgift.create`](https://open.pinduoduo.com/application/document/api?id=pdd.ddk.oauth.cashgift.create) | `pddDdkOauthCashgiftCreate()` | `PddDdkOauthCashgiftCreate` |
| [`pdd.ddk.oauth.cashgift.status.update`](https://open.pinduoduo.com/application/document/api?id=pdd.ddk.oauth.cashgift.status.update) | `pddDdkOauthCashgiftStatusUpdate()` | `PddDdkOauthCashgiftStatusUpdate` |
| [`pdd.ddk.oauth.cms.prom.url.generate`](https://open.pinduoduo.com/application/document/api?id=pdd.ddk.oauth.cms.prom.url.generate) | `pddDdkOauthCmsPromUrlGenerate()` | `PddDdkOauthCmsPromUrlGenerate` |
| [`pdd.ddk.oauth.goods.detail`](https://open.pinduoduo.com/application/document/api?id=pdd.ddk.oauth.goods.detail) | `pddDdkOauthGoodsDetail()` | `PddDdkOauthGoodsDetail` |
| [`pdd.ddk.oauth.goods.pid.generate`](https://open.pinduoduo.com/application/document/api?id=pdd.ddk.oauth.goods.pid.generate) | `pddDdkOauthGoodsPidGenerate()` | `PddDdkOauthGoodsPidGenerate` |
| [`pdd.ddk.oauth.goods.pid.query`](https://open.pinduoduo.com/application/document/api?id=pdd.ddk.oauth.goods.pid.query) | `pddDdkOauthGoodsPidQuery()` | `PddDdkOauthGoodsPidQuery` |
| [`pdd.ddk.oauth.goods.prom.url.generate`](https://open.pinduoduo.com/application/document/api?id=pdd.ddk.oauth.goods.prom.url.generate) | `pddDdkOauthGoodsPromUrlGenerate()` | `PddDdkOauthGoodsPromUrlGenerate` |
| [`pdd.ddk.oauth.goods.recommend.get`](https://open.pinduoduo.com/application/document/api?id=pdd.ddk.oauth.goods.recommend.get) | `pddDdkOauthGoodsRecommendGet()` | `PddDdkOauthGoodsRecommendGet` |
| [`pdd.ddk.oauth.goods.search`](https://open.pinduoduo.com/application/document/api?id=pdd.ddk.oauth.goods.search) | `pddDdkOauthGoodsSearch()` | `PddDdkOauthGoodsSearch` |
| [`pdd.ddk.oauth.goods.zs.unit.url.gen`](https://open.pinduoduo.com/application/document/api?id=pdd.ddk.oauth.goods.zs.unit.url.gen) | `pddDdkOauthGoodsZsUnitUrlGen()` | `PddDdkOauthGoodsZsUnitUrlGen` |
| [`pdd.ddk.oauth.member.authority.query`](https://open.pinduoduo.com/application/document/api?id=pdd.ddk.oauth.member.authority.query) | `pddDdkOauthMemberAuthorityQuery()` | `PddDdkOauthMemberAuthorityQuery` |
| [`pdd.ddk.oauth.order.detail.get`](https://open.pinduoduo.com/application/document/api?id=pdd.ddk.oauth.order.detail.get) | `pddDdkOauthOrderDetailGet()` | `PddDdkOauthOrderDetailGet` |
| [`pdd.ddk.oauth.order.list.increment.get`](https://open.pinduoduo.com/application/document/api?id=pdd.ddk.oauth.order.list.increment.get) | `pddDdkOauthOrderListIncrementGet()` | `PddDdkOauthOrderListIncrementGet` |
| [`pdd.ddk.oauth.pid.mediaid.bind`](https://open.pinduoduo.com/application/document/api?id=pdd.ddk.oauth.pid.mediaid.bind) | `pddDdkOauthPidMediaidBind()` | `PddDdkOauthPidMediaidBind` |
| [`pdd.ddk.oauth.resource.url.gen`](https://open.pinduoduo.com/application/document/api?id=pdd.ddk.oauth.resource.url.gen) | `pddDdkOauthResourceUrlGen()` | `PddDdkOauthResourceUrlGen` |
| [`pdd.ddk.oauth.rp.prom.url.generate`](https://open.pinduoduo.com/application/document/api?id=pdd.ddk.oauth.rp.prom.url.generate) | `pddDdkOauthRpPromUrlGenerate()` | `PddDdkOauthRpPromUrlGenerate` |
| [`pdd.ddk.oauth.weapp.qrcode.url.gen`](https://open.pinduoduo.com/application/document/api?id=pdd.ddk.oauth.weapp.qrcode.url.gen) | `pddDdkOauthWeappQrcodeUrlGen()` | `PddDdkOauthWeappQrcodeUrlGen` |

## 营销API

命名空间：`PddSdk\Api\Marketing`，共 7 个接口。

| 官方接口 | 客户端方法 | 请求类 |
| --- | --- | --- |
| [`pdd.promotion.goods.coupon.list.get`](https://open.pinduoduo.com/application/document/api?id=pdd.promotion.goods.coupon.list.get) | `pddPromotionGoodsCouponListGet()` | `PddPromotionGoodsCouponListGet` |
| [`pdd.promotion.limited.activity.cancel`](https://open.pinduoduo.com/application/document/api?id=pdd.promotion.limited.activity.cancel) | `pddPromotionLimitedActivityCancel()` | `PddPromotionLimitedActivityCancel` |
| [`pdd.promotion.limited.activity.create`](https://open.pinduoduo.com/application/document/api?id=pdd.promotion.limited.activity.create) | `pddPromotionLimitedActivityCreate()` | `PddPromotionLimitedActivityCreate` |
| [`pdd.promotion.limited.discount.list.get`](https://open.pinduoduo.com/application/document/api?id=pdd.promotion.limited.discount.list.get) | `pddPromotionLimitedDiscountListGet()` | `PddPromotionLimitedDiscountListGet` |
| [`pdd.promotion.limited.qualified.goods.get`](https://open.pinduoduo.com/application/document/api?id=pdd.promotion.limited.qualified.goods.get) | `pddPromotionLimitedQualifiedGoodsGet()` | `PddPromotionLimitedQualifiedGoodsGet` |
| [`pdd.promotion.limited.qualified.sku.get`](https://open.pinduoduo.com/application/document/api?id=pdd.promotion.limited.qualified.sku.get) | `pddPromotionLimitedQualifiedSkuGet()` | `PddPromotionLimitedQualifiedSkuGet` |
| [`pdd.promotion.merchant.coupon.list.get`](https://open.pinduoduo.com/application/document/api?id=pdd.promotion.merchant.coupon.list.get) | `pddPromotionMerchantCouponListGet()` | `PddPromotionMerchantCouponListGet` |

## 卡券API

命名空间：`PddSdk\Api\Voucher`，共 10 个接口。

| 官方接口 | 客户端方法 | 请求类 |
| --- | --- | --- |
| [`pdd.reserved.medicine.logistics.upload`](https://open.pinduoduo.com/application/document/api?id=pdd.reserved.medicine.logistics.upload) | `pddReservedMedicineLogisticsUpload()` | `PddReservedMedicineLogisticsUpload` |
| [`pdd.voucher.appointment.info.send`](https://open.pinduoduo.com/application/document/api?id=pdd.voucher.appointment.info.send) | `pddVoucherAppointmentInfoSend()` | `PddVoucherAppointmentInfoSend` |
| [`pdd.voucher.ota.card.prepare.verification`](https://open.pinduoduo.com/application/document/api?id=pdd.voucher.ota.card.prepare.verification) | `pddVoucherOtaCardPrepareVerification()` | `PddVoucherOtaCardPrepareVerification` |
| [`pdd.voucher.ota.card.verification`](https://open.pinduoduo.com/application/document/api?id=pdd.voucher.ota.card.verification) | `pddVoucherOtaCardVerification()` | `PddVoucherOtaCardVerification` |
| [`pdd.voucher.physical.goods.send`](https://open.pinduoduo.com/application/document/api?id=pdd.voucher.physical.goods.send) | `pddVoucherPhysicalGoodsSend()` | `PddVoucherPhysicalGoodsSend` |
| [`pdd.voucher.realtime.verify.sync`](https://open.pinduoduo.com/application/document/api?id=pdd.voucher.realtime.verify.sync) | `pddVoucherRealtimeVerifySync()` | `PddVoucherRealtimeVerifySync` |
| [`pdd.voucher.virtual.card.batch.add`](https://open.pinduoduo.com/application/document/api?id=pdd.voucher.virtual.card.batch.add) | `pddVoucherVirtualCardBatchAdd()` | `PddVoucherVirtualCardBatchAdd` |
| [`pdd.voucher.virtual.card.verification`](https://open.pinduoduo.com/application/document/api?id=pdd.voucher.virtual.card.verification) | `pddVoucherVirtualCardVerification()` | `PddVoucherVirtualCardVerification` |
| [`pdd.voucher.voucher.complain`](https://open.pinduoduo.com/application/document/api?id=pdd.voucher.voucher.complain) | `pddVoucherVoucherComplain()` | `PddVoucherVoucherComplain` |
| [`pdd.voucher.voucher.info.send`](https://open.pinduoduo.com/application/document/api?id=pdd.voucher.voucher.info.send) | `pddVoucherVoucherInfoSend()` | `PddVoucherVoucherInfoSend` |

## 发票服务API

命名空间：`PddSdk\Api\Invoice`，共 4 个接口。

| 官方接口 | 客户端方法 | 请求类 |
| --- | --- | --- |
| [`pdd.einvoice.info.query`](https://open.pinduoduo.com/application/document/api?id=pdd.einvoice.info.query) | `pddEinvoiceInfoQuery()` | `PddEinvoiceInfoQuery` |
| [`pdd.invoice.application.query`](https://open.pinduoduo.com/application/document/api?id=pdd.invoice.application.query) | `pddInvoiceApplicationQuery()` | `PddInvoiceApplicationQuery` |
| [`pdd.invoice.detail.invalid`](https://open.pinduoduo.com/application/document/api?id=pdd.invoice.detail.invalid) | `pddInvoiceDetailInvalid()` | `PddInvoiceDetailInvalid` |
| [`pdd.invoice.detail.upload`](https://open.pinduoduo.com/application/document/api?id=pdd.invoice.detail.upload) | `pddInvoiceDetailUpload()` | `PddInvoiceDetailUpload` |

## 店铺API

命名空间：`PddSdk\Api\Shop`，共 6 个接口。

| 官方接口 | 客户端方法 | 请求类 |
| --- | --- | --- |
| [`pdd.mall.cps.protocol.status.query`](https://open.pinduoduo.com/application/document/api?id=pdd.mall.cps.protocol.status.query) | `pddMallCpsProtocolStatusQuery()` | `PddMallCpsProtocolStatusQuery` |
| [`pdd.mall.info.get`](https://open.pinduoduo.com/application/document/api?id=pdd.mall.info.get) | `pddMallInfoGet()` | `PddMallInfoGet` |
| [`pdd.mall.notification.type.show.check`](https://open.pinduoduo.com/application/document/api?id=pdd.mall.notification.type.show.check) | `pddMallNotificationTypeShowCheck()` | `PddMallNotificationTypeShowCheck` |
| [`pdd.trace.source.query.goods.info`](https://open.pinduoduo.com/application/document/api?id=pdd.trace.source.query.goods.info) | `pddTraceSourceQueryGoodsInfo()` | `PddTraceSourceQueryGoodsInfo` |
| [`pdd.trace.source.upload.code.info`](https://open.pinduoduo.com/application/document/api?id=pdd.trace.source.upload.code.info) | `pddTraceSourceUploadCodeInfo()` | `PddTraceSourceUploadCodeInfo` |
| [`pdd.trace.source.upload.plan.info`](https://open.pinduoduo.com/application/document/api?id=pdd.trace.source.upload.plan.info) | `pddTraceSourceUploadPlanInfo()` | `PddTraceSourceUploadPlanInfo` |

## 工具API

命名空间：`PddSdk\Api\Tools`，共 9 个接口。

| 官方接口 | 客户端方法 | 请求类 |
| --- | --- | --- |
| [`pdd.open.decrypt.batch`](https://open.pinduoduo.com/application/document/api?id=pdd.open.decrypt.batch) | `pddOpenDecryptBatch()` | `PddOpenDecryptBatch` |
| [`pdd.open.decrypt.mask.batch`](https://open.pinduoduo.com/application/document/api?id=pdd.open.decrypt.mask.batch) | `pddOpenDecryptMaskBatch()` | `PddOpenDecryptMaskBatch` |
| [`pdd.open.kms.encrypt.batch`](https://open.pinduoduo.com/application/document/api?id=pdd.open.kms.encrypt.batch) | `pddOpenKmsEncryptBatch()` | `PddOpenKmsEncryptBatch` |
| [`pdd.open.virtual.number.check`](https://open.pinduoduo.com/application/document/api?id=pdd.open.virtual.number.check) | `pddOpenVirtualNumberCheck()` | `PddOpenVirtualNumberCheck` |
| [`pdd.pop.auth.token.create`](https://open.pinduoduo.com/application/document/api?id=pdd.pop.auth.token.create) | `pddPopAuthTokenCreate()` | `PddPopAuthTokenCreate` |
| [`pdd.pop.mall.bind.relation.report`](https://open.pinduoduo.com/application/document/api?id=pdd.pop.mall.bind.relation.report) | `pddPopMallBindRelationReport()` | `PddPopMallBindRelationReport` |
| [`pdd.pop.mall.bind.ticket.get`](https://open.pinduoduo.com/application/document/api?id=pdd.pop.mall.bind.ticket.get) | `pddPopMallBindTicketGet()` | `PddPopMallBindTicketGet` |
| [`pdd.pop.mall.bind.token.get`](https://open.pinduoduo.com/application/document/api?id=pdd.pop.mall.bind.token.get) | `pddPopMallBindTokenGet()` | `PddPopMallBindTokenGet` |
| [`pdd.time.get`](https://open.pinduoduo.com/application/document/api?id=pdd.time.get) | `pddTimeGet()` | `PddTimeGet` |

## 仓储API

命名空间：`PddSdk\Api\Warehouse`，共 15 个接口。

| 官方接口 | 客户端方法 | 请求类 |
| --- | --- | --- |
| [`pdd.express.add.depot`](https://open.pinduoduo.com/application/document/api?id=pdd.express.add.depot) | `pddExpressAddDepot()` | `PddExpressAddDepot` |
| [`pdd.express.change.depot.info`](https://open.pinduoduo.com/application/document/api?id=pdd.express.change.depot.info) | `pddExpressChangeDepotInfo()` | `PddExpressChangeDepotInfo` |
| [`pdd.express.depot.info.get`](https://open.pinduoduo.com/application/document/api?id=pdd.express.depot.info.get) | `pddExpressDepotInfoGet()` | `PddExpressDepotInfoGet` |
| [`pdd.express.depot.list.get`](https://open.pinduoduo.com/application/document/api?id=pdd.express.depot.list.get) | `pddExpressDepotListGet()` | `PddExpressDepotListGet` |
| [`pdd.express.search.depot`](https://open.pinduoduo.com/application/document/api?id=pdd.express.search.depot) | `pddExpressSearchDepot()` | `PddExpressSearchDepot` |
| [`pdd.stock.goods.id.to.sku.query`](https://open.pinduoduo.com/application/document/api?id=pdd.stock.goods.id.to.sku.query) | `pddStockGoodsIdToSkuQuery()` | `PddStockGoodsIdToSkuQuery` |
| [`pdd.stock.ware.create`](https://open.pinduoduo.com/application/document/api?id=pdd.stock.ware.create) | `pddStockWareCreate()` | `PddStockWareCreate` |
| [`pdd.stock.ware.delete`](https://open.pinduoduo.com/application/document/api?id=pdd.stock.ware.delete) | `pddStockWareDelete()` | `PddStockWareDelete` |
| [`pdd.stock.ware.detail.query`](https://open.pinduoduo.com/application/document/api?id=pdd.stock.ware.detail.query) | `pddStockWareDetailQuery()` | `PddStockWareDetailQuery` |
| [`pdd.stock.ware.info.list`](https://open.pinduoduo.com/application/document/api?id=pdd.stock.ware.info.list) | `pddStockWareInfoList()` | `PddStockWareInfoList` |
| [`pdd.stock.ware.list`](https://open.pinduoduo.com/application/document/api?id=pdd.stock.ware.list) | `pddStockWareList()` | `PddStockWareList` |
| [`pdd.stock.ware.move`](https://open.pinduoduo.com/application/document/api?id=pdd.stock.ware.move) | `pddStockWareMove()` | `PddStockWareMove` |
| [`pdd.stock.ware.sku.update`](https://open.pinduoduo.com/application/document/api?id=pdd.stock.ware.sku.update) | `pddStockWareSkuUpdate()` | `PddStockWareSkuUpdate` |
| [`pdd.stock.ware.update`](https://open.pinduoduo.com/application/document/api?id=pdd.stock.ware.update) | `pddStockWareUpdate()` | `PddStockWareUpdate` |
| [`pdd.stock.ware.warehouse.query`](https://open.pinduoduo.com/application/document/api?id=pdd.stock.ware.warehouse.query) | `pddStockWareWarehouseQuery()` | `PddStockWareWarehouseQuery` |

## 消息服务API

命名空间：`PddSdk\Api\Message`，共 4 个接口。

| 官方接口 | 客户端方法 | 请求类 |
| --- | --- | --- |
| [`pdd.pmc.accrue.query`](https://open.pinduoduo.com/application/document/api?id=pdd.pmc.accrue.query) | `pddPmcAccrueQuery()` | `PddPmcAccrueQuery` |
| [`pdd.pmc.user.cancel`](https://open.pinduoduo.com/application/document/api?id=pdd.pmc.user.cancel) | `pddPmcUserCancel()` | `PddPmcUserCancel` |
| [`pdd.pmc.user.get`](https://open.pinduoduo.com/application/document/api?id=pdd.pmc.user.get) | `pddPmcUserGet()` | `PddPmcUserGet` |
| [`pdd.pmc.user.permit`](https://open.pinduoduo.com/application/document/api?id=pdd.pmc.user.permit) | `pddPmcUserPermit()` | `PddPmcUserPermit` |

## 电子面单API

命名空间：`PddSdk\Api\ElectronicWaybill`，共 13 个接口。

| 官方接口 | 客户端方法 | 请求类 |
| --- | --- | --- |
| [`pdd.cloud.print`](https://open.pinduoduo.com/application/document/api?id=pdd.cloud.print) | `pddCloudPrint()` | `PddCloudPrint` |
| [`pdd.cloud.print.task.query`](https://open.pinduoduo.com/application/document/api?id=pdd.cloud.print.task.query) | `pddCloudPrintTaskQuery()` | `PddCloudPrintTaskQuery` |
| [`pdd.cloud.print.verify.code`](https://open.pinduoduo.com/application/document/api?id=pdd.cloud.print.verify.code) | `pddCloudPrintVerifyCode()` | `PddCloudPrintVerifyCode` |
| [`pdd.cloud.printer.bind`](https://open.pinduoduo.com/application/document/api?id=pdd.cloud.printer.bind) | `pddCloudPrinterBind()` | `PddCloudPrinterBind` |
| [`pdd.cloud.printer.setting`](https://open.pinduoduo.com/application/document/api?id=pdd.cloud.printer.setting) | `pddCloudPrinterSetting()` | `PddCloudPrinterSetting` |
| [`pdd.cloud.printer.status.query`](https://open.pinduoduo.com/application/document/api?id=pdd.cloud.printer.status.query) | `pddCloudPrinterStatusQuery()` | `PddCloudPrinterStatusQuery` |
| [`pdd.cloudprint.customares.get`](https://open.pinduoduo.com/application/document/api?id=pdd.cloudprint.customares.get) | `pddCloudprintCustomaresGet()` | `PddCloudprintCustomaresGet` |
| [`pdd.cloudprint.stdtemplates.get`](https://open.pinduoduo.com/application/document/api?id=pdd.cloudprint.stdtemplates.get) | `pddCloudprintStdtemplatesGet()` | `PddCloudprintStdtemplatesGet` |
| [`pdd.waybill.cancel`](https://open.pinduoduo.com/application/document/api?id=pdd.waybill.cancel) | `pddWaybillCancel()` | `PddWaybillCancel` |
| [`pdd.waybill.get`](https://open.pinduoduo.com/application/document/api?id=pdd.waybill.get) | `pddWaybillGet()` | `PddWaybillGet` |
| [`pdd.waybill.query.by.waybillcode`](https://open.pinduoduo.com/application/document/api?id=pdd.waybill.query.by.waybillcode) | `pddWaybillQueryByWaybillcode()` | `PddWaybillQueryByWaybillcode` |
| [`pdd.waybill.search`](https://open.pinduoduo.com/application/document/api?id=pdd.waybill.search) | `pddWaybillSearch()` | `PddWaybillSearch` |
| [`pdd.waybill.update`](https://open.pinduoduo.com/application/document/api?id=pdd.waybill.update) | `pddWaybillUpdate()` | `PddWaybillUpdate` |

## 财务API

命名空间：`PddSdk\Api\Finance`，共 1 个接口。

| 官方接口 | 客户端方法 | 请求类 |
| --- | --- | --- |
| [`pdd.finance.balance.daily.bill.url.get`](https://open.pinduoduo.com/application/document/api?id=pdd.finance.balance.daily.bill.url.get) | `pddFinanceBalanceDailyBillUrlGet()` | `PddFinanceBalanceDailyBillUrlGet` |

## 短信服务API

命名空间：`PddSdk\Api\Sms`，共 2 个接口。

| 官方接口 | 客户端方法 | 请求类 |
| --- | --- | --- |
| [`pdd.open.msg.send.result.receive`](https://open.pinduoduo.com/application/document/api?id=pdd.open.msg.send.result.receive) | `pddOpenMsgSendResultReceive()` | `PddOpenMsgSendResultReceive` |
| [`pdd.open.msg.service.send.express.msg`](https://open.pinduoduo.com/application/document/api?id=pdd.open.msg.service.send.express.msg) | `pddOpenMsgServiceSendExpressMsg()` | `PddOpenMsgServiceSendExpressMsg` |

## 服务市场API

命名空间：`PddSdk\Api\ServiceMarket`，共 4 个接口。

| 官方接口 | 客户端方法 | 请求类 |
| --- | --- | --- |
| [`pdd.servicemarket.contract.search`](https://open.pinduoduo.com/application/document/api?id=pdd.servicemarket.contract.search) | `pddServicemarketContractSearch()` | `PddServicemarketContractSearch` |
| [`pdd.servicemarket.settlementbill.get`](https://open.pinduoduo.com/application/document/api?id=pdd.servicemarket.settlementbill.get) | `pddServicemarketSettlementbillGet()` | `PddServicemarketSettlementbillGet` |
| [`pdd.servicemarket.tradelist.get`](https://open.pinduoduo.com/application/document/api?id=pdd.servicemarket.tradelist.get) | `pddServicemarketTradelistGet()` | `PddServicemarketTradelistGet` |
| [`pdd.vas.order.search`](https://open.pinduoduo.com/application/document/api?id=pdd.vas.order.search) | `pddVasOrderSearch()` | `PddVasOrderSearch` |

## 短信供应商API

命名空间：`PddSdk\Api\SmsProvider`，共 1 个接口。

| 官方接口 | 客户端方法 | 请求类 |
| --- | --- | --- |
| [`pdd.sms.detailbill.push`](https://open.pinduoduo.com/application/document/api?id=pdd.sms.detailbill.push) | `pddSmsDetailbillPush()` | `PddSmsDetailbillPush` |

## 电子面单代打API

命名空间：`PddSdk\Api\WaybillPrinting`，共 7 个接口。

| 官方接口 | 客户端方法 | 请求类 |
| --- | --- | --- |
| [`pdd.fds.order.get`](https://open.pinduoduo.com/application/document/api?id=pdd.fds.order.get) | `pddFdsOrderGet()` | `PddFdsOrderGet` |
| [`pdd.fds.order.list.get`](https://open.pinduoduo.com/application/document/api?id=pdd.fds.order.list.get) | `pddFdsOrderListGet()` | `PddFdsOrderListGet` |
| [`pdd.fds.role.get`](https://open.pinduoduo.com/application/document/api?id=pdd.fds.role.get) | `pddFdsRoleGet()` | `PddFdsRoleGet` |
| [`pdd.fds.waybill.cancel`](https://open.pinduoduo.com/application/document/api?id=pdd.fds.waybill.cancel) | `pddFdsWaybillCancel()` | `PddFdsWaybillCancel` |
| [`pdd.fds.waybill.get`](https://open.pinduoduo.com/application/document/api?id=pdd.fds.waybill.get) | `pddFdsWaybillGet()` | `PddFdsWaybillGet` |
| [`pdd.fds.waybill.return`](https://open.pinduoduo.com/application/document/api?id=pdd.fds.waybill.return) | `pddFdsWaybillReturn()` | `PddFdsWaybillReturn` |
| [`pdd.fds.waybill.return.slave`](https://open.pinduoduo.com/application/document/api?id=pdd.fds.waybill.return.slave) | `pddFdsWaybillReturnSlave()` | `PddFdsWaybillReturnSlave` |

## 门店API

命名空间：`PddSdk\Api\Store`，共 8 个接口。

| 官方接口 | 客户端方法 | 请求类 |
| --- | --- | --- |
| [`pdd.mall.info.group.add.store.post`](https://open.pinduoduo.com/application/document/api?id=pdd.mall.info.group.add.store.post) | `pddMallInfoGroupAddStorePost()` | `PddMallInfoGroupAddStorePost` |
| [`pdd.mall.info.group.list.store.get`](https://open.pinduoduo.com/application/document/api?id=pdd.mall.info.group.list.store.get) | `pddMallInfoGroupListStoreGet()` | `PddMallInfoGroupListStoreGet` |
| [`pdd.mall.info.group.query.post`](https://open.pinduoduo.com/application/document/api?id=pdd.mall.info.group.query.post) | `pddMallInfoGroupQueryPost()` | `PddMallInfoGroupQueryPost` |
| [`pdd.mall.info.group.remove.store.get`](https://open.pinduoduo.com/application/document/api?id=pdd.mall.info.group.remove.store.get) | `pddMallInfoGroupRemoveStoreGet()` | `PddMallInfoGroupRemoveStoreGet` |
| [`pdd.mall.info.store.create.post.nopoi`](https://open.pinduoduo.com/application/document/api?id=pdd.mall.info.store.create.post.nopoi) | `pddMallInfoStoreCreatePostNopoi()` | `PddMallInfoStoreCreatePostNopoi` |
| [`pdd.mall.info.store.get`](https://open.pinduoduo.com/application/document/api?id=pdd.mall.info.store.get) | `pddMallInfoStoreGet()` | `PddMallInfoStoreGet` |
| [`pdd.mall.info.store.update.post.nopoi`](https://open.pinduoduo.com/application/document/api?id=pdd.mall.info.store.update.post.nopoi) | `pddMallInfoStoreUpdatePostNopoi()` | `PddMallInfoStoreUpdatePostNopoi` |
| [`pdd.qrpay.payee.register`](https://open.pinduoduo.com/application/document/api?id=pdd.qrpay.payee.register) | `pddQrpayPayeeRegister()` | `PddQrpayPayeeRegister` |

## 多多国际API

命名空间：`PddSdk\Api\International`，共 4 个接口。

| 官方接口 | 客户端方法 | 请求类 |
| --- | --- | --- |
| [`pdd.customs.send.goods.record`](https://open.pinduoduo.com/application/document/api?id=pdd.customs.send.goods.record) | `pddCustomsSendGoodsRecord()` | `PddCustomsSendGoodsRecord` |
| [`pdd.mall.info.bonded.warehouse.get`](https://open.pinduoduo.com/application/document/api?id=pdd.mall.info.bonded.warehouse.get) | `pddMallInfoBondedWarehouseGet()` | `PddMallInfoBondedWarehouseGet` |
| [`pdd.oversea.clearance.get`](https://open.pinduoduo.com/application/document/api?id=pdd.oversea.clearance.get) | `pddOverseaClearanceGet()` | `PddOverseaClearanceGet` |
| [`pdd.oversea.declaration.fail.notify`](https://open.pinduoduo.com/application/document/api?id=pdd.oversea.declaration.fail.notify) | `pddOverseaDeclarationFailNotify()` | `PddOverseaDeclarationFailNotify` |

## 旅游门票API

命名空间：`PddSdk\Api\Travel`，共 11 个接口。

| 官方接口 | 客户端方法 | 请求类 |
| --- | --- | --- |
| [`pdd.service.aftersales.appoint.notify`](https://open.pinduoduo.com/application/document/api?id=pdd.service.aftersales.appoint.notify) | `pddServiceAftersalesAppointNotify()` | `PddServiceAftersalesAppointNotify` |
| [`pdd.ticket.areacode.get`](https://open.pinduoduo.com/application/document/api?id=pdd.ticket.areacode.get) | `pddTicketAreacodeGet()` | `PddTicketAreacodeGet` |
| [`pdd.ticket.goods.query`](https://open.pinduoduo.com/application/document/api?id=pdd.ticket.goods.query) | `pddTicketGoodsQuery()` | `PddTicketGoodsQuery` |
| [`pdd.ticket.goods.upload`](https://open.pinduoduo.com/application/document/api?id=pdd.ticket.goods.upload) | `pddTicketGoodsUpload()` | `PddTicketGoodsUpload` |
| [`pdd.ticket.order.create.notifycation`](https://open.pinduoduo.com/application/document/api?id=pdd.ticket.order.create.notifycation) | `pddTicketOrderCreateNotifycation()` | `PddTicketOrderCreateNotifycation` |
| [`pdd.ticket.order.refund.notifycation`](https://open.pinduoduo.com/application/document/api?id=pdd.ticket.order.refund.notifycation) | `pddTicketOrderRefundNotifycation()` | `PddTicketOrderRefundNotifycation` |
| [`pdd.ticket.scenic.get`](https://open.pinduoduo.com/application/document/api?id=pdd.ticket.scenic.get) | `pddTicketScenicGet()` | `PddTicketScenicGet` |
| [`pdd.ticket.sku.rule.add`](https://open.pinduoduo.com/application/document/api?id=pdd.ticket.sku.rule.add) | `pddTicketSkuRuleAdd()` | `PddTicketSkuRuleAdd` |
| [`pdd.ticket.sku.rule.edit`](https://open.pinduoduo.com/application/document/api?id=pdd.ticket.sku.rule.edit) | `pddTicketSkuRuleEdit()` | `PddTicketSkuRuleEdit` |
| [`pdd.ticket.sku.rule.get`](https://open.pinduoduo.com/application/document/api?id=pdd.ticket.sku.rule.get) | `pddTicketSkuRuleGet()` | `PddTicketSkuRuleGet` |
| [`pdd.ticket.verification.notifycation`](https://open.pinduoduo.com/application/document/api?id=pdd.ticket.verification.notifycation) | `pddTicketVerificationNotifycation()` | `PddTicketVerificationNotifycation` |

## 自媒体API

命名空间：`PddSdk\Api\WeMedia`，共 6 个接口。

| 官方接口 | 客户端方法 | 请求类 |
| --- | --- | --- |
| [`pdd.live.img.mall.upload`](https://open.pinduoduo.com/application/document/api?id=pdd.live.img.mall.upload) | `pddLiveImgMallUpload()` | `PddLiveImgMallUpload` |
| [`pdd.live.video.mall.create`](https://open.pinduoduo.com/application/document/api?id=pdd.live.video.mall.create) | `pddLiveVideoMallCreate()` | `PddLiveVideoMallCreate` |
| [`pdd.live.video.mall.querymallvideoauditstatus`](https://open.pinduoduo.com/application/document/api?id=pdd.live.video.mall.querymallvideoauditstatus) | `pddLiveVideoMallQuerymallvideoauditstatus()` | `PddLiveVideoMallQuerymallvideoauditstatus` |
| [`pdd.live.video.mall.upload.part`](https://open.pinduoduo.com/application/document/api?id=pdd.live.video.mall.upload.part) | `pddLiveVideoMallUploadPart()` | `PddLiveVideoMallUploadPart` |
| [`pdd.live.video.mall.upload.part.complete`](https://open.pinduoduo.com/application/document/api?id=pdd.live.video.mall.upload.part.complete) | `pddLiveVideoMallUploadPartComplete()` | `PddLiveVideoMallUploadPartComplete` |
| [`pdd.live.video.mall.upload.part.init`](https://open.pinduoduo.com/application/document/api?id=pdd.live.video.mall.upload.part.init) | `pddLiveVideoMallUploadPartInit()` | `PddLiveVideoMallUploadPartInit` |

## 视频推荐API

命名空间：`PddSdk\Api\VideoRecommendation`，共 1 个接口。

| 官方接口 | 客户端方法 | 请求类 |
| --- | --- | --- |
| [`pdd.vivodeskwindow.queryresources`](https://open.pinduoduo.com/application/document/api?id=pdd.vivodeskwindow.queryresources) | `pddVivodeskwindowQueryresources()` | `PddVivodeskwindowQueryresources` |

## 方舟数据传输API

命名空间：`PddSdk\Api\ArkDataTransfer`，共 3 个接口。

| 官方接口 | 客户端方法 | 请求类 |
| --- | --- | --- |
| [`pdd.erp.order.list.get`](https://open.pinduoduo.com/application/document/api?id=pdd.erp.order.list.get) | `pddErpOrderListGet()` | `PddErpOrderListGet` |
| [`pdd.erp.oub.list.get`](https://open.pinduoduo.com/application/document/api?id=pdd.erp.oub.list.get) | `pddErpOubListGet()` | `PddErpOubListGet` |
| [`pdd.erp.refund.list.get`](https://open.pinduoduo.com/application/document/api?id=pdd.erp.refund.list.get) | `pddErpRefundListGet()` | `PddErpRefundListGet` |

## 商家寄件API

命名空间：`PddSdk\Api\MerchantShipping`，共 13 个接口。

| 官方接口 | 客户端方法 | 请求类 |
| --- | --- | --- |
| [`pdd.logistics.onlinedelivery.courier.query`](https://open.pinduoduo.com/application/document/api?id=pdd.logistics.onlinedelivery.courier.query) | `pddLogisticsOnlinedeliveryCourierQuery()` | `PddLogisticsOnlinedeliveryCourierQuery` |
| [`pdd.logistics.onlinedelivery.payment.status`](https://open.pinduoduo.com/application/document/api?id=pdd.logistics.onlinedelivery.payment.status) | `pddLogisticsOnlinedeliveryPaymentStatus()` | `PddLogisticsOnlinedeliveryPaymentStatus` |
| [`pdd.logistics.onlinedelivery.predict.price`](https://open.pinduoduo.com/application/document/api?id=pdd.logistics.onlinedelivery.predict.price) | `pddLogisticsOnlinedeliveryPredictPrice()` | `PddLogisticsOnlinedeliveryPredictPrice` |
| [`pdd.logistics.onlinedelivery.receipt.cancel`](https://open.pinduoduo.com/application/document/api?id=pdd.logistics.onlinedelivery.receipt.cancel) | `pddLogisticsOnlinedeliveryReceiptCancel()` | `PddLogisticsOnlinedeliveryReceiptCancel` |
| [`pdd.logistics.onlinedelivery.receipt.create`](https://open.pinduoduo.com/application/document/api?id=pdd.logistics.onlinedelivery.receipt.create) | `pddLogisticsOnlinedeliveryReceiptCreate()` | `PddLogisticsOnlinedeliveryReceiptCreate` |
| [`pdd.logistics.onlinedelivery.receipt.detail`](https://open.pinduoduo.com/application/document/api?id=pdd.logistics.onlinedelivery.receipt.detail) | `pddLogisticsOnlinedeliveryReceiptDetail()` | `PddLogisticsOnlinedeliveryReceiptDetail` |
| [`pdd.logistics.onlinedelivery.receipt.list`](https://open.pinduoduo.com/application/document/api?id=pdd.logistics.onlinedelivery.receipt.list) | `pddLogisticsOnlinedeliveryReceiptList()` | `PddLogisticsOnlinedeliveryReceiptList` |
| [`pdd.logistics.onlinedelivery.receipt.not.pay.list`](https://open.pinduoduo.com/application/document/api?id=pdd.logistics.onlinedelivery.receipt.not.pay.list) | `pddLogisticsOnlinedeliveryReceiptNotPayList()` | `PddLogisticsOnlinedeliveryReceiptNotPayList` |
| [`pdd.logistics.onlinedelivery.receipt.trigger.pay`](https://open.pinduoduo.com/application/document/api?id=pdd.logistics.onlinedelivery.receipt.trigger.pay) | `pddLogisticsOnlinedeliveryReceiptTriggerPay()` | `PddLogisticsOnlinedeliveryReceiptTriggerPay` |
| [`pdd.logistics.onlinedelivery.send.address.query`](https://open.pinduoduo.com/application/document/api?id=pdd.logistics.onlinedelivery.send.address.query) | `pddLogisticsOnlinedeliverySendAddressQuery()` | `PddLogisticsOnlinedeliverySendAddressQuery` |
| [`pdd.logistics.onlinedelivery.subsiby.appeal.result`](https://open.pinduoduo.com/application/document/api?id=pdd.logistics.onlinedelivery.subsiby.appeal.result) | `pddLogisticsOnlinedeliverySubsibyAppealResult()` | `PddLogisticsOnlinedeliverySubsibyAppealResult` |
| [`pdd.logistics.onlinedelivery.subsiby.shipbill.send`](https://open.pinduoduo.com/application/document/api?id=pdd.logistics.onlinedelivery.subsiby.shipbill.send) | `pddLogisticsOnlinedeliverySubsibyShipbillSend()` | `PddLogisticsOnlinedeliverySubsibyShipbillSend` |
| [`pdd.logistics.onlinedelivery.subsiby.weight.appeal`](https://open.pinduoduo.com/application/document/api?id=pdd.logistics.onlinedelivery.subsiby.weight.appeal) | `pddLogisticsOnlinedeliverySubsibyWeightAppeal()` | `PddLogisticsOnlinedeliverySubsibyWeightAppeal` |
