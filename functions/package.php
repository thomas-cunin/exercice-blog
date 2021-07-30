<?php
require 'utils.php'; // redirect($url) : return header('location : $url')
require 'db_connection.php'; // getConnection() : return new PDO(...)
require 'post.php'; // findPost($user_id) : return $post
// deletePost($post_id) + updatePost($post_id, $post_data)
require 'user.php'; // findUser($username) : return $user
// deletePost($user_id) + updatePost($user_id, $user_data)
require 'auth.php'; // isAuthenticated() : return isset($_SESSION['auth'])
 ?>
