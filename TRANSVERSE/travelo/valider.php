<?php 

session_start();
$bdd = new PDO('mysql:host=localhost;dbname=foot', 'root', '');
    
$query = 'SELECT * FROM equipe';

$equipeAff = $bdd->query($query);
echo($_GET['id']);

$updateQuery = 'UPDATE equipe SET valide = 1 WHERE equipeId = :equipeId';
                      $updateReq = $bdd->prepare($updateQuery);
                      $updateReq->execute(array(
                      
                      'equipeId' => $_GET['id']
                      ));
header("Location: verification.php");

?>