<?php

declare(strict_types=1);

namespace App\Action;

use App\Contract\ComponentInfo;
use App\Contract\Content;

class GetComponentInfoAction
{
    public function __construct(
        /** @var array<string, ComponentInfo> */
        private array $componentInfoList,
    ) {}

    public function __invoke(Content $page): ComponentInfo
    {
        return $this->componentInfoList[$page->id] ?? new ComponentInfo(null);
    }
}
