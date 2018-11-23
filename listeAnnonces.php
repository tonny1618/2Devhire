<?php   if(session_status() == PHP_SESSION_NONE){
    session_start();
} ?>

<?php require_once ("head.php") ?>

<div id="listeDesAnnnonces">
    <?php require_once('navbar.php')?> 

    <?php require('database.php')?>

    <!-- Search Bar -->
    <div class="container-fluid" id="blocksearchbar">
       <div class="col-md-6 col-sm-12 col-xs-12" id="searchbar">
          <form methode="get" action="listeAnnonces.php" class="navbar-form" role="search">
             <div class="input-group add-on">
                <input class="form-control inputsearch" placeholder="Recherche" name="recherche" id="srch-term" type="text"  required="required" value="<?php echo isset($_GET["recherche"]) ? $_GET["recherche"]: '' ;?>">
            </div>
        </div>
        <div class="col-md-6 col-sm-12 col-xs-12" id="ville">
         <div class="input-group add-on" >
            <input class="form-control  inputsearch" placeholder="Ville" name="ville" id="ville" type="text" required="required" value="<?php echo isset($_GET["recherche"]) ? $_GET["ville"]: '' ;?>" >
            <div class="input-group-btn" >
               <button class="btn btn-default" id="boutonRecherche" type="submit"><i class="glyphicon glyphicon-arrow-right accueil" ></i></button>
           </div>
       </div>
   </div>
</form>
</div>
<div class="container"> 
    <?php

    if(!empty($_GET['recherche']) && !empty($_GET['ville']))
    {


        $db = Database::connect();
        $recherche = htmlspecialchars($_GET['recherche']);
        $ville = htmlspecialchars($_GET['ville']);

        $sql = 'SELECT * FROM annonce WHERE libelleAnnonce LIKE ? AND ville LIKE ? AND  id_Statut=2 GROUP By id_Annonce ORDER BY datePublication DESC';

        $req = $db->prepare($sql);
        $req->execute(array('%'.$recherche.'%', '%'.$ville.'%'));

        $count = $req->rowCount();

        if ($count >= 1 ){
            $script ='';
                // echo "Il y a " .$count . " correspondance(s) <br>";
            while ($data = $req->fetch(PDO::FETCH_OBJ)) {
                $script .= '<div class="col-md-8 col-md-offset-3">';
                $script = '<div class="col-md-10 listeBlocAnnonce">';
                $script .= '<h2>' .$data->libelleAnnonce .'</h2>'; 
                $script .= '<hr>'; 
                $script .= "<p class='description' >". $data->descriptionAnnonce . "</p>";
                $script .= "<p class='ville'> <span class='glyphicon glyphicon-map-marker'></span> " .$data->ville ."</p>";
                $script .='<div class="col-md-3 col-md-push-9" <a href="annonce.php?id='. $data->id_Annonce .'"><button type="button" class="btn btn-primary hvr-bounce-to-right">Voir l\'annonce</button></a> </div>';
                $script .= '</div>';
                


                echo $script;
            } 

        } else {
            $script = '</div>';
           $script .= '<div class="row"> <div class="resultatnull"><p class="alert-warning">Aucune offre trouvée pour ' . $recherche . ' à ' . $ville .'</p><p> <a href="#srch-term"> Modifier votre recherche  <span class="glyphicon glyphicon-pencil"></span> </a></p></div></div> ';
          
           echo $script;
       }

   } else {
    $script = '<div class="row"> <div class="resultatnull"><p class="alert-warning">Merci de remplir tous les champs</p><p> <a href="#srch-term"> Modifier votre recherche  <span class="glyphicon glyphicon-pencil"></span> </a></p></div></div> ';
          
           echo $script;
    
}
?>

</div>


</div>

<?php require_once 'footer.php';?>







