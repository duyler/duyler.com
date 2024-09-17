<?php

declare(strict_types=1);

namespace App\Handler;

use App\Contract\GuideMenu;

class GetGuideMenu
{
    public function __construct(private GuideMenu $menu) {}

    public function __invoke(): GuideMenu
    {
        return $this->menu;
    }
}
