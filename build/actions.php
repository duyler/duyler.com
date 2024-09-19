<?php

declare(strict_types=1);

use App\Action\Page;
use App\Contract\ComponentInfo;
use App\Contract\ComponentMenu;
use App\Contract\Content;
use App\Contract\GuideMenu;
use App\Dto\ContentDto;
use App\Factory\ContentDtoFactory;
use App\Handler\GetComponentInfo;
use App\Handler\GetComponentMenu;
use App\Handler\GetContentByName;
use App\Handler\GetGuideMenu;
use App\Provider\MarkdownConverterEnvironmentProvider;
use Duyler\Builder\Build\Action\Action;
use Duyler\Http\Http;
use Duyler\Web\Build\Attribute\Route;
use Duyler\Web\Build\Attribute\View;
use Duyler\Web\Enum\Method;
use League\CommonMark\Environment\Environment;
use League\CommonMark\Environment\EnvironmentInterface;

Action::build(id: Page::SayHello, handler: function () {})
    ->attributes(
        new Route(
            method: Method::Get,
            pattern: '/',
        ),
        new View(
            name: 'home',
        ),
    );

Action::build(id: Page::GetContentByName, handler: GetContentByName::class)
    ->require(Http::GetRequest, Http::GetRoute)
    ->config([
        EnvironmentInterface::class => Environment::class,
        Environment::class => MarkdownConverterEnvironmentProvider::class,
    ])
    ->contract(Content::class)
    ->argument(ContentDto::class)
    ->argumentFactory(ContentDtoFactory::class);

Action::build(id: Page::GetComponentMenu, handler: GetComponentMenu::class)
    ->contract(ComponentMenu::class);

Action::build(id: Page::GetGuideMenu, handler: GetGuideMenu::class)
    ->contract(GuideMenu::class);

Action::build(id: Page::GetComponentInfo, handler: GetComponentInfo::class)
    ->require(Page::GetContentByName)
    ->argument(Content::class)
    ->contract(ComponentInfo::class);
