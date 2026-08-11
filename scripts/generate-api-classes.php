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
$root = dirname(__DIR__);
$checkOnly = in_array('--check', $argv, true);
$catalog = readJson($root . '/resources/official-api-catalog.json');
$verifiedParameters = readJson($root . '/resources/verified-required-parameters.json');
$categories = $catalog['categories'] ?? null;
$apis = $catalog['apis'] ?? null;
$requiredByApi = $verifiedParameters['apis'] ?? null;

if (!is_array($categories) || !is_array($apis) || !is_array($requiredByApi)) {
    fail('Official API generation resources are invalid.');
}

$categoriesById = [];
foreach ($categories as $category) {
    if (!is_array($category) || !isset($category['id'], $category['name'], $category['namespace'])) {
        fail('Official API catalog contains an invalid category.');
    }

    $categoriesById[(int) $category['id']] = $category;
}

foreach ($requiredByApi as $type => $requiredParameters) {
    if (!isset($apis[$type]) || !is_array($requiredParameters)) {
        fail(sprintf('Verified parameter definition for %s is invalid.', $type));
    }
}

$expectedFiles = [];
$documentation = [
    '# 官方接口目录',
    '',
    '> 本文件由 `composer generate:api` 根据拼多多官方接口目录自动生成，请勿手动修改。',
    '',
    sprintf('当前包含 **%d 个官方分类、%d 个接口**。', count($categories), count($apis)),
    '',
];

foreach ($categories as $category) {
    $categoryApis = array_filter(
        $apis,
        static fn(array $api): bool => (int) ($api['category_id'] ?? 0) === (int) $category['id'],
    );
    ksort($categoryApis, SORT_STRING);

    $documentation[] = sprintf('## %s', $category['name']);
    $documentation[] = '';
    $documentation[] = sprintf('命名空间：`PddSdk\\Api\\%s`，共 %d 个接口。', $category['namespace'], count($categoryApis));
    $documentation[] = '';
    $documentation[] = '| 官方接口 | 客户端方法 | 请求类 |';
    $documentation[] = '| --- | --- | --- |';

    foreach ($categoryApis as $type => $api) {
        $className = classNameForType($type);
        $methodName = lcfirst($className);
        $relativePath = sprintf('src/Api/%s/%s.php', $category['namespace'], $className);
        $requiredParameters = $requiredByApi[$type] ?? [];

        $expectedFiles[$relativePath] = renderApiClass(
            $type,
            $className,
            (string) $api['name'],
            (string) $category['namespace'],
            (string) $api['document_url'],
            $requiredParameters,
        );
        $documentation[] = sprintf(
            '| [`%s`](%s) | `%s()` | `%s` |',
            $type,
            $api['document_url'],
            $methodName,
            $className,
        );
    }

    $documentation[] = '';
}

$documentationTarget = 'docs/api-catalog.md';
$expectedFiles[$documentationTarget] = rtrim(implode(PHP_EOL, $documentation)) . PHP_EOL;

if ($checkOnly) {
    foreach ($expectedFiles as $relativePath => $expectedContent) {
        $absolutePath = $root . '/' . $relativePath;
        if (!is_file($absolutePath) || file_get_contents($absolutePath) !== $expectedContent) {
            fail(sprintf('Generated file %s is out of date. Run composer generate:api.', $relativePath));
        }
    }

    $actualApiFiles = listApiFiles($root . '/src/Api');
    $expectedApiFiles = array_filter(
        array_keys($expectedFiles),
        static fn(string $path): bool => str_starts_with($path, 'src/Api/'),
    );
    sort($expectedApiFiles, SORT_STRING);
    if ($actualApiFiles !== $expectedApiFiles) {
        fail('Generated API class set does not match the official API catalog. Run composer generate:api.');
    }

    fwrite(STDOUT, sprintf(
        "Validated %d generated API class(es) in %d official categories.\n",
        count($apis),
        count($categories),
    ));
    exit(0);
}

foreach ($expectedFiles as $relativePath => $content) {
    $absolutePath = $root . '/' . $relativePath;
    $directory = dirname($absolutePath);
    if (!is_dir($directory) && !mkdir($directory, 0777, true) && !is_dir($directory)) {
        fail(sprintf('Unable to create directory %s.', $directory));
    }
    if (file_put_contents($absolutePath, $content) === false) {
        fail(sprintf('Unable to write %s.', $absolutePath));
    }
}

