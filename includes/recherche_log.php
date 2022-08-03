<?php session_start();
include('db.php');


$q = 'SELECT * FROM LOG';
$req = $bdd->query($q);
$result = $req->fetchAll(PDO::FETCH_ASSOC);

// On récupère le nom dans l'url
$searchQuery = $_REQUEST["resultat"];
$tab = [];


// On regarde si on possède un résultat correspondant à la recherche
if (!empty($searchQuery)) {
    $len = strlen($searchQuery);

    foreach ($result as $log) {
        if (stristr($searchQuery, substr($log['email'], 0, $len))) {
            $tab[] = $log;
        }
    }
} else {
    $tab[] = [];
}


// Afficher aucun résultat si == ''
if ($tab != []) {
    echo '<table class="text-white table table-striped mt-5 text-center">';
    echo '<thead>';
    echo '<tr>';
    echo '<th scope="col"></th>';
    echo '<th scope="col">Date</th>';
    echo '<th scope="col">Action</th>';
    echo '<th scope="col">Reussite</th>';
    echo '<th scope="col">Email</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
    foreach ($tab as $log) {
        echo '<tr>';
        echo '<td></td>';
        echo '<td class="text-white">' . $log['date'] . '</td>';
        echo '<td class="text-white">' . $log['action'] . '</td>';
        echo '<td class="text-white">' . $log['reussite'] . '</td>';
        echo '<td class="text-white">' . $log['email'] . '</td>';
        echo '</tr>';
    }
    echo '</tbody>';
    echo '</table>';
} else {
    echo '<h1 class="my-5 pb-3 h3 text-white d-flex justify-content-center">Utilisateur inéxistant</h1>';
}
