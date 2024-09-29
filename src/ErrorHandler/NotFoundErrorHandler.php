<?php

declare(strict_types=1);

namespace App\ErrorHandler;

use Duyler\Http\ErrorHandler\Error;
use Duyler\Http\ErrorHandler\ErrorHandlerInterface;
use Duyler\Http\Exception\NotFoundHttpException;
use Duyler\Web\Renderer\RendererInterface;
use Override;
use Throwable;

class NotFoundErrorHandler implements ErrorHandlerInterface
{
    public function __construct(
        private RendererInterface $renderer,
    ) {}

    #[Override]
    public function handle(Throwable $exception): Error
    {
        return new Error(
            content: $this->renderer->render('404'),
            status: 404,
        );
    }

    #[Override]
    public function is(Throwable $exception): bool
    {
        return $exception instanceOf NotFoundHttpException;
    }
}
