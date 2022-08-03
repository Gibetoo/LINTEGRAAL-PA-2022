<?php

// if (!isset($_POST['image'])  || empty($_POST['image'])) {
//     var_dump($_FILES['image']['size']);
//     exit;
// }

if ($_FILES['image']['error'] == 0) {

    $maxSize = 500000;
    $validExt = [
        'image/jpeg',
        'image/png',
        'image/gif'
    ];

    // array('.jpg', '.jpeg', '.gif', '.png');

    if ($_FILES['image']['size'] > $maxSize) {
        header('location: ../modif_profil.php?message=Le fichier est trop lourd !.&type=danger');
        exit;
    }

    $fileName = $_FILES['image']['name'];

    if (!in_array($_FILES['image']['type'], $validExt)) {
        header('location: ../modif_profil.php?message=Le fichier n\'est pas valide !&type=danger');
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
    move_uploaded_file($_FILES['image']['tmp_name'], $destination);

    header('location: ../modif_profil.php?message=Transfert terminé !&type=success');
    exit;
}
