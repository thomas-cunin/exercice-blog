<?php


function findPost($id_post)
{
	var_dump($id_post);
	$db = getConnection();


	$query = $db->prepare("
		SELECT p.id_post, u.username, p.content, p.creation_date, u.email, u.id_user, p.title, cat.name_categorie, u.avatar
		FROM posts AS p
		INNER JOIN users AS u
		ON p.id_user = u.id_user
		INNER JOIN categories as cat
		ON p.id_category = cat.id_category
		WHERE p.id_post = ?
	");

	$query->execute([
		$id_post
	]);

	$posts = $query->fetch();

	return $posts;
}

function findComments($post_id)
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
