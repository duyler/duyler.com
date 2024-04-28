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
                name: 'Action Bus',
                id: 'action-bus',
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
    GetComponentInfoAction::class => [
        'componentInfoList' => [
            'action-bus' => new ComponentInfo(
                'https://github.com/duyler/action-bus'
            )
        ],
    ],
];
