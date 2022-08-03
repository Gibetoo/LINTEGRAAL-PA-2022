<?php

include('includes/db.php');

    $u = 'SELECT verification_email FROM UTILISATEUR WHERE email = ?';
    $requete = $bdd->prepare($u);
    $requete->execute([$_GET['user']]);

    $r = $requete->fetchAll(PDO::FETCH_ASSOC);

    foreach ($r as $verif) {
        if ($verif['verification_email'] == $_GET['key']) {

            $t = 'UPDATE UTILISATEUR SET verification_email = "verifier" WHERE email = ?';
            $request = $bdd->prepare($t);
            $request->execute([$_GET['user']]);
        }
    }

header('location: http://lintegraal.site/?message=Votre compte a bien été activé.&type=success');
exit;

?>