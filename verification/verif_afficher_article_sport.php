<?php 
session_start();
include('includes/db.php');

$y = 'SELECT * FROM ACTUS WHERE categorie = :categorie and  pub = "admin" ORDER BY date DESC';
$AllPosteco = $bdd->prepare($y);
$AllPosteco->execute([
    'categorie' => "Sport"
]);

// $post = $AllPost->fetch();


if (isset($_POST['submit_commentaire'])){

    if (isset($_POST['pseudo']) AND isset($_POST['commentaire']) AND !empty($_POST['pseudo']) AND !empty($_POST['commentaire'])){
        
        $pseudo = htmlspecialchars($_POST['pseudo']);
        $commentaire = htmlspecialchars($_POST['commentaire']);

        if (strlen($pseudo) < 25){
            $q = 'INSERT INTO COMMENTAIRE (pseudo, commentaire, id_actus) VALUES (:pseudo, :commentaire, :id_actus)';
            $req = $bdd->prepare($q); // Préparation de la requete
            $result = $req->execute([
                'pseudo' => $pseudo,
                'commentaire' => $commentaire,
                'id_actus' => $_POST['id_actus']
            ]);
            $c_erreur = "Votre commentaire a bien été posté";
        }
    } else {
        $c_erreur = "Tous les champs doivent etre complétés";
    }
}

// var_dump($post)
?>