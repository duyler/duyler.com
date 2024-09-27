<?php

declare(strict_types=1);

namespace App\Provider;

use App\Config\MarkdownConverterConfig;
use Duyler\DI\ContainerService;
use League\CommonMark\Environment\Environment;
use Duyler\DI\Provider\AbstractProvider;
use League\CommonMark\Extension\CommonMark\CommonMarkCoreExtension;
use League\CommonMark\Extension\CommonMark\Node\Block\FencedCode;
use League\CommonMark\Extension\CommonMark\Node\Block\IndentedCode;
use Spatie\CommonMarkHighlighter\FencedCodeRenderer;
use Spatie\CommonMarkHighlighter\IndentedCodeRenderer;

class MarkdownConverterEnvironmentProvider extends AbstractProvider
{
    public function __construct(
        private MarkdownConverterConfig $converterConfig,
    ) {}

    public function getArguments(ContainerService $containerService): array
    {
        return [
            'config' => $this->converterConfig->converterConfig,
        ];
    }

    public function accept(object $definition): void
    {
        /** @var Environment $definition */
        $definition->addExtension(new CommonMarkCoreExtension());
        $definition->addRenderer(FencedCode::class, new FencedCodeRenderer());
        $definition->addRenderer(IndentedCode::class, new IndentedCodeRenderer());
    }
}
