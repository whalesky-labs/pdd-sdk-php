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
require dirname(__DIR__, 2) . '/vendor/autoload.php';

$envFile = dirname(__DIR__, 2) . '/.env';
if (is_file($envFile)) {
    $values = parse_ini_file($envFile, false, INI_SCANNER_RAW);
    if ($values === false) {
        throw new RuntimeException('Unable to parse .env.');
    }

    foreach ($values as $name => $value) {
        if (getenv($name) !== false) {
            continue;
        }

        $value = (string) $value;
        putenv($name . '=' . $value);
        $_ENV[$name] = $value;
        $_SERVER[$name] = $value;
    }
}

$targetsValue = trim((string) getenv('PDD_INTEGRATION_TARGETS'));
if ($targetsValue === '') {
    throw new RuntimeException(
        'Set PDD_INTEGRATION_TARGETS before running live integration tests. See .env.example.',
    );
}

$targets = array_values(array_unique(array_filter(array_map('trim', explode(',', $targetsValue)))));
if ($targets === []) {
    throw new RuntimeException('PDD_INTEGRATION_TARGETS must contain at least one supported target.');
}

$supportedTargets = ['time-get', 'mall-info-get'];
$unknownTargets = array_diff($targets, $supportedTargets);
if ($unknownTargets !== []) {
    throw new RuntimeException('Unsupported integration target: ' . implode(', ', $unknownTargets));
}
