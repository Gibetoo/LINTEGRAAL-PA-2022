<?php session_start();


include('includes/db.php');

$q = 'SELECT * FROM UTILISATEUR WHERE email = ? ';
$req = $bdd->prepare($q);
$req->execute([$_POST['email']]);
$results = $req->fetchAll(PDO::FETCH_ASSOC);


if (!isset($_SESSION['email'])) {
    header('location: http://lintegraal.site?message=Vous n\'êtes pas autorisé a accéder a cette page.&type=danger');
    exit;
}

$q = 'SELECT * FROM ACTUS WHERE id = :id';
$req = $bdd->prepare($q);
$req->execute([
    'id' => $_GET['id']
]);
$result = $req->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html>
<?php include('includes/head.php'); ?>

<body>
    <?php include('includes/header.php'); ?>
    <main class="container">
        <h1 class="my-5 pb-3 h1 text-white d-flex justify-content-center border-bottom">Modification d'actus</h1>
        <?php include('includes/message.php') ?>
        <div class="my-4">
            <?php foreach ($result as $article) { ?>
                <form class="container text-white" action="verification\verifad_editpub.php" method="POST" enctype="multipart/form-data">
                    <?php include('includes/select_categorie.php'); ?>
                    <div class="my-2">
                        <p>Selectionnez une Photo pour l'article :</p>
                        <input type="file" name="article_image" accept="image/jpg, image/gif, image/png, 'image/webp'">
                    </div>
                    <input type="hidden" name="article_id" value="<?= $article['id']; ?>"></input>
                    <div class="form-label">
                        <label class="my-2" for="comment">Titre :</label>
                        <textarea class="form-control" id="comment" name="article_titre_modif"><?= $article['titre']; ?></textarea>
                    </div>
                    <br>
                    <div class="form-label">
                        <label class="my-2" for="comment">Sujet :</label>
                        <textarea class="form-control" id="comment" name="article_contenu_modif"><?= $article['texte']; ?></textarea>
                    </div>
                    <input class="my-3" type="submit" value="Envoyer l'article" />
                </form>
            <?php } ?>
        </div>
    </main>
    <?php include('includes/footer.php'); ?>
</body>

</html>