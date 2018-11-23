
<?php
//PHP ACTIVATION/DESACTIVATION/AFFICHAGE CANDIDATS

require "database.php";



if (isset($_POST['action'])) {

		switch ($_POST['action']) {
			case 'setValUser':

				if(isset($_POST["id"])){
					setValUser($_POST["id"]);
				}
				break;
			case 'setInvalidlUser':
				if(isset($_POST["id"])){
					setInvalidUser($_POST["id"]);
				}
				break;
			case 'getAllUsers':
				getUsers();
				break;
	}

}



//VALIDATION D'UN CANDIDAT
function setValUser($id){


	
				if ($id > 0){
					$dbConn=Database::connect();
				    $SQLQuery = 'UPDATE Candidat set id_Statut=1 where id_Candidat=:id';

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

//DESACTIVATION D'UN CANDIDAT
function setInvalidUser($id){

					if ($id > 0){
					$dbConn=Database::connect();
				    $SQLQuery = 'UPDATE Candidat set id_Statut=3 where id_Candidat=:id';

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



//AFFICHAGE DES DONNEES CANDIDATS

//FONCTION GENERALISTE
function ExecuteQuery($query){

	//Connexion à la bdd
	

	$result = array();
	$statement=$dbConn->query($query);

	while ($row = $statement->fetchObject()){
		array_push($result, $row);
	}
	


	$statement->closeCursor();


	return $result;
}
function getUsers(){

		$dbConn=Database::connect();

		$query='SELECT DISTINCT Candidat.id_Candidat as id, nom, prenom, dateNaissance, dateMaj,libelleQualification, statut.libelleStatut, 
				(select moyencom.valeur from moyencom where id_typecom=3 and id_Candidat=id) as email,
				(select moyencom.valeur from moyencom where id_typecom=2 and id_Candidat=id) as telephone
				FROM Candidat
				inner join avoir on candidat.id_Candidat=avoir.id_Candidat
				inner join qualification on avoir.id_Qualification=qualification.id_Qualification
				inner join statut on candidat.id_Statut=statut.id_Statut
				inner join moyencom on candidat.id_Candidat=moyencom.id_Candidat
				inner join typecom on moyencom.id_typeCom=typecom.id_typeCom
				order by dateMaj desc';


		$statement=$dbConn->query($query);
				$result = $statement->fetchAll(PDO::FETCH_CLASS);
				$statement->closeCursor();

				header('Content-Type: application/json');
				echo json_encode($result);

}

