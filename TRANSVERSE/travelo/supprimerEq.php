<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=foot', 'root', '');

 echo ($_SESSION['membreId']);
if(isset($_GET['id']))
{
   
       $req=$bdd->query("DELETE FROM equipe_membre_pair WHERE equipeId= '".$_GET['id']."'"); 
    }
    
  header('Location: mesEquipes.php');



?>