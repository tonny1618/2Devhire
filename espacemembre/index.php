<?php 
require_once 'db.php';
require_once'functions.php';

?>
<!DOCTYPE html>
<html>
<head>

	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<title>Inscription</title>
</head>

<?php

if(!empty($_POST)){
	$errors = array();
	if(empty($_POST['pseudo']) || !preg_match('/^[a-zA-Z0-9_]+$/', $_POST['pseudo'])){
		$errors['pseudo'] = "Votre pseudo n'est pas valide";
	} else {
		$req = $pdo->prepare('SELECT id FROM users WHERE username = ?');
		$req->execute([$_POST['pseudo']]);
		$user = $req->fetch();
		if($user) {
			$errors['username'] = 'Ce pseudo est déjà utilisé';
		}

	}

	if(empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){

		$errors['email'] = "Votre email n'est pas valide";
	} else {
		$req = $pdo->prepare('SELECT id FROM users WHERE email = ?');
		$req->execute([$_POST['email']]);
		$user = $req->fetch();
		if($user) {
			$errors['email'] = 'Cette adresse mail est déjà utilisée';
		}
	}

	if(empty($_POST['motdepasse']) || $_POST['motdepasse'] != $_POST['motdepasse_confirm']){

		$errors['motdepasse'] = "Votre mot de passe n'est pas valide";
	}

	if(empty($errors)) {
		$req = $pdo->prepare('INSERT INTO users SET username = ?, password= ?, email = ?');//Requête préparée
		$password = password_hash($_POST['motdepasse'], PASSWORD_BCRYPT);
		$req->execute([$_POST['pseudo'], $password, $_POST['email']]);
		die("Vous êtes inscrit");
	}
}
?>
<body>

	<?php

	if(!empty($errors)) {
	$script = "";
		$script .="<div class='alert alert-danger'> <p> Vous n'avez pas rempli le formulaire correctement</p>";
		$script .= "<ul>" ;
		foreach($errors as $error) {
			$script .=  '<li>' . $error . '</li>'; 
		}
		$script .= "</ul> </div>";

		echo ($script);
	}

	?>
	<h2>Inscription</h2>

	<form method="POST" action="" id="Login">

		<div class="form-group">
			<label > Pseudo : </label>
			<input type="text" name="pseudo" placeholder="Pseudo" class="form-control">
		</div>

		<div class="form-group">
			<label> Adresse mail :  </label>
			<input type="text" name="email" class="form-control" id="email" placeholder="Confirmation adresse mail">
		</div>


		<div class="form-group">
			<label>Mot de passe </label>
			<input type="password" name="motdepasse" class="form-control" id="motdepasse" placeholder="Mot de passe">

		</div>

		<div class="form-group">
			<label for="Confirmer mot de passe">Confirmer mot de passe</label>
			<input type="password" name="motdepasse_confirm" class="form-control" id="motdepasse2" placeholder="Confirmer votre mot de passe">
		</div>

		<button type="submit" name="form_inscription" class="btn btn-primary">M'inscrire</button>

	</form>

</body>
</html>