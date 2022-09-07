<?php

namespace Core;

use Symfony\Component\Cache\Adapter\FilesystemAdapter;

class CacheRequest
{
    public function CacheQuery()
    {
        $marshaller = new \Symfony\Component\Cache\Marshaller\DeflateMarshaller(new \Symfony\Component\Cache\Marshaller\DefaultMarshaller());
        $cachePool = new FilesystemAdapter('', 0, "cache", $marshaller);
        $data = $cachePool->getItem($_SERVER['QUERY_STRING']);
        if (!$data->isHit())
        {
            $data->set('');
            $cachePool->save($data);
        }

        if ($cachePool->hasItem(['QUERY_STRING']))
        {
            $data = $cachePool->getItem(['QUERY_STRING']);
            echo $data->get();
            echo "\n";
        }
        }

}