<?php

namespace Core;

use Symfony\Component\Cache\Adapter\FilesystemAdapter;

class CacheRequest
{

    private FilesystemAdapter $cachePool;

    public function __construct()
    {
        $this->cachePool = new FilesystemAdapter('', 0, "cache");
    }

    public function save(string $key): void
    {
        $data = $this->cachePool->getItem(md5($key));
        if (!$data->isHit()) {
            $data->set('From cache:' . json_encode($key));
            $this->cachePool->save($data);
        }
    }

    public function has(string $key): string
    {
        $data = $this->cachePool->getItem($key);
        return $data->get();
    }

    public function existCache(string $key): bool
    {
        return $this->cachePool->hasItem($key);
    }

}

