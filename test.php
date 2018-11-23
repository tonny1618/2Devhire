<!DOCTYPE html>
<html>
   <head>
      <title>Dev'Hire Agency</title>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
      <link rel="icon" type="image/png" sizes="96x96" href="asset/images/favicon-96x96.png">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <link href="https://fonts.googleapis.com/css?family=Lato|Roboto" rel="stylesheet">
      <link rel="stylesheet" href="asset/hover.css"/>
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
      <style>
         @import url('https://fonts.googleapis.com/css?family=Lato');
      </style>
      <!-- <link rel="stylesheet" href="asset/annoncestyles.css"/> -->
      <link rel="stylesheet" href="asset/logstyle.css">
      <link rel="stylesheet" href="asset/istyle.css"/>
   </head>
   <body>
      <div id="listeDesAnnnonces">
         <header>
            <nav class="navbar navbar-default">
               <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               </button>
               <div class="container-fluid">
                  <div class="nav navbar-nav navbar-header">
                     <a href="index.php" class="nav navbar-nav navbar-left"><img src="asset/images/logo.png" alt="logo"></a>
                  </div>
                  <ul class=" collapse navbar-collapse nav navbar-nav">
                     <li><a href='index.php' class="hvr-underline-from-left">Accueil</a></li>
                     <li><a href='espace_candidat.php' class="hvr-underline-from-left">Espace Candidat</a></li>
                     <li><a href='espace_client.php' class="hvr-underline-from-left">Espace Entreprise</a></li>
                     <li><a href='#' class="hvr-underline-from-left">Qui Sommes Nous ?</a></li>
                     <li><a href='contact.php' class="hvr-underline-from-left">Contact</a></li>
                  </ul>
                  <ul class="nav navbar-nav navbar-right">
                     <li><a href='login.php'><span class='glyphicon glyphicon-log-in'></span> Inscription / Connection </a></li>
                  </ul>
               </div>
            </nav>
         </header>
         <div class="container">
            <div class="col-md-8 col-md-offset-3">
               <div class="col-md-8 listeBlocAnnonce">
                  <h1>Développeur Web</h1>
                  <p>Description : Personne autonome, avec des connaissanec en HTML/CSS, PHP / MySQL. La maitrise d'une architecture MVC est indispensable</p>
                  <p>Ville Narbonne</p>
                  <a href="annonce.php=?3"><button type="button" class="btn btn-primary hvr-bounce-to-right">Voir l'annonce</button></a>
               </div>
               <div class="col-md-8 listeBlocAnnonce">
                  <h1>Développeur Python</h1>
                  <p>Description : Recherche développeur Python débutant pour stage</p>
                  <p>Ville Narbonne</p>
                  <a href="annonce.php=?4"><button type="button" class="btn btn-primary hvr-bounce-to-right">Voir l'annonce</button></a>
               </div>
            </div>
         </div>
      </div>
      <footer class="container-fluid">
         <div class="row">
            <div class="col-md-5">
               <h2> Liens utiles </h2>
               <p><a href="#">Liens 1</a></p>
               <p><a href="#">Liens 2</a></p>
               <p><a href="#">Liens 1</a></p>
            </div>
         </div>
         <div class="row">
            <p class="text-center"> © Dev'Hire</p>
         </div>
      </footer>
      <script type="text/javascript" src="asset/js/script.js"></script>
      <script src="asset/js/formulairecv.js"></script>
   </body>