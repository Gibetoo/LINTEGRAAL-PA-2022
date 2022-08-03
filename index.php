<?php session_start(); ?>
<!DOCTYPE html>
<html>
<!-- Cette variable créer permet d'identifié la page. L'include lui permet que le code soit plus propre et si il faut modifier un élement il sera modifier pour l'integraliter des pages. -->
<?php
include('includes/head.php');
include('includes/flog.php');
if (isset($_SESSION['email'])) {
    ecrire_un_log(true, $_SESSION['email'], 'visite');
} else {
    ecrire_un_log(true, 'Visiteur', 'visite');
}
?>

<body>
    <?php
    include('includes/header.php');
    include('includes/nav_barre.php');
    ?>


    <div class="mt-4 container text-center">
        <?php include('includes/message.php'); ?>
    </div>
    <!-- class="info_principal" -->
    <div id="accueil" class="mt-5">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="false">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="images/Or ukraine.webp" class="d-block mx-auto  border border-5" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h1>Guerre en Ukraine</h1>
                        <p class="fs-5">l’or russe prochaine cible des sanctions européennes</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="images\Tour de france.jpg" class="d-block mx-auto  border border-5" alt="...">
                    <div class="carousel-caption d-none d-md-block ">
                        <h1>Tour de France</h1>
                        <p class="fs-5">«J’avais les pattes pleines de toxine», Thibaut Pinot n’avait pas les moyens de gagner</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="images\Musk.webp" class="d-block mx-auto border border-5" alt="...">
                    <div class="carousel-caption d-none d-md-block ">
                        <h1>Rachat de Twitter</h1>
                        <p class="fs-5">Musk refuse un jugement rapide de son contentieux avec le réseau social</p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    <main>
        <div>
            <h1 class="dernier_actus text-white text-center">Dernières Actualités</h1>
            <section class="m-4 my-5 border border-5 flex-wrap d-flex flex-md-nowrap">
                <section class="text-decoration-none p-md-5 p-1">
                    <img src="images/Paris.jpeg" class="mx-auto d-block" alt="">
                    <p class="h5 mt-4 text-white">«On se méfie de tout le monde» : à Paris, les touristes sont revenus... et la délinquance aussi</p>
                </section>
                <section class="p-md-5 p-1">
                    <img src="images/Trafic de drogue.jpeg" class="mx-auto d-block" alt="">
                    <p class="h5 mt-4 text-white">Trafic de drogue : vague d’interpellations chez les administrateurs du «WhatsApp des narcos»</p>
                </section>
                <section class="p-md-5 p-1">
                    <img src="images/Bebe.jpeg" class="mx-auto d-block" alt="">
                    <p class="h5 mt-4 text-white">Bébé empoisonné par une employée de crèche à Lyon : ce que l’on sait de ce drame</p>
                </section>
            </section>
        </div>

        <div>
            <h1 class="dernier_actus text-white text-center">Sport</h1>
            <section class="m-4 my-5 border border-5 flex-wrap d-flex flex-md-nowrap">
                <section class="text-decoration-none p-md-5 p-1">
                    <img src="images/cheval.webp" class="mx-auto d-block" style="width: 360px; height: 225px;" alt="">
                    <p class="h5 mt-4 text-white">PMU - Arrivée du quinté du mercredi 20 juillet à Vichy: rien n’arrête Golden Call !</p>
                </section>
                <section class="p-md-5 p-1">
                    <img src="images/71.jpg" class="mx-auto d-block" style="width: 360px; height: 225px;" alt="">
                    <p class="h5 mt-4 text-white">Voyage : le top 5 des incontournables à Copenhague</p>
                </section>
                <section class="p-md-5 p-1">
                    <img src="images/Mercato.webp" style="width: 360px; height: 225px;" class="mx-auto d-block" alt="">
                    <p class="h5 mt-4 text-white">Mercato : Léo Dubois va quitter Lyon pour s’engager avec Galatasaray</p>
                </section>
            </section>
        </div>

        <div>
            <h1 class="dernier_actus text-white text-center">International</h1>
            <section class="m-4 my-5 border border-5 flex-wrap d-flex flex-md-nowrap">
                <section class="text-decoration-none p-md-5 p-1">
                    <img src="images/egyspte.jpg" class="mx-auto d-block" style="width: 360px; height: 225px;" alt="">
                    <p class="h5 mt-4 text-white">L’Egypte va autoriser la photographie amateur de rue</p>
                </section>
                <section class="p-md-5 p-1">
                    <img src="images/lac.jpg" class="mx-auto d-block" style="width: 360px; height: 225px;" alt="">
                    <p class="h5 mt-4 text-white">Traversée vers l’Espagne : près de 1000 migrants morts au premier semestre</p>
                </section>
                <section class="p-md-5 p-1">
                    <img src="images/ble.jpg" class="mx-auto d-block" style="width: 360px; height: 225px;" alt="">
                    <p class="h5 mt-4 text-white">Alléger les sanctions pour débloquer les céréales ukrainiennes ? 5 minutes pour comprendre «une question de vie ou de mort»</p>
                </section>
            </section>
        </div>
    </main>
    <?php include('includes/footer.php'); ?>
</body>

</html>