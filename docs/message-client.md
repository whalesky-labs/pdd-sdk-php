# PHP 消息长连接接收

`PddClient::messages()` 提供可选的 PHP 消息接收客户端。默认传输使用 Swoole 协程 WebSocket，不依赖 Java 或 Hyperf；HTTP/RPC、OAuth、签名和 PHP-FPM 原有调用方式不变。SDK 负责协议与单次连接生命周期，业务入库、队列、订单映射和重连策略由调用方实现。

## 运行与最小接入

接收 worker 需要 64 位 PHP 8.1+、支持 OpenSSL 的 Swoole（建议使用 CI 验证的 Swoole 6.x）、可信 CA 和校准的系统时钟，在 CLI 协程内运行。普通 RPC 不需要 Swoole。以下示例仅在调用方定义可靠保存函数后可运行；不要把消息接收放进 PHP-FPM 请求生命周期。

```php
<?php
require __DIR__ . '/vendor/autoload.php';

use PddSdk\Client\PddClient;
use PddSdk\Message\Message;

Swoole\Coroutine\run(function (): void {
    $client = new PddClient(getenv('PDD_CLIENT_ID'), getenv('PDD_CLIENT_SECRET'));
    $client->messages()->listen(
        static function (Message $message): bool {
            // 调用方实现：事务提交或可靠队列确认后才返回 true。
            // 重复业务事件也必须确认已持久化，不能只凭消息 id 判重。
            return persistMessageIdempotently($message) === true;
        },
        static fn(): bool => true,
    );
});
```

`listen($handler, $keepRunning)` 管理一个会话；异常结束后需要宿主再次调用。只有严格的 `true` 才发送 ACK；false、null、1 或异常均不会 ACK，并结束连接。已处理成功但 ACK 写出失败也会抛异常、关闭连接，下一次投递仍调用业务回调。即使 send 成功也不等于服务端已经收到 ACK，调用方始终需要业务幂等。

`Message` 提供 `id`（正的有符号 64 位整数）、`type`、`mallId`（十进制字符串）、`content` 和可空的 `sendTime`。信封 ID 超出 9223372036854775807 或以浮点数传入时拒绝，绝不截断；正文 JSON 超出 PHP 整数范围的数字保留为字符串。存在 `content.mall_id` 时必须匹配信封 `mallID`。消息大小上限为 1 MiB，JSON 深度上限为 32；未知命令、无效 JSON、二进制帧和不支持的分片序列均关闭当前会话。

## 停止与重连

- `$keepRunning` 为 false 时不新建连接；运行期间每轮读取前检查。单次 receive 最多等待 1 秒，握手和发送各有 10 秒超时。停止信号到达时，已进入回调的消息仍完成回调；若返回 true，发送 ACK 后退出。业务回调本身必须有超时，SDK 不强行中断事务。
- 宿主通过信号处理器更新共享布尔变量；不要从信号处理器并发操作 socket。`listen()` 不可重入，同一 transport 不可跨接收 worker 共享。
- 宿主捕获会话异常，在运行标志仍为 true 时以有上限的指数退避加随机抖动重连（例如 1、2、4 秒，最多 30 秒）。等待期间也应检查停止标志，避免紧密重试。
- 每次 `listen()` 重新读取时间生成鉴权路径，同一实例保证时间戳递增。凭据变更时重新创建 `PddClient`/receiver。系统时间严重偏差仍可能导致鉴权失败，必须修正时钟。
- 默认每 5 秒发送应用 HeartBeat，60 秒未收到完整应用帧则断开。计时使用单调时钟，系统时间回拨不会阻止超时。WebSocket ping/pong 不算应用心跳回复；慢业务回调会阻塞心跳，建议只做短事务或可靠入队。
- SDK 不持久化游标，不承诺断线后恢复所有事件；平台重投规则、保留期及积压监控需要业务方共同管理。

