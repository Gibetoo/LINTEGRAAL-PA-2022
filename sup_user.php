<?php
include('includes/db.php');

$q = 'SELECT * FROM UTILISATEUR WHERE email = ? ';
$req = $bdd->prepare($q);
$req->execute([$_POST['email']]);

$results = $req->fetch(PDO::FETCH_ASSOC);

$q = 'DELETE FROM UTILISATEUR WHERE email = :email';
$req = $bdd->prepare($q);
$result = $req->execute([
    'email' => $results['email']
]);

header('location: administration_gest.php?message=Le compte a été supprimé avec succès.&type=success');
exit;