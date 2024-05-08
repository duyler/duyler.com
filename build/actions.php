<?php

declare(strict_types=1);

use App\Action\GetComponentInfoAction;
use App\Action\GetComponentMenuAction;
use App\Action\GetGuideMenuAction;
use App\Action\GetContentByNameAction;
use App\Case\Page;
use App\Contract\ComponentInfo;
use App\Contract\ComponentMenu;
use App\Contract\GuideMenu;
use App\Contract\Content;
use App\Dto\ContentDto;
use App\Factory\ContentDtoFactory;
use App\Provider\MarkdownConverterEnvironmentProvider;
use Duyler\Framework\Build\Action\Action;
use Duyler\Http\Http;
use Duyler\Multiprocess\Build\Attribute\Async;
use Duyler\Web\Build\Attribute\Route;
use Duyler\Web\Build\Attribute\View;
use Duyler\Web\Enum\Method;
use League\CommonMark\Environment\Environment;
use League\CommonMark\Environment\EnvironmentInterface;

Action::build(id: Page::SayHello, handler: function () {})
    ->externalAccess(true)
    ->attributes(
        new Route(
            method: Method::Get,
            pattern: '/',
        ),
        new View(
            name: 'home',
        ),
    );

Action::build(id: Page::GetContentByName, handler: GetContentByNameAction::class)
    ->require(Http::GetRequest, Http::GetRoute)
    ->bind([EnvironmentInterface::class => Environment::class])
    ->providers([Environment::class => MarkdownConverterEnvironmentProvider::class])
    ->externalAccess(true)
    ->contract(Content::class)
    ->argument(ContentDto::class)
    ->argumentFactory(ContentDtoFactory::class);

Action::build(id: Page::GetComponentMenu, handler: GetComponentMenuAction::class)
    ->externalAccess(true)
    ->contract(ComponentMenu::class);

Action::build(id: Page::GetGuideMenu, handler: GetGuideMenuAction::class)
    ->externalAccess(true)
    ->contract(GuideMenu::class);

Action::build(id: Page::GetComponentInfo, handler: GetComponentInfoAction::class)
    ->require(Page::GetContentByName)
    ->externalAccess(true)
    ->argument(Content::class)
    ->contract(ComponentInfo::class);
