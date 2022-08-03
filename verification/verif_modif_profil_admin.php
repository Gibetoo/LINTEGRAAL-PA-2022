<?php
session_start();

if (!isset($_POST['nom_modif']) || empty($_POST['nom_modif']) || !isset($_POST['prenom_modif']) || empty($_POST['prenom_modif'])) {
        header('location: ../modif_profil.php?message=Vous devez remplir tout les champs.&type=danger');
        exit;
}
if (!empty($_POST['image'])) {
        if ($_FILES['image']['error'] == 0) {

                $maxSize = 500000;
                $validExt = [
                        'image/jpeg',
                        'image/png',
                        'image/gif'
                ];

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
}

$nom_modif = htmlspecialchars($_POST['nom_modif']);
$prnom_modif = htmlspecialchars($_POST['prenom_modif']);
$description_modif = htmlspecialchars($_POST['description_modif']);

include('../includes/db.php');

$q = 'UPDATE UTILISATEUR SET nom = :nom, prenom = :prenom, description = :description WHERE email = :email';
$req = $bdd->prepare($q);
$result = $req->execute([
        'email' => $_POST['email'],
        'nom' => $nom_modif,
        'prenom' => $prnom_modif,
        'description' => $description_modif
]);

if ($result) {
        header('location: ../administration_gest.php?message=Modifications enregistrés.&type=success');
        exit;
} else {
        header('location: ../modif_admin_compte.php?message=Un problème est survenu.&type=danger');
        exit;
}
