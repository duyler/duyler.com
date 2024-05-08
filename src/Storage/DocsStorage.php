<?php

declare(strict_types=1);

namespace App\Storage;

use App\Config\DocsStorageConfig;

/**
 * @todo Need ttl
 */
class DocsStorage
{
    private array $pages = [];

    public function __construct(
        private DocsStorageConfig $actionConfig,
    ) {}

    public function getPage(string $slug): ?string
    {
        if (isset($this->pages[$slug])) {
            return $this->pages[$slug];
        }

        $page = file_get_contents($this->actionConfig->pagesPath . $slug . '.md');

        $this->pages[$slug] = $page;

        return $page ?: null;
    }
}
