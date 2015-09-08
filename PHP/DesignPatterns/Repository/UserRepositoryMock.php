<?php namespace BasicConcepts\DesignPatterns\Repository;

use BasicConcepts\DesignPatterns\Repository\IUserRepository as IUserRepository;
use BasicConcepts\DesignPatterns\Repository\User as User;
	
class UserRepositoryMock implements IUserRepository
{
	private $_User;
	private $_users = [];
	
	public function __construct()
	{
		$this->_User = new User(); 
	}
	
	public function GetAllUsers()
	{
		return $this->_users;
	}
	
	public function FindUser($id)
	{
		if (array_key_exists($id, $this->_users))
		{
			$result = $this->_users[$id];
		}
		else
		{
			$result = false;	
		}
		
		return $result;
	}
	
	public function AddUser(User $user)	
	{
		try
		{
			$this->_users[(string) $user->GetId()] = $user;	
		}
		catch(Exception $e)
		{
			return false;
		}
		return true;
	}
	
	public function UpdateUser(User $user)
	{
		try
		{
			$this->_users[(string) $user->GetId()] = $user;	
		}
		catch(Exception $e)
		{
			return false;
		}
		
		return true;
	}
	
	public function DeleteUser($id)
	{
		unset($this->_users[$id]);
		return true;
	}
}