<?php
$bdd = new PDO('mysql:host=localhost;dbname=foot', 'root', '');
    
    if(isset($_POST['forminscription']))//si existe, donc que l'utilisateur a cliquer sur send
    {
       if(!empty($_POST['pseudo']) AND !empty($_POST['email']) AND !empty($_POST['prenom']) AND !empty($_POST['nom']) AND !empty($_POST['numTel']) AND !empty($_POST['villeMembre']) AND !empty($_POST['password1']) AND !empty($_POST['password2']))
       {//si tous les champs ont été completer
           $pseudo = htmlspecialchars($_POST['pseudo']);
           $email = htmlspecialchars($_POST['email']);
           $prenom = htmlspecialchars($_POST['prenom']);
           $nom = htmlspecialchars($_POST['nom']);
           $numTel = htmlspecialchars($_POST['numTel']);
           $villeMembre = htmlspecialchars($_POST['villeMembre']);
           $password1 = sha1($_POST['password1']);
           $password2 = sha1($_POST['password2']);
           
           $pseudolength = strlen($pseudo);//strlen compte le nombre de caractères du pseudo
           $numTellength = strlen($numTel);
           if($pseudolength <= 255)
           {
                 if($numTellength = 10)
                 {

                       if($password1 == $password2)
                       {
                           $insertmbr = $bdd->prepare("INSERT INTO membre(pseudo, email, prenom, nom, numTel, villeMembre, mdp) VALUES(?,?,?,?,?,?,?)");
                           $insertmbr->execute(array($pseudo, $email, $prenom, $nom, $numTel, $villeMembre, $password1));
                           $_SESSION['createdaccount']= "Votre compte a été créer ";//Si le pseudo et mdp ok, on les insert dans phpmyadmin et on lfait rentrer dans site
                           header('Location: connexion.php');
                       }
                       else
                       {
                           $erreur = "Vos mots de passe sont différents";
                       }
                 }
                else
                {
                    $erreur = "Mettez le format du numéro de téléphone: 06...";
                }
           }
           else
           {
               $erreur = "Votre Pseudo a trop de caractères";
               
           }
       }
        else
        {
            $erreur = "Tous les champs doivent être complétés";
        }

    }

if(isset($_POST['connexion']))
{
    header('Location: connexion.php');
}

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Register</title>
        <link rel="stylesheet" href="connexion.css">
    </head>
    <body>
        <h2>Social Foot<br>Inscription</h2>
        <form method="post" action="">
            <div class="wrapper">
                <div class="register-form">
                    <input type="text" name="pseudo" class="input" placeholder="Pseudo" id="pseudo">
                    <input type="email" class="input" name="email" placeholder="Email" id="email">
                    <input type="text" class="input" name="prenom" placeholder="Prenom" id="prenom">
                    <input type="text" class="input" name="nom" placeholder="Nom" id="nom">
                    <input type="text" class="input" name="numTel" placeholder="Numéro de téléphone" id="numTel">
                    <input type="text" class="input" name="villeMembre" placeholder="Ville" id="villeMembre">
                    <input type="password" class="input" name="password1" placeholder="Mot de Passe" id="password1">
                    <input type="password" class="input" name="password2" placeholder="Confirmez votre mot de passe" id="password2">
                    <input type="submit" class="button" name="forminscription" value="Confirmer"> <br/>
                    <input type="submit" class="button" name="connexion" value="J'ai déja un compte !">
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