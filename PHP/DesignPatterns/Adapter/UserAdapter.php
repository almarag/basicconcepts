<?php namespace BasicConcepts\DesignPatterns\Adapter;
use BasicConcepts\DesignPatterns\Adapter\IUserAdapter as IUserAdapter;		
use BasicConcepts\DesignPatterns\Adapter\User as User;
	
class UserAdapter implements IUserAdapter
{
	private $_User;
	
	public function __construct()
	{
		$this->_User = new User();
	}
	
	public function SetUser($username, $password, $fullname)
	{
		$this->_User->setUserName($username);
		$this->_User->setPassword($password);
		$this->_User->setFullName($fullname);
	}	
		
	public function GetCurrentUserInfo()
	{
		echo "Full Name: ". $this->_User->getFullName(). "\n";
		echo "Username: ". $this->_User->getUsername(). "\n";
		echo "Password: ". $this->_User->getPassword(). "\n";
	}
}	