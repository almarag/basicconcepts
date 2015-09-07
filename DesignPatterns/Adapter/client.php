<?php 

/** 
 * Adapter Pattern Example - Alejandro Martinez (almarag@gmail.com)
 * The Adapter Pattern establish an interface between client and
 * one or multiple classes that exposes different methods. 
 * Interface adapts the methods from the classes to the expected
 * methods by the client. On this case, client expects to set user
 * using a single method (SetUser) and Adapter combines the 
 * setUsername(), setPassword() and setFullName() methods from the
 * class User to adapt the input methods into class methods. 
 **/
 
require_once("IUserAdapter.php");
require_once("UserAdapter.php");
require_once("User.php");

use BasicConcepts\DesignPatterns\Adapter\UserAdapter as UserAdapter;
	
$adapter = new UserAdapter();
$adapter->SetUser("almarag", "123test", "Alejandro Martinez");
$adapter->GetCurrentUserInfo();