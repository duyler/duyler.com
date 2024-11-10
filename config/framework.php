<?php

declare(strict_types=1);

use App\ErrorHandler\InternalServerErrorHandler;
use App\ErrorHandler\NotFoundErrorHandler;
use Duyler\Builder\Config\PackagesConfig;
use Duyler\Config\FileConfig;
use Duyler\Http\ErrorHandler\ErrorHandlerConfig;

/**
 * @var FileConfig $config
 */
return [
    PackagesConfig::class => [
        'packages' => [
            \Duyler\Http\Loader::class,
            \Duyler\Web\Loader::class,
            \Duyler\IO\Loader::class,
        ],
    ],
    ErrorHandlerConfig::class => [
        'errorHandlers' => [
            NotFoundErrorHandler::class,
            InternalServerErrorHandler::class,
        ],
    ]
];
