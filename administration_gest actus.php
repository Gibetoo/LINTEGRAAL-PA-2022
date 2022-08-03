<?php session_start();

include('includes/flog.php');

if (isset($_SESSION['email'])) {
    ecrire_un_log(true, $_SESSION['email'], 'visite_admin');
} else {
    ecrire_un_log(false, 'Visiteur', 'visite_admin');
}

include('verification/verif_con.php');

?>
<!DOCTYPE html>
<html>

<?php
include('includes/head.php');
include('includes/fonction.php');
include('includes/db.php');
include('includes/admin.php');
?>

<body>
    <?php 
    include('includes/header.php');
    include('verification/verif_afficher_article.php');
    ?>

    <main class="container my-5">
        <h1 class="my-4 pb-3 h1 text-white d-flex justify-content-center border-bottom">Actualités des utilisateurs</h1>
        <?php include('includes/message.php') ?>
        <div class="row row-cols-1 row-cols-md-2 g-4">
            <?php
            while ($postall = $AllPostTOUS->fetch()) {
            ?>
                <div class="col">
                    <div class="card">
                        <img src="/verification/upload/<?= $postall['image'] ?>" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?= $postall['titre'] ?></h5>
                            <p class="card-text"><?= $postall['texte'] ?></p>
                            <p class="card-text"><small class="text-muted">Publié par : <?= $postall['email'] ?></small></p>
                            <p class="card-text"><small class="text-muted">Catégorie : <?= $postall['categorie'] ?></small></p>
                            <p class="card-text"><small class="text-muted"><?= modif_date($postall['date'], 'date_heure') ?></small></p>
                            <div class="d-flex flex-nowrap">
                                <form class="me-2" action="actus_admin.php" method="GET">
                                    <button type="submit" value=" <?= $postall['id'] ?>" name="id" class="btn btn-primary btn-sm">Modifier</button>
                                </form>
                                <form action="sup_admin_actus.php" method="POST">
                                    <input type="hidden" name="email" value="<?= $postall['email'] ?>" />
                                    <button type="submit" value=" <?= $postall['id'] ?>" name="id" class="btn btn-danger btn-sm">Supprimer</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </main>
</body>

</html>