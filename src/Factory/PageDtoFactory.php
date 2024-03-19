<?php

declare(strict_types=1);

namespace App\Factory;

use App\Dto\PageDto;
use Duyler\Router\CurrentRoute;
use Psr\Http\Message\ServerRequestInterface;
use RuntimeException;

readonly class PageDtoFactory
{
    public function __invoke(ServerRequestInterface $request, CurrentRoute $currentRoute): PageDto
    {
        return new PageDto(
            page: $request->getAttribute('page') ?? throw new RuntimeException(),
            lang: $currentRoute->language ?? throw new RuntimeException(),
        );
    }
}
