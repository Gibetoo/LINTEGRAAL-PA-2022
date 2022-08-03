<?php session_start(); ?>
<!DOCTYPE html>
<html>
<!-- Cette variable créer permet d'identifié la page. L'include lui permet que le code soit plus propre et si il faut modifier un élement il sera modifier pour l'integraliter des pages. -->
<?php
include('includes/head.php');
include('includes/db.php');

$q = 'SELECT * FROM UTILISATEUR WHERE email = ? ';
$req = $bdd->prepare($q);
$req->execute([$_POST['email']]);
$results = $req->fetchAll(PDO::FETCH_ASSOC);
?>

<body>
    <?php
    include('includes/header.php');
    include('includes/nav_barre.php');
    include('verification/verif_commentaire.php');
    include('verification/verif_afficher_economie.php');
    ?>
    <main class="container">

        <?php foreach ($Com as $sujetprincipal) { ?>
            <div class="col mt-5">
                <div class="text-white text-center">
                    <h1 class="h1 fw-bold"><?= $sujetprincipal['titre'] ?></h1>
                    <h1 class="fs-4 mt-5 p-4 border"><?= $sujetprincipal['texte'] ?></h1>
                </div>
            </div>
        <?php } ?>

        <h1 class="my-5 pb-3 h1 text-white d-flex justify-content-center border-bottom">Commentaire(s)</h1>

        <div class="cols-1 cols-md-2 g-4">
            <?php
            while ($post = $AllPostcom->fetch()) {
            ?>
                <div class="col mt-4">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-text">Pseudo : <?= $post['pseudo'] ?></p>
                            <p class="card-text"><small>Commentaire : <br><?= $post['commentaire'] ?></small></p>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>

    </main>
    <?php include('includes/footer.php'); ?>
</body>

</html>