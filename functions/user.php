<?php

/** Contient toutes les fonctions concernant les utilisateurs */

/**
 * Récupère un utilisateur à partir de son pseudo
 *
 * @param string $username Le nom de l'utilisateur que l'on cherche dans la base de données
 * @return array|bool
 */

function findUser(string $username): ?array
{
	$db = getConnection();

	$query = $db->prepare("
		SELECT u.id_user, u.username, u.email, u.password, u.avatar, r.rank 
		FROM users AS u 
		INNER JOIN ranking AS r 
		ON u.id_user = r.id_user
		WHERE username = ?
	");

	$query->execute([
		$username
	]);

	$user = $query->fetch();

    if ($user === false) {
        return null;
    }

	return $user;
}

