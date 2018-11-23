<?php 
require_once 'header.php';
require_once 'db.php';
require_once('functions.php');

?>


<?php

if(!empty($_POST) && !empty($_POST['pseudo']) && !empty($_POST['motdepasse'])){

	$req = $pdo->prepare('SELECT * FROM users WHERE username = :username or email = :username');
	$req->execute(['username' => $_POST['pseudo']]);
	$user = $req->fetch();

	if(password_verify($_POST['motdepasse'], $user->password)){
		$_SESSION['auth'] = $user;
		$_SESSION['flash']['success'] = 'Vous êtes maintenant connecté';

		header('Location: account.php');
		exit();
	} else {
		$_SESSION['flash']['danger'] = 'Identifiant ou mot de passe incorrecte';
	}

	
}
?>
<body>

	<h2>Connexion</h2>

	<form action="" method="POST">

		<div class="form-group">
			<label > Pseudo ou email </label>
			<input type="text" name="pseudo" placeholder="Pseudo" class="form-control">
		</div>


		<div class="form-group">
			<label>Mot de passe </label>
			<input type="password" name="motdepasse" class="form-control" id="motdepasse" placeholder="Mot de passe">

		</div>

		<button type="submit" class="btn btn-primary">Se connecter</button>

	</form>

</body>
</html>