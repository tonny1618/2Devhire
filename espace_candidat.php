<?php require ("head.php") ?>

<div id="espacecandidat" class="col-md-12 container">
<?php require("navbar.php")?>

	<h2>Bienvenu '...'</h2>
		<div class="row" id="boutoncollapse">


	<div class="col-md-3 col-md-offset-2">
		<button class="btn btn-lg hvr-shutter-out-vertical" data-toggle="collapse" data-target="#depotannonce">Déposer un CV</button>
	</div>
	<div class="col-md-3">
		<button class="btn btn-lg hvr-shutter-out-vertical" data-toggle="collapse" data-target="#gereannonces">Gérer vos annonces</button>
	</div>
	<div class="col-md-3">
		<button class="btn btn-lg hvr-shutter-out-vertical" data-toggle="collapse" data-target="#mesdocuments">Mes Documents</button>
	</div>


	<div id="bloccollapse" class="col-md-12">
			<div id="depotannonce" class="collapse">
				<?php require('formulairecv_espacecandidat.php') ?>

			</div>
			<div id="gereannonces" class="collapse">
				<p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
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
