<?php 

/***
 * Singleton example - Alejandro Martinez (almarag@gmail.com) 
 * Singleton Pattern ensures that a class (in this case, Singleton)
 * only allows to create a unique instance of himself. Singleton class 
 * overrides __construct, __clone and __wakeup method (making it private)  
 * preventing ways to clone or derive object instances, and making a static
 * instance to ensure we have only one instance of object in memory.
 * This pattern is useful for example, when we have configuration objects, 
 * which just need to have one single instance across application.W
 ***/
 
require_once("Singleton.php");
require_once("SingletonChild.php");

use BasicConcepts\DesignPatterns\Singleton\Singleton as Singleton;
use BasicConcepts\DesignPatterns\Singleton\SingletonChild as SingletonChild;

$singletonInstance = Singleton::getInstance();
var_dump($singletonInstance === Singleton::getInstance());

$newInstance = SingletonChild::getInstance(); // Will throw an exception because it cannot be hereby.
