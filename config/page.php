<?php

declare(strict_types=1);

use App\Config\GetContentByNameActionConfig;
use App\Config\MarkdownConverterConfig;
use Duyler\Config\FileConfig;

/**
 * @var FileConfig $config
 */
return [
    GetContentByNameActionConfig::class => [
        'pagesDirPath' => 'https://github.com/duyler/docs/raw/main/pages',
    ],
    MarkdownConverterConfig::class => [
        'converterConfig' => [

        ],
    ],
];
