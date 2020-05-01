<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=foot', 'root', '');

if(isset($_SESSION['membreId']))
{
    $requser = $bdd->prepare("SELECT * FROM membre WHERE membreId =?");
    $requser->execute(array($_SESSION['membreId']));
    $user = $requser->fetch();
    
    
    
    if(isset($_POST['nvpseudo']) AND !empty($_POST['nvpseudo']) AND $_POST['nvpseudo'] != $user['pseudo'])//on verifie si lorsque l'on est sur newpseudo, qu'il ne soit pas vide et qu'il soit != de l'ancien
    {
        $nvpseudo = htmlspecialchars($_POST['nvpseudo']);
        $insertpseudo = $bdd->prepare("UPDATE membre SET pseudo = ? WHERE membreId = ?");
        $insertpseudo->execute(array($nvpseudo, $_SESSION['membreId']));//On remplace le pseudo par le newpseudo
        $_SESSION['pseudo']=$nvpseudo;
        header('Location: profil.php?id='.$_SESSION['membreId']);//on redirige vers le profil
    }//
    
     if(isset($_POST['nvemail']) AND !empty($_POST['nvemail']) AND $_POST['nvemail'] != $user['email'])//pareil pr email
    {
        $nvemail = htmlspecialchars($_POST['nvemail']);
        $insertemail = $bdd->prepare("UPDATE membre SET email = ? WHERE membreId = ?");
        $insertemail->execute(array($nvemail, $_SESSION['membreId']));
        header('Location: profil.php?id='.$_SESSION['membreId']);
    }
    
    if(isset($_POST['nvprenom']) AND !empty($_POST['nvprenom']) AND $_POST['nvprenom'] != $user['prenom'])//pareil pr email
    {
        $nvprenom = htmlspecialchars($_POST['nvprenom']);
        $insertprenom = $bdd->prepare("UPDATE membre SET prenom = ? WHERE membreId = ?");
        $insertprenom->execute(array($nvprenom, $_SESSION['membreId']));
        header('Location: profil.php?id='.$_SESSION['membreId']);
    }
    
    if(isset($_POST['nvnom']) AND !empty($_POST['nvnom']) AND $_POST['nvnom'] != $user['nom'])//pareil pr email
    {
        $nvnom = htmlspecialchars($_POST['nvnom']);
        $insertnom = $bdd->prepare("UPDATE membre SET nom = ? WHERE membreId = ?");
        $insertnom->execute(array($nvnom, $_SESSION['membreId']));
        header('Location: profil.php?id='.$_SESSION['membreId']);
    }
    
    if(isset($_POST['nvnumTel']) AND !empty($_POST['nvnumTel']) AND $_POST['nvnumTel'] != $user['numTel'])//pareil pr email
    {
        $nvnumTel = htmlspecialchars($_POST['nvnumTel']);
        $insertnumTel = $bdd->prepare("UPDATE membre SET numTel = ? WHERE membreId = ?");
        $insertnumTel->execute(array($nvnumTel, $_SESSION['membreId']));
        header('Location: profil.php?id='.$_SESSION['membreId']);
    }
    
    if(isset($_POST['nvvilleMembre']) AND !empty($_POST['nvvilleMembre']) AND $_POST['nvvilleMembre'] != $user['villeMembre'])//pareil pr email
    {
        $nvvilleMembre = htmlspecialchars($_POST['nvvilleMembre']);
        $insertvilleMembre = $bdd->prepare("UPDATE membre SET villeMembre = ? WHERE membreId = ?");
        $insertvilleMembre->execute(array($nvvilleMembre, $_SESSION['membreId']));
        $success = "Votre ville a été modifié";
    }
    
    
    
    if(isset($_POST['nvmdp1']) AND !empty($_POST['nvmdp1']) AND isset($_POST['nvmdp2']) AND !empty($_POST['nvmdp2']))//si on est dans la case newpassword, qu'on rempli le champs password 1 et 2 
    {
        
         $mdp1 = sha1($_POST['nvmdp1']);
            $mdp2 = sha1($_POST['nvmdp2']);//on remplace les mdp
        
        if($mdp1 == $mdp2)//si les 2 correspondent
        {
           
            $insertmdp = $bdd->prepare("UPDATE membre SET mdp = ? WHERE membreId = ?");
            $insertmdp->execute(array($mdp1, $_SESSION['membreId']));//on remplace dans la base de donné
            header('Location: profil.php?id='.$_SESSION['membreId']);//on redirige a le profil
            
        }
        else
        {
            $erreur = "Vos deux mots de passe sont différents";// s'il ne sont pas pareils ont affiche le msg d'erreur
        }
        
    }
    
    
    
}


/*if(isset($_POST['envoyer']))//si existe, donc que l'utilisateur a cliquer sur send
    {
        
       if(!empty($_POST['nbr']) AND !empty($_POST['villeEquipe']) AND !empty($_POST['five']) AND !empty($_POST['dateEquipe']) AND !empty($_POST['createur']))
       {//si tous les champs ont été completer
            
           
           $nbrManquant = htmlspecialchars($_POST['nbr']);
           $villeEquipe = htmlspecialchars($_POST['villeEquipe']);
           $five = htmlspecialchars($_POST['five']);
           $dateEquipe = htmlspecialchars($_POST['dateEquipe']);
           $createur = htmlspecialchars($_POST['createur']);
           
         
          
                   $insertmbr = $bdd->prepare("INSERT INTO equipe(villeEquipe, five, nbrManquant, dateEquipe, createur) VALUES(?,?,?,?,?)");
                   $insertmbr->execute(array($villeEquipe, $five, $nbrManquant, $dateEquipe, $createur));
                  
                  
               
         
           
       }
    
        else
        {
            $erreur = "All the fields must me completed";
        }

    }
    */
