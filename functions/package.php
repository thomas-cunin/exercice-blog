<?php
require './functions/utils.php'; // redirect($url) : return header('location : $url')
require './functions/db_connection.php'; // getConnection() : return new PDO(...)
require './functions/post.php'; // findPost($user_id) : return $post
// deletePost($post_id) + updatePost($post_id, $post_data)
require './functions/user.php'; // findUser($username) : return $user
// deletePost($user_id) + updatePost($user_id, $user_data)
require './functions/auth.php'; // isAuthenticated() : return isset($_SESSION['auth'])
<<<<<<< HEAD
 ?>
=======
 ?>
>>>>>>> 7955a96f82ec84472a25bda5e1f6bd60ce587812
