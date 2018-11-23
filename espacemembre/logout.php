<?php 
session_destroy();
$_SESSION['flash']['success'] = "Vous êtes déconnecté";

header('LOCATIONS : index.php');

?>