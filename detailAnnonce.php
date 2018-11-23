
<?php require_once ('head.php') ?>

<div id="detailAnnonce">
    <?php require_once ('navbar.php') ?>
    <?php require_once('database.php')?>

    <div  class="container">
        <?php
        $bdd = Database::connect();
        $id = $_GET['id'];
        $SQLQuery='SELECT descriptionAnnonce, libelleAnnonce, ville, datePublication from annonce where id_Annonce= ' .$id;
        $result=$bdd->query($SQLQuery);
        $script = "";
        while($annonce = $result->fetch())  {


            list($year, $month, $day) = explode("-", $annonce['datePublication']);
            $date = "$day/$month/$year";

            $script = '<div class="row">';
            $script .= '<div class="col-md-8 blocdetailannonce ">'; //Ouverture div
            $script .= '<h2>' . $annonce['libelleAnnonce'] . '</h2>';
            $script .= '<hr>';
            $script .= '<p class="date" ><span class="glyphicon glyphicon-calendar"></span> '. $date."</p>";
            $script .="<p class ='description'>".$annonce['descriptionAnnonce'] .'</p>';
            $script .= '<div class ="col-md-12 center-block">';
            $script .= '<button id="postuler" type="button" class="btn btn-secondary btn-lg hvr-bounce-to-right col-md-6 col-md-offset-6">Postuler</button>';
            $script .= '</div>'; //Ferme la div bouton
            $script .= '</div>'; // Ferme blocdetailannonce

            



            echo $script;
        }
        ?>





        <div class="col-md-6" id="formpostuler">
            <form action="">
                <div class="form-group">
                    <label for="motivations">Motivations : </label>
                    <textarea class="form-control" id="motivations" rows="20" placeholder="Indiquez vos motivations. N'hésitez pas à être original "></textarea>
                </div>
                <button id="envoyermotivation" type="submit" class="btn btn-secondary btn-lg hvr-bounce-to-right  col-md-6 col-md-offset-6">Envoyer</button> <!-- TODO Remettre l'id ou renvoyer vers une autre page (page espace candidat) avec un message de succès  -->
            </form>

        </div>

    </div>
</div>
</div>
<?php require_once ('footer.php') ?>