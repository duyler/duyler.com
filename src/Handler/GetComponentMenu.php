<?php

declare(strict_types=1);

namespace App\Handler;

use App\Contract\ComponentMenu;

class GetComponentMenu
{
    public function __construct(private ComponentMenu $menu) {}

    public function __invoke(): ComponentMenu
    {
        return $this->menu;
    }
}
