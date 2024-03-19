<?php

declare(strict_types=1);

namespace App\Action;

use App\Contract\ComponentInfo;
use App\Contract\Page;

class GetComponentInfoAction
{
    public function __construct(
        /** @var array<string, ComponentInfo> */
        private array $componentInfoList,
    ) {}

    public function __invoke(Page $page): ComponentInfo
    {
        return $this->componentInfoList[$page->id] ?? new ComponentInfo(null);
    }
}
