<?php 

/***
 * SOAP example - Alejandro Martinez (almarag@gmail.com) 
 * In order to this example works, please host code on your webserver
 * and modify the endpoint Uri on script accordingly. 
 * This is the server part of example. I used Zend\Soap libraries
 * since SoapServer function on PHP doesn't support WSDL generation by itself.
 * AutoDiscover class is a very useful library for WSDL generation.
 * For client side part please refer to client.php script.  
 ***/
 
require_once("WebService/TestWebService.php");
$loader = require 'vendor/autoload.php';

use BasicConcepts\SOAP\WebService\TestWebService as WebService;

// Note: You should add the return type on docblock in order to
// AutoDiscover can handle it. 

/**
 * @return string
 */ 
function helloWorld()
{
  $webService = new WebService();	
  return $webService->HelloWorld();
}


if( isset( $_GET['wsdl'] ) )
{
  $autodiscover = new Zend\Soap\AutoDiscover();
  $autodiscover->addFunction('helloWorld')
			   ->setUri('http://localhost:8080/webservicetest/server.php')
			   ->setServiceName('TestWebService');
  $autodiscover->handle();
}
else
{
  $server = new Zend\Soap\Server( null, array( 'uri' => 'http://localhost:8080/webservicetest/server.php') );
  $server->addFunction('helloWorld');
  $server->handle();
}