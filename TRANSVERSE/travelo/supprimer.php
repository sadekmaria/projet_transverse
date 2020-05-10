<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=foot', 'root', '');

 
if(isset($_GET['id']))
{
   
        $req=$bdd->query("DELETE FROM equipe_membre_pair WHERE equipeId= '".$_GET['id']."'"); 
        $req1=$bdd->query("DELETE FROM equipe WHERE equipeId= '".$_GET['id']."'"); 
    }
    
    header('Location: mesEquipes.php');



?>