<?php session_start();

include('includes/db.php');

$q = 'DELETE FROM POST WHERE id = :id';
$req = $bdd->prepare($q);
$result = $req->execute([
    'id' => $_GET['id']
]);
if ($result) {
    header('location: administration_gest posts.php?message=Le post a été supprimé avec succès.&type=success');
} else {
    header('location: administration_gest posts.php?message=Une erreur est survenue.&type=success');
}
exit;