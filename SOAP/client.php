<?php 
	
$loader = require 'vendor/autoload.php';

$client = new Zend\Soap\Client("http://192.168.1.108:8080/webservicetest/server.php?wsdl", array('encoding' => 'UTF-8'));
$result = $client->helloWorld();
var_dump($result);