<?php 

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