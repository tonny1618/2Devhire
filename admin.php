<?php
require ("head.php");
require("navbar.php");
require("database.php");
?>

<body>

<div id="admin" class="container">
  <h2>Partie Administrateur</h2>

  <ul class="nav nav-tabs">
    
    <li><a data-toggle="tab" href="#menu1">Gérer Annonces</a></li>
    <li><a data-toggle="tab" href="#menu2">Gérer Candidats</a></li>
    <li><a data-toggle="tab" href="#menu3">Gérer Entreprises</a></li>


  </ul>


<!--PARTIE HTML GESTION DES ANNONCES-->
		  <div class="tab-content">
		    
			    <div id="menu1" class="tab-pane fade in active">
			    	<div class="table-responsive">
			      <h3>Validation des annonces</h3>
			      <table id="tabAnnonces" class="table table-hover">
			    <thead>
			      <tr>
			        <th>Date publication</th>
			        <th>Id</th>
			        <th>Titre</th>
			        <th>Ville</th>
			        <th>Statut</th>

			        <th colspan="2">Action</th>
			      </tr>
			    </thead>
			    <tbody>

					<!--affichage des données annonces par Jquery-->


			    </tbody>
			  </table>
			</div>
			  <textarea id="da" hidden name="description"  rows="8" cols="100"></textarea>
			  
			    </div>



<!--PARTIE HTML GESTION DES CANDIDATS-->



				    <div id="menu2" class="tab-pane fade">
				      <h3>Validation des candidats</h3>
				      <div class="table-responsive">
				      <table id="tabCandidats" class="table table-hover" >
				    <thead>
				      <tr>
				        <th>Dernière MAJ</th>
				        <th>Id</th>
				        <th>Nom</th>
				        <th>Prénom</th>
				        <th>Date de naissance</th>
				        <th>Qualification</th>
				        <th>Email</th>
				        <th>Telephone</th>
				        <th>Statut</th>

				        <th colspan="3">Action</th>
				      </tr>
				    </thead>
				    <tbody>
						<!--affichage des données du tableau par Jquery-->
												
				    </tbody>
				  </table>
				</div>
				    </div>
				  	
				

<!--PARTIE HTML GESTION DES ENTREPRISES-->

			<div id="menu3" class="tab-pane fade">
				      <h3>Validation des entreprises</h3>
				     <div class="table-responsive">
				      <table id="tabClients" class="table table-hover" >
				    	<thead>
				      		<tr>
					      		<th>Id</th>
					        	<th>n°SIRET</th>
					        	<th>Raison Sociale</th>
					        	<th>Email</th>
					      		<th>Téléphone</th>
					      		<th>Statut</th>
					      		<th colspan="3">Action</th>
				     		 </tr>
				    	</thead>
				    	<tbody>
						<!--affichage des données du tableau par jquery-->

				   		</tbody>
					</table>
				</div>
			</div>


					</div>
				</div>



			</body>







<!-----------------------------------------------------------PARTIE JQUERY + AJAX------------------------------------------------------------------>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script type="text/javascript">

	$(document).ready(function(){


		initEvents();

		//Charge le tableau des Annonces
		getAdverts();

		//Charge le tableau des Candidats
		getUsers();

		//Charge le tableau des Entreprises
		getClients();
	});


function initEvents(){

		var ligne_precedente=0;

		$(".data").click(function(event){
			idA=$(this).closest('tr').attr('id');
			getDescription(idA);
			$("#da").show();
			
			$("#da").show();

		    
			//Si ligne_precedente=id de la ligne courante

			var ligne_courante= $(this).parent().attr('id');


			if (ligne_precedente==ligne_courante){
				$("#da").hide();
				$(this).parent()
				ligne_precedente=0;


			}else{
				$("tr[id="+ligne_precedente+"]")
				ligne_precedente=ligne_courante;

			}

		
		});


		$(".btnActivedAdvert").click(function(event){
			idAnnonce=$(this).closest('tr').attr('id');
			 setValAdvert(idAnnonce);

		});


		$(".btnDesactivedAdvert").click(function(event){
			idAnnonce=$(this).closest('tr').attr('id');
				setInvalidAdvert(idAnnonce);

		});


		$(".btnActivedUser").click(function(event){
			idCandidat=$(this).closest('tr').attr('id');
			 setValUser(idCandidat);

		});

		$(".btnDesactivedUser").click(function(event){
		idCandidat=$(this).closest('tr').attr('id');
			 setInvalidUser(idCandidat);


		});

		$(".btnActivedClient").click(function(event){
			idClient=$(this).closest('tr').attr('id');
			 setValClient(idClient);

		});

		$(".btnDesactivedClient").click(function(event){
		idClient=$(this).closest('tr').attr('id');
			 setInvalidClient(idClient);


		});

}



