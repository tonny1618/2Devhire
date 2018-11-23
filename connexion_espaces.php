<?php
// session_destroy();
session_start();

require_once ('verifcon.php');
//session_start();
 /* écraser devhire, mettre à jour les insert, et récupérer la trace de qui est connecté dans la session pour après 
 pour publier des annonces (Lilian). */


?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Bootstrap 4.0 pour le login ---------->

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" href="asset/connexion_espaces.css">
<!------ jQuery & CDN  ---------->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" 
integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" 
crossorigin="anonymous">

<!-- Police Lato -->
<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet"> 

    <title>Connexion Candidat</title>
</head>


<body>
    <section class="login-block">
    <div class="container">
  <div class="row">
    <div class="col-md-4 login-sec">
            <h2 class="text-center">Connexion</h2>
            
  <!-- check si les users ou client existe avec un select count, et regarde qui est nul
  avec un case en sql
  -->

    <!-- FORM LOGIN -->    

<form class="login-form" action="" method="post" id="connex">
  <div class="form-group">
    <label for="email" class="text-uppercase">Email</label>
    <input type="text" class="form-control" name="email" placeholder="">
    
  </div>
  <div class="form-group">
    <label for="password" class="text-uppercase"> Mot de passe</label>
    <input type="password" class="form-control" name="mdp" placeholder="">
    <a href="#">Mot de Passe Oublié ? </a>
  </div>
  
  
    <div class="form-check">
    <label class="form-check-label">
      <input type="checkbox" class="form-check-input">
      <small>Se souvenir de moi</small>
    </label>
    <button type="submit" class="btn btn-login float-right">Connexion</button>
  </div>
  
</form>

<!-- END OF FORM -->

<div class="copy-text">Powered <i class="fas fa-laugh-wink"></i> up by <a href="index.php">DEV'HIRE</a></div>
		</div>
		<div class="col-md-8 banner-sec">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                 <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                  </ol>
            <div class="carousel-inner" role="listbox">
    <div class="carousel-item active">
      <img class="d-block img-fluid" src="asset/images/log.jpg" alt="First slide">
      <div class="carousel-caption d-none d-md-block">
        <div class="banner-text">
            <h2>Bienvenue dans l'univers de DEV'HIRE !!</h2>
            <p>Saissisez l'occasion d'avoir <strong>LE</strong> job dont vous rêvez !</p>
        </div>	
  </div>
    </div>
    <div class="carousel-item">
      <img class="d-block img-fluid" src="asset/iamges/net.jpg" alt="First slide">
      <div class="carousel-caption d-none d-md-block">
        <div class="banner-text">
            <h2>Opportunité & Envie</h2>
            <p>Une occasion unique d'évoluer dans le monde croissant de l'informatique !</p>
        </div>	
    </div>
    </div>
    <div class="carousel-item">
      <img class="d-block img-fluid" src="asset/images/work.jpeg" alt="First slide">
      <div class="carousel-caption d-none d-md-block">
        <div class="banner-text">
            <h2>Progression & Travail d'équipe</h2>
            <p>En CDD ou CDI, seul ou en équipe, DEV'HIRE vous propose une large gamme d'offres d'emplois !</p>
        </div>	
    </div>
  </div>
    
            </div>	   
		    
		</div>
	</div>
</div>
</section>
</body>
</html>