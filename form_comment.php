<?php

if (! isset($_SESSION['auth'])) {
	redirect('./login.php');
}

if (empty($_POST)) {

    // Récupération de l'user (dont l'id est dans la SESSION) pour pré-remplir le champs Input
    $query = $db->prepare("
		SELECT username
		FROM users
		WHERE usermane = ?
	");

	$query->execute([
		$_SESSION['username']
	]);

	$user = $query->fetch();

    // Récupération de l'user (dont l'id est dans la SESSION) pour pré-remplir le champs Input
    $query = $db->prepare("
		SELECT id_post
		FROM posts
		WHERE id_post = ?
	");

	$query->execute([
		$_GET['id_post']
	]);

	$idPost = $query->fetch();
}
else{
    // Modification en base de données : récupérer toutes les données du formulaire
	$query = $db->prepare("
    INSERT INTO comments SET content = ?, id_post = ?, id_user = ?
");

$query->execute([
    $_POST['username'],
    $_POST['id_post'],
    $_POST['id_user']
]);

    // Rediriger vers la liste des employés
	redirect('./post.php?id_post');
}


var_dump($_POST);


require './form_comment.phtml';