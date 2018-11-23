<?php 

session_start();
require 'functions.php';

logged_only();


?>

<h1>Votre compte</h1>
<?php debug($_SESSION); ?>