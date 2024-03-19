<?php

declare(strict_types=1);

namespace App\Contract;

readonly class ComponentInfo
{
    public function __construct(
        public ?string $gitUrl = null,
    ) {}
}
