<?php require ("head.php") ?>
<?php require("navbar.php")?>
<?php require("database.php")?>

<body>

<div id="admin" class="container">
  <h2>Partie Administrateur</h2>

  <ul class="nav nav-tabs">
    
    <li><a data-toggle="tab" href="#menu1">Entreprise</a></li>
    <li><a data-toggle="tab" href="#menu2">Candidat</a></li>
    <li><a data-toggle="tab" href="#menu3">Message</a><li>
  </ul>

  <div class="tab-content">
    
	    <div id="menu1" class="tab-pane fade in active">
	      <h3>Validation des annonces</h3>
	      <table class="table table-hover">
	    <thead>
	      <tr>
	        <th>Date</th>
	        <th>Titre</th>
	        <th colspan="2">Action</th>
	      </tr>
	    </thead>
	    <tbody>
	      <tr>
	        <td>28/10/2018</td>
	        <td>Développeur web front</td>
	        <td><a href="#"><img src="asset/images/checked.png"> <alt="check"></a></td>
	        <td><a href="#"><img src="asset/images/error.png"> <alt="delete"> </a></td>
	      </tr>
	      <tr>
	        <td>30/10/2018</td>
	        <td>Développeur Java</td>
	        <td><a href="#"><img src="asset/images/checked.png"> <alt="check"></a></td>
	        <td><a href="#"><img src="asset/images/error.png"> <alt="delete"> </a></td>
	      </tr>
	      <tr>
	        <td>02/11/2018</td>
	        <td>Développeur Python</td>
	        <td><a href="#"><img src="asset/images/checked.png"> <alt="check"></a></td>
	        <td><a href="#"><img src="asset/images/error.png"> <alt="delete"> </a></td>
	      </tr>
	    </tbody>
	  </table>
	  
	    </div>

	    <div id="menu2" class="tab-pane fade">
	      <h3>Validation des CV</h3>
	      <table class="table table-hover" >
	    <thead>
	      <tr>
	        <th>Date</th>
	        <th>Titre</th>
	        <th colspan="3">Action</th>
	      </tr>
	    </thead>
	    <tbody>
	      <tr>
	        <td>28/10/2018</td>
	        <td>CV Développeur web</td>
	        <td><a href="#"><img src="asset/images/checked.png"> <alt="check"></a></td>
	        <td><a href="#"><img src="asset/images/error.png"> <alt="delete"> </a></td>
	      </tr>
	      <tr>
	        <td>30/10/2018</td>
	        <td>CV Développeur Java</td>
	        <td><a href="#"><img src="asset/images/checked.png"> <alt="check"></a></td>
	        <td><a href="#"><img src="asset/images/error.png"> <alt="delete"> </a></td>
	      </tr>
	      <tr>
	        <td>02/11/2018</td>
	        <td>CV Développeur Python</td>
	        <td><a href="#"><img src="asset/images/checked.png"> <alt="check"></a></td>
	        <td><a href="#"><img src="asset/images/error.png"> <alt="delete"> </a></td>
	      </tr>
	    </tbody>
	  </table>
	    </div>
	  	<div id="menu3" class="tab-pane fade">
	  	<h3>Récupération des messages</h3>
		  	<thead>
		  		<tr>
		  			<th>Date</th>
		  			<th>Nom</th>
		  			<th>Email</th>
		  		</tr>
		  	</thead>
		  	<tbody>

		  	</tbody>
	  </div>
	 </div>
</div>

</body>

<?php require("footer.php")?>
