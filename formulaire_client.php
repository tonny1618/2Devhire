
<?php require ("head.php") ?>
<?php require("navbar.php")?>

<form method="post">
    <?php
    $bdd=new PDO("mysql:host=localhost; charset=latin1; dbname=devhire; port=3307", 'root', 'root');
    if(empty($_GET)){
      if(!empty($_POST)){
        $raison=$_POST['raison'];
        $siret=$_POST['siret'];
        $adresse=$_POST['adresse'];
        $codepostal=$_POST['codepostal'];
        $telephone=$_POST['telephone'];
        $nom=$_POST['nom'];
        $prenom=$_POST['prenom'];
        $mail=$_POST['mail'];
        $mdp=$_POST['mdp'];

        $SQLQuery='call ajoutclient(:codepostal, :adresse, :nom, :prenom, :siret, :raison, :telephone, :mail, :mdp)';

        $statement = $bdd->prepare($SQLQuery);
        $statement->bindValue(':raison', $raison);
        $statement->bindValue(':siret', $siret);
        $statement->bindValue(':adresse', $adresse);
        $statement->bindValue(':codepostal', $codepostal);
        $statement->bindValue(':telephone', $telephone);
        $statement->bindValue(':nom', $nom);
        $statement->bindValue(':prenom', $prenom);
        $statement->bindValue(':mail', $mail);
        $statement->bindValue(':mdp', $mdp);
        $statement->execute();
        $statement->closeCursor();
      }
    }
    ?>

    <legend>Inscription Entreprise</legend>
    <div class="form-group col-sm-6">
      <div class="col-sm-12">
        <label for="raison_sociale">Raison sociale : </label>
        <input id="raison_sociale" type="text" class="form-control" name="raison" value="">
      </div>
    </div>

    <div class="form-group col-sm-6">
      <div class="col-sm-3">
        <label>n°de SIRET : </label>
        <input type="text" class="form-control" name="siret" value="">
      </div>
    </div>

    <div class="form-group col-sm-12">
      <div class="col-sm-9">
        <label for="adresse">Adresse : </label>
        <input id="adresse" type="text" class="form-control" name="adresse" value="" placeholder="Saisir adresse"> </br>
      </div>
    </div>

    <div class="form-group col-sm-12">
      <div class="col-sm-3">
        <label for="code_postal">Code postal : </label>
        <input id="code_postal" type="text" class="form-control" name="codepostal" value="">
      </div>
    </div>

    <!--<div class="form-group col-sm-12">
      <div class="col-sm-3">
        <label for="ville">Ville : </label>
        <input id="ville" type="text" class="form-control" name="ville" value="">
      </div>
    </div>-->

    <div class="form-group col-sm-12">
      <div class="col-sm-3">
        <label for="telephone">Téléphone : </label>
        <input id="telephone" type="text" class="form-control" name="telephone" value="">
      </div>
    </div>


    <div class="form-group col-sm-12">
      <div class="col-sm-3">
        <label for="nom">Nom à contacter : </label>
        <input id="nom" type="text" class="form-control" name="nom" value="">
      </div>
    </div>


    <div class="form-group col-sm-12">
      <div class="col-sm-3">
        <label for="renom">Prenom à contacter : </label>
        <input id="prenom" type="text" class="form-control" name="prenom" value="">
      </div>
    </div>

    <div class="form-group col-sm-12">
      <div class="col-sm-6">
        <label for="email">Email : </label>
        <input id="email" type="email" class="form-control"name="mail" value="">
      </div>
    </div>

    <div class="form-group col-sm-12">
      <div class="col-sm-3">
        <label for="password">Mot de passe : </label>
        <input id="password" type="password" class="form-control" name="mdp" value="">
      </div>
    </div>

    <!--<div class="form-group col-sm-12">
     <div class="col-sm-3">
      <label for="repeat_password"> Répéter le mot de passe : </label>
      <input id="repeat_password" type="password" class="form-control" name="" value="">
    </div>
    </div>-->

    <div id="inscription" class="col-md-12 text-center"> 
        <button type="submit" class="btn btn-primary"></button>
    </div> 

  </form>
  <?php require("footer.php")?>
