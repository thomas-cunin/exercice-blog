<?php

function findUser(string $username)
{
	$db = getConnection();

	$query = $db->prepare("
		SELECT id_user, username, email, password, avatar FROM users WHERE username = ?
	");

	$query->execute([
		$username
	]);

	$user = $query->fetch();

	return $user;
}
