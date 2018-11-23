<?php
require("database.php");


if(isset($_POST["id"])){
	getDescription($_POST["id"]);
	
} else {
	print('Mauvais paramètre');
}



function getDescription($id){
			//connection ok
	$dbConn=Database::connect();

		//Je construis ma requête
		$SQLQuery='SELECT descriptionAnnonce
					FROM annonce
					WHERE id_Annonce=:id';

		$SQLStatement=$dbConn->prepare($SQLQuery);
		$SQLStatement->bindValue(':id',$_POST['id']);
		$SQLStatement->execute();
		$SQLResult=$SQLStatement->fetchAll();
		$SQLStatement->CloseCursor();

		print($SQLResult[0][0]);
	}

?>