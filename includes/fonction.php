<?php

function checkverif($user)
{
    include('../includes/db.php');

    $c = 'SELECT verification_email FROM UTILISATEUR WHERE email = :email';
    $req = $bdd->prepare($c);
    $req->execute([
        'email' => $user
    ]);

    $r = $req->fetchAll(PDO::FETCH_ASSOC);

    foreach ($r as $verif) {
        if ($verif['verification_email'] == "verifier") {
            return 'ok';
        }
    }
    return '';
}

function savekey($user, $key)
{
    include('../includes/db.php');

    $b = 'UPDATE UTILISATEUR SET verification_email = :code WHERE email = :email';
    $request = $bdd->prepare($b);
    $request->execute([
        'code' => $key,
        'email' => $user
    ]);
    return;
}

function getRandomKey($n)
{
    // Stockez toutes les lettres possibles dans une chaîne.
    $str = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomKey = '';

    // Générez un index aléatoire de 0 à la longueur de la chaîne -1.
    for ($i = 0; $i < $n; $i++) {
        $index = rand(0, strlen($str) - 1);
        $randomKey .= $str[$index];
    }

    return $randomKey;
}

function modif_date($date, $format)
{
    $timestamp = strtotime($date);
    if ($format == 'date_heure') {
        $newDate = date("d-m-Y H:i:s", $timestamp);
    }
    if ($format == 'date') {
        $newDate = date("d-m-Y", $timestamp);
    }

    return $newDate;
}
?>