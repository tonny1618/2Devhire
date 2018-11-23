<?php require ("head.php");
require_once("functions.php");
logged_only();?>
<?php require('database.php');

$email = $_SESSION['auth']->valeur ;
$id_Candidat = $_SESSION['auth']->id_Candidat;
$nom = $_SESSION['auth']->nom;


?>

<div id="espacecandidat" class="col-md-12 container">
	<?php require("navbar.php")?>


	<h2>Bienvenu <?php echo $nom;?> </h2>
	<a href="logout.php">Se déconnecter</a>
	
	<div class="row" id="boutoncollapse">


		<div class="col-md-3 col-md-offset-2">
			<button class="btn btn-lg hvr-shutter-out-vertical btncollapse" data-toggle="collapse" data-target="#depotannonce">Déposer un CV</button>
		</div>
		<div class="col-md-3">
			<button class="btn btn-lg hvr-shutter-out-vertical btncollapse" data-toggle="collapse" data-target="#gereannonces">Gérer vos annonces</button>
		</div>
		<div class="col-md-3">
			<button class="btn btn-lg hvr-shutter-out-vertical btncollapse" data-toggle="collapse" data-target="#mesdocuments">Mes Documents</button>
		</div>


		<div id="bloccollapse" class="col-md-12">
			<div id="depotannonce" class="collapse">
				<?php require('formulairecv_espacecandidat.php') ?>

			</div>
			<div id="gereannonces" class="collapse">
				<table class="table table-responsive table-striped table-hover" >
					<thead>
						<tr>
							<th >Date</th>
							<th >Titre Annonce</th>
							<th>Détail</th>
							<th colspan="2" scope="col">Actions</th>
						</tr>
					</thead>

					<tbody>

						<tr>
							<?php 

							$db = Database::connect();
							$script = '';
							$statement = $db->query("SELECT nom, prenom, datePostulation, libelleAnnonce, SUBSTRING_INDEX(descriptionAnnonce, ' ' , 20) AS resume FROM candidat 
								INNER JOIN postuler on candidat.id_Candidat=postuler.id_Candidat 
								INNER JOIN annonce on postuler.id_Annonce = annonce.id_Annonce
								where candidat.id_Candidat='$id_Candidat'");
							$script ="";
							while($annonce = $statement->fetchObject()) 
							{ 
								list($year, $month, $day) = explode("-", $annonce->datePostulation);
								$date = "$day/$month/$year";
								$script ='<td>'.$date.'</td>';
								$script .='<td>'.$annonce->libelleAnnonce.'</td>';
								$script .= '<td>'.$annonce->resume.'</td>';
								$script .='<td><span class="glyphicon glyphicon-pencil"></span></td>';
								$script .='<td ><span class="glyphicon glyphicon-trash"></span></td>';
							};
							echo $script;

							?>
							
						</tr>
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

<?php require('footer.php');
