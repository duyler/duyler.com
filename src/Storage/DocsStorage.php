<?php

declare(strict_types=1);

namespace App\Storage;

use App\Config\DocsStorageConfig;
use DateInterval;
use Duyler\IO\Async\Http\HttpRequest;
use GuzzleHttp\RequestOptions;
use Spiral\RoadRunner\KeyValue\StorageInterface;

final class DocsStorage
{
    public function __construct(
        private DocsStorageConfig $actionConfig,
        private StorageInterface $storage,
    ) {}

    public function getPage(string $slug): ?string
    {
        if ($this->storage->has($slug)) {
            return $this->storage->get($slug);
        }

        $url = $this->actionConfig->pagesPath . $slug . '.md';
        $response = HttpRequest::get($url)
            ->setOptions([RequestOptions::HTTP_ERRORS => false])
            ->send()
            ->await();

        if (200 < $response->getStatusCode()) {
            return null;
        }

        $content = $response->getBody()->getContents();

        $this->storage->set($slug, $content, DateInterval::createFromDateString('1 day'));
        return $content;
    }
}
