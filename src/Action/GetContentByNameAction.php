<?php

declare(strict_types=1);

namespace App\Action;

use App\Contract\Content;
use App\Config\GetContentByNameActionConfig;
use App\Dto\ContentDto;
use Duyler\Http\Exception\NotFoundHttpException;
use Fiber;
use League\CommonMark\MarkdownConverter;

class GetContentByNameAction
{
    public function __construct(
        private GetContentByNameActionConfig $actionConfig,
        private MarkdownConverter $markdownConverter,
    ) {}

    public function __invoke(ContentDto $pageDto): Content
    {
        $page = $this->actionConfig->pagesDirPath . '/' . $pageDto->lang . '/' . implode('/', $pageDto->page) . '.md';

        $markdown = Fiber::suspend(fn() => file_get_contents($page));

        if (false === $markdown) {
            throw new NotFoundHttpException();
        }

        $html = $this->markdownConverter->convert($markdown);
        $segments = $pageDto->page;

        return new Content(
            content: $html->getContent(),
            id: array_pop($segments),
            language: $pageDto->lang,
            category: implode('/', $segments),
        );
    }
}
