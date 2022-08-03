<?php
session_start();
include('includes/db.php');

include('verification/verif_con.php');

$q = 'SELECT * FROM UTILISATEUR WHERE email = ? ';
$req = $bdd->prepare($q);
$req->execute([$_POST['email']]);
$results = $req->fetchAll(PDO::FETCH_ASSOC);

$q = 'SELECT * FROM POST WHERE utilisateur = :utilisateur AND id = :id';
$req = $bdd->prepare($q);
$req->execute([
    'utilisateur' => $_SESSION['email'],
    'id' => $_GET['id']
]);
$result = $req->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html>
<?php
include('includes/head.php');

?>

<body>

    <?php
    include('includes/header.php');
    include('includes/message.php');
    ?>
    <?php foreach ($result as $modifpost) { ?>
        <form class="container text-white" action="verification/verif_modifpost.php" method="POST">
            <label class="mt-3" for="sel1">Categories :</label>
            <select class="form-control" id="sel1" name='categorie' value='<?= $modifpost['categorie'] ?>'>
                <option selected>Categorie</option>
                <option value='sport'>Sport</option>
                <option value='economie'>Economie</option>
                <option value='international'>International</option>
                <option value='autre'>Autre</option>
            </select>
            <input type="hidden" name="id_post" value="<?= $modifpost['id']; ?>"></input>
            <div class="form-label">
                <label for="usr">Titre :</label>
                <input class="form-control" id="usr" name="titre" value='<?= $modifpost['titre'] ?>'>
                
            </div>
            <div class="form-label">
                <label for="comment">Sujet :</label>
                <input class="form-control" rows="5" id="comment" name="sujet" value='<?= $modifpost['sujet'] ?>'>
            </div>
            <button type="submit" class="btn btn-light g-col-6" name="validate">Modifier</button>
        </form>
    <?php } ?>
</body>

</html>