<?php require ("head.php") ?>
<div id="index">
  <?php require("navbar.php")?>
  <?php require('searchbar.php')?> 
  <?php require('database.php')?>   
  <!-- TODO footer -->


  <div id="dernieresAnnonces" class="container-fluid">
    <div class="row">
     <h2>Dernières Annonces</h2>

     <!-- PHP Connection à la base de donnée et affichage des dernières annonces -->

     <div id="blocannonces">
       <?php 

       $db = Database::connect();
       $script = '';
       $statement = $db->query('SELECT id_Annonce, libelleAnnonce, ville, datePublication , id_Statut, SUBSTRING_INDEX(descriptionAnnonce, " " , 20) AS resume FROM annonce WHERE id_Statut=2  ORDER BY datePublication DESC LIMIT 3');

       while($annonce = $statement->fetch()) 
       {
        $script .= '<div class="col-md-3 col-md-offset-1 blocannonce">';
        $script .= '<h4>' . $annonce['libelleAnnonce'] .'</h4>';
        $script .= '<p class="ville">' .$annonce['ville']. '</p>';
        $script .= '<p class="resume">'. $annonce['resume'] . ' ... </p>';
        $script .=' <p class="text-right"><a href="detailAnnonce.php?id=' .$annonce['id_Annonce'] . '">Voir le descriptif <span class=" glyphicon glyphicon-arrow-right"></span></a></p>
        </div>';
      };

      print($script);
      Database::disconnect();
      ?>


    </div>
  </div>
</div>

<div id="envoyer" class="container-fluid">
  <div class="row">
    <div class="col-md-6 col-sm-6 boutonCV">
      <a href="formulairecv.php"><button type="button" class="btn btn-secondary btn-lg hvr-bounce-to-right">Envoyer votre CV</button></a>
    </div>

    <div class="col-md-6 col-sm-6 boutonDeposer">
      <a href="formulaire_client.php"><button type="button" class="btn btn-secondary btn-lg hvr-bounce-to-right">Déposer votre annonce</button></a>
    </div>
  </div>
</div>
</div>

<?php require("footer.php");?>
</body>
</html>