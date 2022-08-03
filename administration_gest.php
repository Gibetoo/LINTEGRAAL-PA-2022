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
    include('includes/admin.php');

    $q = 'SELECT * FROM UTILISATEUR';
    $req = $bdd->query($q);
    $results = $req->fetchAll(PDO::FETCH_ASSOC);

    $nb_user = count($results);

    $e = 'SELECT * FROM LOG WHERE action = :action and reussite = :reussite';
    $raq = $bdd->prepare($e);
    $raq->execute([
        'action' => 'Acces au site',
        'reussite' => 'réussie'
    ]);
    $visite = $raq->fetchAll(PDO::FETCH_ASSOC);

    $nb_visite = count($visite);

    $j = 'SELECT * FROM LOG WHERE action = :action and reussite = :reussite';
    $riq = $bdd->prepare($j);
    $riq->execute([
        'action' => 'Connexion',
        'reussite' => 'réussie'
    ]);
    $connexion = $riq->fetchAll(PDO::FETCH_ASSOC);

    $nb_connexion = count($connexion);

    ?>
    <main class="container">
        <h1 class="my-4 pb-3 h1 text-white d-flex justify-content-center border-bottom ">Utilisateurs</h1>
        <?php include('includes/message.php'); ?>
        <div class="d-flex mt-5">
            <form>
                <input class="form-control" style="width: 350px;" name="recherche" type="text" id="recherche" placeholder="Rechercher un utilisateur" onkeyup="rechercheune(this.value)" />
            </form>
            <p class="text-white ms-auto text-center">Nombre d'utilisateur : <?= $nb_user ?></p>
            <p class="text-white ms-auto text-center">Nombre de visite : <?= $nb_visite ?></p>
            <p class="text-white ms-auto text-center">Nombre de connexion : <?= $nb_connexion ?></p>
            <form action="export.php" class="ms-auto text-center" method="POST">
                <p class="text-white">Exporter la liste des utilisateurs :</p>
                <input type="submit" name="export" value="CSV Export" class="btn btn-secondary btn-sm"></input>
            </form>
        </div>

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
                        <th scope="col">Action</th>
                        <th scope="col">Droits</th>
                        <th scope="col">Bnnnir</th>
                        <th scope="col">Sup. Compte</th>
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
                        echo '<form action="modif_admin_compte.php" method="POST">';
                        echo '<button type="submit" value="' . $utilisateur['email'] . '" name="email" class="btn btn-primary btn-sm">Modifier compte</button>';
                        echo '</form>';
                        echo '</td>';
                        echo '<td>';
                        if ($utilisateur['email'] != $_SESSION['email']) {
                            echo '<form action="mod_droits.php" method="POST">';
                            echo '<button type="submit" value="' . $utilisateur['email'] . '" name="email" class="btn btn-primary btn-sm">Modifier les droits</button>';
                            echo '</form>';
                        } else {
                            echo '<a class="btn btn-secondary btn-sm">Modifier les droits</a>';
                        }
                        echo '</td>';
                        echo '<td>';
                        if ($utilisateur['email'] != $_SESSION['email']) {
                            echo '<form action="bannir.php" method="POST">';
                            if ($utilisateur['ban'] == 0) {
                                echo '<button type="submit" value="' . $utilisateur['email'] . '" name="email" class="btn btn-danger btn-sm">Bannir</button>';
                            } else {
                                echo '<button type="submit" value="' . $utilisateur['email'] . '" name="email" class="btn btn-warning btn-sm">débannir</button>';
                            }
                            echo '</form>';
                        } else {
                            echo '<a class="btn btn-secondary btn-sm">Bannir</a>';
                        }
                        echo '</td>';
                        echo '<td>';
                        if ($utilisateur['email'] != $_SESSION['email']) {
                            echo '<form action="sup_user.php" method="POST">';
                            echo '<button type="submit" value="' . $utilisateur['email'] . '" name="email" class="btn btn-danger btn-sm">Supprimer</button>';
                            echo '</form>';
                        } else {
                            echo '<a class="btn btn-secondary btn-sm">Supprimer</a>';
                        }
                        echo '</td>';
                        echo '</tr>';
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