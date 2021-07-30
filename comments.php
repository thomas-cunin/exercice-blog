<?php


$comments = findComments($_GET['id_post']);

/* $db = getConnection();

	$query = $db->prepare("
		SELECT c.id_comment, u.username, DATE_FORMAT(c.creation_date, '%d %M %Y') AS date, DATE_FORMAT(c.creation_date, '%H h %i') AS heure, c.content, u.avatar, u.id_user
		FROM comments AS c
		INNER JOIN users AS u
		ON c.id_user = u.id_user
		WHERE c.id_post = ?
		ORDER BY c.creation_date DESC
	");


	$query->execute([
		$_GET['id_post']
	]);

	$comments = $query->fetchAll(); */

  require 'comments.phtml';