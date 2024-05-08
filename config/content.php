<?php

declare(strict_types=1);

use App\Config\DocsStorageConfig;
use App\Config\MarkdownConverterConfig;
use Duyler\Config\FileConfig;

/**
 * @var FileConfig $config
 */
return [
    DocsStorageConfig::class => [
        'pagesPath' => 'https://github.com/duyler/docs/raw/main/pages/',
    ],
    MarkdownConverterConfig::class => [
        'converterConfig' => [

        ],
    ],
];
