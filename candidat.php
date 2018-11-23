<!--PHP ACTIVATION/DESACTIVATION/AFFICHAGE CANDIDATS-->

						<?php
						//Connexion à la bdd
						$dbConn=Database::connect();

				

				//VALIDATION D'UN CANDIDAT

							if (isset($_GET['id']) AND !empty($_GET) AND $_GET['act']=="val"){
										$id = $_GET['id'];
										if ($id > 0){
										    $SQLQuery = 'UPDATE Candidat set id_Statut=1 where id_Candidat=:id';
											try{
											    $SQLStatement = $dbConn->prepare($SQLQuery);
												$SQLStatement->bindValue(':id', $id);

												if ($SQLStatement->execute()){
													print('<script type="text/javascript">document.location.href=\'admin.php\';</script>');
												}else{
													print("Erreur d'exécution de la requête de validation !<br />");
													var_dump($SQLStatement->errorInfo());
												}
											}catch (Exception $ex){
												print("Erreur de préparation de la requête de validation !<br />");
		                                        print($ex->getMessage());
											}
										}


				   					$SQLStatement->closeCursor();
									}

				//DESACTIVATION D'UN CANDIDAT

							if (isset($_GET['id']) AND !empty($_GET) AND $_GET['des']=="del"){
										$id = $_GET['id'];
										if ($id > 0){
										    $SQLQuery = 'UPDATE Candidat set id_Statut=3 where id_Candidat=:id';
											try{
											    $SQLStatement = $dbConn->prepare($SQLQuery);
												$SQLStatement->bindValue(':id', $id);

												if ($SQLStatement->execute()){

													
													print('<script type="text/javascript">document.location.href=\'admin.php\';</script>');
												}else{
													print("Erreur d'exécution de la requête de suppression !<br />");
													var_dump($SQLStatement->errorInfo());
												}
											}catch (Exception $ex){
												print("Erreur de préparation de la requête de suppression !<br />");
		                                        print($ex->getMessage());
											}
										}


				   					$SQLStatement->closeCursor();
									}



				//AFFICHAGE DES DONNEES CANDIDATS

						$query='SELECT Candidat.id_Candidat as id, nom, prenom, dateNaissance, dateMaj,libelleQualification, statut.libelleStatut, 
										(select moyencom.valeur from moyencom where id_typecom=3 and id_Candidat=id) as email
										FROM Candidat
										inner join avoir on candidat.id_Candidat=avoir.id_Candidat
										inner join qualification on avoir.id_Qualification=qualification.id_Qualification
										inner join statut on candidat.id_Statut=statut.id_Statut
										inner join moyencom on candidat.id_Candidat=moyencom.id_Candidat
										inner join typecom on moyencom.id_typeCom=typecom.id_typeCom
										order by dateMaj desc';


						$statement=$dbConn->query($query);

						

					   while ($candidat = $statement->fetch())