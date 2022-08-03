<footer class="sticky mt-5 container-fluid p-2">
  <div class="row m-2">
    <div class="col-lg-4 col-8 d-flex align-items-center text-center">
      <a href="http://lintegraal.site/"><img class="mx-auto" src="images/logo_blanc_graal.png" alt="..." width="40%"></a>
    </div>
    <div class="col-5 col-md-8 p-2 mb-3 text-center mx-auto">
      <ul class="nav justify-content-center">
        <li class="nav-item me-5">
          <h1 class="h6 nav-link text-white">Accés rapide</h1>
          <ul class="nav flex-column">
            <li class="nav-item mb-3">
              <a class="text-decoration-none text-secondary" href="http://lintegraal.site/">Accueil</a>
            </li>
            <li class="nav-item mb-3">
              <a class="text-decoration-none text-secondary" href="mon_post.php">Forum</a>
            </li>
            <li class="nav-item mb-3">
              <a class="text-decoration-none text-secondary" href="#">A propos</a>
            </li>
            <?php if (isset($_SESSION['email'])) { ?>
              <li class="nav-item mb-3">
                <a class="text-decoration-none text-secondary" href="mon_profil.php">Mon compte</a>
              </li>
            <?php } ?>
          </ul>
        </li>
        <li class="nav-item me-4">
          <h1 class="h6 nav-link text-white">Catégorie</h1>
          <ul class="nav flex-column">
            <li class="nav-item mb-3">
              <a class="text-decoration-none text-secondary" href="sport.php">Sport</a>
            </li>
            <li class="nav-item mb-3">
              <a class="text-decoration-none text-secondary" href="économie.php">Economie</a>
            </li>
            <li class="nav-item mb-3">
              <a class="text-decoration-none text-secondary" href="crypto.php">Prix BITCOIN</a>
            </li>
            <li class="nav-item mb-3">
              <a class="text-decoration-none text-secondary" href="international.php">International</a>
            </li>
            <li class="nav-item mb-3">
              <a class="text-decoration-none text-secondary" href="actus_user.php">Actualités des utilisateurs</a>
            </li>
          </ul>
        </li>
        <li class="nav-item me-4">
          <h1 class="h6 nav-link text-white">Coordonnnées</h1>
          <ul class="nav flex-column">
            <li class="nav-item mb-3">
              <img src="images\icons8-twitter-50.png" width="7%" alt="">
              <a class="text-decoration-none text-secondary" href="https://twitter.com/" target="_blank">Twitter</a>
            </li>
            <li class="nav-item mb-3">
              <img src="images\icons8-instagram-48.png" width="7%" alt="">
              <a class="text-decoration-none text-secondary" href="https://instagram.com/" target="_blank">instagram</a>
            </li>
            <li class="nav-item mb-3">
              <a class="text-decoration-none text-secondary" href="tel: 07 81 13 56 35">Tel : <br>07 81 13 56 35</a>
            </li>
            <li class="nav-item mb-3">
              <a class="text-decoration-none text-secondary" href="mailto:lintegraal.site@hotmail.com">E-mail : <br>lintegraal.site@hotmail.com</a>
            </li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
  <div class="container border-top text-center">
    <p class="m-4">© 2022 Lintegraal - Tous droits réservés</p>
  </div>
</footer>