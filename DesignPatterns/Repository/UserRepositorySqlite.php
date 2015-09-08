<?php namespace BasicConcepts\DesignPatterns\Repository;

use BasicConcepts\DesignPatterns\Repository\IUserRepository as IUserRepository;
use BasicConcepts\DesignPatterns\Repository\User as User;	
use PDO;
use Exception;
	
class UserRepositorySqlite implements IUserRepository
{
	private $_DatabaseFile;
	private $_DbLink;
	
	public function __construct()
	{
		$this->_DatabaseFile = "userdb.sqlite3";

		try
		{
			$this->_DbLink = new PDO("sqlite:".$this->_DatabaseFile);
			$this->_DbLink->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}	
		catch (\PDOException $e)
		{
			throw new Exception("Could not connect to SQLite database. Error: ". $e->getMessage());
		}	
	}
	
	public function GetAllUsers()
	{
		$users = [];
		try			
		{
			$res = $this->_DbLink->query("SELECT * FROM user");
			
			foreach ($res as $user)
			{
				$users[$user['id']] = new User($user['id'],$user['username'],$user['password'],$user['fullname']);			
			}		
		}
		catch(\PDOException $e)
		{
			throw new Exception("There was an error when trying to fetch users. Exception: " . $e->getMessage());
		}
		
		return $users;
	}
	
	public function FindUser($id)
	{
		try
		{
			$res = $this->_DbLink->query(sprintf("SELECT * FROM user WHERE id = %s",$id));
			if (!$res)
			{
				return false; // User not found
			}
			else
			{
				foreach ($res as $user)
				{
					$user = new User($user['id'], $user['username'], $user['password'], $user['fullname']);		
					return $user;									
				}
			}
		}
		catch (\PDOException $e)
		{
			throw new Exception("There was an error when trying to fetch user. Exception: ". $e->getMessage());			
		}
	}
	
	public function AddUser(User $user)	
	{
		try
		{
			$query = "INSERT INTO user(id, username, password, fullname) VALUES (:id,:username,:password,:fullname)";		
			$stmt = $this->_DbLink->prepare($query);			
			$stmt->bindValue(':id', $user->GetId(), SQLITE3_INTEGER);
			$stmt->bindValue(':username', $user->GetUserName(), SQLITE3_TEXT);
			$stmt->bindValue(':password', $user->GetPassword(), SQLITE3_TEXT);
			$stmt->bindValue(':fullname', $user->GetFullName(), SQLITE3_TEXT);
			$stmt->execute();
			return true;
		}
		catch(\PDOException $e)
		{
			throw new Exception("There was an error adding user. Exception: ". $e->getMessage());
		}					
	}
	
	public function UpdateUser(User $user)
	{
		return true;
	}
	
	public function DeleteUser($id)
	{
		return true;
	}
}