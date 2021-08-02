<?php

session_start(); // Permet d'accéder aux données de session
require './functions/utils.php'; // redirect($url) : return header('location : $url')
require './functions/db_connection.php'; // getConnection() : return new PDO(...)
require './functions/post.php'; // findPost($user_id) : return $post
// deletePost($post_id) + updatePost($post_id, $post_data)
require './functions/user.php'; // findUser($username) : return $user
// deletePost($user_id) + updatePost($user_id, $user_data)
require './functions/auth.php'; // isAuthenticated() : return isset($_SESSION['auth'])

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


