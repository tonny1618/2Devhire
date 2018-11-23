<?php
require ("head.php");
require("navbar.php");
require("database.php");
?>

<body>

Etes-vous sûr de vouloir supprimer cette annonce?

<?php
	if (!empty($_GET)){
								$id = $_GET['id'];
								if ($id > 0){
								    $SQLQuery = 'DELETE FROM annonce WHERE id_Annonce = :id';
									try{
									    $SQLStatement = $dbConn->prepare($SQLQuery);
										$SQLStatement->bindValue(':id', $id);

										if ($SQLStatement->execute()){
											print('<script type="text/javascript">document.location.href=\'admin.php\';</script>');
										}else{
											print("Erreur d'exécution de la requête de suppression !<br />");
											var_dump($SQLStatement->errorInfo());
										}
									}catch (Exception $ex){
										print("Erreur de préparation de la requête de suppression !<br />");
                                        print($ex->getMessage());
									}
								}


		   					$SQLStatement->closeCursor();
							}
?>

<form>
<a >OUI</button>
<a id="annuler" href="admin.php">NON</button>
</form>


</body>

<?php require("footer.php")?>
