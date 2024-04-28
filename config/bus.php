<?php

declare(strict_types=1);

use Duyler\ActionBus\BusConfig;
use Duyler\ActionBus\Enum\ResetMode;
use Duyler\Config\FileConfig;

/**
 * @var FileConfig $config
 */
return [
    BusConfig::class => [
        'resetMode' => ResetMode::Selective,
    ],
];
