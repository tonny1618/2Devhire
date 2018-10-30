<?php require ("head.php") ?>
<?php require("navbar.php")?>

<div id="espaceclient" class="container-fluid">
	<div  class="container">
		
		<h2>Bienvenu '...'</h2>
		<ul class="nav nav-tabs nav-justified">
			<li ><a data-toggle="tab" href="#depotannonce">Déposer une annonce</a></li>
			<li class="active"><a data-toggle="tab" href="#gereannonces">Gérer mes annonces</a></li>
			<li><a data-toggle="tab" href="#mesdocuments">Mes documents</a></li>
		</ul>

		<div class="tab-content">

			<div id="depotannonce" class="tab-pane fade">
				<?php require('creer_annonce.php') ?>

			</div>
			<div id="gereannonces" class="tab-pane fade in active">
				<p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
			</div>

			<div id="mesdocuments" class="tab-pane fade">
				<p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
			</div>
		</div>

	</div>

</div>


	
<?php require('searchbar.php')?>


<?php require('footer.php')?>