<?php namespace BasicConcepts\SOAP\WebService;
	
class TestWebService
{
	public function HelloWorld()
	{
		$string = "Hello World!";
		return $string;
	}
}