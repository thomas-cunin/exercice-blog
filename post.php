<?php
session_start(); // Permet d'accéder aux données de session
require './functions/package.php';

if (isset($_GET['id_post']) AND findPost($_GET['id_post']) !== false){
  $post = findPost($_GET['id_post']);
  // Template -> post.phtml
  $template = 'post';

  $title = $post['title'];
  
require './template.phtml';

}
 else {
  echo 'pb';
  var_dump($_GET['id_post']);
  var_dump(findPost($_GET['id_post']));
};

