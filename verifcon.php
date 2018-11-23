

<?php

require_once ('database.php');  

//vérifier si quelqu'un essaie de se connecter
$bdd=Database::connect();
if(!empty($_POST)){
    $email = $_POST['email'];
    //crypter le mdp pour qu'il soit stocké dans le BDD crypté et sera comparé
    //$mdp = password_hash($_POST['mdp'], PASSWORD_BCRYPT);

    $mdp = $_POST['mdp'];

    $SQLQuery = "SELECT count(id_MoyenCom) from moyencom where moyencom.valeur='$email';";  //on lit la variable 

    //resultat 
    $SQLRow = $bdd->query($SQLQuery);
    $result = $SQLRow->fetch(PDO::FETCH_NUM);                                                        //fetch récupère et converti pour envoie
    if($result[0]==0){
        exit("identifiant ou mot de passe incorrect en général");
        
    }


    // savoir si c'est un candidat ou client
    $SQLQuery2 = "SELECT case when id_Candidat is not null then 'candidat' else 'client' end as typec
    from moyencom where moyencom.valeur = '$email';";                                //single quotes pour lire en string possible bind et prepare


    // si c'est un candidat
    $SQLRow2 = $bdd->query($SQLQuery2);
    $result2 = $SQLRow2->fetchObject();
    if ($result2->typec == 'candidat'){
       // $user = new Candidat();
        $SQLQuery3 = "SELECT count(id_Candidat) from candidat where candidat.motDePasse='$mdp';";   //single quote pour lire en string
        $SQLRow3 = $bdd->query($SQLQuery3);
        $result3 = $SQLRow3->fetch(PDO::FETCH_NUM);
          if($result3[0]==0){
              exit("CANDIDAT: identifiant ou mot de passe incorrect");
          }else{
             $SQLQuery5 = "SELECT * FROM moyencom INNER JOIN candidat ON candidat.id_Candidat = moyencom.id_Candidat WHERE valeur='$email';";
             $SQLRow5 = $bdd->query($SQLQuery5);
             $user = $SQLRow5->fetchObject();
             $_SESSION['auth'] = $user;
             
             header('Location: espace_candidat.php');
             exit();
              
          }

          // si c'est un client
    }else{
       // $user = new Client();
        $SQLQuery4 = "SELECT count(id_Client) from client where client.mdp='$mdp';";
        $SQLRow4 = $bdd->query($SQLQuery4);
            $result4=$SQLRow4->fetch(PDO::FETCH_NUM);
            var_dump($result4);
            if($result4[0]==0){
                exit("CLIENT: identifiant ou mot de passe incorrect");
            }else{
             $SQLQuery5 = "SELECT * FROM moyencom INNER JOIN client ON client.id_Client = moyencom.id_Client WHERE valeur='$email';";
             $SQLRow5 = $bdd->query($SQLQuery5);
             $user = $SQLRow5->fetchObject();
             $_SESSION['auth'] = $user;

             header('Location: espace_client.php');
             exit();
            }
    }





}

//on se déconnecte de la base de données

Database::disconnect();

?>