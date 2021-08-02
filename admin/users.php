<?php 
  require '../functions/db_connection.php';
  // --------- Début AUTH GUARD ------------ //
  $idForAccess = -1; // Sert dans le cas où un utilisateur veut modifier son propre post
  $rankForAccess = 1; // Le niveau 1 est le niveau de l'utilsiateur lambda
  require 'auth_guard.php';
  // --------- Fin AUTH GUARD ------------ //
$db = getConnection();

$query = $db->prepare("
    SELECT u.id_user, u.username, u.email, u.avatar, r.rank 
    FROM users AS u 
    INNER JOIN ranking AS r 
    ON u.id_user = r.id_user
");

$query->execute();

$users = $query->fetchAll();

$template = 'users';

$title = "Liste des utilisateurs";

require 'admin_template.phtml';