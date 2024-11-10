<?php

declare(strict_types=1);

namespace App\Config;

readonly class DocsStorageConfig
{
    public function __construct(
        public string $pagesPath,
    ) {}
}
