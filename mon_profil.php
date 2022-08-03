<?php session_start();

include('verification/verif_afficher_article.php');
include('verification/verif_monpost.php');

include('verification/verif_con.php');

?>

<!DOCTYPE html>
<html>

<?php
include('includes/head.php');
include('includes/fonction.php');
include('includes/db.php');

$q = 'SELECT * FROM UTILISATEUR WHERE email = ?';
$req = $bdd->prepare($q);
$req->execute([$_SESSION['email']]);
$results = $req->fetchAll(PDO::FETCH_ASSOC);
?>

<body>

    <?php include('includes/header.php'); ?>
    <main>
    <?php include('includes/nav_barre.php');?>
        <?php include('includes/message.php'); ?>
        <div class="row m-5 border-bottom flex-md-nowrap ">

            <?php foreach ($results as $utilisateur) { ?>
                <div class="col-2 mb-3 ">
                    <img class="card-img-top" src="/verification/upload/<?= $utilisateur['photo_profil'] ?>" alt="">
                </div>
                <div class="text-white col-2">
                    <?php
                    echo '<p class="h4">' . $utilisateur['prenom'] . ' ' . $utilisateur['nom'] . '</p>';
                    echo '<a class="dimension btn btn-dark btn-sm mt-2 mb-4" href="modif_profil.php">Modifier le profil</a>';
                    echo '<p class="h5">' . $utilisateur['description'] .  '</p>';
                    echo '<a class="dimension btn btn-dark btn-sm mt-2 mb-4" href="mes_com.php">Mes Commentaires</a>';

                    ?>
                    
                </div>
            <?php } ?>
                
        </div>
        <div class="container border-bottom">
            <h1 class="my-5 h1 text-white d-flex justify-content-center">Actualités publiées</h1>
            <a class="mb-4 h5 p-3 text-white text-center d-flex justify-content-center text-decoration-none border" href="pub_actus.php">Publiez votre actualité<br>+</a>
            <div class="row row-cols-1 row-cols-md-2 g-4 mb-5">
                <?php
                    foreach ($AllPost as $post) {
                ?>
                    <div class="col">
                        <div class="card">
                            <img src="/verification/upload/<?= $post['image'] ?>" class="card-img-top" alt="...">
                            <div class="card-body text-center">
                                <h5 class="h3 card-title"><?= $post['titre'] ?></h5>
                                <p class="card-text"><?= $post['texte'] ?></p>
                                <p class="card-text"><small class="text-muted">Catégorie : <?= $post['categorie'] ?></small></p>
                                <p class="card-text"><small class="text-muted"><?= modif_date($post['date'], 'date_heure') ?></small></p>
                                <div class="d-flex flex-nowrap">
                                    <form class="me-2" action="modif_actus.php" method="GET">
                                        <button type="submit" value=" <?= $post['id'] ?>" name="id" class="btn btn-primary btn-sm">Modifier</button>
                                    </form>
                                    <form class="me-2" action="sup_actus.php" method="GET">
                                        <button type="submit" value=" <?= $post['id'] ?>" name="id" class="btn btn-danger btn-sm">Supprimer</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>

        <div class="container">
            <h1 class="my-5 h1 text-white d-flex justify-content-center">Mes Posts</h1>
            <div class="row row-cols-1 row-cols-md-2 g-4">
                <?php while ($monpost = $AllUPost->fetch()) {
                ?>
                    <div class="col">
                        <div class="card">
                            <img src="..." class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title"><?= $monpost['titre'] ?></h5>
                                <p class="card-text"><?= $monpost['sujet'] ?></p>
                                <p class="card-text"><small class="text-muted"><?= modif_date($monpost['date'], 'date_heure') ?></small></p>
                                <div class="d-flex flex-nowrap">
                                    <form class="me-2" action="modif_post.php" method="GET">
                                        <button type="submit" value=" <?= $monpost['id'] ?>" name="id" class="btn btn-primary btn-sm">Modifier</button>
                                    </form>
                                    <form action="sup_post.php" method="GET">
                                        <button type="submit" value=" <?= $monpost['id'] ?>" name="id" class="btn btn-danger btn-sm">Supprimer</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>

    </main>
    <?php include('includes/footer.php'); ?>
</body>

</html>