<?php
session_start();

include('includes/db.php');

$q = 'SELECT * FROM UTILISATEUR WHERE email = ? ';
$req = $bdd->prepare($q);
$req->execute([$_POST['email']]);

$results = $req->fetchAll(PDO::FETCH_ASSOC);

foreach ($results as $utilisateur) {
    if ($utilisateur['admin'] == 'user') {
        $q = 'UPDATE UTILISATEUR SET admin = "admin" WHERE email = ?';
        $req = $bdd->prepare($q);
        $result = $req->execute([$_POST['email']]);
    } else {
        $q = 'UPDATE UTILISATEUR SET admin = "user" WHERE email = ?';
        $req = $bdd->prepare($q);
        $result = $req->execute([$_POST['email']]);
    }
}

header('location: administration_gest.php?message=Droits d\'utilisateur modifiés avec succès.&type=success');
exit; 

?>