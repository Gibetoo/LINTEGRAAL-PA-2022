<?php session_start();

include('includes/flog.php');
if (isset($_SESSION['email'])) {
    ecrire_un_log(true, $_SESSION['email'], 'visite_admin');
} else {
    ecrire_un_log(false, 'Visiteur', 'visite_admin');
}

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
    include('includes/db.php');

    $q = 'SELECT * FROM UTILISATEUR';
    $req = $bdd->query($q);
    $results = $req->fetchAll(PDO::FETCH_ASSOC);





    ?>
    <main class="container">
        <h1 class="my-4 pb-3 h1 text-white d-flex justify-content-center border-bottom ">Utilisateurs</h1>
        <?php include('includes/message.php'); ?>

        <div id="resultat">
            <table class="text-white table table-striped mt-5">
                <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">Email</th>
                        <th scope="col">Nom</th>
                        <th scope="col">Prenom</th>
                        <th scope="col">Niveau de compte</th>
                        <th scope="col">Role</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($results as $utilisateur) {
                        echo '<tr>';
                        echo '<td></td>';
                        echo '<td class="text-white">' . $utilisateur['email'] . '</td>';
                        echo '<td class="text-white">' . $utilisateur['nom'] . '</td>';
                        echo '<td class="text-white">' . $utilisateur['prenom'] . '</td>';
                        echo '<td class="text-white">' . $utilisateur['niveau_de_cmpt'] . '</td>';
                        echo '<td class="text-white">' . $utilisateur['admin'] . '</td>';
                        echo '<td>';
                        echo '<form action="random_user.php" method="POST">';
                        echo '<button type="submit" value="' . $utilisateur['email'] . '" name="email" class="btn btn-primary btn-sm">Afficher profil</button>';
                        echo '</form>';
                        echo '</td>';
                        echo '<td>';
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </main>
    <?php include('../includes/footer.php'); ?>
    <script type="text/javascript">
        function rechercheune(str) {
            if (str.length == 0) {
                document.getElementById("resultat").innerHTML = '<h1 class="my-5 pb-3 h3 text-white d-flex justify-content-center">Aucun utilisateur recherché veuillez rafraichir la page. </h1>';
                return;
            } else {
                const xmlhttp = new XMLHttpRequest();
                xmlhttp.onload = function() {
                    document.getElementById("resultat").innerHTML = this.responseText;
                }
                xmlhttp.open("GET", "includes/recherche_utilisateur.php?resultat=" + str, true);
                xmlhttp.send();
            }
        }
    </script>
</body>

</html>