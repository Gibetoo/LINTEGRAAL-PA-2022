<?php
try{
       $bdd = new PDO('mysql:host=localhost;dbname=BDD_INTEGRAAL','monUser','myPasswd');
   }catch(Exception $e){
       die('Erreur' . $e->getmessage());
   }
?>