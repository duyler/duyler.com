<?php

declare(strict_types=1);

namespace App\Action;

use App\Contract\Page;
use App\Config\GetPageByNameActionConfig;
use App\Dto\PageDto;
use Duyler\Http\Exception\NotFoundHttpException;
use Fiber;
use League\CommonMark\MarkdownConverter;
use League\CommonMark\Output\RenderedContentInterface;

class GetPageByNameAction
{
    public function __construct(
        private GetPageByNameActionConfig $actionConfig,
        private MarkdownConverter $markdownConverter,
    ) {}

    public function __invoke(PageDto $pageDto): Page
    {
        $file = $this->actionConfig->pagesDirPath . '/' . $pageDto->lang . '/' . implode('/', $pageDto->page) . '.md';

        if (false === file_exists($file)) {
            throw new NotFoundHttpException();
        }

        $html = Fiber::suspend(
            function () use ($file): RenderedContentInterface {
                $markdown = file_get_contents($file);
                return $this->markdownConverter->convert($markdown);
            }
        );

        $segments = $pageDto->page;

        return new Page(
            content: $html->getContent(),
            id: array_pop($segments),
            language: $pageDto->lang,
            category: implode('/', $segments)
        );
    }
}
