<?php

declare(strict_types=1);

namespace App\Config;

use App\Contract\ComponentInfo;

readonly class ComponentInfoList
{
    public function __construct(
        /** @var array<string, ComponentInfo> */
        public array $list,
    ) {}
}
