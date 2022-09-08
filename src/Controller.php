<?php

namespace Core;

use Symfony\Component\Cache\Adapter\FilesystemAdapter;

class Controller
{

    public function __construct(private HttpHandler $httpHandler, private DataParser $dataParser, private CacheRequest $cacheRequest)
    {
    }

    public function showData()
    {
        $requests = $_SERVER['QUERY_STRING'];
        $keyCache = md5($requests);
        if ($this->cacheRequest->existCache($keyCache)) {
            $result = $this->cacheRequest->has($keyCache);
            echo $result;
        } else {
            $responseBody = $this->httpHandler->handle($requests);
            $result = $this->dataParser->parser($responseBody);
            $this->cacheRequest->save($keyCache, $result);
            echo json_encode($result);
        }
    }
}