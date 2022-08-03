<?php session_start();

include('verification/verif_con.php');

?>
<!DOCTYPE html>
<html>

<?php
include('includes/head.php');
include('includes/fonction.php');
include('includes/db.php');
include('includes/admin.php');

if (!isset($_GET['filtre'])) {
    $l = 'SELECT * FROM LOG ORDER BY date DESC';
    $req = $bdd->query($l);

    $logging = $req->fetchAll(PDO::FETCH_ASSOC);
} else {
    $l = 'SELECT * FROM LOG WHERE action = ? ORDER BY date DESC';
    $req = $bdd->prepare($l);
    $req->execute([$_GET['filtre']]);

    $logging = $req->fetchAll(PDO::FETCH_ASSOC);
}
?>

<body>
    <?php
    include('includes/header.php'); ?>

    <main class="container">
        <h1 class="my-4 pb-3 h1 text-white d-flex justify-content-center border-bottom">Logging</h1>
        <div class="d-flex mt-5">
            <form>
                <input class="form-control" style="width: 350px;" name="recherche" type="text" id="recherche" placeholder="Rechercher un utilisateur" onkeyup="rechercheune(this.value)" />
            </form>
            <form class="ms-auto" action="https://lintegraal.site/administration_gest%20log.php" method="GET">
                <div class="btn-group">
                    <button class="btn btn-primary">Tout</button>
                    <button class="btn btn-primary <?= $_GET['filtre'] == 'Connexion' ? 'active' : ''; ?>" name="filtre" value="Connexion">Connexion</button>
                    <button class="btn btn-primary <?= $_GET['filtre'] == 'Déconnexion' ? 'active' : ''; ?>" name="filtre" value="Déconnexion">Déconnexion</button>
                    <button class="btn btn-primary <?= $_GET['filtre'] == 'Acces au site' ? 'active' : ''; ?>" name="filtre" value="Acces au site">Accès au site</button>
                    <button class="btn btn-primary <?= $_GET['filtre'] == 'Acces page admin' ? 'active' : ''; ?>" name="filtre" value="Acces page admin">Accès page admin</button>
                    <button class="btn btn-primary <?= $_GET['filtre'] == 'Acces au site' ? 'active' : ''; ?>" name="filtre" value="Actu Publiée">Actu Publiée</button>
                    <button class="btn btn-primary <?= $_GET['filtre'] == 'Acces au site' ? 'active' : ''; ?>" name="filtre" value="Post Publié">Post Publié</button>
                </div>
            </form>
        </div>
        <div id="resultat">
            <table class="text-white table table-striped mt-5 text-center">
                <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">Date</th>
                        <th scope="col">Action</th>
                        <th scope="col">Reussite</th>
                        <th scope="col">Email</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($logging as $log) {
                        echo '<tr>';
                        echo '<td></td>';
                        echo '<td class="text-white">' . modif_date($log['date'], 'date_heure') . '</td>';
                        echo '<td class="text-white">' . $log['action'] . '</td>';
                        echo '<td class="text-white">' . $log['reussite'] . '</td>';
                        echo '<td class="text-white">' . $log['email'] . '</td>';
                        echo '</tr>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </main>
    <script type="text/javascript">
        function rechercheune(str) {
            if (str.length == 0) {
                document.getElementById("resultat").innerHTML = '<h1 class="my-5 pb-3 h3 text-white d-flex justify-content-center">Aucun utilisateur rechercher veuillez rafraichir la page. </h1>';
                return;
            } else {
                const xmlhttp = new XMLHttpRequest();
                xmlhttp.onload = function() {
                    document.getElementById("resultat").innerHTML = this.responseText;
                }
                xmlhttp.open("GET", "includes/recherche_log.php?resultat=" + str, true);
                xmlhttp.send();
            }
        }
    </script>
</body>

</html>