<p align="center">
  <a href="https://github.com/whalesky-labs">
    <img src="https://avatars.githubusercontent.com/u/277389313?s=200&v=4" width="128" height="128" alt="WhaleSky Labs">
  </a>
</p>

<h1 align="center">Pinduoduo Open Platform SDK for PHP</h1>

<p align="center">
  拼多多开放平台 PHP SDK
</p>

<p align="center">
  27 个官方分类 · 287 个接口 · Guzzle 7 · FPM / Swoole
</p>

<p align="center">
  <a href="composer.json"><img src="https://img.shields.io/badge/PHP-%3E%3D8.1-777BB4?logo=php&logoColor=white" alt="PHP >= 8.1"></a>
  <a href="composer.json"><img src="https://img.shields.io/badge/Composer-package-885630?logo=composer&logoColor=white" alt="Composer package"></a>
  <a href="https://github.com/whalesky-labs/pdd-sdk-php/actions/workflows/tests.yml"><img src="https://github.com/whalesky-labs/pdd-sdk-php/actions/workflows/tests.yml/badge.svg" alt="CI"></a>
  <a href="LICENSE"><img src="https://img.shields.io/badge/License-MIT-green.svg" alt="MIT License"></a>
</p>

<p align="center">
  由 <a href="https://github.com/whalesky-labs">WhaleSky Labs</a> 维护
</p>

`whalesky-labs/pdd-sdk-php` 是面向拼多多开放平台的 PHP Composer SDK，提供签名、OAuth、HTTP 传输、异常转换，以及按官方目录生成的完整 API 调用入口。

本项目不是拼多多官方发布的 SDK。拼多多开放平台文档是接口名称、分类、参数、权限和业务行为的权威来源；本项目负责将这些能力封装为适用于 PHP-FPM、CLI、Hyperf 与 Swoole 项目的稳定调用层。

2026-08-10 已通过登录后的拼多多开放平台页面和官方实时目录接口重新核验：官方当前公开 **27 个分类、287 个接口**，本项目对应生成 **287 个独立请求类和 287 个客户端快捷方法**，接口集合、分类和命名空间均无缺失或重复。完整清单见 [`docs/api-catalog.md`](docs/api-catalog.md)。

## 运行要求

- PHP 8.1 或更高版本
- JSON 扩展
- Composer 2
- 可访问拼多多开放平台 HTTPS 网关的 HTTP 运行环境

运行时依赖为 Guzzle 7。Swoole、OpenSwoole 和 Hyperf 支持是可选能力，不影响 PHP-FPM 或普通 CLI 使用。

## 安装

