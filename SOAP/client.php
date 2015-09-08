<?php 

/***
 * SOAP client example - Alejandro Martinez (almarag@gmail.com)
 * This is the SOAP client part for the webservice example.
 * I used Zend\Soap\Client since I'm using Zend\Soap libraries but
 * this can be also implemented using SoapClient PHP class.
 * However, Zend\Soap\Client gives more power and options to handle
 * things like encoding, authentication and other specific stuff which 
 * is more convenient than trying to do manually with SoapClient. 
 * Example is pretty straighforward. You can also found on this folder
 * a SOAPUI example for testing purposes. SOAPUI is a nice tool to
 * test SOAP/REST webservices. Check http://www.soapui.org/ for more information.
 ***/
	
$loader = require 'vendor/autoload.php';

$client = new Zend\Soap\Client("http://192.168.1.108:8080/webservicetest/server.php?wsdl", array('encoding' => 'UTF-8'));
$result = $client->helloWorld();
echo $result;