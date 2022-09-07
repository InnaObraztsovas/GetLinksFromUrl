<?php

namespace Core;


class HttpHandler
{
    public function handle(string $uri): string
    {
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', $uri);
        return $response->getBody();
    }
}