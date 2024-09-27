<?php

declare(strict_types=1);

use App\Action\Page;
use Duyler\Router\Enum\Type;
use Duyler\Web\Build\Attribute\Route;
use Duyler\Web\Build\Controller;
use Duyler\Web\Controller\Context;
use Duyler\Web\Enum\HttpMethod;

Controller::build(
        handler: function (Context $context) {
            return $context->render('docs.page');
        }
    )
    ->actions(
        Page::GetContentByName,
    )
    ->attributes(
        new Route(
            method: HttpMethod::Get,
            pattern: '{$page}',
            where: ['page' => Type::Array],
        ),
    );
