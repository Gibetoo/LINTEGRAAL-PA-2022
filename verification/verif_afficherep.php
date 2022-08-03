<?php
session_start();

$a = 'SELECT * FROM POST WHERE id = :id';
$postre = $bdd->prepare($a);
$postre->execute([
    'id' => $_GET['id_post']
]);

$p = 'SELECT * FROM REPPOST WHERE id_post = :id_post ORDER BY date DESC';
$resp = $bdd->prepare($p);
$resp->execute([
    'id_post' => $_GET['id_post']
]);
