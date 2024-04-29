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
        private MarkdownConverter            $markdownConverter,
    ) {}

    public function __invoke(ContentDto $pageDto): Content
    {
        $file = $this->actionConfig->pagesDirPath . '/' . $pageDto->lang . '/' . implode('/', $pageDto->page) . '.md';

        if (false === file_exists($file)) {
            throw new NotFoundHttpException();
        }

        $markdown = Fiber::suspend(
            fn(): string => file_get_contents($file)
        );

        $html = $this->markdownConverter->convert($markdown);
        $segments = $pageDto->page;

        return new Content(
            content: $html->getContent(),
            id: array_pop($segments),
            language: $pageDto->lang,
            category: implode('/', $segments)
        );
    }
}
