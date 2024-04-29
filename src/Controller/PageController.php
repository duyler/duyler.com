<?php

declare(strict_types=1);

namespace App\Controller;

use App\Contract\ComponentInfo;
use App\Contract\ComponentMenu;
use App\Contract\GuideMenu;
use App\Contract\Content;
use Duyler\Web\AbstractController;
use Psr\Http\Message\ResponseInterface;

class PageController extends AbstractController
{
    public function __invoke(
        Content $page,
        ComponentMenu $componentMenu,
        GuideMenu $guideMenu,
        ComponentInfo $componentInfo,
    ): ResponseInterface {
        return $this->render('docs.page', [
            'page' => $page,
            'componentMenu' => $componentMenu,
            'guideMenu' => $guideMenu,
            'componentInfo' => $componentInfo,
        ]);
    }
}
