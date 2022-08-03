<?php
session_start();
include('includes/flog.php');
ecrire_un_log(true, $_SESSION['email'], 'deconnexion');
session_destroy();
header('location: http://lintegraal.site/');
exit;

?>