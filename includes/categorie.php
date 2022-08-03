<?php
$d = 'SELECT * FROM CATEGORIE';
$req = $bdd->query($d);
$cat = $req->fetchAll(PDO::FETCH_ASSOC);
?>