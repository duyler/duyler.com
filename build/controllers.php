<?php

declare(strict_types=1);

use App\Contract\ComponentInfo;
use App\Contract\ComponentMenu;
use App\Contract\GuideMenu;
use App\Contract\Page;
use App\Controller\PageController;
use Duyler\Router\Enum\Type;
use Duyler\Web\Build\Attribute\Route;
use Duyler\Web\Build\Controller;
use Duyler\Web\Enum\Method;

Controller::build(handler: PageController::class)
    ->contracts([
        ComponentInfo::class,
        Page::class,
        ComponentMenu::class,
        GuideMenu::class,
    ])
    ->attributes(
        new Route(
            method: Method::Get,
            pattern: '{$page}',
            where: ['page' => Type::Array],
        )
    );
