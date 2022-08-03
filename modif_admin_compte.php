<?php session_start();

include('verification/verif_con.php');

?>

<!DOCTYPE html>
<html>
<?php
include('includes/head.php');

include('includes/db.php');

$q = 'SELECT * FROM UTILISATEUR WHERE email = ? ';
$req = $bdd->prepare($q);
$req->execute([$_POST['email']]);
$la = $req->fetchAll(PDO::FETCH_ASSOC);

?>

<body>
    <?php include('includes/header.php'); ?>
    <main class="container">
        <h1 class="my-5 py-4 h1 text-white d-flex justify-content-center border-bottom">MODIFICATION DE PROFIL</h1>
        <?php include('includes/message.php'); ?>
        <?php foreach ($la as $profil) { ?>
            <form class="mb-5 text-white" action="verification/verif_modif_admin.php" method="POST">
                <div class="mb-3 w-25">
                    <label class="form-label text-white">Nom</label>
                    <input type="text" class="form-control" name="nom_modif" value="<?= $profil['nom']; ?>" placeholder="Nom">
                </div>
                <div class="mb-3 w-25">
                    <label class="form-label text-white">Prénom</label>
                    <input type="text" class="form-control" name="prenom_modif" value="<?= $profil['prenom']; ?>" placeholder="Prénom">
                </div>
                <div class="mb-5 w-50">
                    <label class="form-label text-white">Déscription</label>
                    <textarea type="text" class="form-control" name="description_modif" placeholder="Déscription"><?= $profil['description'] != "" ? $profil['description'] : ""; ?></textarea>
                </div>
                <input style="visibility: hidden;" name="email" value="<?= $profil['email']; ?>">
                <div class="mb-5">
                    <input type="file" name="image" accept="image/jpg, image/gif, image/png">
                </div>
                <input type="submit" value="Envoyer">
            </form>
        <?php } ?>
    </main>
    <?php include('includes/footer.php'); ?>
</body>

</html>