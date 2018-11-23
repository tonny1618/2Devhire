<?php require ("head.php") ?>
<?php require("navbar.php")?>

<?php require('database.php')?>

<?php

// var_dump($_GET); die();
// $recherche = "";
// $ville = "";

// var_dump($_GET);
if(!empty($_GET['recherche']) && !empty($_GET['ville']))
{

	// var_dump($ville);
	$db = Database::connect();
	$recherche = htmlspecialchars($_GET['recherche']);
	$ville = htmlspecialchars($_GET['ville']);

	$sql = 'SELECT * FROM annonce WHERE libelleAnnonce LIKE ? AND ville LIKE ? AND  id_Statut=2 GROUP By id_Annonce ORDER BY datePublication DESC';

	$req = $db->prepare($sql);
	$req->execute(array('%'.$recherche.'%', '%'.$ville.'%'));

	$count = $req->rowCount();

	if ($count >= 1 ){
		$script ='';
		echo "Il y a " .$count . " correspondance(s) <br>";
		while ($data = $req->fetch(PDO::FETCH_OBJ)) {
			$script = "Titre : " . $data->libelleAnnonce . "<br>";
			$script .= "Description : ". $data->descriptionAnnonce . "<br>";
			$script .= "Ville " .$data->ville ."<br>";

			echo $script;
		} 

	} else {
		echo "Il n'y a aucun résultat pour " .$recherche;
	}

} else {
	echo "Merci de remplir tous les champs";
	
}
?>