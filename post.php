<?php
session_start(); // Permet d'accéder aux données de session
require './functions/package.php';

if (isset($_GET['id']) AND findPost($_GET['id']) !== false){
  $post = findPost($_GET['id']);
  // Template -> post.phtml
  $template = 'post';

  $title = $post['title'];

  require './template.phtml';

} else {
  echo 'pb';
  var_dump($_GET['id']);
  var_dump(findPost($_GET['id']));
}
