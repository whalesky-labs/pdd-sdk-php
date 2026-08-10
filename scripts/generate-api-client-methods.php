<?php

declare(strict_types=1);

use PddSdk\Api\ApiMetadata;
use PddSdk\Client\RpcRequest;

require dirname(__DIR__) . '/vendor/autoload.php';

$checkOnly = in_array('--check', $argv, true);
$root = dirname(__DIR__);
$catalog = json_decode(
    (string) file_get_contents($root . '/resources/official-api-catalog.json'),
    true,
    512,
    JSON_THROW_ON_ERROR,
);
$catalogApis = $catalog['apis'] ?? null;
if (!is_array($catalogApis)) {
    fail('Official API catalog is invalid.');
}

$apiFiles = [];
$iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($root . '/src/Api'));
foreach ($iterator as $fileInfo) {
    if (!$fileInfo->isFile() || $fileInfo->getExtension() !== 'php') {
        continue;
    }

    if (in_array($fileInfo->getBasename(), ['ApiMetadata.php', 'OfficialCategory.php'], true)) {
        continue;
    }

    $apiFiles[] = $fileInfo->getPathname();
}
sort($apiFiles, SORT_STRING);

$methods = [];
$imports = [];
$coveredTypes = [];
foreach ($apiFiles as $apiFile) {
    $relativePath = substr($apiFile, strlen($root . '/src/'));
    $className = 'PddSdk\\' . str_replace(['/', '.php'], ['\\', ''], $relativePath);
    if (!is_subclass_of($className, RpcRequest::class)) {
        fail(sprintf('%s must extend %s.', $className, RpcRequest::class));
    }

    /** @var ApiMetadata $metadata */
    $metadata = $className::metadata();
    $catalogApi = $catalogApis[$metadata->type] ?? null;
    if (!is_array($catalogApi)) {
        fail(sprintf('%s is not present in the official API catalog.', $metadata->type));
    }
    if (isset($coveredTypes[$metadata->type])) {
        fail(sprintf('Official API type %s is implemented more than once.', $metadata->type));
    }
    $coveredTypes[$metadata->type] = true;

    $expectedNamespace = (string) ($catalogApi['namespace'] ?? '');
    $actualNamespace = substr($className, 0, strrpos($className, '\\'));
    $officialNamespace = sprintf('PddSdk\\Api\\%s', $expectedNamespace);
    if ($actualNamespace !== $officialNamespace) {
        fail(sprintf(
            '%s belongs to official category %s and must be placed under Api/%s.',
            $metadata->type,
            $catalogApi['category_name'] ?? '',
            $expectedNamespace,
        ));
    }

    if ($metadata->category->value !== (int) ($catalogApi['category_id'] ?? 0)) {
        fail(sprintf('%s has an incorrect official category ID.', $metadata->type));
    }
    if ($metadata->category->label() !== (string) ($catalogApi['category_name'] ?? '')) {
        fail(sprintf('%s has an incorrect official category name.', $metadata->type));
    }
    if ($metadata->name !== (string) ($catalogApi['name'] ?? '')) {
        fail(sprintf('%s has an incorrect official API name.', $metadata->type));
    }
    if ($metadata->documentUrl !== (string) ($catalogApi['document_url'] ?? '')) {
        fail(sprintf('%s has an incorrect official document URL.', $metadata->type));
    }

    $shortName = substr($className, strrpos($className, '\\') + 1);
    $methodName = lcfirst($shortName);
    if (isset($methods[$methodName])) {
        fail(sprintf('Generated method name %s is duplicated.', $methodName));
    }

    $methods[$methodName] = $shortName;
    $imports[$shortName] = $className;
}

$missingTypes = array_diff(array_keys($catalogApis), array_keys($coveredTypes));
if ($missingTypes !== []) {
    sort($missingTypes, SORT_STRING);
    fail(sprintf('Official API type(s) have no request class: %s.', implode(', ', $missingTypes)));
}

uasort($imports, static function (string $left, string $right): int {
    $leftSegments = explode('\\', $left);
    $rightSegments = explode('\\', $right);
    foreach ($leftSegments as $index => $leftSegment) {
        if (!isset($rightSegments[$index])) {
            return 1;
        }

        $comparison = strnatcasecmp($leftSegment, $rightSegments[$index]);
        if ($comparison !== 0) {
            return $comparison;
        }
    }

    return count($leftSegments) <=> count($rightSegments);
});
ksort($methods, SORT_STRING);

$lines = [
    '<?php',
    '',
    'declare(strict_types=1);',
    '',
    'namespace PddSdk\\Generated;',
    '',
];
foreach ($imports as $className) {
    $lines[] = 'use ' . $className . ';';
}
$lines[] = 'use PddSdk\\Client\\PendingRequest;';
$lines[] = '';
$lines[] = 'trait ApiClientMethods';
$lines[] = '{';
foreach ($methods as $methodName => $shortName) {
    $lines[] = sprintf('    public function %s(): PendingRequest', $methodName);
    $lines[] = '    {';
    $lines[] = sprintf('        return $this->createPendingRequest(%s::class);', $shortName);
    $lines[] = '    }';
    $lines[] = '';
}
if (end($lines) === '') {
    array_pop($lines);
}
$lines[] = '}';
$generated = implode(PHP_EOL, $lines) . PHP_EOL;
$target = $root . '/src/Generated/ApiClientMethods.php';

if ($checkOnly) {
    if (!is_file($target) || file_get_contents($target) !== $generated) {
        fail('Generated API client methods are out of date. Run composer generate:api-client.');
    }

    fwrite(STDOUT, sprintf("Validated %d generated API method(s).\n", count($methods)));
    exit(0);
}

if (file_put_contents($target, $generated) === false) {
    fail(sprintf('Unable to write %s.', $target));
}

fwrite(STDOUT, sprintf("Generated %d API method(s).\n", count($methods)));

function fail(string $message): never
{
    fwrite(STDERR, $message . PHP_EOL);
    exit(1);
}
