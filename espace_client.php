<?php 
require_once ("head.php");
require_once("functions.php");
logged_only();
var_dump($_SESSION).
$emailclient = $_SESSION['auth']->valeur ;
$id_Client = $_SESSION['auth']->id_Client;
$raisonSociale = $_SESSION['auth']->raisonSociale;

?>
<div id="espaceclient" class="col-md-12 container">
	<?php require("navbar.php")?>
	<?php require('database.php');?>

	<h2>Bienvenu <?php echo $raisonSociale ?> </h2>
	<a href="logout.php">Se déconnecter</a>
	<div class=" row" id="boutoncollapse">

		<div class="col-md-3 col-md-offset-2">
			<button class="btn btn-lg hvr-shutter-out-vertical btncollapse"  data-toggle="collapse" data-target="#depotannonce">Déposer une annonce</button>
		</div>
		<div class="col-md-3">
			<button class="btn btn-lg hvr-shutter-out-vertical btncollapse" data-toggle="collapse" data-target="#gereannonces">Gérer mes annonces</button>
		</div>
		<div class="col-md-3">
			<button class="btn btn-lg hvr-shutter-out-vertical btncollapse" data-toggle="collapse" data-target="#mesdocuments">Mes Documents</button>
		</div>


		<div id="bloccollapse" class="col-md-12">
			<div id="depotannonce" class="collapse"> 
				<!-- TODO  Faire requête pour rechercher des candidats-->	<?php require('creer_annonce.php') ?> 

			</div>
			<div id="gereannonces" class="collapse">
				<table class="table table-striped">
					<thead>
						<tr>
							<th scope="col">Date de Publication</th>
							<th scope="col">Titre de l'annonce</th>
							<th scope="col">Ville</th>
							<th colspan="2" scope="col">Actions</th>
							
						</tr>
					</thead>
					<tbody>

<?php 

	$db = Database::connect();
	$script = '';
	$statement = $db->query("SELECT * FROM annonce 
		INNER JOIN client ON client.id_Client = annonce.id_Client WHERE client.id_Client='$id_Client';");
	$script ="";
	while($annonce = $statement->fetchObject())  {
		list($year, $month, $day) = explode("-", $annonce->datePublication);
            $date = "$day/$month/$year";
		// var_dump($annonce);
		$script = '<tr>';
		$script .='<td>'.$date.'</td>';
		$script .='<td>'.$annonce->libelleAnnonce.'</td>';
		$script .= '<td>'.$annonce->ville.'</td>';
		$script .= '<td><span class="glyphicon glyphicon-pencil"><a href="#" title="Modifier"></a></span></td>';
		$script.='<td><span class="glyphicon glyphicon-remove"><a href="#" title="Modifier"></a></span></td>';

		$script .='</tr>';
		}
echo $script;
	?>
	</tbody>

		</table>

					</div>

					<div id="mesdocuments" class="collapse">
						<p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
					</div>
				</div>

			</div>

			<!-- Search Bar -->
			<?php require('searchbar.php'); ?>
		</div>

		<?php require('footer.php');?>
