<?php
session_start();

include('verification/verif_monpost.php');

include('verification/verif_con.php');

?>
<!DOCTYPE html>
<html>
<?php
include('includes/head.php');
include('includes/db.php');
include('includes/fonction.php');
$title = 'Mon Post';
?>

<body>

    <?php
    include('includes/header.php');
    include('includes/navbar_forum.php')
    ?>

    <div class="container">

        <div class="row row-cols-1 row-cols-md-2 g-4 m-3">
            <?php
            while ($monpost = $AllMPost->fetch()) {
            ?>
                <div class="col">
                    <div class="card text-center">
                        <div class="card-body">
                            <h5 class="card-title"><?= $monpost['titre'] ?></h5>
                            <p class="card-text"><?= $monpost['sujet'] ?></p>
                            <form action="rep_post.php" method="GET">
                                <button type="submit" class="btn btn-primary btn-sm" value="<?= $monpost['id'] ?>" name="id_post">Repondre</button>
                            </form>
                        </div>
                        <div class="card-footer text-muted">
                            Categorie : <?= $monpost['categorie'] ?> ||
                            Par : <?= $monpost['utilisateur'] ?> ||
                            Le <?= modif_date($monpost['date'], 'date_heure') ?>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
    <?php include('includes/footer.php') ?>
</body>

</html>