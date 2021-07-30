<?php
<<<<<<< HEAD

/** Contient toutes les fonctions concernant les utilisateurs */

/**
 * Récupère un utilisateur à partir de son pseudo
 *
 * @param string $username Le nom de l'utilisateur que l'on cherche dans la base de données
 * @return array|bool
 */
=======
>>>>>>> 7955a96f82ec84472a25bda5e1f6bd60ce587812
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
<<<<<<< HEAD
        return null;
    }

	return $user;
}
=======
			// Cas où l'utilisateur n'existe pas
			return null;
    }

	return $user;
}
>>>>>>> 7955a96f82ec84472a25bda5e1f6bd60ce587812
