<?php session_start();

include('verification/verif_con.php');

?>
<!DOCTYPE html>
<html>
<?php
include('includes/head.php');
?>

<body>

    <?php
    include('includes/header.php');
    include('includes/navbar_forum.php');
    include('includes/message.php');
    ?>

    <form class="container text-white" action="verification/verif_post.php" method="POST">
        <?php include('includes/select_categorie.php') ?>
        <div class="form-label">
            <label for="usr">Titre :</label>
            <textarea class="form-control" id="usr" name="titre"></textarea>
        </div>
        <div class="form-label">
            <label for="comment">Sujet :</label>
            <textarea class="form-control" rows="5" id="comment" name="sujet"></textarea>
        </div>
        <button type="submit" class="btn btn-light g-col-6" name="validate">Publier</button>
    </form>



</body>

</html>