  <?php
  require '../functions/db_connection.php';
  // --------- Début AUTH GUARD ------------ //
  $idForAccess = -1; // Sert dans le cas où un utilisateur veut modifier son propre post
  $rankForAccess = 2; // Le niveau 1 est le niveau de l'utilsiateur lambda
  require 'auth_guard.php';
  // --------- Fin AUTH GUARD ------------ //
  $db = getConnection();
  //Liste des catégories
  $query = $db->prepare("SELECT id_category, name_categorie FROM categories");

  // Exécution de la requête
  $query->execute();

  // On récupère tous les résultats de la requête dans une variable $customers
  $categories = $query->fetchAll();

  // var_dump($_SESSION['auth']);


  if (isset($_POST) AND !empty($_POST['title']) AND !empty($_POST['content']) AND !empty($_POST['id_categorie']) ) {

    // Enregistrement dans la base de données
    $query = $db->prepare("
  INSERT INTO posts(title, content, id_user, id_category, creation_date) VALUES(?, ?, ?, ?, NOW())
");

    $query->execute([
      $_POST['title'],
      $_POST['content'],
      $_SESSION['auth']['id'],
      $_POST['id_categorie']
    ]);

    header('location: ../login.php');
  };

$template = 'add_post';

$title = "Poster un nouvel article";

require 'admin_template.phtml';

  ?>
