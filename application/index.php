<?php
// rewrite to  index.php
// mvc ===> thrift
// autoload 1, application path
use Thrift\ClassLoader\ThriftClassLoader;
use Thrift\Transport\TBufferedTransport;
use Thrift\Transport\TPhpStream;
use Thrift\Protocol\TBinaryProtocol;
require_once 'HelloService.php';
require_once 'MyHandler.php';
require_once dirname(__FILE__).'/../Thrift/ClassLoader/ThriftClassLoader.php';
$nsLoader = new ThriftClassLoader();
$nsLoader->registerNamespace('Thrift', dirname(__FILE__).'/../');
$nsLoader->register();
$handler = new MyHandler();
$processor = new HelloServiceProcessor($handler);

$transport = new TBufferedTransport(new TPhpStream(TPhpStream::MODE_R | TPhpStream::MODE_W));

$protocol = new TBinaryProtocol($transport, true, true);

$transport->open();
$processor->process($protocol, $protocol);
$transport->close();