//LES DIFFERENTES FONCTIONS

	function getDescription(idA){
		$.ajax({
			  method: "POST",
			  url: "api_description.php",
			  data: {id: idA}
				})
		  		.done(function(da) {
		 
		  			$("#da").html(da);

		  			
		  	
  				});
	
	}


	function getAdverts(){
		$.ajax({
			  method: "POST",
			  url: "api_annonce.php",
			  data: { action: "getAllAdvert"}
				})
		  	.done(function(tabAnnonces) {

					script = "";
						for (var i = 0; i < tabAnnonces.length; i++) {
							script +='<tr id="'+tabAnnonces[i].id +'">';

						    script  += '<td class="data"> '+ tabAnnonces[i].datePublication + "</td>";
						    script  += '<td class="data">' +tabAnnonces[i].id + "</td>";
						    script  += '<td class="data">' +tabAnnonces[i].libelleAnnonce + "</td>";
						    script  += '<td class="data">' +tabAnnonces[i].ville + "</td>";
						    script  += '<td class="data">' +tabAnnonces[i].statut + "</td>";
						   	script  += '<td ><img  class="btnActivedAdvert" src="asset/images/checked.png" alt="checked"></td>';
							script  += '<td ><img class="btnDesactivedAdvert" src="asset/images/cancel.png" alt="desactived"> </a></td>';
							script += '</tr>';
						}

						$("#tabAnnonces tbody").html("").append(script);

						initEvents();
  		});

			
	}

	function setValAdvert(idA){

		$.ajax({
			  method: "POST",
			  url: "api_annonce.php",
			  data: { action: "setValAdvert",id: idA}
				})
		  		.done(function() {				
		  			
		  			//On rafraichit la liste des annonces
					getAdverts();
  				});
	
  		
	}

	function setInvalidAdvert(idA){
		$.ajax({
			  method: "POST",
			  url: "api_annonce.php",
			  data: { action: "setInvalidAdvert",id: idA}
				})
		  		.done(function() {				
		  			
		  			//On rafraichit la liste des candidats
					getAdverts();
  				});
	}

	
	
	function getUsers() {

		

			$.ajax({
			  method: "POST",
			  url: "api_candidat.php",
			  data: { action: "getAllUsers"}
				})
		  	.done(function(tabCandidats) {				

					script = "";
						for (var i = 0; i < tabCandidats.length; i++) {
							script +='<tr id="'+tabCandidats[i].id +'">';

						    script  += '<td class="data"> '+ tabCandidats[i].dateMaj + "</td>";
						    script  += '<td class="data">' +tabCandidats[i].id + "</td>";
						    script  += '<td class="data">' +tabCandidats[i].nom + "</td>";
						    script  += '<td class="data">' +tabCandidats[i].prenom + "</td>";
						    script  += '<td class="data">' +tabCandidats[i].dateNaissance + "</td>";
						    script  += '<td class="data">' +tabCandidats[i].libelleQualification + "</td>";
						    script  += '<td class="data">' +tabCandidats[i].email + "</td>";
						    script  += '<td class="data">' +tabCandidats[i].telephone + "</td>";
						    script  += '<td class="data">' +tabCandidats[i].libelleStatut+ "</td>";
							script  += '<td ><img  class="btnActivedUser" src="asset/images/checked.png" alt="checked"></td>';
							script  += '<td ><img class="btnDesactivedUser" src="asset/images/cancel.png" alt="desactived"> </a></td>';
							script += '</tr>';
						}

						$("#tabCandidats tbody").html("").append(script);

						initEvents();
  		});
			
	}



	//Validation d'un candidat

	function setValUser(idC){

		$.ajax({
			  method: "POST",
			  url: "api_candidat.php",
			  data: { action: "setValUser",id: idC}
				})
		  		.done(function() {				
		  			
		  			//On rafraichit la liste des candidats
					getUsers();
  				});
	
  		
	}



	function setInvalidUser(idC){
		$.ajax({
			  method: "POST",
			  url: "api_candidat.php",
			  data: { action: "setInvalidlUser",id: idC}
				})
		  		.done(function() {				
		  			
		  			//On rafraichit la liste des candidats
					getUsers();
  				});
	}



	function getClients() {

		

			$.ajax({
			  method: "POST",
			  url: "api_client.php",
			  data: { action: "getAllClients"}
				})
		  	.done(function(tabClients) {				

					script = "";
						for (var i = 0; i < tabClients.length; i++) {
							script +='<tr id="'+tabClients[i].id +'">';

						    script  += '<td class="data">' +tabClients[i].id + "</td>";
						    script  += '<td class="data">' +tabClients[i].siret + "</td>";
						    script  += '<td class="data">' +tabClients[i].raisonSociale + "</td>";
						    script  += '<td class="data">' +tabClients[i].email + "</td>";
						    script  += '<td class="data">' +tabClients[i].telephone + "</td>";
						    script  += '<td class="data">' +tabClients[i].libelleStatut + "</td>";
						    script  += '<td ><img  class="btnActivedClient" src="asset/images/checked.png" alt="checked"></td>';
							script  += '<td ><img class="btnDesactivedClient" src="asset/images/cancel.png" alt="desactived"> </a></td>';
							script += '</tr>';
						}

						$("#tabClients tbody").html("").append(script);

						initEvents();
  		});
			
	}

	function setValClient(idCli){

		$.ajax({
			  method: "POST",
			  url: "api_client.php",
			  data: { action: "setValClient",id: idCli}
				})
		  		.done(function() {				
		  			
		  			//On rafraichit la liste des candidats
					getClients();
  				});
	
  		
	}



	function setInvalidClient(idCli){
		$.ajax({
			  method: "POST",
			  url: "api_client.php",
			  data: { action: "setInvalidClient",id: idCli}
				})
		  		.done(function() {				
		  			
		  			//On rafraichit la liste des candidats
					getClients();
  				});
	}



</script>


<?php require("footer.php")?>
