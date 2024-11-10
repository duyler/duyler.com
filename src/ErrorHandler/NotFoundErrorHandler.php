<?php

declare(strict_types=1);

namespace App\ErrorHandler;

use Duyler\EventBus\Dto\Log;
use Duyler\Http\ErrorHandler\ErrorHandlerInterface;
use Duyler\Http\Exception\NotFoundHttpException;
use Duyler\Web\Renderer\RendererInterface;
use HttpSoft\Response\HtmlResponse;
use Override;
use Psr\Http\Message\ResponseInterface;
use Throwable;

class NotFoundErrorHandler implements ErrorHandlerInterface
{
    public function __construct(
        private RendererInterface $renderer,
    ) {}

    #[Override]
    public function handle(Throwable $exception, Log $log): ResponseInterface
    {
        return new HtmlResponse($this->renderer->render('404'), 404);
    }

    #[Override]
    public function is(Throwable $exception): bool
    {
        return $exception instanceOf NotFoundHttpException;
    }
}
