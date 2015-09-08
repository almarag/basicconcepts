<?php 

/***
 * REST example - Alejandro Martinez (almarag@gmail.com)
 * This is the service part of a single RESTful response using JSON
 * On this example, server is getting 2 parameters: method and intParameter.
 * REST can make use of the following HTTP methods:
 * GET, POST, PUT, DELETE
 * On this example, we are just using GET as the simplest way to get the parameters
 * for executing class method.
 ***/

require_once("RestService/RestService.php");	

use BasicConcepts\REST\RestService\RestService as RestService; 

if (isset($_GET['method']))
{
	$method = $_GET['method'];
	
	if ($method == "TestService")
	{
		if (is_numeric($_GET['intParameter']))
		{
			$int = (int) $_GET['intParameter'];
			$service = new RestService();
			$result = $service->TestService($int);
			http_response_code(200);
			echo json_encode(array('code' => 200, 'result' => $result));			
		}
		else
		{
			http_response_code(500);
			echo json_encode(array('code' => 500, 'result' => "Invalid Parameters"));	
		}
	}
	else
	{
		http_response_code(404);
		echo json_encode(array('code' => 404, 'result' => "Method Not Found"));
	}
}