<?php namespace BasicConcepts\REST\RestService;
	
class RestService 
{
	/**
	  * Test Service
	  * @param int intParameter
	  * @return string
	  */
	function TestService($intParameter)
	{
		return "You entered: ".$intParameter;	
	}
}