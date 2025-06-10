<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Rector\Set\ValueObject\SetList;
use Rector\ValueObject\PhpVersion;

return RectorConfig::configure()
    ->withPaths([
        __DIR__ . '/Api',
        __DIR__ . '/Model',
        __DIR__ . '/Setup',
        __DIR__ . '/Test',
        __DIR__ . '/view',
        __DIR__ . '/ViewModel',
    ])
    ->withPhpVersion(PhpVersion::PHP_84)
    ->withSets([
        SetList::PHP_84,
    ])
    ->withPHPStanConfigs(phpstanConfigs: [__DIR__ . '/phpstan.neon']);
