<?php session_start();

include('includes/db.php');

$q = 'DELETE FROM ACTUS WHERE id = :id';
$req = $bdd->prepare($q);
$result = $req->execute([
    'id' => $_POST['id']
]);

if ($result) {
    header('location: administration_gest actus.php?message=L\'article a été supprimé avec succès.&type=success');
    exit;
} else {
    header('location: administration_gest actus.php?message=Erreur.&type=danger');
    exit;
}