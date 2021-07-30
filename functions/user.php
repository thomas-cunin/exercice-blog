<?php
function findUser(string $username): ?array
{
	$db = getConnection();

	$query = $db->prepare("
		SELECT id_user, username, email, password, avatar FROM users WHERE username = ?
	");

	$query->execute([
		$username
	]);

	$user = $query->fetch();

    if ($user === false) {
			// Cas où l'utilisateur n'existe pas
			return null;
    }

	return $user;
}
