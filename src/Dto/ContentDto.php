<?php

declare(strict_types=1);

namespace App\Dto;

readonly class ContentDto
{
    public function __construct(
        public array $page,
        public string $lang,
    ) {}
}
