<?php session_start();
include('db.php');


$q = 'SELECT * FROM UTILISATEUR';
$req = $bdd->query($q);
$result = $req->fetchAll(PDO::FETCH_ASSOC);

// On récupère le nom dans l'url
$searchQuery = $_REQUEST["resultat"];
$tab = [];


// On regarde si on possède un résultat correspondant à la recherche
if (!empty($searchQuery)) {
  $len = strlen($searchQuery);

  foreach ($result as $utilisateur) {
    if (stristr($searchQuery, substr($utilisateur['email'], 0, $len))) {
      $tab[] = $utilisateur;
    }
  }
} else {
  $tab = [];
}


// Afficher aucun résultat si == ''
if ($tab != []) {
  echo '<table class="text-white table table-striped mt-5">';
  echo '<thead>';
  echo '<tr>';
  echo '<th scope="col"></th>';
  echo '<th scope="col">Email</th>';
  echo '<th scope="col">Nom</th>';
  echo '<th scope="col">Prenom</th>';
  echo '<th scope="col">Niveau de compte</th>';
  echo '<th scope="col">Role</th>';
  echo '<th scope="col">Actions</th>';
  echo '<th scope="col">Droits</th>';
  echo '<th scope="col">Bnnnir</th>';
  echo '<th scope="col">Sup. Compte</th>';
  echo '</tr>';
  echo '</thead>';
  echo '<tbody>';
  foreach ($tab as $utilisateur) {
    echo '<tr>';
    echo '<td></td>';
    echo '<td class="text-white">' . $utilisateur['email'] . '</td>';
    echo '<td class="text-white">' . $utilisateur['nom'] . '</td>';
    echo '<td class="text-white">' . $utilisateur['prenom'] . '</td>';
    echo '<td class="text-white">' . $utilisateur['niveau_de_cmpt'] . '</td>';
    echo '<td class="text-white">' . $utilisateur['admin'] . '</td>';
    echo '<td>';
    echo '<button class="btn btn-primary btn-sm" href="#">Consulter</button>';
    echo '</td>';
    echo '<td>';
    if ($utilisateur['email'] != $_SESSION['email']) {
      echo '<form action="mod_droits.php" method="POST">';
      echo '<button type="submit" value="' . $utilisateur['email'] . '" name="email" class="btn btn-primary btn-sm">Modifier les droits</button>';
      echo '</form>';
    } else {
      echo '<a class="btn btn-secondary btn-sm">Modifier les droits</a>';
    }
    echo '</td>';
    echo '<td>';
    if ($utilisateur['email'] != $_SESSION['email']) {
      echo '<form action="bannir.php" method="POST">';
      if ($utilisateur['ban'] == 0) {
        echo '<button type="submit" value="' . $utilisateur['email'] . '" name="email" class="btn btn-danger btn-sm">Bannir</button>';
      } else {
        echo '<button type="submit" value="' . $utilisateur['email'] . '" name="email" class="btn btn-warning btn-sm">débannir</button>';
      }
      echo '</form>';
    } else {
      echo '<a class="btn btn-secondary btn-sm">Bannir</a>';
    }
    echo '</td>';
    echo '<td>';
    if ($utilisateur['email'] != $_SESSION['email']) {
      echo '<form action="sup_user.php" method="POST">';
      echo '<button type="submit" value="' . $utilisateur['email'] . '" name="email" class="btn btn-danger btn-sm">Supprimer</button>';
      echo '</form>';
    } else {
      echo '<a class="btn btn-secondary btn-sm">Supprimer</a>';
    }
    echo '</td>';
    echo '</tr>';
  }
  echo '</tbody>';
  echo '</table>';
} else {
  echo '<h1 class="my-5 pb-3 h3 text-white d-flex justify-content-center">Utilisateur inéxistant</h1>';
}
