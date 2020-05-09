<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=foot', 'root', '');
    
$query = 'SELECT * FROM equipe';

$equipeAff = $bdd->query($query);
$equipeData = $equipeAff->fetch();



    $requete = $bdd->query("SELECT equipeId FROM equipe_membre_pair WHERE equipeId='".$_GET['id']."'");
    $count = $requete->fetchAll();
    $reponse = count($count);
    if($reponse<10){
            
        
    
           $membreId = htmlspecialchars($_SESSION['membreId']);
           $equipe_nom = $equipeData['equipeId'];
           $capit = 0;
         
           
           
                   $insertteam = $bdd->prepare("INSERT INTO equipe_membre_pair(equipeId, membreId, capitaine) VALUES(?,?,?)");
                   $insertteam->execute(array($_GET['id'], $membreId, $capit));//
                 /* header('Location: .php');*/
           
       }
else
        {
            $erreur = "Vous n'avez pas été ajouté à l'équipe";
        }
header("Location:travel_destination.php");

?>