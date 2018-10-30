function foncverif(){
		var ttPrenom=document.getElementById("champPrenom");
		if(ttPrenom.value.trim()==0)
		{
			alert("Le prénom est obligatoire");
			ttPrenom.focus();
			return false;
		}
		var ttNom=document.getElementById("champNom");
		if(ttNom.value.trim()==0)
		{
			alert("Le nom est obligatoire");
			ttNom.focus();
			return false;
		}
		var ttAdresse=document.getElementById("champAdresse");
		if(ttAdresse.value.trim()==0)
		{
			alert("L'adresse est obligatoire");
			ttAdresse.focus();
			return false;
		}
		var ttCP=document.getElementById("champCP");
		if(ttCP.value.trim()==0)
		{
			alert("Le code postal est obligatoire");
			ttCP.focus();
			return false;
		}
		var ttVille=document.getElementById("champVille");
		if(ttVille.value.trim()==0)
		{
			alert("La ville est obligatoire");
			ttVille.focus();
			return false;
		}
		var ttTelephone=document.getElementById("champTel");
		if(ttTelephone.value.trim()==0)
		{
			alert("Le telephone est obligatoire");
			ttTelephone.focus();
			return false;
		}
		var ttMail=document.getElementById("champMail");
		if(ttMail.value.trim()==0)
		{
			alert("L'adresse mail est obligatoire");
			ttMail.focus();
			return false;
		}
		var ttMDP=document.getElementById("champMDP");
		if(ttMDP.value.trim()==0)
		{
			alert("Le mot de passe est obligatoire");
			ttMDP.focus();
			return false;
		}
		return true;
	}