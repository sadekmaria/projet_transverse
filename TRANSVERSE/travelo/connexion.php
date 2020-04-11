<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=foot', 'root', '');

if(isset($_POST['formconnexion']))
{
    $emailconnect = htmlspecialchars($_POST['emailconnect']);//sécurite pr empecher les hacker de modifier
    $password1connect =sha1($_POST['password1connect']);
    
    if(!empty($emailconnect) AND !empty($password1connect))
    {
        $requser = $bdd->prepare("SELECT * FROM membre WHERE email = ? AND mdp = ?");//requete sur l'utilisateur
        $requser->execute(array($emailconnect, $password1connect));//execution de la requete avec array = tableau
        $userexist = $requser->rowCount();//rowCount pour compter le nb de colonne ac les info incrites qui existe
        
        if($userexist == 1)
        {
            $userinfo = $requser->fetch();
            $_SESSION['id'] = $userinfo['id'];
            $_SESSION['pseudo'] = $userinfo['pseudo'];
            $_SESSION['email'] = $userinfo['email'];
            $_SESSION['admin'] = $userinfo['admin'];
            header("Location: index.php?id=".$_SESSION['id']);
        }
        else
        {
            $erreur="Email ou mot de passe incorrect !";
        }
    }
    else
    {
        $erreur="Tous les champs doivent être completer";
    }
}
if(isset($_POST['goregister']))
{
    header('Location: inscription.php');
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Connexion</title>
        <link rel="stylesheet" href="connexion.css">
    </head>
    <body>
        <h2>Social Foot <br>Connexion</h2>
        
        <form method="post" action="">
            <div class="wrapper">
                <div class="register-form">
                    <input type="email" class="input" name="emailconnect" placeholder="Email" id="emailconnect">
                    <input type="password" class="input" name="password1connect" placeholder="Mot de Passe" id="password1connect">
                    <input type="submit" class="button" name="formconnexion" value="Se Connecter">
                    <br/>
                    <input type="submit" class="button" name="goregister" value="Inscription">
                </div>
            </div>
            <?php
                if(isset($erreur))
                {
                    include("errorMsg.php");
                }
            ?>
        </form>
    </body>
</html>