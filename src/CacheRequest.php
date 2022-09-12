<?php

namespace Core;

use Psr\Cache\CacheItemInterface;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;

//use Symfony\Component\Cache\Adapter\FilesystemAdapter;
use Symfony\Component\Cache\Adapter\RedisAdapter;


class CacheRequest
{

//    private FilesystemAdapter $cachePool;

private RedisAdapter $cachePool;


    public function __construct()
    {

        $client = RedisAdapter::createConnection('redis://localhost:6379');
        $this->cachePool = new RedisAdapter( $client, 'cache', 30);
//        $this->cachePool = new FilesystemAdapter('', 0, "cache");


    }

    public function save(string $key, array $response): void
    {
        $data = $this->cachePool->getItem($key);
        if (!$data->isHit()) {
            $data->set('From cache:' . json_encode($response));
            $a = $this->cachePool->save($data);
            $data = $data->get();
            echo $data;

        }
    }

    public function has(string $key): string
    {
        if ($this->cachePool->hasItem($key)) {
            $data = $this->cachePool->getItem($key);
        }
        return $data->get();
    }

    public function existCache(string $key): bool
    {
        return $this->cachePool->hasItem($key);
    }

}

