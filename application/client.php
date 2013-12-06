<?php
error_reporting(E_ALL);
use Thrift\ClassLoader\ThriftClassLoader;
use Thrift\Transport\THttpClient;
use Thrift\Transport\TBufferedTransport;
use Thrift\Protocol\TBinaryProtocol;
require_once 'HelloService.php';
require_once dirname(__FILE__).'/../Thrift/ClassLoader/ThriftClassLoader.php';

$nsLoader = new ThriftClassLoader();
$nsLoader->registerNamespace('Thrift', dirname(__FILE__).'/../');
$nsLoader->register();
$host = 'checkout.jack.vipshop.com';
$port = '80';
$uri = 'index.php';

$transport = new THttpClient($host, $port, $uri);
$transport = new TBufferedTransport($transport, 1024, 1024);
$protocol = new TBinaryProtocol($transport);
$client = new HelloServiceClient($protocol);
 # connect to the service
//:w
//:w
$transport->open();
$ret = $client->say_hello_repeat(3);
$transport->close();
var_dump($ret);

