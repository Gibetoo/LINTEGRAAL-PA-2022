<!DOCTYPE html>
<html>
<?php include('includes/head.php'); ?>

<body>
    <?php
    include('includes/header.php')
    ?>
    <main>
        <div class="form_connexion mx-auto py-5">
            <form action="verification/verif_connexion.php" method="POST">
                <h1 class="mb-4 text-white">Connectez-vous</h1>
                <?php include('includes/message.php') ?>
                <div class="mb-3">
                    <label class="form-label text-white">Addresse e-mail*</label>
                    <input type="email" class="form-control <?= isset($_GET['validmail'])? $_GET['validmail'] : (isset($_GET['valid']) ? $_GET['valid'] : "" ) ?>" name="email" value="<?= isset($_COOKIE['email']) ? $_COOKIE['email'] : "" ?>" placeholder="Addresse e-mail">
                </div>
                <div class="mb-3">
                    <label class="form-label text-white">Mot de passe*</label>
                    <input type="password" id="myInput" class="form-control <?= isset($_GET['validpasswd'])? $_GET['validpasswd'] : (isset($_GET['valid']) ? $_GET['valid'] : "" )?>" name="password" placeholder="Mot de passe">
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" onclick="myFunction()" id="flexCheckChecked">
                    <label class="form-check-label text-white" for="flexCheckDefault">
                        Afficher le mot de passe
                    </label>
                </div>
                <div class="d-grid gap-2 col-6 mx-auto mt-3" style="--bs-gap: .25rem 1rem;">
                    <input type="submit" class="btn-check" id="btn-check-2-outlined" checked autocomplete="off">
                    <button type="submit" class="btn btn-light g-col-6">Se connecter</button>
                    <a href="inscription.php" class="btn btn-light" role="button">S'inscrire</a>
                </div>

            </form>

        </div>
    </main>
    <?php include('includes/footer.php') ?>
</body>

</html>