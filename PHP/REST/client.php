<?php 

/***
 * REST client example - Alejandro Martinez (almarag@gmail.com)
 * This is the client side example for the REStful service.
 * I'm using the Zend\Client\RestClient for the v2.4 framework
 * For this example I pass 2 paremeters to server (method and intParameter)
 * this brings me the response text in JSON format. I deserialize json with json_decode().
 ***/

$loader = require "vendor/autoload.php";

$client = new ZendRest\Client\RestClient("http://192.168.1.108:8080");

$response = $client->restGet("/restservice/server.php", array('method' => 'TestService', 'intParameter' => 1));

$jsonContent = json_decode($response->getContent());

echo "Response code: ".$jsonContent->code."\n";
echo "Response result: ".$jsonContent->result."\n";