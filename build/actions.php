<?php

declare(strict_types=1);

use App\Action\Page;
use App\Config\ComponentInfoList;
use App\Contract\ComponentInfo;
use App\Contract\ComponentMenu;
use App\Contract\Content;
use App\Contract\GuideMenu;
use App\Dto\ContentDto;
use App\Provider\MarkdownConverterEnvironmentProvider;
use App\Storage\DocsStorage;
use Duyler\Builder\Build\Action\Action;
use Duyler\EventBus\Action\Context\ActionContext;
use Duyler\EventBus\Action\Context\FactoryContext;
use Duyler\Http\Exception\NotFoundHttpException;
use Duyler\Http\Http;
use Duyler\Router\CurrentRoute;
use Duyler\Web\Build\Attribute\Route;
use Duyler\Web\Build\Attribute\View;
use Duyler\Web\Enum\HttpMethod;
use League\CommonMark\Environment\Environment;
use League\CommonMark\Environment\EnvironmentInterface;
use League\CommonMark\MarkdownConverter;
use League\CommonMark\Output\RenderedContentInterface;
use Psr\Http\Message\ServerRequestInterface;

Action::build(id: Page::SayHello, handler: function () {})
    ->attributes(
        new Route(
            method: HttpMethod::Get,
            pattern: '/',
        ),
        new View(
            name: 'home',
        ),
    );

Action::build(
        id: Page::GetContentByName,
        handler: function (ActionContext $context) {
            /** @var ContentDto $contentDto */
            $contentDto = $context->argument();

            /** @var string $markdown */
            $markdown = $context->call(
                fn (DocsStorage $docsStorage) => $docsStorage->getPage($contentDto->getSlug())
            );

            if (null === $markdown) {
                throw new NotFoundHttpException();
            }

            /** @var RenderedContentInterface $html */
            $html = $context->call(
                fn (MarkdownConverter $markdownConverter) => $markdownConverter->convert($markdown)
            );

            $segments = $contentDto->page;

            return new Content(
                content: $html->getContent(),
                id: array_pop($segments),
                language: $contentDto->lang,
                category: implode('/', $segments),
            );
        }
    )
    ->require(Http::GetRequest, Http::GetRoute)
    ->config([
        EnvironmentInterface::class => Environment::class,
        Environment::class => MarkdownConverterEnvironmentProvider::class,
    ])
    ->contract(Content::class)
    ->argument(ContentDto::class)
    ->argumentFactory(
        function (FactoryContext $context) {
            /** @var ServerRequestInterface $request */
            $request = $context->contract(ServerRequestInterface::class);
            /** @var CurrentRoute $currentRoute */
            $currentRoute = $context->contract(CurrentRoute::class);

            return new ContentDto(
                page: $request->getAttribute('page') ?? throw new RuntimeException('Page not resolved'),
                lang: $currentRoute->language ?? throw new RuntimeException('Language not set'),
            );
        }
    )
    ->attributes(
        new View(
            key: 'page',
        ),
    );

Action::build(
        id: Page::GetComponentMenu,
        handler: fn (ActionContext $context) => $context->call(fn (ComponentMenu $menu) => $menu),
    )
    ->contract(ComponentMenu::class)
    ->attributes(
        new View(
            key: 'componentMenu',
        ),
    );

Action::build(
        id: Page::GetGuideMenu,
        handler: fn (ActionContext $context) => $context->call(fn (GuideMenu $menu) => $menu),
    )
    ->contract(GuideMenu::class)
    ->attributes(
        new View(
            key: 'guideMenu',
        ),
    );

Action::build(
        id: Page::GetComponentInfo,
        handler: function (ActionContext $context) {
            /** @var Content $page */
            $page = $context->argument();
            return $context->call(
                fn (ComponentInfoList $infoList) => $infoList->list[$page->id] ?? new ComponentInfo(null)
            );
        }
    )
    ->require(Page::GetContentByName)
    ->argument(Content::class)
    ->contract(ComponentInfo::class)
    ->attributes(
        new View(
            key: 'componentInfo',
        ),
    );
