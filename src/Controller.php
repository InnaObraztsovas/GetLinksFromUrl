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
        if (filter_var($requests, FILTER_VALIDATE_URL)) {
            $responseBody = $this->httpHandler->handle($requests);
            $result = $this->dataParser->parser($responseBody);
            if ($this->cacheRequest->existCache(md5($result))) {
                $result = $this->cacheRequest->has(md5($result));
            } else {
                $this->cacheRequest->save($result);
            }

            echo json_encode($result);
        } else {
            echo("$requests is not a valid URL");
        }
    }
}