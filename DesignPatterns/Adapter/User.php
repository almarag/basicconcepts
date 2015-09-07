<?php namespace BasicConcepts\DesignPatterns\Adapter;

class User 
{
	private $_username;
	private $_password;
	private $_fullName;
	
	public function getUserName()
	{
		return $this->_username;		
	}	
	
	public function getPassword()
	{
		return $this->_password;	
	}

	public function getFullName()
	{
		return $this->_fullName;	
	}
	
	public function setUserName($userName)
	{
		$this->_username = $userName;
	}
	
	public function setPassword($password)
	{
		$this->_password = $password;
	}
	
	public function setFullName($fullName)
	{
		$this->_fullName = $fullName;
	}
}