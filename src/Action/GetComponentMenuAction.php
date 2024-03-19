<?php

declare(strict_types=1);

namespace App\Action;

use App\Contract\ComponentMenu;

class GetComponentMenuAction
{
    public function __construct(private ComponentMenu $menu) {}

    public function __invoke(): ComponentMenu
    {
        return $this->menu;
    }
}
