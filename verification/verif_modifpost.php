<?php
session_start();

include('../includes/db.php');

if (isset($_POST['validate'])) {

  if (isset($_POST['titre']) && !empty($_POST['titre']) && isset($_POST['sujet']) && !empty($_POST['sujet']) && isset($_POST['categorie']) && !empty($_POST['categorie']) ) {
    $titre = htmlspecialchars($_POST['titre']);
    $sujet = nl2br(htmlspecialchars($_POST['sujet']));
    $post_date = date('d/m/y');
   

    $insert = 'UPDATE POST SET titre = :titre, sujet = :sujet WHERE utilisateur = :utilisateur and id = :id';
    $insertPost = $bdd->prepare($insert);
    $result = $insertPost->execute([
      'titre' => $titre,
      'sujet' => $sujet,
      'utilisateur' => $_SESSION['email'],
      'id' => $_POST['id_post']
    ]);

    if ($result) {
      header('location: ../post.php?message=Votre question a bien été postée sur le site !&type=success');
      exit;
    } else {
      header('location: ../post.php?message=Erreur lors l\'enregistrement.&type=danger');
      exit;
    }
  } else {
    header('location: ../post.php?message=Veuillez compléter tous les champs !&type=danger');
    exit;
  }

}