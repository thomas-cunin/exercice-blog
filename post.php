<?php
session_start(); // Permet d'accéder aux données de session
require './functions/package.php';

if (isset($_GET['id']) && findPost($_GET['id']) !== false){
  $post = findPost($_GET['id']);
  // Template -> post.phtml
  $template = 'post';

  $title = $post['title'];

  require './template.phtml';

} else {
  redirect('./index.php');
}
