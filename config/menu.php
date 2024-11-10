<?php

declare(strict_types=1);

use App\Config\ComponentInfoList;
use App\Contract\ComponentInfo;
use App\Contract\ComponentMenu;
use App\Contract\GuideMenu;
use App\Contract\MenuItem;
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
            ),
            new MenuItem(
                name: 'DI',
                id: 'di',
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
                name: 'Configuration',
                id: 'configuration',
            ),
            new MenuItem(
                name: 'Actions',
                id: 'actions',
            ),
            new MenuItem(
                name: 'Events',
                id: 'events',
            ),
            new MenuItem(
                name: 'Triggers',
                id: 'triggers',
            ),
            new MenuItem(
                name: 'Controllers',
                id: 'controllers',
            ),
            new MenuItem(
                name: 'Attributes',
                id: 'attributes',
            ),
            new MenuItem(
                name: 'State handling',
                id: 'state-handling',
            ),
            new MenuItem(
                name: 'AOP',
                id: 'aop',
            ),
            new MenuItem(
                name: 'Database',
                id: 'database',
            ),
            new MenuItem(
                name: 'Async',
                id: 'async',
            ),
        ],
    ],
    ComponentInfoList::class => [
        'list' => [
            'event-bus' => new ComponentInfo(
                'https://github.com/duyler/event-bus',
            ),
        ],
    ],
];
