<?php

declare(strict_types=1);

namespace App\Factory;

use App\Dto\ContentDto;
use Duyler\Router\CurrentRoute;
use Psr\Http\Message\ServerRequestInterface;
use RuntimeException;

readonly class ContentDtoFactory
{
    public function __invoke(ServerRequestInterface $request, CurrentRoute $currentRoute): ContentDto
    {
        return new ContentDto(
            page: $request->getAttribute('page') ?? throw new RuntimeException('Page not resolved'),
            lang: $currentRoute->language ?? throw new RuntimeException('Language not set'),
        );
    }
}
