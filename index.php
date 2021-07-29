<?php
session_start(); // Permet d'accéder aux données de session

require './functions/utils.php'; // redirect($url) : return header('location : $url')
require './functions/db_connection.php'; // getConnection() : return new PDO(...)

require './functions/user.php'; // findUser($username) : return $user
// deletePost($user_id) + updatePost($user_id, $user_data)
require './functions/auth.php'; // isAuthenticated() : return isset($_SESSION['auth'])

$db = getConnection();

$query = $db->prepare("
SELECT p.id_post, p.title, LEFT(p.content, 200) AS content, DATE_FORMAT(p.creation_date, '%d %M %Y') AS date, DATE_FORMAT(p.creation_date, '%H h %i') AS heure , u.username, u.avatar, c.name_categorie
FROM posts p 
INNER JOIN users u ON u.id_user = p.id_user
INNER JOIN categories c ON p.id_category = c.id_category
");

$query->execute();

$posts = $query->fetchAll();


$template = 'index';

$title = 'Bienvenue sur mon blog'; // titre dans la balise title du head dans la template.phtml

require './template.phtml';
