<?php
session_start();

include('includes/db.php');

$AllUPost = $bdd->query('SELECT * FROM POST where utilisateur=  "'.$_SESSION['email'].'" ORDER BY date DESC');
$AllMPost = $bdd->query('SELECT * FROM POST ORDER BY date DESC');

?>