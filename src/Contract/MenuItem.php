<?php

declare(strict_types=1);

namespace App\Contract;

readonly class MenuItem
{
    public function __construct(
        public string $name,
        public string $id,
        public string $icon,
    ) {}
}
