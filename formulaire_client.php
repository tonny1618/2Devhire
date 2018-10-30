<<<<<<< HEAD
<?php require ("head.php") ?>
<?php require("navbar.php")?>

=======
<!DOCTYPE html>
<html>
<head>
 <title>Dev'Hire Agency</title>
 <metacharset="utf-8"/>
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 <link rel="stylesheet" href="asset/istyle.css"/>
</head>
<body>

  <header>
    <nav class="navbar navbar-default">

      <div class="container-fluid">
        <div class="nav navbar-nav navbar-header">
           <a href="#" class="nav navbar-nav navbar-left"><img src="asset/images/logo.png" alt="logo"></a>
        </div>
        <ul class="nav navbar-nav">
          <li><a href='#'>Accueil</a></li>
          <li><a href='#'>Espace Candidat</a></li>
          <li><a href='#'>Espace Entreprise</a></li>
          <li><a href='#'>Recherche</a></li>
          <li><a href='#'>Contact</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
           <li><a href='#'><span class='glyphicon glyphicon-log-in'></span> Connectez-vous </a></li>
        </ul>
      </div>

    </nav>
  </header>
  
>>>>>>> e373d2b8d258fb6173065c22736b553dca4b2699
  <form>
    <legend>Inscription Entreprise</legend>
    <div class="form-group col-sm-6">
      <div class="col-sm-12">
        <label for="raison_sociale">Raison sociale : </label>
        <input id="raison_sociale" type="text" class="form-control" name="" value="">
      </div>
    </div>

    <div class="form-group col-sm-6">
      <div class="col-sm-3">
        <label>n°de SIRET : </label>
        <input type="text" class="form-control" name="" value="">
      </div>
    </div>

    <div class="form-group col-sm-12">
      <div class="col-sm-9">
        <label for="adresse">Adresse : </label>
        <input id="adresse" type="text" class="form-control" name="" value="" placeholder="Saisir adresse"> </br>
        <input type"text" name="" value="" class="form-control" placeholder="complément d'adresse 1"> </br>
        <input type"text" name="" value="" class="form-control" placeholder="complément d'adresse 2"> </br>
      </div>
    </div>

    <div class="form-group col-sm-12">
      <div class="col-sm-3">
        <label for="code_postal">Code postal : </label>
        <input id="code_postal" type="text" class="form-control" name="" value="">
      </div>
    </div>

    <div class="form-group col-sm-12">
      <div class="col-sm-3">
        <label for="ville">Ville : </label>
        <input id="ville" type="text" class="form-control" name="" value="">
      </div>
    </div>

    <div class="form-group col-sm-12">
      <div class="col-sm-3">
        <label for="telephone">Téléphone : </label>
        <input id="telephone" type="text" class="form-control" name="" value="">
      </div>
    </div>

    <div class="form-group col-sm-12">
      <div class="col-sm-6">
        <label for="email">Email : </label>
        <input id="email" type="email" class="form-control"name="" value="">
      </div>
    </div>

    <div class="form-group col-sm-12">
      <div class="col-sm-3">
        <label for="password">Mot de passe : </label>
        <input id="password" type="password" class="form-control" name="" value="">
      </div>
    </div>

    <div class="form-group col-sm-12">
     <div class="col-sm-3">
      <label for="repeat_password"> Répéter le mot de passe : </label>
      <input id="repeat_password" type="password" class="form-control" name="" value="">
    </div>
    </div>

    <div id="inscription" class="col-md-12 text-center"> 
    <button id="singlebutton" name="singlebutton" class="btn btn-primary">S'inscrire</button>
    </div> 

  </form>

</body>
</html>