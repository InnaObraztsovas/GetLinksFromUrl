<?php

namespace Core;

class Controller
{
    public function showData()
    {
        $getData = new GetData();
        $parseData = new DataParser();
        $cacheRequest = new CacheRequest();
        $requests = $_SERVER['QUERY_STRING'];
        $cacheRequest->CacheQuery($requests);

        if (filter_var($requests, FILTER_VALIDATE_URL)) {
            $responseBody = $getData->getLink($requests);
            $result = $parseData->parser($responseBody);
            echo $result;
        } else {
            echo("$requests is not a valid URL");
        }
    }
}