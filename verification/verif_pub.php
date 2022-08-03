<?php
session_start();

include('../includes/db.php');
include('../includes/flog.php');

if (!isset($_POST['article_titre']) || empty($_POST['article_titre']) || !isset($_POST['article_contenu']) || empty($_POST['article_contenu'])) {
    header('location: ../pub_actus.php?message=Vous devez remplir tout les  champs.&type=danger');
    exit;
}

if ($_FILES['article_image']['error'] == 0) {

    $maxSize = 2097152;
    $validExt = [
        'image/jpeg',
        'image/png',
        'image/gif',
        'image/webp'
    ];

    if ($_FILES['article_image']['size'] > $maxSize) {
        header('location: ../pub_actus.php?message=Le fichier est trop lourd !.&type=danger');
        exit;
    }

    $fileName = $_FILES['article_image']['name'];

    if (!in_array($_FILES['article_image']['type'], $validExt)) {
        header('location: ../pub_actus.php?message=Le fichier n\'est pas valide !.&type=danger');
        exit;
    }

    $chemin = 'upload';
    if (!file_exists($chemin)) {
        mkdir($chemin);
    }

    $array = explode('.', $fileName);
    $extension = end($array);
    $filename = 'image-' . time() . '.' . $extension;
    $destination = $chemin . '/' . $filename;
    move_uploaded_file($_FILES['article_image']['tmp_name'], $destination);
}

$article_titre = htmlspecialchars($_POST['article_titre']);
$article_contenu = htmlspecialchars($_POST['article_contenu']);

$y = 'INSERT INTO ACTUS (titre, texte, email, categorie, image) VALUES (:titre , :texte, :email, :categorie, :image)';
$ins = $bdd->prepare($y);
$fin = $ins->execute([
    'titre' => $article_titre,
    'texte' => $article_contenu,
    'email' => $_SESSION['email'],
    'categorie' => $_POST['categorie'],
    'image' => isset($filename) ? $filename : ""
]);

if ($fin) {
    header('location: ../mon_profil.php?message=Actualité publier avec succès.&type=success');
    if (isset($_SESSION['email'])) {
        ecrire_un_log(true, $_SESSION['email'], 'actu');
    } else {
        ecrire_un_log(true, 'Visiteur', 'actu');
    }
    exit;
} else {
    header('location: ../pub_actus.php?message=Erreur lors de l\'enregistrement.&type=success');
    if (isset($_SESSION['email'])) {
        ecrire_un_log(false, $_SESSION['email'], 'actu');
    } else {
        ecrire_un_log(false, 'Visiteur', 'actu');
    }
    exit;
}
