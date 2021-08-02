<?php

if (! isset($_SESSION['auth'])) {
	redirect('./login.php');
}

if (empty($_POST)) {

	$db = getConnection();
    // Récupération de l'user (dont l'id est dans la SESSION) pour pré-remplir le champs Input
    // $query = $db->prepare("
	// 	SELECT *
	// 	FROM users
	// 	WHERE usermane = ?
	// ");
	// var_dump($_SESSION['auth']['username']);
	// $query->execute([
	// 	$_SESSION['auth']['username']
	// ]);

	// $user = $query->fetch();

	$user = findUser($_SESSION['auth']['username']);
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
	$db = getConnection();
	$query = $db->prepare("
    INSERT INTO comments SET content = ?, id_post = ?, id_user = ?, creation_date = NOW()
");
var_dump($_POST);
$query->execute([
    $_POST['content'],
    $_POST['id_post'],
    $_POST['id_user']
]);

    // Rediriger vers la liste des employés
	redirect('./post.php?id_post=' . $_GET['id_post']);
}


var_dump($_POST);


require './form_comment.phtml';