?>
<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>interior</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/themify-icons.css">
    <link rel="stylesheet" href="css/nice-select.css">
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/gijgo.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/slicknav.css">
    <link rel="stylesheet" href="css/style.css">
    <!-- <link rel="stylesheet" href="css/responsive.css"> -->
</head>

<body>
    <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

    <?php
    
    if(isset($_SESSION['admin']) AND $_SESSION['admin'])
{
    include("headerAdmin.php");
    
}
else 
{
    include("header.php");
}
    
    ?>

     

    <!-- ================ contact section start ================= -->
   
            <div class="container">
                
    
    
                <div class="row">
                    <div class="col-12">
                        <h2 class="contact-title">Modifier mes informations</h2>
                        <?php  if(isset($erreur)){
        
    include("errorMsg.php");
             ?><br/><br/><?php }
                        
                        if(isset($success)){
        
    include("successMsg.php");
             ?><br/><br/><?php }
        ?>
                    </div>
                    
                    <div class="col-lg-8">
                        <form class="form-contact contact_form" action="" method="post" novalidate="novalidate">
                            <div class="row">
                                
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control valid" name="nvpseudo" id="nbr" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'combien manquent'" value="<?php echo $user['pseudo']; ?>">
                                        
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <input class="form-control valid" name="nvemail" id="villeEquipe" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Ville'" value="<?php echo $user['email']; ?>">
                                    </div>
                                </div>
                                
                                <div class="col-12">
                                    <div class="form-group">
                                        <input class="form-control" name="nvprenom" id="dateEquipe" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'A quelle date ?'" value="<?php echo $user['prenom']; ?>">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <input class="form-control" name="nvnom" id="createur" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'createur'" value="<?php echo $user['nom']; ?>">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <input class="form-control" name="nvnumTel" id="createur" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'createur'" value="0<?php echo $user['numTel']; ?>">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <input class="form-control" name="nvvilleMembre" id="createur" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'createur'" value="<?php echo $user['villeMembre']; ?>">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <input class="form-control" name="nvmdp1" id="five" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Five'" placeholder="Mot de passe">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <input class="form-control" name="nvmdp2" id="five" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Five'" placeholder="Confirmez votre Mot de passe">
                                    </div>
                                </div>
                                
                                <div class="form-group mt-3">
                                    <input type="submit" class="button button-contactForm boxed-btn" name="envoyer" value="Modifier"> 
                                </div>
                            </div>
                            
                              
                        </form>
                    </div>
                    <div class="col-lg-3 offset-lg-1">
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i class="ti-home"></i></span>
                            <div class="media-body">
                                <h3>Renseignez un terrain proche de chez vous</h3>
                                <p>Rosemead, CA 91770</p>
                            </div>
                        </div>
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i class="ti-tablet"></i></span>
                            <div class="media-body">
                                <h3>Les joueurs auront accès a votre numéro</h3>
                                <p>Mon to Fri 9am to 6pm</p>
                            </div>
                        </div>
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i class="ti-email"></i></span>
                            <div class="media-body">
                                <h3>Et à votre email</h3>
                                <p>Send us your query anytime!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
    <!-- ================ contact section end ================= -->
    
 <?php
    include("footer.php");
    ?>
    
  <!-- Modal -->
  <div class="modal fade custom_search_pop" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="serch_form">
            <input type="text" placeholder="Search" >
            <button type="submit">search</button>
        </div>
      </div>
    </div>
  </div>

        <!-- JS here -->
        <script src="js/vendor/modernizr-3.5.0.min.js"></script>
        <script src="js/vendor/jquery-1.12.4.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/isotope.pkgd.min.js"></script>
        <script src="js/ajax-form.js"></script>
        <script src="js/waypoints.min.js"></script>
        <script src="js/jquery.counterup.min.js"></script>
        <script src="js/imagesloaded.pkgd.min.js"></script>
        <script src="js/scrollIt.js"></script>
        <script src="js/jquery.scrollUp.min.js"></script>
        <script src="js/wow.min.js"></script>
        <script src="js/nice-select.min.js"></script>
        <script src="js/jquery.slicknav.min.js"></script>
        <script src="js/jquery.magnific-popup.min.js"></script>
        <script src="js/plugins.js"></script>
        <script src="js/gijgo.min.js"></script>
    
        <!--contact js-->
        <script src="js/contact.js"></script>
        <script src="js/jquery.ajaxchimp.min.js"></script>
        <script src="js/jquery.form.js"></script>
        <script src="js/jquery.validate.min.js"></script>
        <script src="js/mail-script.js"></script>
    
        <script src="js/main.js"></script>
        <script>
            $('#datepicker').datepicker({
                iconsLibrary: 'fontawesome',
                icons: {
                 rightIcon: '<span class="fa fa-caret-down"></span>'
             }
            });
            $('#datepicker2').datepicker({
                iconsLibrary: 'fontawesome',
                icons: {
                 rightIcon: '<span class="fa fa-caret-down"></span>'
             }
    
            });
        </script>
    
    </body>
    
    </html>