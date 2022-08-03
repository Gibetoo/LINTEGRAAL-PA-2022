<?php

if (isset($_POST["export"])) {
    include('includes/db.php');
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename=liste_Utilisateur_Lintegraal.csv');
    $output = fopen("php://output", "w");
    fputcsv($output, array('Email', 'Nom', 'Prenom', 'Role', 'date d\'inscription'), ";");

    $q = 'SELECT email, nom, prenom, admin, date_inscrit FROM UTILISATEUR';
    $req = $bdd->query($q);
    $results = $req->fetchAll(PDO::FETCH_ASSOC);
    foreach ($results as $ligne) {
        fputcsv($output, $ligne, ";");
    }
    fclose($output);
}
