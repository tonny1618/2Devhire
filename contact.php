<?php require ("head.php") ?>
<?php require("navbar.php")?>




<div id="contact" class="container-fluid">
    <form class="col-sm-6 col-sm-push-3" method="get" onsubmit="return foncverif()">
      <legend>Contact</legend>
      <div class="form-group col-sm-12">
        <div>
          <label for="nom">Nom/raison sociale : </label>
          <input type="text" class="form-control" id="champNom" name="Nom">
        </div>
      </div>

       <div class="form-group col-sm-12">
        <div>
          <label for="prenom">Prénom : </label>
          <input type="text" class="form-control" id="champPrenom" name="Prenom">
        </div>
      </div>

       <div class="form-group col-sm-12"> 
          <div>
            <label for="email">Email : </label>
            <input type="email" class="form-control" id="champEmail" name="Email">
          </div>
        </div>

      <div class="form-group col-sm-12">
        <div>
          <label for="sujet">Sujet : </label>
          <select id="champSujet" name="Sujet" size="1">
            <option value="0">Sujet...</option>
            <option value="1">J'ai un problème concernant ma mission...</option>
            <option value="2">J'ai une question sur mon bulletin de paie...</option>
            <option value="3">J'ai été absent....</option>
            <option value="4">J'ai un problème de connexion à mon compte...</option>
            <option value="5">Je n'arrive pas à actualiser mon CV...</option>
            <option value="6">Autres...</option>
          </select>
        </div>
     </div>

      <div class="form-group col-sm-12">
        <div>
          <label for="message">Message : </label>
          <textarea rows="15" class="form-control" id="champMessage" name="Message"></textarea>
        </div>
      </div>

      <div class="form-group col-sm-12">
        <div id="send" class="col-md-12 text-center"> 


          <button id="send" name="send" class="btn btn-secondary btn-lg hvr-bounce-to-right">Envoyer</button>
        </div>
      </div>


  <?php

 $mail = 'glenn.hamon@orange.fr'; //adresse de destination.

 // On filtre les serveurs qui rencontrent des bogues.
if (!preg_match("#^[a-z0-9._-]+@(hotmail|live|msn).[a-z]{2,4}$#", $mail)){

    $passage_ligne = "\r\n";

} else {

    $passage_ligne = "\n";

}

//=====Déclaration des messages au format texte et au format HTML.

$message_txt = "Salut à tous, voici un e-mail envoyé par un script PHP.";

$message_html = "<html><head></head><body><b>Salut à tous</b>, voici un e-mail envoyé par un <i>script PHP</i>.</body></html>";
 
//=====Création de la boundary

$boundary = "-----=".md5(rand());

//==========
 

//=====Définition du sujet.

$sujet = "Hey mon ami !";

//=====Création du header de l'e-mail.

$header = "From: \"WeaponsB\"<glennhamon@hotmail.com>".$passage_ligne;

$header.= "Reply-to: \"WeaponsB\" <glennhamon@hotmail.com>".$passage_ligne;

$header.= "MIME-Version: 1.0".$passage_ligne;

$header.= "Content-Type: multipart/alternative;".$passage_ligne." boundary=\"$boundary\"".$passage_ligne;


 
//=====Création du message.

$message = $passage_ligne."--".$boundary.$passage_ligne;

//=====Ajout du message au format texte.

$message.= "Content-Type: text/plain; charset=\"ISO-8859-1\"".$passage_ligne;

$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;

$message.= $passage_ligne.$message_txt.$passage_ligne;

//==========

$message.= $passage_ligne."--".$boundary.$passage_ligne;

//=====Ajout du message au format HTML

$message.= "Content-Type: text/html; charset=\"ISO-8859-1\"".$passage_ligne;

$message.= "Content-Transfer-Encoding: 8bit".$passage_ligne;

$message.= $passage_ligne.$message_html.$passage_ligne;

//==========

$message.= $passage_ligne."--".$boundary."--".$passage_ligne;

$message.= $passage_ligne."--".$boundary."--".$passage_ligne;

//==========


//=====Envoi de l'e-mail.

mail($mail,$sujet,$message,$header);

//==========

?>

    </form>
</div>

  </body>

</html>

<script type="text/javascript" src="asset/js/contact.js"></script>
  <?php require("footer.php");?>


