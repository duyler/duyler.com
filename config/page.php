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
        'pagesDirPath' => $config->env('PROJECT_ROOT') . 'pages',
    ],
    MarkdownConverterConfig::class => [
        'converterConfig' => [

        ],
    ],
];
