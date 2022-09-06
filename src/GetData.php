<?php

namespace Core;


class GetData
{
    public function getLink(string $uri): string
    {
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', $uri);
        return $response->getBody();
    }
}