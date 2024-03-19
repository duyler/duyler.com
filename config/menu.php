<?php

declare(strict_types=1);

use App\Action\GetComponentInfoAction;
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
                icon: 'bi bi-book',
            ),
            new MenuItem(
                name: 'Architecture',
                id: 'architecture',
                icon: 'bi bi-stack',
            ),
        ],
    ],
    GetComponentInfoAction::class => [
        'componentInfoList' => [
            'event-bus' => new ComponentInfo(
                'https://github.com/duyler/event-bus'
            )
        ],
    ],
];
