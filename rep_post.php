<?php session_start();

include('verification/verif_con.php');

?>
<!DOCTYPE html>
<html>

<?php
include('includes/head.php');

include('includes/db.php');
?>

<body>
    <?php include('includes/header.php');
    include('verification/verif_afficherep.php');
    include('includes/message.php');
    include('includes/fonction.php');
    ?>
    <main class="container">
        <?php foreach ($postre as $sujet) { ?>
            <div class="col mt-5">
                <div class="text-white text-center">
                    <h1 class="h1 fw-bold"><?= $sujet['titre'] ?></h1>
                    <h1 class="fs-4 mt-5 p-4 border"><?= $sujet['sujet'] ?></h1>
                </div>
            </div>
        <?php } ?>
        <h1 class="my-5 pb-3 h1 text-white d-flex justify-content-center border-bottom">Réponse(s)</h1>
        <!-- formulaire pour repondre au question -->
        <div>
            <form class="container text-white" action="verification/verif_reppost.php" method="POST">
                <input class="form-control" type="hidden" name="id_post" value="<?= $_GET['id_post']; ?>"></input>
                <div class="form-label">
                    <label for="comment">Ecrivez votre message :</label>
                    <textarea class="form-control mt-2" rows="5" id="comment" name="sujet"></textarea>
                </div>
                <button type="submit" class="btn btn-light g-col-6 mt-3">Publier</button>
            </form>
        </div>
        <div class="mt-5 cols-1 cols-md-2 g-4">
            <?php
            foreach ($resp as $rep) {
            ?>
                
                <div class="m-4">
                    <div class="card text-center">
                        <div class="card-header">
                            <?= $rep['utilisateur'] ?>
                        </div>
                        <div class="card-body">
                            <p class="card-text"><?= $rep['sujet'] ?></p>
                        </div>
                        <div class="card-footer text-muted">
                            <?= modif_date($rep['date'],'date_heure') ?>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </main>
    <?php include('includes/footer.php'); ?>
</body>

</html>