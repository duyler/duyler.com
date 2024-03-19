<?php

declare(strict_types=1);

namespace App\Action;

use App\Contract\GuideMenu;

class GetGuideMenuAction
{
    public function __construct(private GuideMenu $menu) {}

    public function __invoke(): GuideMenu
    {
        return $this->menu;
    }
}
