<?php

/** Contient toutes les fonctions concernant les utilisateurs */

/**
 * Récupère un post à partir de son ID
 *
 * @param string $username Le nom de l'utilisateur que l'on cherche dans la base de données
 * @return array|bool
 */
function findUser(string $post_id): array|bool
{
	$db = getConnection();

	$query = $db->prepare("
		SELECT id_post, title, content, creation_date FROM posts WHERE id_post = ?
	");

	$query->execute([
		$id_post
	]);

	$user = $query->fetch();

	return $user;
}
