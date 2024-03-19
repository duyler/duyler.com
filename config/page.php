<?php

declare(strict_types=1);

use App\Config\GetPageByNameActionConfig;
use App\Config\MarkdownConverterConfig;
use Duyler\Config\FileConfig;

/**
 * @var FileConfig $config
 */
return [
    GetPageByNameActionConfig::class => [
        'pagesDirPath' => $config->env('PROJECT_ROOT') . 'pages',
    ],
    MarkdownConverterConfig::class => [
        'converterConfig' => [

        ],
    ],
];
