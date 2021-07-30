<<<<<<< HEAD
<?php




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
		$_GET['id_post']
	]);

	$comments = $query->fetchAll();

=======
<?php

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
		$_GET['id_post']
	]);

	$comments = $query->fetchAll();

>>>>>>> 7955a96f82ec84472a25bda5e1f6bd60ce587812
  require 'comments.phtml';