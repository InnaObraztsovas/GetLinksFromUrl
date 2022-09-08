<?php

namespace Core;

class DataParser
{
    public function parser(mixed $responseBody): array
    {
        $crawler = new \Symfony\Component\DomCrawler\Crawler($responseBody);
        $result = $crawler
            ->filterXpath('//img')
            ->extract(array('src'));
        return $result;
    }
}