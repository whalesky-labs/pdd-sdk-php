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
use PhpCsFixer\Config;
use PhpCsFixer\Finder;

$header = <<<'EOF'
This file is part of Pinduoduo Open Platform SDK for PHP.

@link     https://github.com/whalesky-labs/pdd-sdk-php
@document https://github.com/whalesky-labs/pdd-sdk-php
@contact  westng
@license  https://github.com/whalesky-labs/pdd-sdk-php#license
EOF;

$finder = Finder::create()
    ->in([__DIR__ . '/src', __DIR__ . '/tests', __DIR__ . '/scripts'])
    ->name('*.php')
    ->append([__FILE__]);

return (new Config())
    ->setRiskyAllowed(true)
    ->setRules([
        '@PER-CS2.0' => true,
        'header_comment' => [
            'comment_type' => 'PHPDoc',
            'header' => $header,
            'location' => 'after_declare_strict',
            'separate' => 'none',
        ],
        'array_syntax' => ['syntax' => 'short'],
        'declare_strict_types' => true,
        'ordered_imports' => ['sort_algorithm' => 'alpha'],
        'single_quote' => true,
    ])
    ->setFinder($finder);
