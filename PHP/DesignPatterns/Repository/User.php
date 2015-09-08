<?php namespace BasicConcepts\DesignPatterns\Repository;
	
	
class User
{
	private $_id;
	private $_userName;
	private $_password;
	private $_fullName;
	
	public function __construct($id = 0,$userName = '',$password = '',$fullName = '')
	{
		$this->SetUserId($id);
		$this->SetUserName($userName);
		$this->SetPassword($password);
		$this->SetFullName($fullName);
	}	
	
	public function SetUserId($id)
	{
		$this->_id = $id;
	}
	
	public function SetUserName($userName)
	{
		$this->_userName = $userName;
	}
	
	
	public function SetPassword($password)
	{
		$this->_password = $password;
	}
	
	public function SetFullName($fullName)
	{
		$this->_fullName = $fullName;
	}
	
	public function GetUserName()
	{
		return $this->_userName;
	}
	
	public function GetFullName()
	{
		return $this->_fullName;		
	}
	
	public function GetPassword()
	{
		return $this->_password;
	}
	
	public function GetId()
	{
		return $this->_id;
	}
}