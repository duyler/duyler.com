<?php

declare(strict_types=1);

namespace App\Contract;

readonly class Page
{
    public function __construct(
        public string $content,
        public string $id,
        public string $language,
        public string $category,
    ) {}
}
