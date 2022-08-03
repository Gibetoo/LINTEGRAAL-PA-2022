<?php session_start();

include('includes/flog.php');
if (isset($_SESSION['email'])) {
    ecrire_un_log(true, $_SESSION['email'], 'visite_admin');
} else {
    ecrire_un_log(false, 'Visiteur', 'visite_admin');
}

include('verification/verif_con.php');

include('verification/verif_monpost.php');

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
    <?php include('includes/header.php');
    include('verification/verif_afficher_article.php');
    ?>

    <main class="container my-5">
        <h1 class="my-4 pb-3 h1 text-white d-flex justify-content-center border-bottom">Publications des utilisateurs</h1>
        <?php include('includes/message.php') ?>
        <div class="row row-cols-1 row-cols-md-2 g-4">
            <?php
            while ($post = $AllMPost->fetch()) {
            ?>
                <div class="col">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?= $post['titre']; ?></h5>
                            <p class="card-text"><?= $post['sujet'] ?></p>
                            <p class="card-text"><small class="text-muted">Publié par : <?= $post['utilisateur'] ?></small></p>
                            <p class="card-text"><small class="text-muted">Catégorie : <?= $post['categorie'] ?></small></p>
                            <p class="card-text"><small class="text-muted"><?= modif_date($post['date'], 'date_heure') ?></small></p>
                            <div class="d-flex flex-nowrap">
                                <form class="me-2" action="modif_post.php" method="GET">
                                    <button type="submit" value=" <?= $post['id'] ?>" name="id" class="btn btn-primary btn-sm">Modifier</button>
                                </form>
                                <form action="sup_admin_post.php" method="GET">
                                    <button type="submit" value=" <?= $post['id'] ?>" name="id" class="btn btn-danger btn-sm">Supprimer</button>
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