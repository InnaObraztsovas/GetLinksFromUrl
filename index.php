<?php

require 'vendor/autoload.php';


$a = new \Core\Controller(new \Core\HttpHandler(), new \Core\DataParser(), new \Core\CacheRequest());
$a->showData();

