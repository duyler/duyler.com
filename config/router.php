<?php

declare(strict_types=1);

use Duyler\Config\FileConfig;
use Duyler\Router\RouterConfig;

/**
 * @var FileConfig $config
 */
return [
    RouterConfig::class => [
        'languages' => [
            'en',
            'ru',
        ],
    ],
];
