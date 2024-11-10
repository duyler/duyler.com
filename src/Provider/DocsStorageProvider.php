<?php

declare(strict_types=1);

namespace App\Provider;

use Duyler\DI\ContainerService;
use Duyler\DI\Provider\AbstractProvider;
use Spiral\Goridge\RPC\RPC;
use Spiral\RoadRunner\KeyValue\Factory;

class DocsStorageProvider extends AbstractProvider
{
    public function getArguments(ContainerService $containerService): array
    {
        $rpc = RPC::create('tcp://127.0.0.1:6001');

        $factory = new Factory($rpc);

        $storage = $factory->select('memory');

        return [
            'storage' => $storage,
        ];
    }
}
