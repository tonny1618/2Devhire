<?php
//PHP ACTIVATION/DESACTIVATION/AFFICHAGE ANNONCES

require"database.php";



if (isset($_POST['action'])) {

		switch ($_POST['action']) {

			case 'setValAdvert':

				if(isset($_POST["id"])){
					setValAdvert($_POST["id"]);
				}
				break;

			case 'setInvalidAdvert':

				if(isset($_POST["id"])){
					setInvalidlAdvert($_POST["id"]);
				}
				break;

			case 'getAllAdvert':
				getAllAdvert();
				break;
		
	}

}



//VALIDATION D'UNE ANNONCE
function setValAdvert($id){


	
				if ($id > 0){
					$dbConn=Database::connect();
				     $SQLQuery = 'UPDATE Annonce set id_Statut=1 where id_Annonce=:id';

				    echo $SQLQuery;
					try{
					    $SQLStatement = $dbConn->prepare($SQLQuery);
						$SQLStatement->bindValue(':id', $id);

						if ($SQLStatement->execute()){
					
						}else{
							print("Erreur d'exécution de la requête de validation !<br />");
							
						}
					}catch (Exception $ex){
						print("Erreur de préparation de la requête de validation !<br />");
                        print($ex->getMessage());
					}
				}



}

//DESACTIVATION D'UNE ANNONCE
function setInvalidlAdvert($id){

					if ($id > 0){
					$dbConn=Database::connect();
				     $SQLQuery = 'UPDATE Annonce set id_Statut=3 where id_Annonce=:id';

				    echo $SQLQuery;
					try{
					    $SQLStatement = $dbConn->prepare($SQLQuery);
						$SQLStatement->bindValue(':id', $id);

						if ($SQLStatement->execute()){
					
						}else{
							print("Erreur d'exécution de la requête de validation !<br />");
							
						}
					}catch (Exception $ex){
						print("Erreur de préparation de la requête de validation !<br />");
                        print($ex->getMessage());
					}
				}



}



//AFFICHAGE DES DONNEES ANNONCES


function getAllAdvert(){

			$dbConn=Database::connect();


			$query='SELECT id_Annonce as id, libelleAnnonce,datePublication, descriptionAnnonce, ville, statut.libelleStatut as statut
										FROM annonce
										inner join statut on statut.id_Statut=annonce.id_Statut
										ORDER BY datePublication desc';

			$statement=$dbConn->query($query);
			$result = $statement->fetchAll(PDO::FETCH_CLASS);
			$statement->closeCursor();

			header('Content-Type: application/json');
			echo json_encode($result);

}

?>