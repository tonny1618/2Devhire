<?php 

$conn = new PDO ('mysql:host=localhost; dbname=devhire', 'root', '');

$query = 'SELECT nom, prenom FROM candidat';

$result = $conn->query($query);

	while ($row = $result->fetchObject()) {
	
	var_dump($row);

	}

	$result->closeCursor();



?>