稳定版本已发布至 [Packagist](https://packagist.org/packages/whalesky-labs/pdd-sdk-php)，可直接安装：

```bash
composer require whalesky-labs/pdd-sdk-php
```

生产项目应提交 `composer.lock`，升级前审查 [更新日志](CHANGELOG.md)。消息接收从 1.1.0 开始提供，其真实平台兼容性仍须应用联调验收。

## 接口覆盖

本项目严格使用拼多多官方目录的分类 ID 和中文分类名称，不根据接口前缀自行归类。当前覆盖如下：

| 官方分类 | PHP 命名空间 | 接口数 |
| --- | --- | ---: |
| 订单API | `PddSdk\Api\Order` | 26 |
| 售后API | `PddSdk\Api\AfterSales` | 10 |
| 物流API | `PddSdk\Api\Logistics` | 12 |
| 虚拟类目API | `PddSdk\Api\Virtual` | 7 |
| 商品API | `PddSdk\Api\Goods` | 56 |
| 多多客API | `PddSdk\Api\Ddk` | 29 |
| 多多客工具API | `PddSdk\Api\DdkTools` | 18 |
| 营销API | `PddSdk\Api\Marketing` | 7 |
| 卡券API | `PddSdk\Api\Voucher` | 10 |
| 发票服务API | `PddSdk\Api\Invoice` | 4 |
| 店铺API | `PddSdk\Api\Shop` | 6 |
| 工具API | `PddSdk\Api\Tools` | 9 |
| 仓储API | `PddSdk\Api\Warehouse` | 15 |
| 消息服务API | `PddSdk\Api\Message` | 4 |
| 电子面单API | `PddSdk\Api\ElectronicWaybill` | 13 |
| 财务API | `PddSdk\Api\Finance` | 1 |
| 短信服务API | `PddSdk\Api\Sms` | 2 |
| 服务市场API | `PddSdk\Api\ServiceMarket` | 4 |
| 短信供应商API | `PddSdk\Api\SmsProvider` | 1 |
| 电子面单代打API | `PddSdk\Api\WaybillPrinting` | 7 |
| 门店API | `PddSdk\Api\Store` | 8 |
| 多多国际API | `PddSdk\Api\International` | 4 |
| 旅游门票API | `PddSdk\Api\Travel` | 11 |
| 自媒体API | `PddSdk\Api\WeMedia` | 6 |
| 视频推荐API | `PddSdk\Api\VideoRecommendation` | 1 |
| 方舟数据传输API | `PddSdk\Api\ArkDataTransfer` | 3 |
| 商家寄件API | `PddSdk\Api\MerchantShipping` | 13 |
| **合计** | **27 个命名空间** | **287** |

“已封装”在本项目中的含义是：每个官方接口都有唯一的请求类、官方元数据、客户端快捷方法和原始网关调用能力。业务参数通过 `setParams()` 传入，字段名称、数组和嵌套对象保持官方文档原样。

本项目不会根据接口名称猜测字段类型或必填条件。已人工核验的必填规则会在发送前校验，其余接口由平台按官方文档校验；这不影响 287 个接口的调用入口完整性，但开发者仍应以具体接口文档填写参数。

## 定位接口

完整的官方接口、客户端方法和请求类映射位于 [`docs/api-catalog.md`](docs/api-catalog.md)。也可以按官方 API 名称搜索：

```bash
rg -l "type: 'pdd\.order\.information\.get'" src/Api
```

API 名称按点号转换为 PascalCase 类名，再将首字母改为小写得到客户端方法名：

| 官方 API | 请求类 | 客户端方法 |
| --- | --- | --- |
| `pdd.time.get` | `PddTimeGet` | `pddTimeGet()` |
| `pdd.order.information.get` | `PddOrderInformationGet` | `pddOrderInformationGet()` |
| `pdd.erp.order.sync` | `PddErpOrderSync` | `pddErpOrderSync()` |

类所在目录只取决于官方分类。例如 `pdd.erp.order.sync` 在官方文档中属于“订单API”，因此必须位于 `PddSdk\Api\Order`，不会因为名称包含 `erp` 而创建自定义分类。

## 快速开始

```php
<?php

declare(strict_types=1);

require __DIR__ . '/vendor/autoload.php';

use PddSdk\Client\PddClient;

$client = new PddClient(
    clientId: 'your-client-id',
    clientSecret: 'your-client-secret',
    options: ['accessToken' => 'merchant-access-token'],
);

$response = $client->pddOrderInformationGet()
    ->setParams(['order_sn' => '240101-123456'])
    ->send();
```

一个 `PddClient` 实例代表一个应用和默认授权上下文。多应用或多商家系统应由业务层按应用、商家和 Token 创建或管理客户端，不要在 SDK 内保存商家关系。

### 无需授权 Token 的接口

部分接口只需要应用凭证，例如获取平台系统时间：

```php
$response = $client->pddTimeGet()->send();
```

接口是否需要用户授权以当前官方文档和应用权限包为准，不应仅根据请求中是否传入 `access_token` 推断。

### 单次覆盖 Access Token

```php
$response = $client->pddMallInfoGet()
    ->setAccessToken($requestAccessToken)
    ->send();
```

`setAccessToken()` 只影响当前待发送请求，不修改客户端的默认授权上下文。

### 合并业务参数

```php
$request = $client->pddOrderListGet()
    ->setParams($queryParameters)
    ->mergeParams(['page' => 1]);

$response = $request->send();
```

数组和实现 `JsonSerializable` 的对象会编码为 JSON 字符串；布尔值会规范为 `true` 或 `false` 字符串。空字符串和 `null` 不进入最终请求。

## 公共入口

| 方法 | 返回值 | 用途 |
| --- | --- | --- |
| `new PddClient(...)` | `PddClient` | 创建应用和默认授权上下文 |
| `$client->pddTimeGet()` 等 | `PendingRequest` | 创建指定官方接口请求 |
| `PendingRequest::setParams()` | `PendingRequest` | 设置完整业务参数 |
| `PendingRequest::mergeParams()` | `PendingRequest` | 合并部分业务参数 |
| `PendingRequest::setAccessToken()` | `PendingRequest` | 覆盖单次调用 Token |
| `PendingRequest::send()` | `array` | 签名、发送并解析响应 |
| `$client->rawRequest()` | `array` | 按官方 API 名称动态调用 |
| `$client->oauth()` | `OAuthClient` | 构建授权地址并管理 Token 交换 |
| `$client->config()` | `Config` | 读取当前不可变配置 |

所有 API 调用返回平台 JSON 解码后的关联数组。平台返回 `error_response` 时，SDK 抛出 `ApiException`，不会将错误响应伪装成成功数组。

## 原始调用

需要在运行时动态决定 API 名称时，可以使用低层入口：

```php
$response = $client->rawRequest(
    type: 'pdd.order.status.get',
    parameters: ['order_sn' => '240101-123456'],
);
```

也可以覆盖单次 Token、协议版本或响应类型：

```php
$response = $client->rawRequest(
    type: 'pdd.mall.info.get',
    parameters: [],
    accessToken: $accessToken,
    version: 'V1',
    dataType: 'JSON',
);
```

业务参数不能覆盖 `client_id`、`access_token`、`timestamp`、`type`、`version`、`data_type` 或 `sign`。这类公共参数必须由 SDK 统一生成，避免签名上下文不一致。

## OAuth 与授权

SDK 支持商家、多多客和移动端三类授权地址：

```php
use PddSdk\Auth\AuthorizationType;

$merchantUrl = $client->oauth()->buildAuthorizeUrl(
    redirectUri: 'https://example.com/pdd/callback',
    state: 'random-csrf-state',
    type: AuthorizationType::Merchant,
);

$ddkUrl = $client->oauth()->buildAuthorizeUrl(
    redirectUri: 'https://example.com/pdd/ddk-callback',
    state: 'random-csrf-state',
    type: AuthorizationType::Ddk,
);
```

使用回调 `code` 换取 Token：

```php
$token = $client->oauth()->getAccessToken(
    code: $_GET['code'],
    redirectUri: 'https://example.com/pdd/callback',
    state: $_GET['state'] ?? null,
);

$accessToken = $token->accessToken;
$refreshToken = $token->refreshToken;
```

刷新 Token：

```php
$newToken = $client->oauth()->refreshAccessToken($refreshToken);
```

`TokenResponse` 同时保留 `expiresIn`、`refreshExpiresIn`、`ownerId`、`ownerName` 和完整原始响应。SDK 只返回 Token，不保存 Token；应用系统应负责应用、商家、授权记录、过期时间和刷新生命周期。生产回调应自行校验并持久化发起授权时生成的 `state`，SDK 不保存会话状态。

## 配置

```php
$client = new PddClient(
    clientId: $clientId,
    clientSecret: $clientSecret,
    options: [
        'accessToken' => $accessToken,
        'baseUrl' => 'https://gw-api.pinduoduo.com/api/router',
        'tokenUrl' => 'https://open-api.pinduoduo.com/oauth/token',
        'connectTimeout' => 5.0,
        'readTimeout' => 30.0,
        'autoDetectRuntime' => true,
        'userAgent' => 'MyApplication/1.0',
    ],
);
```

| 配置项 | 类型 | 默认值 | 说明 |
| --- | --- | --- | --- |
| `accessToken` | `?string` | `null` | 默认用户授权 Token |
| `baseUrl` | `string` | `https://gw-api.pinduoduo.com/api/router` | 正式 API 网关 |
| `tokenUrl` | `string` | `https://open-api.pinduoduo.com/oauth/token` | OAuth Token 地址 |
| `merchantAuthorizeUrl` | `string` | `https://mms.pinduoduo.com/open.html` | 商家授权地址 |
| `ddkAuthorizeUrl` | `string` | `https://jinbao.pinduoduo.com/open.html` | 多多客授权地址 |
| `mobileAuthorizeUrl` | `string` | `https://mai.pinduoduo.com/h5-login.html` | 移动端授权地址 |
| `connectTimeout` | `float` | `5.0` | 连接超时，单位秒 |
| `readTimeout` | `float` | `30.0` | 请求总超时，单位秒 |
| `autoDetectRuntime` | `bool` | `true` | 是否根据运行环境调整连接策略 |
| `userAgent` | `string` | `pdd-sdk-php/1.0.0-dev` | HTTP User-Agent |

不支持的配置项会抛出 `ValidationException`。`clientId` 和 `clientSecret` 只能通过构造参数传入，不能被 `options` 覆盖。

## 异常处理

```php
use PddSdk\Exception\ApiException;
use PddSdk\Exception\PddException;
use PddSdk\Exception\TransportException;
use PddSdk\Exception\ValidationException;

try {
    $response = $client->pddErpOrderSync()
        ->setParams($parameters)
        ->send();
} catch (ApiException $exception) {
    $platformCode = $exception->platformCode();
    $subCode = $exception->subCode();
    $platformPayload = $exception->responsePayload();
} catch (ValidationException $exception) {
    // 客户端配置、保留参数或已核验必填参数不合法
} catch (TransportException $exception) {
    // 网络失败或异常 HTTP 响应
} catch (PddException $exception) {
    // 其他 SDK 异常
}
```

| 异常 | 含义 |
| --- | --- |
| `ApiException` | 平台返回 `error_response` |
| `ValidationException` | 配置、参数名、JSON 或 OAuth 响应不合法 |
| `TransportException` | 网络失败、非 JSON 错误响应或非 2xx HTTP 响应 |
| `PddException` | SDK 异常基类，可通过 `rawResponseBody()` 读取原始响应 |

不要通过异常消息解析错误码，应使用 `platformCode()`、`subCode()` 和 `responsePayload()`。

## 签名机制

SDK 按拼多多开放平台公共参数规则生成大写 MD5 签名：

1. 移除已有 `sign` 并过滤空字符串参数；
2. 按参数名称字典序排序；
3. 拼接 `clientSecret + 参数名和值 + clientSecret`；
4. 计算 MD5 并转换为大写。

请求时间戳使用 Unix 秒，业务系统应确保服务器时间准确。`client_secret`、`access_token` 和 `sign` 不应写入日志、异常上下文或版本库。

## Hyperf 与 Swoole

SDK 不修改全局协程 Hook。传输层只识别运行环境并调整连接策略：

| 运行环境 | 默认策略 |
| --- | --- |
| PHP-FPM / 普通 CLI | 发送 `Connection: keep-alive` |
| Swoole / OpenSwoole 长驻 Worker | 发送 `Connection: close`，避免跨请求复用陈旧连接 |

如果应用已经统一管理 Guzzle Handler、协程 Hook 或连接池，可以关闭自动识别：

```php
$client = new PddClient(
    $clientId,
    $clientSecret,
    ['autoDetectRuntime' => false],
    httpClient: $applicationManagedGuzzleClient,
);
```

也可以实现并注入 `PddSdk\Transport\TransportInterface`，由应用完全接管 HTTP 传输。

所有开放平台业务调用都通过 POST 发送。SDK 不自动重试业务请求，避免订单、发货、退款、库存等写操作在超时后重复执行；需要重试时，应由业务层结合接口幂等性和平台请求结果决定。

## 更新官方目录

官方目录快照位于 [`resources/official-api-catalog.json`](resources/official-api-catalog.json)，记录官方分类 ID、中文名称、PHP 命名空间、接口归属、文档地址和更新时间。

```bash
# 从拼多多官方实时目录同步全部分类和接口
php scripts/sync-official-api-catalog.php

# 根据官方目录生成请求类、客户端方法和接口索引
composer generate:api

# 只检查生成结果，不修改文件
composer generate:api-check
```

同步器采用失败关闭策略：官方出现尚未映射的新分类、重复接口或无效响应时会直接失败，不会静默遗漏。生成检查还会验证：

1. 官方目录中的每个 API 有且只有一个请求类；
2. 请求类目录、命名空间、分类 ID、中文分类名和文档 URL 全部一致；
3. 每个请求类都有唯一的客户端快捷方法；
4. 不存在官方目录之外的陈旧生成类；
5. 自动生成的 [`docs/api-catalog.md`](docs/api-catalog.md) 与当前目录一致。

`src/Api/*`、`src/Generated/ApiClientMethods.php` 和 `docs/api-catalog.md` 属于生成结果。新增或更新接口时应修改官方目录同步/生成资源后重新生成，不要只手工补一个请求类。

## 项目结构

```text
src/
├── Api/                    # 按 27 个官方分类生成的 287 个请求类
├── Auth/                   # OAuth、授权类型和 Token 响应
├── Client/                 # 主客户端、待发送请求和请求流水线
│   └── Pipeline/           # 公共参数、签名和响应解析
├── Config/                 # 不可变 SDK 配置
├── Exception/              # 平台、传输和参数异常
├── Generated/              # 自动生成的 287 个客户端快捷方法
├── Runtime/                # FPM / CLI / Swoole 运行时识别
├── Signing/                # 拼多多大写 MD5 签名
├── Support/                # JSON、时钟等基础能力
└── Transport/              # HTTP 传输抽象与 Guzzle 实现

docs/api-catalog.md         # 自动生成的完整官方接口索引
resources/                  # 官方目录与已核验参数规则
scripts/                    # 官方目录同步与代码生成器
tests/                      # 离线单元测试和真实接口测试
```

## 版本与变更

稳定版本遵循 [Semantic Versioning](https://semver.org/lang/zh-CN/)。新增能力、行为变化、兼容性说明和修复记录在 [`CHANGELOG.md`](CHANGELOG.md)；尚未发布的内容保留在 `Unreleased` 章节。

稳定版本以 GitHub Tag 与 Release 为准，并由 Packagist 自动同步。提交和推送代码不等于发布版本；Tag、Release 和 Packagist 发布应在单独审核后执行。

维护者可在 GitHub Actions 中手动运行 [`Release`](.github/workflows/release.yml)：自动模式在首发时使用 `v1.0.0`，后续默认递增补丁版本；手动模式可指定 `X.Y.Z`。关闭“创建并发布 GitHub Release”时只执行版本解析、元数据检查、生成一致性检查、测试、代码风格和依赖安全审计，不创建 Tag 或 Release。发布说明直接取自 `CHANGELOG.md` 的 `Unreleased` 章节，正式发布后由 Packagist GitHub Hook 自动同步稳定版本。

## CI

[`CI`](.github/workflows/tests.yml) 在 `main` 分支推送、Pull Request 和手动触发时运行：

- PHP 8.1、8.2、8.3、8.4 矩阵；
- Composer 元数据严格校验；
- 官方目录生成结果一致性检查；
- 完全离线的 PHPUnit 测试；
- 独立的 PHP CS Fixer 代码风格检查；
- 同分支旧任务自动取消，Composer 依赖自动缓存。

[`Release`](.github/workflows/release.yml) 仅支持手动触发，发布前重复执行 Composer 校验、生成结果检查、离线测试、代码风格和依赖安全审计。只有明确开启发布选项时才会创建语义化版本 Tag 与 GitHub Release。

真实接口测试不会进入公共 CI，因为它依赖私有应用凭证、接口权限、有效 Token 和外部网关状态。

## 测试

安装开发依赖并执行默认离线检查：

```bash
composer install
composer validate --strict
composer generate:api-check
composer cs-check
composer test
composer audit
```

默认测试只使用固定时钟、模拟传输和本地目录快照，不读取 `.env`，也不会访问拼多多网关。当前基线为：

- 23 项测试；
- 1,254 个断言；
- 329 个 PHP 文件通过语法检查；
- 287 个请求类和 287 个客户端方法通过官方目录一致性检查。

### 真实接口测试

真实接口测试位于 `tests/Integration/`，使用独立 PHPUnit 配置，并且只提供只读目标：

```bash
cp .env.example .env
# 在 .env 中填写测试目标和应用凭证
composer test-integration
```

`PDD_INTEGRATION_TARGETS` 支持一个或多个逗号分隔目标：

| 目标 | 官方接口 | 所需凭证 |
| --- | --- | --- |
| `time-get` | `pdd.time.get` | `PDD_CLIENT_ID`、`PDD_CLIENT_SECRET` |
| `mall-info-get` | `pdd.mall.info.get` | 应用凭证及 `PDD_ACCESS_TOKEN` |

未设置目标、目标名称无效、所选目标缺少凭证、鉴权失败或接口返回失败时，测试都会失败；未选中的目标显示为跳过。

测试会打印实际 HTTP 方法、网关、脱敏后的原始请求表单和平台原始响应。`client_id`、`access_token` 和 `sign` 显示为 `[REDACTED]`，`client_secret` 不进入请求日志；平台原始响应仍可能包含真实店铺信息，请勿粘贴到公开环境。根目录 `.env` 已被 Git 忽略，真实凭证不得提交到仓库或发送到聊天中。

## 贡献

提交 Pull Request 前请遵守以下边界：

1. 接口分类、名称、参数和权限以拼多多官方文档为准，不根据名称猜测；
2. 不手工创建官方目录之外的接口分类；
3. 生成文件必须通过 `composer generate:api-check`；
4. 新增或修改封装行为时补充离线测试；
5. 不提交应用密钥、Access Token、业务响应、`.env`、日志或缓存；
6. 提交前运行 Composer 校验、生成检查、代码风格和默认测试。

## License

本项目采用 [MIT License](LICENSE)。使用本 SDK 不代表自动获得任何拼多多接口、权限包、商家数据或商标授权，开发者仍需遵守拼多多开放平台的协议、权限和数据合规要求。

“拼多多”及相关标识归其权利人所有。本项目为社区维护项目，不代表拼多多官方背书、认证或支持。

## 消息长连接接收

可通过 `PddClient::messages()` 在 Swoole 协程 worker 中接收消息。客户端只有在业务回调完成可靠保存并返回 `true` 后才发送 ACK，支持心跳和安全关闭，宿主负责重连退避。详见 [消息客户端说明](docs/message-client.md)。普通 RPC 使用不需要 Swoole。

离线协议测试和真实 Swoole 本地 TLS/WebSocket 测试纳入发布检查；真实平台握手、ACK 和重推尚待测试应用验收，不代表已接通平台。
