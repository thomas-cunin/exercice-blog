<?php
session_start(); // Permet d'accéder aux données de session

require './functions/utils.php'; // redirect($url) : return header('location : $url')
require './functions/db_connection.php'; // getConnection() : return new PDO(...)

require './functions/user.php'; // findUser($username) : return $user
// deletePost($user_id) + updatePost($user_id, $user_data)
require './functions/auth.php'; // isAuthenticated() : return isset($_SESSION['auth'])

$db = getConnection();

//pagination
$ordersPerPage = 3;  // Nombre de ligne à afficher

// je vérifie si la page excite dans l'url
if (isset($_GET['page'])){
  $currentPage = (int) $_GET['page'];
}
else{ 
    // Si pas de numéro de page dans l'url alors c'est la page 1 par défaut
    $currentPage = 1;
  }
  
$query = $db->prepare("SELECT COUNT(*) AS total FROM posts");
$query->execute();
  
$totalOrders = $query->fetch()['total'];
  
$totalPages = ceil($totalOrders / $ordersPerPage);
  
if ($currentPage <= 0 || $currentPage > $totalPages) {
    // On indique le code HTTP 404 (au lieu du code 200 par défaut)
    header("HTTP/1.0 404 Not Found");
    require '404.php';
    exit();
}
  
$offset = $ordersPerPage * ($currentPage - 1);

// gestion des articles et de la pagination
// classement des article du plus récent en haut vers le moins récent en bas

$query = $db->prepare("
SELECT p.id_post, p.title, LEFT(p.content, 100) AS content, DATE_FORMAT(p.creation_date, '%d %M %Y') AS date, DATE_FORMAT(p.creation_date, '%H h %i') AS heure , p.creation_date, u.username, u.avatar, c.name_categorie
FROM posts p 
INNER JOIN users u ON u.id_user = p.id_user
INNER JOIN categories c ON p.id_category = c.id_category
ORDER BY creation_date DESC
LIMIT $ordersPerPage OFFSET $offset
");

$query->execute();

$posts = $query->fetchAll();


$template = 'index';

$title = 'Bienvenue sur mon blog';

require './template.phtml';
