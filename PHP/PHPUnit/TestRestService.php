<?php 
	
/***
 * PHPUnit example - Alejandro Martinez (almarag@gmail.com)
 * This is a very basic example of unit test using PHPUnit. 
 * On this example, we just use a simple assertion to validate
 * method TestService for the REST example. before you can test
 * this example, please install PHPUnit. https://phpunit.de/getting-started.html
 ***/

require_once('../REST/RestService/RestService.php');

use BasicConcepts\REST\RestService\RestService as RestService;

class TestRestService extends PHPUnit_Framework_TestCase
{
	public function testICanInstanceTestService()
	{
		$service = new RestService();
				
		// Basic assert
		$this->assertEquals("You entered: 1", $service->TestService(1));
	}	
}