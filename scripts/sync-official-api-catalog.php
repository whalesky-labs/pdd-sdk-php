<?php

declare(strict_types=1);

const API_BASE = 'https://open-api.pinduoduo.com';
const CATEGORY_NAMESPACES = [
    1 => 'Order',
    2 => 'AfterSales',
    3 => 'Logistics',
    4 => 'Virtual',
    5 => 'Goods',
    12 => 'Ddk',
    13 => 'DdkTools',
    15 => 'Marketing',
    16 => 'Voucher',
    17 => 'Invoice',
    18 => 'Shop',
    20 => 'Tools',
    21 => 'Warehouse',
    22 => 'Message',
    23 => 'ElectronicWaybill',
    24 => 'Finance',
    26 => 'Sms',
    30 => 'ServiceMarket',
    32 => 'SmsProvider',
    43 => 'WaybillPrinting',
    46 => 'Store',
    48 => 'International',
    49 => 'Travel',
    57 => 'WeMedia',
    62 => 'VideoRecommendation',
    64 => 'ArkDataTransfer',
    65 => 'MerchantShipping',
];

$categoriesPayload = requestJson('GET', API_BASE . '/pop/doc/category/list');
$categories = $categoriesPayload['result'] ?? null;
if (!is_array($categories)) {
    fail('Official category response does not contain a result array.');
}

$catalog = [
    'source' => 'https://open.pinduoduo.com/application/document/api',
    'categories' => [],
    'apis' => [],
];

foreach ($categories as $category) {
    if (!is_array($category) || !isset($category['id'], $category['name'])) {
        fail('Official category response contains an invalid item.');
    }

    $categoryId = (int) $category['id'];
    $namespace = CATEGORY_NAMESPACES[$categoryId] ?? null;
    if ($namespace === null) {
        fail(sprintf('Official category %d (%s) has no namespace mapping.', $categoryId, $category['name']));
    }

    $catalog['categories'][] = [
        'id' => $categoryId,
        'name' => (string) $category['name'],
        'namespace' => $namespace,
    ];

    $listPayload = requestJson(
        'POST',
        API_BASE . '/pop/doc/info/list/byCat',
        ['id' => $categoryId],
    );
    $documents = $listPayload['result']['docList'] ?? null;
    if (!is_array($documents)) {
        fail(sprintf('Official API list for category %d is invalid.', $categoryId));
    }

    foreach ($documents as $document) {
        if (!is_array($document) || !isset($document['id'], $document['apiName'])) {
            fail(sprintf('Official API list for category %d contains an invalid item.', $categoryId));
        }

        $type = (string) $document['id'];
        if (isset($catalog['apis'][$type])) {
            fail(sprintf('Official API type %s appears in more than one category.', $type));
        }

        $catalog['apis'][$type] = [
            'name' => (string) $document['apiName'],
            'category_id' => $categoryId,
            'category_name' => (string) $category['name'],
            'namespace' => $namespace,
            'document_url' => 'https://open.pinduoduo.com/application/document/api?id=' . rawurlencode($type),
            'updated_at' => isset($document['updatedAt']) ? (int) $document['updatedAt'] : null,
        ];
    }
}

usort($catalog['categories'], static fn(array $left, array $right): int => $left['id'] <=> $right['id']);
ksort($catalog['apis'], SORT_STRING);

$target = dirname(__DIR__) . '/resources/official-api-catalog.json';
$json = json_encode($catalog, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_THROW_ON_ERROR);
if (file_put_contents($target, $json . PHP_EOL) === false) {
    fail(sprintf('Unable to write %s.', $target));
}

fwrite(STDOUT, sprintf(
    "Synced %d official categories and %d APIs to %s.\n",
    count($catalog['categories']),
    count($catalog['apis']),
    $target,
));

/**
 * @param array<string, mixed>|null $payload
 *
 * @return array<string, mixed>
 */
function requestJson(string $method, string $url, ?array $payload = null): array
{
    $headers = [
        'Accept: application/json',
        'User-Agent: pdd-sdk-php-catalog-sync/1.0',
    ];
    $options = [
        'http' => [
            'method' => $method,
            'header' => implode("\r\n", $headers),
            'ignore_errors' => true,
            'timeout' => 30,
        ],
    ];

    if ($payload !== null) {
        $options['http']['header'] .= "\r\nContent-Type: application/json";
        $options['http']['content'] = json_encode($payload, JSON_THROW_ON_ERROR);
    }

    $body = file_get_contents($url, false, stream_context_create($options));
    if ($body === false) {
        fail(sprintf('Unable to request %s.', $url));
    }

    $decoded = json_decode($body, true, 512, JSON_THROW_ON_ERROR);
    if (!is_array($decoded) || ($decoded['success'] ?? false) !== true) {
        fail(sprintf('Official endpoint returned an error for %s.', $url));
    }

    return $decoded;
}

function fail(string $message): never
{
    fwrite(STDERR, $message . PHP_EOL);
    exit(1);
}
