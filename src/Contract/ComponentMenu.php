<?php

declare(strict_types=1);

namespace App\Contract;

readonly class ComponentMenu
{
    public function __construct(
        /** @var MenuItem[] */
        public array $items
    ) {}
}
