<?php

/** Contient toutes les fonctions concernant les utilisateurs */

/**
 * Récupère un post à partir de son ID
 *
 * @param string $username Le nom de l'utilisateur que l'on cherche dans la base de données
 * @return array|bool
 */
function findPost(string $id_post): array|bool
{
	$db = getConnection();

	$query = $db->prepare("
		SELECT id_post, title, content, creation_date FROM posts WHERE id_post = ?
		SELECT p.id_post, u.username, p.content, p.creation_date, u.email, u.id_user
		FROM posts AS p
		INNER JOIN users AS u
		ON p.id_user = u.id_user
		WHERE p.id_post = ?
	");

	$query->execute([
		$id_post
	]);

	$posts = $query->fetch();

	return $posts;
}

function getComments(string $post_id): array|bool
{
	$db = getConnection();

	$query = $db->prepare("
		SELECT c.id_comment, u.username, c.creation_date, c.content, u.avatar, u.id_user
		FROM comments AS c
		INNER JOIN users AS u
		ON c.id_user = u.id_user
		WHERE c.id_post = ?
		ORDER BY c.creation_date DESC
	");


	$query->execute([
		$post_id
	]);

	$comments = $query->fetchAll();

	return $comments;
}
