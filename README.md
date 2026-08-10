# pdd-sdk-php

拼多多开放平台的现代 PHP SDK。项目使用 Composer、PSR-4 和 Guzzle，适用于传统 PHP、FPM、Hyperf 与 Swoole 项目。

> 当前为首期开发版本，已经实现公共网关、签名、OAuth、异常处理和 `pdd.erp.order.sync`。尚未生成的接口可暂时通过 `rawRequest()` 调用。

## 功能特性

- 严格按照拼多多官方文档目录组织接口，不根据接口名称或前缀自行归类。
- 使用官方公共网关与大写 MD5 签名协议。
- 每个客户端实例代表一个独立授权上下文，不在 SDK 内保存商家或 Token 关系。
- 支持商家、多多客和移动端授权地址，以及换取、刷新 Token。
- 提供接口参数校验、平台异常和传输异常。
- 自动识别 FPM、CLI、Swoole 和 OpenSwoole，并调整连接复用策略。
- 提供官方目录同步脚本和接口目录一致性检查。

## 安装

```bash
composer require whalesky-labs/pdd-sdk-php
```

## 快速开始

```php
<?php

use PddSdk\Client\PddClient;

$client = new PddClient(
    clientId: 'your-client-id',
    clientSecret: 'your-client-secret',
    options: ['accessToken' => 'merchant-access-token'],
);

$response = $client->pddErpOrderSync()
    ->setParams([
        'order_sn' => '240101-123456',
        'order_state' => 1,
        'waybill_no' => 'SF1234567890',
        'logistics_id' => 44,
    ])
    ->send();
```

`pdd.erp.order.sync` 在官方目录中属于“订单API”，因此接口类位于 `PddSdk\Api\Order\PddErpOrderSync`。

## OAuth

```php
$authorizeUrl = $client->oauth()->buildAuthorizeUrl(
    redirectUri: 'https://example.com/pdd/callback',
    state: 'random-csrf-state',
);

$token = $client->oauth()->getAccessToken(
    code: $_GET['code'],
    redirectUri: 'https://example.com/pdd/callback',
    state: $_GET['state'] ?? null,
);

$newToken = $client->oauth()->refreshAccessToken($token->refreshToken);
```

SDK 只返回 Token，不保存 Token。应用系统应负责应用、商家、授权记录及 Token 生命周期。

## Hyperf 与 Swoole

默认传输层不会修改全局协程 Hook。它只识别运行环境并调整连接策略：FPM/CLI 使用 `keep-alive`，Swoole/OpenSwoole 长驻 worker 默认避免跨请求复用陈旧连接。若应用已经统一管理连接策略，可在客户端选项中传入 `['autoDetectRuntime' => false]`。

SDK 不会自动重试业务 `POST` 请求，避免超时后重复执行写操作。需要重试时，应由业务层结合接口幂等性决定。

## 原始调用

官方目录中尚未生成快捷类的接口，可以通过低层入口调用：

```php
$response = $client->rawRequest(
    type: 'pdd.order.status.get',
    parameters: ['order_sn' => '240101-123456'],
);
```

业务参数不能覆盖 `client_id`、`access_token`、`timestamp`、`type`、`version`、`data_type` 或 `sign`。

## 官方接口目录

`resources/official-api-catalog.json` 是通过拼多多官方文档公开接口生成的目录快照，包含官方分类 ID、中文名称、命名空间和接口归属。

```bash
# 从官方文档同步完整目录
php scripts/sync-official-api-catalog.php

# 根据接口类重新生成客户端快捷方法
composer generate:api-client

# 检查每个接口类是否位于官方分类对应目录
composer generate:api-client-check
```

新增接口必须满足：

1. 接口存在于官方目录快照；
2. 接口类的 `OfficialCategory` 与官方分类 ID 和中文名称一致；
3. PHP 文件和命名空间位于该分类映射目录；
4. 参数、必填规则和说明来自对应官方接口文档。

例如，接口名称里即使包含 `erp`，只要官方目录归属为“订单API”，就必须放入 `Api/Order`，不能自行创建 `Api/Erp`。

## 异常处理

```php
use PddSdk\Exception\ApiException;
use PddSdk\Exception\PddException;

try {
    $response = $client->pddErpOrderSync()->setParams($parameters)->send();
} catch (ApiException $exception) {
    $platformCode = $exception->platformCode();
    $subCode = $exception->subCode();
} catch (PddException $exception) {
    // 配置、参数、网络或响应格式异常
}
```

## 开发与测试

```bash
composer install
composer validate --strict
composer generate:api-client-check
composer cs-check
composer test
```

默认测试完全离线，不读取 `.env`，也不会调用真实拼多多店铺接口。
