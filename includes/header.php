<header>
    <div class="text-start">
        <nav class="col-1 navbar-dark fixed-top mt-2">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body border-bottom">
                        <ul class="navbar-nav justify-content-end flex-grow-1 pe-1">
                            <li class="nav-item">
                                <a class="nav-link text-black" href="http://lintegraal.site/">Accueil</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-black" href="#">Catégorie</a>
                            </li>
                            <?php if (isset($_SESSION['email']) && !empty($_SESSION['email'])) { ?>
                                <li class="nav-item">
                                    <a class="nav-link text-black" href="mon_post.php">Forum</a>
                                </li>
                            <?php } ?>
                            <?php if (isset($_SESSION['email']) && !empty($_SESSION['email'])) { ?>
                                <li class="nav-item">
                                    <a class="nav-link text-black" href="all_user.php">Liste User</a>
                                </li>
                            <?php } ?>
                            <li class="nav-item">
                                <a class="nav-link text-black" href="#">Contact</a>
                            </li>
                            <?php if (isset($_SESSION['email'])) {
                                echo '<a href="deconnexion.php" class=" btn btn-dark btn-sm m-4" role="button">Déconnexion</a>';
                            }
                            ?>
                        </ul>
                    </div>
                    <?php if (isset($_SESSION['email'])) {

                        include('includes/db.php');

                        $q = 'SELECT * FROM UTILISATEUR WHERE email = ? ';
                        $req = $bdd->prepare($q);
                        $req->execute([$_SESSION['email']]);

                        $results = $req->fetchAll(PDO::FETCH_ASSOC);

                        foreach ($results as $utilisateur) {

                            if (($utilisateur['admin'] == 'admin')) {
                                echo '
                                <div class="offcanvas-header">
                                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Menu Admin</h5>
                                </div>
                                <div class="offcanvas-body">
                                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-1">
                                        <li class="nav-item">
                                            <a class="nav-link active text-black" aria-current="page" href="administration_gest.php">Gestion des utilisateurs</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link text-black" href="admin_pub_actus.php">Plublication d\'une actualités</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link text-black" href="administration_gest actus.php">Gestion des actualités</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link text-black" href="administration_gest posts.php">Gestion des Publications</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link text-black" href="administration_guest com.php">Gestion des Commentaires</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link text-black" href="administration_gest log.php">Log</a>
                                        </li>
                                    </ul>
                                </div>';
                            }
                        }
                    }
                    ?>
                </div>
            </div>
        </nav>
    </div>
    <nav class="navbar container">
        <div class="row justify-content-center flex-nowrap">
            <div class="col-md-4 col-6"></div>
            <div class="col-lg-4 col-8">
                <a href="http://lintegraal.site/"><img class="logo mx-auto" src="images/logo_blanc_graal.png" alt="..." width="40%"></a>
            </div>
            <div class="col-md-4 col-6">
                <form class="d-flex justify-content-end" role="search">
                    <?php if (isset($_SESSION['email']) && !empty($_SESSION['email'])) {
                        echo '<p class="text-white me-3">Bienvenue ' . $utilisateur['prenom'] . '</p>';
                        echo '<a href="mon_profil.php" class="dimension btn btn-dark btn-sm mb-3 me-2" role="button">Mon Profil</a>';
                    } else {
                        echo '<a href="connexion.php" class="dimension btn btn-light btn-sm me-3" role="button">Connectez-vous</a>';
                        echo '<a href="inscription.php" class="dimension btn btn-light btn-sm me-3" role="button">S\'inscrire</a>';
                    } ?>
                </form>
            </div>
        </div>
    </nav>
</header>