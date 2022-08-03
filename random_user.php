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

$q = 'SELECT * FROM UTILISATEUR WHERE email = ? ';
$req = $bdd->prepare($q);
$req->execute([$_POST['email']]);
$la = $req->fetchAll(PDO::FETCH_ASSOC);

?>

<body>
    <?php include('includes/header.php'); ?>
    <?php include('includes/message.php'); ?>
        
    <main>
        <div class="row m-5 border-bottom flex-md-nowrap ">
            <?php include('includes/message.php'); ?>
            <?php foreach ($la as $profil) { ?>
                <div class="col-2 mb-3 ">
                        <img class="card-img-top" src="/verification/upload/<?= $profil['photo_profil'] ?>" alt="">
                </div>
                <div class="text-white col-2">
                        <?php
                        echo '<p class="h4">' . $profil['prenom'] . ' ' . $profil['nom'] . '</p>';
                        echo '<p class="h5">' . $profil['description'] .  '</p>';
                        ?>
                    </div>
            <?php } ?>
        </div>
        <div class="container border-bottom">
            <h1 class="my-5 h1 text-white d-flex justify-content-center">Actualités publiées</h1>
            <div class="row row-cols-1 row-cols-md-2 g-4 mb-5">
                <?php
                    foreach ($AllPostRandom as $post) {
                ?>
                    <div class="col">
                        <div class="card">
                            <img src="/verification/upload/<?= $post['image'] ?>" class="card-img-top" alt="...">
                            <div class="card-body text-center">
                                <h5 class="h3 card-title"><?= $post['titre']; ?></h5>
                                <p class="card-text"><?= $post['texte'] ?></p>
                                <p class="card-text"><small class="text-muted">Catégorie : <?= $post['categorie'] ?></small></p>
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