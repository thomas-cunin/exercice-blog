<?php

/** Contient toutes les fonctions concernant les utilisateurs */

/**
 * Récupère un post à partir de son ID
 *
 * @param string $username Le nom de l'utilisateur que l'on cherche dans la base de données
 * @return array|bool
 */

function findPost(string $id_post)
{
	$db = getConnection();

	$query = $db->prepare("
	SELECT p.id_post, p.title, p.content, DATE_FORMAT(p.creation_date, '%d %M %Y') AS date, DATE_FORMAT(p.creation_date, '%H h %i') AS heure , p.creation_date, u.username, u.avatar, c.name_categorie,email
	FROM posts p 
	INNER JOIN users u ON u.id_user = p.id_user
	INNER JOIN categories c ON p.id_category = c.id_category
	WHERE id_post = ?
	");

	$query->execute([
		$id_post
	]);

	$posts = $query->fetch();

    if ($posts === false) {
        return null;
    }
	return $posts;
}

function findComments($post_id)
{
	$db = getConnection();

	$query = $db->prepare("
		SELECT c.id_comment, u.username, DATE_FORMAT(c.creation_date, '%d %M %Y') AS date, DATE_FORMAT(c.creation_date, '%H h %i') AS heure, c.content, u.avatar, u.id_user
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