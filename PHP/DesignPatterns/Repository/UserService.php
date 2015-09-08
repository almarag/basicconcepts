<?php namespace BasicConcepts\DesignPatterns\Repository;

use BasicConcepts\DesignPatterns\Repository\IUserRepository as IUserRepository;
	
class UserService 
{
	private $_Repository;
	
	public function __construct(IUserRepository $repository)
	{
		$this->_Repository = $repository;
	}	
	
	public function AddUser(User $user)
	{
		return $this->_Repository->AddUser($user);
	}
	
	public function UpdateUser(User $user)
	{
		return $this->_Repository->UpdateUser($user);
	}
	
	public function DeleteUser($id)
	{
		return $this->_Repository->DeleteUser($id);
	}
	
	public function FindUser($id)
	{
		return $this->_Repository->FindUser($id);
	}
	
	public function GetAllUsers()
	{
		return $this->_Repository->GetAllUsers();
	}
}