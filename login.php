<?php
session_start();
require './functions/utils.php'; // redirect($url) : return header('location : $url')
require './functions/db_connection.php'; // getConnection() : return new PDO(...)
require './functions/post.php'; // findPost($user_id) : return $post
// deletePost($post_id) + updatePost($post_id, $post_data)
require './functions/user.php'; // findUser($username) : return $user
// deletePost($user_id) + updatePost($user_id, $user_data)
require './functions/auth.php'; // isAuthenticated() : return isset($_SESSION['auth'])
if (isAuthenticated()){
  header('Location: ./index.php');

};
if (isset($_SESSION['error'])){
	var_dump($_SESSION['error']);
};

if (!empty($_POST)) {
	// Gestion de l'inscription

	// On récupère l'utilisateur correspondant au nom qui a été saisi dans le formulaire
	$user = findUser($_POST['username']);
  if (is_null($user)) {
    // Cas où l'utilisateur n'existe pas
    $_SESSION['error'] = "user does not exist";
    header('Location: login.php');
    exit();
  }
	// Gestion d'erreur sur le mot de passe
	if ( !password_verify($_POST['password'], $user['password'])) {
		// Cas où le mot de passe ne correspond pas
		$_SESSION['error'] = "password is wrong";
		header('Location: login.php');
		exit();
	}

	// Nom d'utilisateur et mot de passe OK !
	// => Connexion de l'utilisateur : on enregistre les informations de l'utilisateur dans la session
	$_SESSION['auth'] = [
		'id' => $user['id'],
		'username' => $user['username'],
		'email' => $user['email']
	];

	header('Location: index.php');
	exit();
}
$template = 'login';

$title = "Connexion";

require 'template.phtml';