可向 `messages($transport)` 注入 `MessageTransportInterface`：`connect()` 接收敏感鉴权路径；`receive()` 返回完整文本帧或超时的 null；连接/发送失败必须抛异常；`close()` 必须幂等，且应避免抛异常。若关闭也失败，SDK 保留先发生的业务/连接异常。默认驱动支持重复关闭、分片重组、ping/pong、带掩码的客户端帧和关闭帧。

默认连接 `message-api.pinduoduo.com:443`，强制 TLS 证书链与主机名验证，拒绝自签名证书。`SwooleMessageTransport($host, $port, $caFile)` 可指定可信私有 CA，用于本地 TLS 测试；不能关闭校验。真实凭据只能发送到经过信任确认的服务端。

## 协议证据与验证边界

2026-10-05 核对[官方使用指南](https://open.pinduoduo.com/application/document/browse?idStr=D3B6DBF3A5CB57E5)（页面更新时间 2026-01-15）。官方公开内容确认：

- WebSocket 服务地址，以及应用订阅、用户授权、为用户开通消息服务三个前提。
- 处理完成后 ACK，异常不 ACK；会进行延迟重投，未消费消息保留 7 天。
- 官方 Java SDK 管理心跳与重连；本 PHP SDK 明确把重连退避交给宿主。

公开指南未给出连接摘要算法、完整消息信封、ACK JSON 格式，亦未承诺重投使用相同消息 ID。因此不能把 id 当作跨重投唯一业务事件键；应结合店铺、事件类型及业务主键/版本实现幂等。

当前鉴权路径 `/message/{clientId}/{毫秒时间戳}/{digest}`、digest（小写 MD5 十六进制文本的 Base64）、`Common`/`HeartBeat`/`Ack` 帧与 ACK 的 `id/commandType/time/sendTime/type/mallID` 字段，保留自草稿并对照了[第三方参考实现](https://github.com/niltor/open-pdd-net-sdk/blob/dev/src/AspNetCore/PddSocketHostServiceBase.cs)。这只是实现参考，**不是官方兼容性证明**。接入仍需测试应用下载的官方 SDK 或真实平台验收核对。

验证分层：

1. `composer test`：完整 SDK 离线回归，含精度、严格确认、ACK 失败后重复投递、断线、停止、鉴权刷新、心跳及超时。
2. `composer test-message-transport`：真实 Swoole 客户端连接本地 TLS WebSocket fixture，验证证书链/主机名拒绝、握手拒绝、分片、ping/pong、掩码、超时、远端关闭和重复关闭；这不是平台联调。CI 和发布工作流要求扩展存在并执行此项。
3. `composer generate:api-check`、`composer cs-check`、`composer validate --strict`、`composer audit`：生成一致性、代码规范、元数据与依赖审计。
4. **未验证**：真实平台鉴权、真实事件字段、ACK 被平台接纳、实际延迟重投/ID 变化、断线积压恢复。当前没有测试应用凭据、订阅和店铺授权条件，不声称已经接通拼多多。上线前需逐项验收并检查平台会话、推送日志和积压监控。

本机 MAMP PHP 8.2.26 + Swoole 6.2.2 在 TLS 主机名验证处发生原生崩溃（两个扩展报告不同 OpenSSL 版本）；不要以关闭 TLS 校验规避，使用一致构建的 PHP/Swoole/OpenSSL 环境。

## 日志与业务责任

SDK 不记录 clientSecret、签名连接地址或完整消息正文。底层 PHP warning 被抑制，驱动抛出固定错误文本；业务回调/自定义 transport 的异常由调用方控制。不要直接记录异常堆栈、对象 dump 或第三方网络调试信息，它们可能包含配置/消息；PHP 8.1 不提供有效的 SensitiveParameter 参数脱敏。仅记录自定义错误类别、时间和脱敏统计。

业务持久化、队列确认、幂等、订单查询延迟、死信处理及数据补偿都属于调用方。SDK 不代表平台官方背书。
