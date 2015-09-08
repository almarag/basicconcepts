<?php 

/***
 * Repository pattern example - Alejandro Martinez (almarag@gmail.com)
 ***/	
 
require_once("IUserRepository.php");
require_once("User.php");
require_once("UserRepositoryMock.php");
require_once("UserRepositorySqlite.php");
require_once("UserService.php");
 
use BasicConcepts\DesignPatterns\Repository\UserRepositoryMock as UserRepositoryMock;
use BasicConcepts\DesignPatterns\Repository\UserRepositorySqlite as UserRepositorySqlite;
use BasicConcepts\DesignPatterns\Repository\UserService as UserService;
use BasicConcepts\DesignPatterns\Repository\User as User;

// Uncomment the desired repository to use 
//$repository = new UserRepositoryMock();
$repository = new UserRepositorySqlite();

$userService = new UserService($repository);

$myNewUser = new User(100,"amartinez","mynewTest","Alejandro Martinez");

try{
	if ($userService->AddUser($myNewUser))
	{
		echo "User added successfully\n";
	}
}
catch(\Exception $e)
{
	echo "User cannot be added. Exception: ".$e->getMessage();	
}

$myNewUser = new User(101,"jperez","mynewTest23","Juan Perez");

try{
	if ($userService->AddUser($myNewUser))
	{
		echo "User added successfully\n";
	}
}
catch(\Exception $e)
{
	echo "User cannot be added. Exception: ".$e->getMessage();
}

$users = $userService->GetAllUsers();

foreach ($users as $user)
{
	echo "Displaying User Id ".$user->GetId()." Information:\n";
	echo "Full Name: ".$user->GetFullName()."\n";
	echo "User Name: ".$user->GetUserName()."\n";
	echo "Password: ".$user->GetPassword()."\n";
}

$findUser = $userService->FindUser(1);
if (!$findUser)
{
	echo "User not found";
}
else
{
	echo "Found User Id ".$findUser->GetId()." Information:\n";
	echo "Full Name: ".$findUser->GetFullName()."\n";
	echo "User Name: ".$findUser->GetUserName()."\n";
	echo "Password: ".$findUser->GetPassword()."\n";	
}