$expectedApiFiles = array_filter(
    array_keys($expectedFiles),
    static fn(string $path): bool => str_starts_with($path, 'src/Api/'),
);
$expectedLookup = array_fill_keys($expectedApiFiles, true);
foreach (listApiFiles($root . '/src/Api') as $relativePath) {
    if (!isset($expectedLookup[$relativePath])) {
        fail(sprintf('Unexpected API class %s must be removed or added to the official catalog.', $relativePath));
    }
}

fwrite(STDOUT, sprintf(
    "Generated %d API class(es) in %d official categories.\n",
    count($apis),
    count($categories),
));

/**
 * @return array<string, mixed>
 */
function readJson(string $path): array
{
    $decoded = json_decode((string) file_get_contents($path), true, 512, JSON_THROW_ON_ERROR);
    if (!is_array($decoded)) {
        fail(sprintf('%s does not contain a JSON object.', $path));
    }

    return $decoded;
}

function classNameForType(string $type): string
{
    $className = implode('', array_map(
        static fn(string $segment): string => ucfirst($segment),
        explode('.', $type),
    ));
    if (!preg_match('/^[A-Z][A-Za-z0-9]*$/', $className)) {
        fail(sprintf('Official API type %s cannot be converted to a PHP class name.', $type));
    }

    return $className;
}

/**
 * @param list<string> $requiredParameters
 */
function renderApiClass(
    string $type,
    string $className,
    string $name,
    string $namespace,
    string $documentUrl,
    array $requiredParameters,
): string {
    $lines = [
        '<?php',
        '',
        'declare(strict_types=1);',
        '/**',
        ' * This file is part of Pinduoduo Open Platform SDK for PHP.',
        ' *',
        ' * @link     https://github.com/whalesky-labs/pdd-sdk-php',
        ' * @document https://github.com/whalesky-labs/pdd-sdk-php',
        ' * @contact  westng',
        ' * @license  https://github.com/whalesky-labs/pdd-sdk-php#license',
        ' */',
        '',
        sprintf('namespace PddSdk\\Api\\%s;', $namespace),
        '',
        'use PddSdk\\Api\\ApiMetadata;',
        'use PddSdk\\Api\\OfficialCategory;',
        'use PddSdk\\Client\\RpcRequest;',
        '',
        '/**',
        sprintf(' * %s。', str_replace('*/', '* /', $name)),
        ' *',
        ' * @generated by scripts/generate-api-classes.php',
        sprintf(' * @see %s', $documentUrl),
        ' */',
        sprintf('final class %s extends RpcRequest', $className),
        '{',
        '    public static function metadata(): ApiMetadata',
        '    {',
        '        return new ApiMetadata(',
        sprintf("            type: '%s',", addslashes($type)),
        sprintf("            name: '%s',", addslashes($name)),
        sprintf('            category: OfficialCategory::%s,', $namespace),
        sprintf("            documentUrl: '%s',", addslashes($documentUrl)),
        '        );',
        '    }',
    ];

    if ($requiredParameters !== []) {
        $lines[] = '';
        $lines[] = '    protected function validate(array $parameters): void';
        $lines[] = '    {';
        $lines[] = '        $this->requireParameters(';
        $lines[] = '            $parameters,';
        foreach ($requiredParameters as $requiredParameter) {
            $lines[] = sprintf("            '%s',", addslashes((string) $requiredParameter));
        }
        $lines[] = '        );';
        $lines[] = '    }';
    }

    $lines[] = '}';

    return implode(PHP_EOL, $lines) . PHP_EOL;
}

/**
 * @return list<string>
 */
function listApiFiles(string $apiRoot): array
{
    $files = [];
    $root = dirname($apiRoot, 2) . '/';
    $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($apiRoot));
    foreach ($iterator as $fileInfo) {
        if (!$fileInfo->isFile() || $fileInfo->getExtension() !== 'php') {
            continue;
        }
        if (in_array($fileInfo->getBasename(), ['ApiMetadata.php', 'OfficialCategory.php'], true)) {
            continue;
        }

        $files[] = substr($fileInfo->getPathname(), strlen($root));
    }
    sort($files, SORT_STRING);

    return $files;
}

function fail(string $message): never
{
    fwrite(STDERR, $message . PHP_EOL);
    exit(1);
}
