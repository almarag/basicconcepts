<?php 

/***
 * Reflection example - Alejandro Martinez (almarag@gmail.com)
 * Starting at PHP5, core includes classes for Object Reflection. 
 * Reflection API makes possible to reverse-engineering objects on runtime
 * and deduce properties, methods, traits, constants and any part of given object
 * For more information about this topic, please consult http://php.net/manual/en/book.reflection.php
 * On this example, I created a class called ObjectToInspect which is being 
 * analyzed with Reflection to get properties and methods.
 ***/

	
require_once("ObjectToInspect.php");

use BasicConcepts\Reflection\ObjectToInspect as ObjectToInspect;

$obj = new ObjectToInspect();

$reflector = new ReflectionClass("BasicConcepts\Reflection\ObjectToInspect");

$properties = $reflector->getProperties();

echo "Object Properties: \n";
foreach ($properties as $property)
{
	echo "Property Name: ".$property->getName()."\n";
}

echo "Object Methods: \n";
$methods = $reflector->getMethods();

foreach ($methods as $method)
{
	echo "Method: ".$method->getName()."\n";
}