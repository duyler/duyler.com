<?php

declare(strict_types=1);

use App\Case\Page;
use App\Controller\PageController;
use Duyler\Router\Enum\Type;
use Duyler\Web\Build\Attribute\Route;
use Duyler\Web\Build\Controller;
use Duyler\Web\Enum\Method;

Controller::build(handler: PageController::class)
    ->actions(
        Page::GetComponentInfo,
        Page::GetContentByName,
        Page::GetComponentMenu,
        Page::GetGuideMenu,
    )
    ->attributes(
        new Route(
            method: Method::Get,
            pattern: '{$page}',
            where: ['page' => Type::Array],
        )
    );
