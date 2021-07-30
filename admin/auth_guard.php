<?php
session_start();
require '../functions/auth.php'; // isAuthenticated() : return isset($_SESSION['auth'])
$redirectionLink = '../index.php';
if (!isAuthenticated()){
  header('location : ' . $redirectionLink);
} elseif ($_SESSION['auth']['rank'] < $rankForAccess) {
  header('location : ' . $redirectionLink);
}
 ?>
