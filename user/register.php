<?php
session_start();
require 'utils.php'; // redirect($url) : return header('location : $url')
require 'db_connection.php'; // getConnection() : return new PDO(...)
require 'post.php'; // findPost($user_id) : return $post
// deletePost($post_id) + updatePost($post_id, $post_data)
require 'user.php'; // findUser($username) : return $user
// deletePost($user_id) + updatePost($user_id, $user_data)
require 'auth.php'; // isAuthenticated() : return isset($_SESSION['auth'])
if (isAuthenticated()){
  redirect('../index.php');
};

$db = getConnection();

// Si on a envoyé des données depuis le formulaire (si on a cliqué sur le bouton du formulaire)
// On enregistre l'utilisateur
if (! empty($_POST)) {

  var_dump($_SESSION['errors']); // For dev
	// Tableau (stocké dans la session) contenant toutes les erreurs du formulaire
	$_SESSION['errors'] = [];

	// Est-ce que le mot de passe est assez long ?
	if (strlen($_POST['password']) < 6) {
		$_SESSION['errors']['password'] = "Le mot de passe est trop court";
	}

	// Est-ce que l'utilisateur n'existe pas déjà avec ce pseudo
	// On récupère l'utilisateur correspondant au nom qui a été saisi dans le formulaire
	$user = findUser($_POST['username']);

	// Si l'utilisateur n'est pas vide => il existe déjà
	if (! empty($user)) {
		$_SESSION['errors']['username'] = "Il existe déjà un utilisateur avec ce pseudo";
	}

	// Avant d'enregistrer on regarde s'il y a des erreurs dans le formulaire
	// S'il y a des erreurs dans le tableau on redirige vers le formulaire d'inscription
	if (count($_SESSION['errors']) > 0) {
		header('Location: register.php');
		exit();
	} else {
		// Pas d'erreurs dans le formulaire ? On supprime le tableau contenant les erreurs
		unset($_SESSION['errors']);
	}

	// Enregistrement dans la base de données
	$query = $db->prepare("
		INSERT INTO users(username, email, password, creation_date) VALUES(?, ?, ?, NOW())
	");

	$query->execute([
		$_POST['username'],
		$_POST['email'],
		password_hash($_POST['password'], PASSWORD_BCRYPT)
	]);

	redirect('login.php');
}

$template = 'register';
$title = 'Inscription';
require '../template.phtml';
