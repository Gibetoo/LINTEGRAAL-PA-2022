<?php

$d = 'SELECT admin FROM UTILISATEUR WHERE email = "' . $_SESSION['email'] . '"';
$req = $bdd->query($d);
$ad = $req->fetchAll(PDO::FETCH_ASSOC);

foreach ($ad as $admin) {
    if (($admin['admin'] != 'admin')) {
        header('location: http://lintegraal.site/?message=Vous n\'êtes pas autorisé a accéder a cette page.&type=danger');
        exit;
    };
}
?>