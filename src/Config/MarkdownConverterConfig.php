<?php

declare(strict_types=1);

namespace App\Config;

readonly class MarkdownConverterConfig
{
    public function __construct(public array $converterConfig = []) {}
}
