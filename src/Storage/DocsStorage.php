<?php

declare(strict_types=1);

namespace App\Storage;

use App\Config\DocsStorageConfig;
use Fiber;

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

        $url = $this->actionConfig->pagesPath . $slug . '.md';
        $page = Fiber::suspend(fn () => file_get_contents($url));

        if (false === $page) {
            return null;
        }

        return $this->pages[$slug] = $page;
    }
}
