<?php session_start();

include('includes/db.php');

$q = 'DELETE FROM ACTUS WHERE email = :email AND id = :id';
$req = $bdd->prepare($q);
$result = $req->execute([
    'email' => $_SESSION['email'],
    'id' => $_GET['id']
]);

if ($result) {
    header('location: mon_profil.php?message=L\'article a été supprimé avec succès.&type=success');
} else {
    header('location: mon_profil.php?message=Erreur.&type=success');
}
exit;
