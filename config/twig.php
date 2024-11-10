<?php

declare(strict_types=1);

use Duyler\TwigWrapper\Extensions\PhpSyntaxHighlightExtension;
use Duyler\TwigWrapper\TwigConfigDto;
use Duyler\Config\FileConfig;

/** @var FileConfig $config */
return [
    TwigConfigDto::class => [
        'pathToViews' => $config->path('resources/views'),
        'extensions' => [
            PhpSyntaxHighlightExtension::class,
        ],
    ],
];
