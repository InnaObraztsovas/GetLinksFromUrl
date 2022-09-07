<?php

require 'vendor/autoload.php';


$a = new \Core\Controller();
$a->showData();


//$marshaller = new Symfony\Component\Cache\Marshaller\DeflateMarshaller(new \Symfony\Component\Cache\Marshaller\DefaultMarshaller());
//$cache = new \Symfony\Component\Cache\Adapter\RedisAdapter(new \Redis(), 'namespace', 0, $marshaller);
//
//class cache
//{
//
//    public function cache()
//    {
//        $defaultMarshaller = new \Symfony\Component\Cache\Marshaller\DefaultMarshaller();
//        $deflateMarshaller = new Symfony\Component\Cache\Marshaller\DeflateMarshaller($defaultMarshaller);
//        $values = [$_SERVER['QUERY_STRING'] => [str_repeat('def', 10)]];
//
//        $failed = [];
////$requests = $_SERVER['QUERY_STRING'];
//
//        $defaultResult = $defaultMarshaller->marshall($values, $failed);
//
//        $deflateResult = $deflateMarshaller->marshall($values, $failed);
//        $deflateResult[$_SERVER['QUERY_STRING'] = gzinflate($deflateResult[$_SERVER['QUERY_STRING']])];
//        var_dump($deflateMarshaller);
//
////        $this->assertSame($defaultResult, $deflateResult);
//    }
//}
//use Symfony\Component\Cache\Adapter\RedisAdapter;
//use Symfony\Component\Cache\Adapter\RedisTagAwareAdapter;
//use Symfony\Component\Cache\Adapter\FilesystemAdapter;
//$client = RedisAdapter::createConnection('redis://localhost');
//$cache = new FilesystemAdapter($client);