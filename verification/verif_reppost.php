<?php
session_start();
include('../includes/db.php');

if (!isset($_POST['sujet']) || empty($_POST['sujet'])) {
  header('location: ../post.php?message=Veuillez compléter tous les champs !&type=danger');
  exit;
}


$sujetrep = htmlspecialchars($_POST['sujet']);

$insertrep = 'INSERT INTO REPPOST (sujet,id_post,utilisateur) VALUES (:sujet,:id_post,:utilisateur)';
$insertlarep = $bdd->prepare($insertrep);
$resultat = $insertlarep->execute([
  'sujet' => $sujetrep,
  'id_post' => $_POST['id_post'],
  'utilisateur' =>$_SESSION['email']

]);

if ($resultat) {
  header('location: ../rep_post.php?id_post='.$_POST['id_post'].'&message=Votre question a bien été postée sur le site !&type=success');
  exit;
} else {
  header('location: ../rep_post.php?message=Erreur lors de l\'enregistrement.&type=danger');
  exit;
}

?>
