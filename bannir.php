<?php
include('includes/db.php');

$q = 'SELECT * FROM UTILISATEUR WHERE email = ? ';
$req = $bdd->prepare($q);
$req->execute([$_POST['email']]);

$results = $req->fetch(PDO::FETCH_ASSOC);

if ($results['ban'] == "0") {
    $q = 'UPDATE UTILISATEUR SET ban = "1" WHERE email = :email';
    $req = $bdd->prepare($q);
    $result = $req->execute([
        'email' => $results['email']
    ]);
    
    header('location: administration_gest.php?message=Le compte a été banni avec succès.&type=success');
    exit;
} else {
    $q = 'UPDATE UTILISATEUR SET ban = "0" WHERE email = :email';
    $req = $bdd->prepare($q);
    $result = $req->execute([
        'email' => $results['email']
    ]);

    header('location: administration_gest.php?message=Le compte a été débanni avec succès.&type=success');
    exit;
}
