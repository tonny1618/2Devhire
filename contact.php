<?php require ("head.php") ?>
<?php require("navbar.php")?>

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
          <button id="send" name="send" class="btn btn-primary">Envoyer</button>
        </div>
      </div>
  
    </form>
  </body>
</html>


<script type="text/javascript">

  //Vérification remplissage des champs avant validation du formulaire!

    function foncverif(){
      var ttNom=document.getElementById("champNom");
      if(ttNom.value.trim()==''){
      alert("Vous devez indiquer votre nom ou votre raison sociale.");
      ttNom.focus();
      return false;
      }

      var ttPrenom=document.getElementById("champPrenom");
      if(ttPrenom.value.trim()==''){
      alert("Vous devez indiquer votre prénom.");
      ttNom.focus();
      return false;
      }

      var ttEmail=document.getElementById("champEmail");
      if(ttEmail.value.trim()==''){
      alert("Vous devez indiquer votre adresse e-mail.");
      ttNom.focus();
      return false;
      }

      var ttSujet=document.getElementById("champSujet");
      if (ttSujet.selectedIndex==0){
      alert("Vous devez préciser le sujet de votre requête.");
      ttNom.focus();
      return false;
      }

      var ttMessage=document.getElementById("champMessage");
      if(ttMessage.value.trim()==''){
        alert("Vous n'avez pas rédigé votre message!")
        ttMessage.focus();
        return false;
      }
      return true;
    }
</script>
