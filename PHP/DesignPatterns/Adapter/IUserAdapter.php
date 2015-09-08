<?php namespace BasicConcepts\DesignPatterns\Adapter;
	
interface IUserAdapter
{
	function SetUser($username, $password, $fullname);
	function GetCurrentUserInfo();	
}