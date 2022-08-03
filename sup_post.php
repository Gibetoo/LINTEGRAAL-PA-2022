<?php session_start();

include('includes/db.php');

$q = 'DELETE FROM POST WHERE utilisateur = :utilisateur AND id = :id';
$req = $bdd->prepare($q);
$result = $req->execute([
    'utilisateur' => $_SESSION['email'],
    'id' => $_GET['id']
]);
if ($result) {
    header('location: mon_profil.php?message=L\'article a été supprimé avec succès.&type=success');
} else {
    header('location: mon_profil.php?message=Erreur.&type=danger');
}
exit;
