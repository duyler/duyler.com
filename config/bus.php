<?php

declare(strict_types=1);

use Duyler\Config\FileConfig;
use Duyler\EventBus\BusConfig;
use Duyler\EventBus\Enum\ResetMode;

/**
 * @var FileConfig $config
 */
return [
    BusConfig::class => [
        'resetMode' => ResetMode::Selective,
    ],
];
