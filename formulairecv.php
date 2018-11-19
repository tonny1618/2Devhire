<?php require ("head.php") ?>
<?php require("navbar.php")?>

<div class="container-fluid" id="formulairecv">
	<h2>Créer votre CV</h2>
	<form method="post">
	<?php
	$bdd=new PDO("mysql:host=localhost; charset=latin1; dbname=devhire; port=3307", 'root', 'root');
	if(empty($_GET)){
		if(!empty($_POST)){
			$civilite=$_POST['civilite'];
			$prenom=$_POST['prenom'];
			$nom=$_POST['nom'];
			$datenaissance=$_POST['date'];	
			$adresse=$_POST['adresse'];
			$codepostal=$_POST['codepostal'];
			$telephone=$_POST['telephone'];
			$permis=$_POST['permis'];
			$transport=$_POST['transport'];
			$qualification=$_POST['qualification'];
			$competence=$_POST['competence'];
			$poste=$_POST['poste'];
			$datedebut=$_POST['datedebut'];
			$datefin=$_POST['datefin'];
			$descriptif=$_POST['descriptif'];
			$mail=$_POST['mail'];
			$mdp=$_POST['mdp'];


            $SQLQuery='Call ajoutCandidat(:codepostal, :adresse, :civilite, :nom, :prenom, :date, :telephone, :mail, :mdp, :permis, :transport, :qualification, :poste, :datedebut, :datefin, :descriptif)';

            $statement = $bdd->prepare($SQLQuery);
            $statement-> bindValue(':civilite', $civilite);
            $statement-> bindValue(':nom', $nom);
            $statement-> bindValue(':prenom', $prenom);
            $statement-> bindValue(':date', $datenaissance);
            $statement-> bindValue(':codepostal', $codepostal);
            $statement-> bindValue(':adresse', $adresse);
            $statement-> bindValue(':permis', $permis);
            $statement-> bindValue(':transport', $transport);
            $statement-> bindValue(':mdp', $mdp);
            $statement-> bindValue(':qualification', $qualification);
            $statement-> bindValue(':telephone', $telephone);
            $statement-> bindValue(':mail', $mail);
            $statement-> bindValue(':poste', $poste);
            $statement-> bindValue(':datedebut', $datedebut);
            $statement-> bindValue(':datefin', $datefin);
            $statement-> bindValue(':descriptif', $descriptif);
            $statement-> execute();



            foreach ($competence as $comp){
				$SQLQuery2 ='INSERT INTO posseder (id_Candidat, id_Competence) values ((SELECT id_Candidat FROM Candidat where id_Candidat=last_insert_id()), (SELECT id_Competence FROM Competence where id_Competence= :competence));';
				$statement2 = $bdd->prepare($SQLQuery2);
				$statement2-> bindValue(':competence', $comp);
				$statement2-> execute(); //or die (print_r($bdd->errorInfo(), true));

			}
			$statement->closeCursor();
			//$SQLResult->closeCursor();
			}

		}
	
	
		/*$bdd=new PDO("mysql:host=localhost; charset=utf8; dbname=devhire; port=3307", 'root', 'root');
		if(!empty($_GET)){
			if(isset($_GET['id'])){
				if(!empty($_POST)){
					$civilite=$_POST['civilite'];
					$prenom=$_POST['prenom'];
					$nom=$_POST['nom'];
					$adresse=$_POST['adresse'];
					$codepostal=$_POST['codepostal'];
					$ville=$_POST['ville'];
					$telephone=$_POST['telephone'];
					$competence=$_POST['competence'];
					$qualification=$_POST['qualification'];
					$datedebut=$_POST['datedebut'];
					$datefin=$_POST['datefin'];
					$libelleposte=$_POST['libelleposte'];
					$mail=$_POST['mail'];
					$mdp=$_POST['mdp'];
					$SQLQuery = 'UPDATE Candidat ';
					$SQLQuery.= 'INNER JOIN Civilite on Candidat.id_Civilite=Civilite.id_Civilite ';
					$SQLQuery.= 'INNER JOIN Posseder on Candidat.id_Candidat=Posseder.id_Candidat ';
					$SQLQuery.= 'INNER JOIN Competence on Posseder.id_Competence=Competence.id_Competence ';
					$SQLQuery.= 'INNER JOIN MoyenCom on Candidat.id_Candidat=MoyenCom.id_Candidat ';
					$SQLQuery.= 'INNER JOIN TypeCom on MoyenCom.id_TypeCom=TypeCom.id_TypeCom ';
					$SQLQuery.= 'INNER JOIN Adresse on Candidat.id_Adresse=Adresse.id_Adresse ';
					$SQLQuery.= 'INNER JOIN CodePostal on Adresse.id_codePostal=CodePostal.id_codePostal ';
					$SQLQuery.= 'INNER JOIN Experience on Candidat.id_Candidat=Experience.id_Candidat ';
					$SQLQuery.= 'INNER JOIN Contrat on Candidat.id_Candidat=Contrat.id_Candidat ';
					$SQLQuery.= 'INNER JOIN Dependre on Contrat.id_Contrat=Dependre.id_Contrat ';
					$SQLQuery.= 'INNER JOIN Qualification on Dependre.id_Qualification=Qualification.id_Qualification ';
					$SQLQuery.= 'SET Civilite.id_Civilite = :civilite, Candidat.prenom = :prenom, Candidat.nom = :nom, Adresse.libelleAdresse= :adresse, CodePostal.codepostal = :codepostal, MoyenCom.valeur = :telephone,Competence.valeur = :competence, Qualification.libelleQualification = :qualification, Experience.dateDebutPoste = :datedebut, Experience.dateFinPoste = :datefin, Experience.libellePoste = :libelleposte, MoyenCom.valeur = :mail, Candidat.motDePasse = :mdp WHERE ID_Client='.$_GET['id'].'';

					$statement = $bdd->prepare($SQLQuery);
					$statement-> bindvalue(':civilite', $civilite);
					$statement-> bindvalue(':nom', $nom);
					$statement-> bindvalue(':prenom', $prenom);
					$statement-> bindvalue(':adresse', $adresse);
					$statement-> bindvalue(':codepostal', $codepostal);
					$statement-> bindvalue(':telephone', $telephone);
					$statement-> bindvalue(':competence', $competence);
					$statement-> bindvalue(':qualification', $qualification);
					$statement-> bindvalue(':datedebut', $datedebut);
					$statement-> bindvalue(':datefin', $datefin);
					$statement-> bindvalue(':libelleposte', $libelleposte);
					$statement-> bindvalue(':mail', $mail);
					$statement-> bindvalue(':mdp', $mdp);
					$statement-> execute();

				}
			}else{
				$SQLQuery = 'SELECT * FROM Client WHERE ID_client='.$_GET['id'];
				$Result = $bdd->query($SQLQuery);
				if($SQLRow=$Result->fetchObject()){
					$civilite=$SQLRow-> id_Civilite;
					$prenom=$SQLRow-> prenom;
					$nom=$SQLRow-> nom;
					$adresse=$SQLRow-> libelleAdresse;
					$codepostal=$SQLRow-> codePostal;
					$telephone=$SQLRow-> MoyenCom.valeur;
					$competence=$SQLRow-> Competence.valeur;
					$qualification=$SQLRow-> libelleQualification;
					$datedebut=$SQLRow-> dateDebutPoste;
					$datefin=$SQLRow-> dateFinPoste;
					$libelleposte=$SQLRow-> libellePoste;
					$mail=$SQLRow-> MoyenCom.valeur;
					$mdp=$SQLRow-> Candidat.motDePasse;
				if ($SQLStatement->execute()){
                    print('<script type="text/javascript">document.location.href=\'acceuilcandidat.php\';</script>');
                }else{
                    print("Erreur d'exécution de la requête d'insertion !<br />");
                    var_dump($SQLStatement->errorInfo());
                }

			}

			if (!empty($_POST)){

			$req = 'INSERT INTO Candidat (id_Civilite, prenom, nom, motDePasse) VALUES (:civilite, :prenom, :nom, :mdp)';
			$req = 'INSERT INTO Civilite (id_Civilite) VALUES (:civilite)';
			$req = 'INSERT INTO Adresse (libelleAdresse) VALUES (:adresse)';
			$req = 'INSERT INTO Codepostal (codePostal) VALUES (:codepostal)';
			$req = 'INSERT INTO MoyenCom (valeur) VALUES (:telephone)';
			$req = 'INSERT INTO Competence (valeur) VALUES (:competence)';
			$req = 'INSERT INTO Qualification (libelleQualification) VALUES (:qualification)';
			$req = 'INSERT INTO Experience (dateDebutPoste, dateFinPoste, libellePoste) VALUES (:datedebut, :datefin, :libelleposte)';
			$req = 'INSERT INTO MoyenCom (valeur) VALUES (:mail)';
			$req = $bdd->prepare($req);
			$req->bindValue(':civilite', $civilite);
			$req->bindValue(':prenom', $prenom);
			$req->bindValue(':nom', $nom);
			$req->bindValue(':adresse', $adresse);
			$req->bindValue(':codepostal', $codepostal);
			$req->bindValue(':telephone', $telephone);
			$req->bindValue(':competence', $competence);
			$req->bindValue(':qualification', $qualification);
			$req->bindValue(':datedebut', $datedebut);
			$req->bindValue(':datefin', $datefin);
			$req->bindValue(':libelleposte', $libelleposte);
			$req->bindValue(':mail', $mail);
			$req->bindValue(':mdp', $mdp);

			
			if ($SQLStatement->execute()){
                print('<script type="text/javascript">document.location.href=\'liste.php\';</script>');
            }else{
                print("Erreur d'exécution de la requête d'insertion !<br />");
                var_dump($SQLStatement->errorInfo());
            }
		$Result->closeCursor();
		}
	}
	}*/
	/*Pour inserer dans la base de données les resultats de checkbox ou une seule solution se coche https://openclassrooms.com/forum/sujet/insert-checkbox-pdo-mysql?page=1*/
	
	?>
		<div class="form-group col-sm-6">
			<label class="control-label col-sm-2" for="prenom">Civilité : </label>
			<select name="civilite" id="champcivilite">
				<option value="0">---</option>
				<option value ="1">Monsieur</option>
				<option value="2">Madame</option>
			</select>
		</div>
		<div class="form-group col-sm-6">
			<label class="control-label col-sm-2" for="prenom">Prénom : </label>
			<input  class="form-control" type="text" value="" name="prenom" autocomplete="on" id="champPrenom">
		</div>
		<div class="form-group col-sm-6">
			<label class="control-label col-sm-2" for="nom">Nom : </label>
			<input  class="form-control" type="text" value="" name="nom" autocomplete="on" id="champNom">
		</div>
		<div class="form-group col-sm-6">
			<label class="control-label col-sm-2" for="nom">Date de naissance : </label>
			<input  class="form-control" type="date" value="" name="date" autocomplete="on" id="champDate">
		</div>
		<div class="form-group  col-sm-6">
			<label class="control-label col-sm-2" for="adresse">Adresse : </label>
			<input  class="form-control" type="text" value="" name="adresse" autocomplete="on" id="champAdresse">
		</div>
		<div class="form-group col-sm-6">
			<label class="control-label col-sm-2" for="codepostal">Code Postal :</label>
			<input  class="form-control" type="text" value="" name="codepostal" autocomplete="on" id="champCP">
		</div>
		<div class="form-group col-sm-6">
			<label class="control-label col-sm-2" for="codepostal">Telephone :</label>
			<input  class="form-control" type="text" value="" name="telephone" autocomplete="on" id="champTel">
		</div>

		<div class="form-group col-sm-3">
		<div class="checkbox" name="permis">
				<label><input type="radio" value="0" name="permis">Pas de permis</label>
		</div>
		<div class="checkbox" name="permis">
				<label><input type="radio" value="1" name="permis">Permis B</label>
		</div>
		</div>
		<div class="form-group col-sm-3">
		<div class="checkbox" name="transport">
				<label><input type="radio" value="0" name="transport">Pas de moyen de transport</label>
		</div>
		<div class="checkbox" name="transport">
				<label><input type="radio" value="1" name="transport">Moyen de locomotion</label>
		</div>
		</div>

		<div class="col-md-6">
			<legend>Compétences : </legend>

			<div class="checkbox" name="competence">
				<label><input type="checkbox" value="1"
					name="competence[]">Java</label>
			</div>
			<div class="checkbox" name="competence">
				<label><input type="checkbox" value="2"
					name="competence[]">Compétences 2</label>
			</div>
			<div class="checkbox" name="competence">
				<label><input type="checkbox" value="3"
					name="competence[]">Compétences 3</label>
			</div>
			<div class="checkbox" name="competence">
				<label><input type="checkbox" value="4"
					name="competence[]">Compétences 4</label>
			</div>
			<div class="checkbox" name="competence">
				<label><input type="checkbox" value="5"
					name="competence[]">Compétences 5</label>
			</div>
		</div>
		<div class="col-md-6">
			<legend>Qualifications : </legend>

			<div class="checkbox">
				<label><input type="radio" value="1" name="qualification">Qualifications 1</label>
			</div>
			<div class="checkbox">
				<label><input type="radio" value="2" name="qualification">Qualifications 2</label>
			</div>
			<div class="checkbox">
				<label><input type="radio" value="3" name="qualification">Qualifications 3</label>
			</div>

		</div>
		<div class="col-md-12">
			<legend>Expériences : </legend>
			
			<div class="col-md-12 col-md-offset-11"> 
				<span id="add" class="glyphicon glyphicon-plus " data-toggle="tooltip" data-placement="top" title="Ajouter nouvelle expérience" ></span>
			</div>
		<div id="blocexperience" class="form-group col-md-6 col-md-offset-3">
			<div class="col-md-4">
				<label>Intitulé Poste : </label>
				<input class="form-control" type="text" name ="poste">
			</div>
			<div class="col-md-4">
				<label>De : </label>
				<input class="form-control" type="date"  name="datedebut">

			</div>

			<div class="col-md-4">
				<label> Jusqu'au :</label>
				<input class="form-control" type="date"  name="datefin">
			</div>

			<div class="col-md-12">
				<label>Détaillez votre expérience : </label><textarea class="form-control" rows="8"	 id="comment" name="descriptif"></textarea>
			</div>
		</div>
	</div>

	<div id="nouvellediv"></div>
		<div class="col-md-12">
			<legend>Identifiants : </legend>
			<div class="col-md-3">
				<div class="form-group">
					<label class="control-label" for="email">Adresse mail :</label>
					<input  class="form-control" type="email" value="" name="mail" id="champMail">
				</div>
			</div>
			<div class="row">
				<div class="col-md-3">
					<div class="form-group">
						<label class="control-label" for="password">Mot de passe : </label>
						<input  class="form-control" type="password" value="" name="mdp" id="champMDP">
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-12 col-md-offset-10">
		<div class="form-group col-sm-1">
			<button type="submit" class="btn btn-secondary btn-lg hvr-bounce-to-right">Envoyer</button>
		</div>
		<div class="form-group col-sm-1">
			<button type="reset" class="btn btn-secondary btn-lg hvr-bounce-to-right">Annuler</button>
		</div>
	</div>

	</form>
</div>
<?php require('footer.php') ?>

