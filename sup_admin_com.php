<?php session_start();

include('includes/db.php');

$q = 'DELETE FROM COMMENTAIRE WHERE pseudo = :pseudo AND id = :id';
$req = $bdd->prepare($q);
$result = $req->execute([
    'pseudo' => $_POST['pseudo'],
    'id' => $_POST['id']
]);

if ($result) {
    header('location: administration_guest com.php?message=L\'article a été supprimé avec succés.&type=success');
    exit;
} else {
    header('location: administration_guest com.php?message=Erreur.&type=danger');
    exit;
}