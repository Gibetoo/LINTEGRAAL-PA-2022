<?php session_start();


include('includes/db.php');

$q = 'SELECT * FROM UTILISATEUR WHERE email = ? ';
$req = $bdd->prepare($q);
$req->execute([$_POST['email']]);
$results = $req->fetchAll(PDO::FETCH_ASSOC);


include('verification/verif_con.php');

?>
<!DOCTYPE html>
<html>
<?php
include('includes/head.php');

?>

<body>
    <?php include('includes/header.php'); ?>
    <main>
        <h1 class="mt-5 h1 text-white d-flex justify-content-center">CREATION D'ACTUS</h1>
        <?php include('includes/message.php') ?>
        <div class="container my-4 text-white">
            <form action="verification\verif_pub.php" method="POST" enctype="multipart/form-data">
                <label class="mt-3" for="sel1">Choissiez une categorie :</label>
                <select class="form-control w-25 mt-2" id="sel1" name='categorie'>
                    <option selected>Categorie</option>
                    <option>Sport</option>
                    <option>Economie</option>
                    <option>International</option>
                    <option>Autre</option>
                </select>
                <br>
                <div class="my-2">
                    <p>Selectionnez une Photo pour l'article :</p>
                    <input type="file" name="article_image" accept="image/jpg, image/gif, image/png, 'image/webp', 'image/jpeg' ">
                </div>
                <br>
                <div class="form-label">
                    <label for="comment">Ecrivez votre titre :</label>
                    <textarea class="form-control mt-2" rows="5" id="comment" name="article_titre" placeholder="Titre"></textarea>
                </div>
                <br>
                <div class="form-label">
                    <label for="comment">Ecrivez votre sujet :</label>
                    <textarea class="form-control mt-2" rows="5" id="comment" name="article_contenu" placeholder="Sujet de l'actualité"></textarea>
                </div>
                <button type="submit" class="btn btn-secondary mt-5">Envoyer l'article</button>
            </form>
        </div>
    </main>
    <?php include('includes/footer.php'); ?>
</body>

</html>