<?php

declare(strict_types=1);

namespace App\Action;

enum Page
{
    case GetContentByName;
    case GetComponentMenu;
    case GetGuideMenu;
    case GetComponentInfo;
}
