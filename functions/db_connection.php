<?php

function getConnection(): PDO
{
	$host = 'localhost';
	$dbname = 'blog';
	$user = 'root';
	$password = '';

	return new PDO("mysql:host=$host;dbname=$dbname;charset=UTF8", $user, $password, [
		PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
		PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
	]);
}