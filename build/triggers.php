<?php

declare(strict_types=1);

use App\Action\Page;
use Duyler\Builder\Build\Trigger\Trigger;

Trigger::add(
    subjectId: Page::GetContentByName,
    actionId: Page::GetComponentMenu,
);

Trigger::add(
    subjectId: Page::GetContentByName,
    actionId: Page::GetComponentInfo,
);

Trigger::add(
    subjectId: Page::GetContentByName,
    actionId: Page::GetGuideMenu,
);
