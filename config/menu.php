<?php

declare(strict_types=1);

use App\Contract\ComponentInfo;
use App\Contract\ComponentMenu;
use App\Contract\GuideMenu;
use App\Contract\MenuItem;
use App\Handler\GetComponentInfo;
use Duyler\Config\FileConfig;

/**
 * @var FileConfig $config
 */
return [
    ComponentMenu::class => [
        'items' => [
            new MenuItem(
                name: 'Event Bus',
                id: 'event-bus',
                icon: 'bi bi-arrow-repeat',
            ),
            new MenuItem(
                name: 'DI',
                id: 'di',
                icon: 'bi bi-boxes',
            ),
            new MenuItem(
                name: 'Web',
                id: 'web',
                icon: 'bi bi-browser-safari',
            ),
        ],
    ],
    GuideMenu::class => [
        'items' => [
            new MenuItem(
                name: 'Get Started',
                id: 'get-started',
            ),
            new MenuItem(
                name: 'Actions',
                id: 'actions',
            ),
            new MenuItem(
                name: 'Attributes',
                id: 'attributes',
            ),
            new MenuItem(
                name: 'Controllers',
                id: 'controllers',
            ),
            new MenuItem(
                name: 'State handling',
                id: 'state-handling',
            ),
            new MenuItem(
                name: 'AOP',
                id: 'aop',
            ),
        ],
    ],
    GetComponentInfo::class => [
        'componentInfoList' => [
            'event-bus' => new ComponentInfo(
                'https://github.com/duyler/event-bus',
            ),
        ],
    ],
];
