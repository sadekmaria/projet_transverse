<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=foot', 'root', '');



if(isset($_POST['envoyer']))//si existe, donc que l'utilisateur a cliquer sur send
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
                  
                  /* header('Location: .php');*/
               
         
           
       }
    
        else
        {
            $erreur = "All the fields must me completed";
        }

    }
    
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
    include("header.php");
    ?>

     <!-- bradcam_area  -->
     <div class="bradcam_area bradcam_bg_4">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="bradcam_text text-center">
                        <h3>Créez votre équipe ici</h3>
                        <p>Attendez les réponses de joueurs dans les alentours</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ bradcam_area  -->

    <!-- ================ contact section start ================= -->
    <section class="contact-section">
            <div class="container">
                
    
    
                <div class="row">
                    <div class="col-12">
                        <h2 class="contact-title">Remplissez les informations</h2>
                    </div>
                    <div class="col-lg-8">
                        <form class="form-contact contact_form" action="" method="post" novalidate="novalidate">
                            <div class="row">
                                
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control valid" name="nbr" id="nbr" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'combien manquent'" placeholder="Combien de joueurs manquent ?">
                                        
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <input class="form-control valid" name="villeEquipe" id="villeEquipe" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Ville'" placeholder="Dans quelle ville voulez vous jouer ?">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <input class="form-control" name="five" id="five" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Five'" placeholder="Nom du terrain/five ?">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <input class="form-control" name="dateEquipe" id="dateEquipe" type="date" onfocus="this.placeholder = ''" onblur="this.placeholder = 'A quelle date ?'" placeholder="Nom du terrain/five ?">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <input class="form-control" name="createur" id="createur" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'createur'" placeholder="createur">
                                    </div>
                                </div>
                                
                                <div class="form-group mt-3">
                                    <input type="submit" class="button button-contactForm boxed-btn" name="envoyer" value="Creer"> 
                                </div>
                            </div>
                            
                              <?php
                                    if(isset($erreur))
                                    {
                                        include("errorMsg.php");
                                    }
                                ?>
                        </form>
                    </div>
                    <div class="col-lg-3 offset-lg-1">
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i class="ti-home"></i></span>
                            <div class="media-body">
                                <h3>Buttonwood, California.</h3>
                                <p>Rosemead, CA 91770</p>
                            </div>
                        </div>
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i class="ti-tablet"></i></span>
                            <div class="media-body">
                                <h3>+1 253 565 2365</h3>
                                <p>Mon to Fri 9am to 6pm</p>
                            </div>
                        </div>
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i class="ti-email"></i></span>
                            <div class="media-body">
                                <h3>support@colorlib.com</h3>
                                <p>Send us your query anytime!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
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