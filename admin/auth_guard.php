<?php
session_start();
require '../functions/auth.php'; // isAuthenticated() : return isset($_SESSION['auth'])
$redirectionLink = '../index.php';
if (!isAuthenticated()){
  header("location: $redirectionLink");
  exit();
} elseif ($_SESSION['auth']['rank'] < $rankForAccess AND $_SESSION['auth']['rank'] !== $idForAccess) {
  header("location: $redirectionLink");
  exit();
}
 ?>
