<?php 

/***
 * Repository pattern example - Alejandro Martinez (almarag@gmail.com)
 * Repository Pattern is one of the most useful patterns for any database driven app.
 * This pattern allows to encapsulate the Data Access layer using a Service wrapper.
 * This wrapper acts as common decoupling interface between application and data layer using data repositories, that way
 * we can switch repositories without affecting upper layers into application.
 * On this example, I used a Mock Repository using in memory arrays (ideal to unit testing)
 * Also, I used a Sqlite repository to do the real persistence. Based on this paradigm, if we want
 * to use MySQL or SQL Server, I just need to create a UserRepositoryMySQL or UserRepositorySQLServer, each one
 * with the right connection configuration and sentences to do persistence.  
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