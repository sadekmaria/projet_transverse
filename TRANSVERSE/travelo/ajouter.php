<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=foot', 'root', '');
    
$query = 'SELECT * FROM equipe';

$equipeAff = $bdd->query($query);
$equipeData = $equipeAff->fetch();
$membreId = htmlspecialchars($_SESSION['membreId']);


    $requete = $bdd->query("SELECT equipeId FROM equipe_membre_pair WHERE equipeId='".$_GET['id']."'");
    $count = $requete->fetchAll();
    $reponse = count($count);

    $requete1 = $bdd->query("SELECT membreId FROM equipe_membre_pair WHERE equipeId='".$_GET['id']."' AND membreId= '".$membreId."' ");
    $count1 = $requete1->fetchAll();
if(empty($count1)){
    if($reponse<10){
            
           $equipe_nom = $equipeData['equipeId'];
           $capit = 0;
         
           
           
                   $insertteam = $bdd->prepare("INSERT INTO equipe_membre_pair(equipeId, membreId, capitaine) VALUES(?,?,?)");
                   $insertteam->execute(array($_GET['id'], $membreId, $capit));//
                 /* header('Location: .php');*/
           
        header("Location:travel_destination.php?successMsg=1");

       }
else
        {
            
    header("Location:travel_destination.php?erreur=1");

        }
}
else{
    
    header("Location:travel_destination.php?erreur=2");
}

?>