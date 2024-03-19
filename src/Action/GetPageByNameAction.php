<?php

declare(strict_types=1);

namespace App\Action;

use App\Contract\Page;
use App\Config\GetPageByNameActionConfig;
use App\Dto\PageDto;
use Duyler\Http\Exception\NotFoundHttpException;
use Fiber;
use League\CommonMark\MarkdownConverter;

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

        $converter = $this->markdownConverter;

        $markdown = Fiber::suspend(
            fn(): string => file_get_contents($file)
        );

        $html = $converter->convert($markdown);
        $segments = $pageDto->page;

        return new Page(
            content: $html->getContent(),
            id: array_pop($segments),
            language: $pageDto->lang,
            category: implode('/', $segments)
        );
    }
}
