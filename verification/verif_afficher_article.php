<?php 
session_start();
include('includes/db.php');

$AllPost = $bdd->query('SELECT * FROM ACTUS WHERE email = "'.$_SESSION['email'].'" ORDER BY date DESC');

$AllPostRandom = $bdd->query('SELECT * FROM ACTUS WHERE email = "'.$_POST['email'].'" ORDER BY date DESC');

$AllPostTOUS = $bdd->query('SELECT * FROM ACTUS ORDER BY date DESC');
?>