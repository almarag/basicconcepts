<?php namespace BasicConcepts\Reflection;
	
class ObjectToInspect 
{
	private $_myPrivateVariable;
	public $myPublicVariable;
	
	public function __construct()
	{
		$this->_myPrivateVariable = "Hello";
		$this->myPublicVariable = "World";
	}
	
	public function GetPrivateVariable()
	{
		return $this->_myPrivateVariable;	
	}	
}