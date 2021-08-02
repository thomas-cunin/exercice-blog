<?php 
  require '../functions/db_connection.php';
  require '../functions/auth.php';
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