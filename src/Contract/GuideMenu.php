<?php

declare(strict_types=1);

namespace App\Contract;

class GuideMenu
{
    public function __construct(
        /** @var MenuItem[] */
        public array $items
    ) {}
}
