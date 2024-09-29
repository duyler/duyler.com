<?php

declare(strict_types=1);

use App\ErrorHandler\InternalServerErrorHandler;
use App\ErrorHandler\NotFoundErrorHandler;
use Duyler\Config\FileConfig;
use Duyler\Builder\ApplicationLoader;
use Duyler\Http\ErrorHandler\ErrorHandlerConfig;

/**
 * @var FileConfig $config
 */
return [
    ApplicationLoader::class => [
        'packages' => [
            \Duyler\Http\Loader::class,
            \Duyler\Web\Loader::class,
            \Duyler\Multiprocess\Loader::class,
        ],
    ],
    ErrorHandlerConfig::class => [
        'errorHandlers' => [
            NotFoundErrorHandler::class,
            InternalServerErrorHandler::class,
        ],
    ]
];
