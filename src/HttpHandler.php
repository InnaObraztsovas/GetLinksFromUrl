<?php

namespace Core;


class HttpHandler
{
    public function handle(string $uri)
    {
        if (filter_var($uri, FILTER_VALIDATE_URL)) {
            $client = new \GuzzleHttp\Client();
            $response = $client->request('GET', $uri);
            return $response->getBody();
        } else {
            return throw new \Exception("$uri is not a valid URL");
        }
    }
}