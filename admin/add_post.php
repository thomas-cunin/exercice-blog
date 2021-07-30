  <?php
// --------- Début AUTH GUARD ------------ //
  $idForAccess = -1; // Sert dans le cas où un utilisateur veut modifier son propre post
  $rankForAccess = 2; // Le niveau 1 est le niveau de l'utilsiateur lambda
  require 'auth_guard.php';
// --------- Fin AUTH GUARD ------------ //
 ?>
