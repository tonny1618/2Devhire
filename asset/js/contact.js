
  //Vérification remplissage des champs avant validation du formulaire!

    function foncverif(){
      var ttNom=document.getElementById("champNom");
      if(ttNom.value.trim()==''){
      alert("Vous devez indiquer votre nom ou votre raison sociale.");
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