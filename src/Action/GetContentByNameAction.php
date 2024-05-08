<?php

declare(strict_types=1);

namespace App\Action;

use App\Contract\Content;
use App\Dto\ContentDto;
use App\Storage\DocsStorage;
use Duyler\Http\Exception\NotFoundHttpException;
use Fiber;
use League\CommonMark\MarkdownConverter;

class GetContentByNameAction
{
    public function __construct(
        private MarkdownConverter $markdownConverter,
        private DocsStorage $docsStorage,
    ) {}

    public function __invoke(ContentDto $contentDto): Content
    {
        $markdown = Fiber::suspend(fn() => $this->docsStorage->getPage($contentDto->getSlug()));

        if (null === $markdown) {
            throw new NotFoundHttpException();
        }

        $html = $this->markdownConverter->convert($markdown);
        $segments = $contentDto->page;

        return new Content(
            content: $html->getContent(),
            id: array_pop($segments),
            language: $contentDto->lang,
            category: implode('/', $segments),
        );
    }
}
