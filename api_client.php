<?php
//PHP ACTIVATION/DESACTIVATION/AFFICHAGE ENTREPRISES

require "database.php";



if (isset($_POST['action'])) {

		switch ($_POST['action']) {
			case 'setValClient':

				if(isset($_POST["id"])){
					setValClient($_POST["id"]);
				}
				break;
			case 'setInvalidClient':
				if(isset($_POST["id"])){
					setInvalidClient($_POST["id"]);
				}
				break;
			case 'getAllClients':
				getClients();
				break;
	}

}




//VALIDATION D'UN CLIENT
function setValClient($id){


	
				if ($id > 0){
					$dbConn=Database::connect();
				    $SQLQuery = 'UPDATE Client set id_Statut=1 where id_Client=:id';

				    echo $SQLQuery;
					try{
					    $SQLStatement = $dbConn->prepare($SQLQuery);
						$SQLStatement->bindValue(':id', $id);

						if ($SQLStatement->execute()){
					
						}else{
							print("Erreur d'exécution de la requête de validation !<br />");
							//var_dump($SQLStatement->errorInfo());
						}
					}catch (Exception $ex){
						print("Erreur de préparation de la requête de validation !<br />");
                        print($ex->getMessage());
					}
				}



}

//DESACTIVATION D'UN CLIENT
function setInvalidClient($id){

					if ($id > 0){
					$dbConn=Database::connect();
				    $SQLQuery = 'UPDATE client set id_Statut=3 where id_Client=:id';

				    echo $SQLQuery;
					try{
					    $SQLStatement = $dbConn->prepare($SQLQuery);
						$SQLStatement->bindValue(':id', $id);

						if ($SQLStatement->execute()){
					
						}else{
							print("Erreur d'exécution de la requête de dévalidation !<br />");
							//var_dump($SQLStatement->errorInfo());
						}
					}catch (Exception $ex){
						print("Erreur de préparation de la requête de dévalidation !<br />");
                        print($ex->getMessage());
					}
				}



}



//AFFICHAGE DES DONNEES CLIENTS

function getClients(){

				$dbConn=Database::connect();

				$query='SELECT distinct client.id_Client as id, siret,raisonSociale, statut.libelleStatut,
					(select moyencom.valeur from moyencom where id_typecom=3 and id_Client=id) as email,
					(select moyencom.valeur from moyencom where id_typecom=2 and id_Client=id) as telephone
					from client
					inner join statut on client.id_Statut=statut.id_Statut
					inner join moyencom on client.id_Client=moyencom.id_Client
					inner join typecom on moyencom.id_typeCom=typecom.id_typeCom
					order by raisonSociale;';

				$statement=$dbConn->query($query);
				$result = $statement->fetchAll(PDO::FETCH_CLASS);
				$statement->closeCursor();


				header('Content-Type: application/json');
				echo json_encode($result);

}
