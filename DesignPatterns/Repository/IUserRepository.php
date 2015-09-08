<?php namespace BasicConcepts\DesignPatterns\Repository;

interface IUserRepository
{
	function FindUser($id);
	function AddUser(User $user);
	function UpdateUser(User $user);
	function DeleteUser($id);
	function GetAllUsers();
}