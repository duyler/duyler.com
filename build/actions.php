<?php

declare(strict_types=1);

use App\Action\GetComponentInfoAction;
use App\Action\GetComponentMenuAction;
use App\Action\GetGuideMenuAction;
use App\Action\GetPageByNameAction;
use App\Contract\ComponentInfo;
use App\Contract\ComponentMenu;
use App\Contract\GuideMenu;
use App\Contract\Page;
use App\Dto\PageDto;
use App\Factory\PageDtoFactory;
use App\Provider\MarkdownConverterEnvironmentProvider;
use Duyler\Framework\Build\Action\Action;
use Duyler\Web\Build\Attribute\Route;
use Duyler\Web\Build\Attribute\View;
use Duyler\Web\Enum\Method;
use League\CommonMark\Environment\Environment;
use League\CommonMark\Environment\EnvironmentInterface;

Action::build(id: 'Duyler.SayHello', handler: function () {})
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

Action::build(id: 'Page.GetPageByName', handler: GetPageByNameAction::class)
    ->require('Http.CreateRequest', 'Http.StartRouting')
    ->bind([EnvironmentInterface::class => Environment::class])
    ->providers([Environment::class => MarkdownConverterEnvironmentProvider::class])
    ->externalAccess(true)
    ->contract(Page::class)
    ->argument(PageDto::class)
    ->argumentFactory(PageDtoFactory::class);

Action::build(id: 'Page.GetComponentMenu', handler: GetComponentMenuAction::class)
    ->externalAccess(true)
    ->contract(ComponentMenu::class);

Action::build(id: 'Page.GetGuideMenu', handler: GetGuideMenuAction::class)
    ->externalAccess(true)
    ->contract(GuideMenu::class);

Action::build(id: 'Page.GetComponentInfo', handler: GetComponentInfoAction::class)
    ->require('Page.GetPageByName')
    ->externalAccess(true)
    ->argument(Page::class)
    ->contract(ComponentInfo::class);
