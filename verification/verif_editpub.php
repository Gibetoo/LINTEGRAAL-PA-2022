<?php
session_start();
include('../includes/db.php');

$mode_edition = 0;

if (!isset($_POST['article_titre_modif']) || empty($_POST['article_titre_modif']) || !isset($_POST['article_contenu_modif']) || empty($_POST['article_contenu_modif'])) {
    header('location: ../mon_profil.php?message=Vous devez remplir les deux champs.&type=sucess');
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

$article_titre = htmlspecialchars($_POST['article_titre_modif']);
$article_contenu = htmlspecialchars($_POST['article_contenu_modif']);

$y = 'UPDATE ACTUS SET titre = :titre, texte = :texte, categorie = :categorie, image = :image WHERE email = :email and id = :id ';
$ins = $bdd->prepare($y);
$fin = $ins->execute([
    'titre' => $article_titre,
    'texte' => $article_contenu,
    'email' => $_SESSION['email'],
    'categorie' => $_POST['categorie'],
    'id' => $_POST['article_id'],
    'image' => isset($filename) ? $filename : ""
]);

if ($fin) {
    header('location: ../mon_profil.php?message=Article modifier avec succès.&type=success');
    exit;
} else {
    header('location: ../mon_profil.php?message=Erreur lors de l\'enregistrement.&type=danger');
    exit;
}