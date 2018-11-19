<?php

    $SQLQuey = "CALL ajoutCandidat()"
	$statement = $bdd->prepare($Query);
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


END|
DELIMITER;
?>