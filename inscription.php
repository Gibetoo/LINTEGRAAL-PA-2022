<!DOCTYPE html>
<html>
<?php
$title = 'inscription';
include('includes/head.php');
?>

<body>
    <?php
    include('includes/header.php')
    ?>
    <main>

        <div class="form_inscription mx-auto py-5">
            <form action="verification/verif_inscription.php" method="POST">
                <h1 class="mb-4 text-white text-center">Créez un compte</h1>
                <?php include('includes/message.php') ?>

                <div class="mb-3">
                    <label class="form-label text-white">Nom*</label>
                    <input type="text" class="form-control" name="nom" value="<?= isset($_COOKIE['nom']) ? $_COOKIE['nom'] : "" ?>" placeholder="Nom">
                </div>
                <div class="mb-3">
                    <label class="form-label text-white">Prénom*</label>
                    <input type="text" class="form-control" name="prenom" value="<?= isset($_COOKIE['prenom']) ? $_COOKIE['prenom'] : "" ?>" placeholder="Prénom">
                </div>
                <div class="mb-3">
                    <label class="form-label text-white">Adresse e-mail*</label>
                    <input type="email" class="form-control" name="email" value="<?= isset($_COOKIE['email']) ? $_COOKIE['email'] : "" ?>" placeholder="E-mail">

                </div>
                <div class="mb-3">
                    <label class="form-label text-white">Confirmation de l'adresse e-mail*</label>
                    <input type="email" class="form-control" name="conf_email" value="" placeholder="E-mail">
                </div>
                <div class="mb-3">
                    <label class="form-label text-white">Mot de passe*</label>
                    <input type="password" class="form-control" id="myInput" name="password" placeholder="Mot de passe">
                    <p class="mx-3 mt-2 text-white" style="font-size: 12px;">Le mot de passe doit contenir au moins 8 caractères, composé d'une majuscule, une minuscule et un chiffre.*</p>
                </div>
                <div class="mb-3">
                    <label class="form-label text-white">Confirmation du mot de passe*</label>
                    <input type="password" class="form-control" id="myInput2" name="conf_password" placeholder="Mot de passe">
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" onclick="myFunction()" id="flexCheckChecked">
                    <label class="form-check-label text-white" for="flexCheckDefault">
                        Afficher le mot de passe
                    </label>
                </div>
                <div style="z-index: 5;">
                    <input id="captcha" type="hidden" name="captcha" value="">
                    <?php include('testcaptcha.php');  ?>
                </div>
                <div class="d-grid gap-2 col-6 mx-auto mt-5 mb-3" style="--bs-gap: .25rem 1rem;">
                    <button type="submit" class="btn btn-light g-col-6">S'inscrire</button>
                </div>
                <div class="d-flex flex-row flex-nowrap align-items-center justify-content-center">
                    <label>Déjà inscrit(e) ?</label>
                    <a href="connexion.php"><button type="button" class="btn btn-link">Connectez-vous !</button></a>
                </div>

            </form>

        </div>


    </main>

    <?php include('includes/footer.php') ?>
</body>

</html>