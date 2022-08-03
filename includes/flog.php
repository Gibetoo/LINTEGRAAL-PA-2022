<?php

// fonction qui permet d'écrire dans un fichier log les différentes actions des utilisateurs. $success prend soit la valeur true soit false, $email prend l'email de l'utilisateur en valeur, $type permet de savoir le type que la log prendra (connexion ,deconnexion, inscription).
// function ecrire_un_log($success, $email, $type)
// {
//     $monfichier = fopen('log.txt', 'a+');
//     $date = "\n". date('d\/m\/Y - H:i:s') . ' - Tentative de '. (($type == 'connexion') ? 'connexion': (($type == 'deconnexion') ? 'déconnexion':(($type == 'inscription') ? 's\'inscrire':''))).' '.($success ? 'réussie' : 'échouée') . ' de : ' . $email . "\r";
//     fputs($monfichier, $date);
// }

function ecrire_un_log($success, $email, $type){

    if ($type == 'connexion') {
        $action = 'Connexion';
    } elseif ($type == 'deconnexion'){ 
        $action = 'Déconnexion';
    } elseif ($type == 'inscription') {
        $action = 'Inscrit';
    } elseif ($type == 'visite') {
        $action = 'Acces au site';
    } elseif ($type == 'visite_admin') {
        $action = 'Acces page admin';
    } elseif ($type == 'actu') {
        $action = 'Actu Publiée';
    } elseif ($type == 'post') {
        $action = 'Post Publié';
    }

    if ($success){
        $desc = "réussie" ;
    } else {
        $desc = "échouée";
    }

    try{
       $bdd = new PDO('mysql:host=localhost;dbname=BDD_INTEGRAAL','monUser','myPasswd');
    }catch(Exception $e){
       die('Erreur' . $e->getmessage());
    }

    $z = 'INSERT INTO LOG(date,reussite,action,email) VALUES (:date,:reussite,:action,:email)';
    $env = $bdd->prepare($z);
    $env->execute([
        'date' =>  date('Y-m-d H:i:s', time()+3600),
        'reussite' => $desc,
        'action' => $action,
        'email' => $email
    ]);
}

?>