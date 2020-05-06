
    
<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=foot', 'root', '');
    
$query = 'SELECT * FROM equipe';

$equipeAff = $bdd->query($query);

/*if(isset($_POST['valide']))
                    {
                        
                       
                        $upateQuery = 'UPDATE equipe SET valide = :valide WHERE equipeId = :equipeId';
                      $updateReq = $bdd->prepare($updateQuery);
                      $updateReq->execute(array(
                      'valide' => 1,
                      'equipeId' => $equipeData['equipeId']
                      ));
                    }*/

?>
<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Travelo</title>
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
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/gijgo.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/slick.css">
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
    
    
   

    <!-- where_togo_area_start  -->
    <div class="where_togo_area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3">
                    <div class="form_area">
                        <h3>Que cherchez vous ?</h3>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="search_wrap">
                        <form class="search_form" action="#">
                            
                            <div class="input_field">
                                <input id="datepicker" placeholder="Date">
                            </div>
                            <div class="input_field">
                                <input id="text" placeholder="localisation">
                            </div>
                           
                            <div class="search_btn">
                                <button class="boxed-btn4 " type="submit" >Chercher</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- where_togo_area_end  -->

<div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="section_title text-center mb_70">
                        <br/><br/><h3>Validez les matchs</h3>
                        <p>Pour qu'une équipe puisse jouer, vous devez la valider</p>
                    </div>
                </div>
            </div>
    
    
    <div class="popular_places_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="filter_result_wrap">
                        <h3>Filter Result</h3>
                        <div class="filter_bordered">
                            <div class="filter_inner">
                                <div class="row">
                                    
                                    
                                    <div class="col-lg-12">
                                        <div class="single_select">
                                            <select>
                                                
                                                <option data-display="Où voulez vous jouer ?">Où</option>
                                                
                                              </select>
                                        </div>
                                        
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="range_slider_wrap">
                                            <span class="range">Lieu</span>
                                            <div id="slider-range"></div>
                                            <br/>
                                        </div>
                                    </div>
                                </div>


                            </div>

                            <div class="reset_btn">
                                <button class="boxed-btn4" type="submit">Filtrer</button>
                            </div>
                        </div>
                    </div>
                </div>
                
                
                
                
                
                <div class="col-lg-8">
                    <div class="row">
                
<?php
                
                while($equipeData = $equipeAff->fetch()){
                   
            if(isset($_POST['valide']))
                    {
                        
                       
                        $upateQuery = 'UPDATE equipe SET valide = :valide WHERE equipeId = :equipeId';
                      $updateReq = $bdd->prepare($updateQuery);
                      $updateRes->execute(array(
                      'valide' => 1,
                      'equipeId' => $equipeData['equipeId']
                      ));
            }
                
?>
                
                        <div class="col-lg-6 col-md-6">
                            <div class="single_place">
                                <div class="thumb">
                                    <?php 
                                        if(isset($equipeData['valide']) AND $equipeData['valide'])
                                        {
                                    ?>
                                            <img src="img/place/1.jpg" alt="">
                                    <?php
                                        }else
                                        {
                                    ?>
                                            <img src="img/place/noir.jpg" alt="">
                                    <?php
                                        }
                                    ?>
                                                   <form action="" method="post">                      
                                                <a href="valider.php?id=<?php echo($equipeData['equipeId']);?>" class="prise" name="valide" value="valide"> <i class="fa fa-check-square-o"></i> Valider le match</a>
                                    </form>
                                    
                                </div>
                                
                                <div class="place_info">
                                    <a href="destination_details.html"><h3>Dans la ville de <?php echo $equipeData['villeEquipe']?></h3></a>
                                    <p><i class="fa fa-map-marker"></i> <?php echo $equipeData['five']?></p>
                                    
                                    <div class="rating_days d-flex justify-content-between">
                                        <!--<span class="d-flex justify-content-center align-items-center">
                                             <i class="fa fa-star"></i> 
                                             <i class="fa fa-star"></i> 
                                             <i class="fa fa-star"></i> 
                                             <i class="fa fa-star"></i> 
                                             <i class="fa fa-star"></i>
                                             <a href="#">(20 Review)</a>
                                        </span>-->
                                        <div class="days">
                                            <i class="fa fa-calendar-o"></i>
                                            <a href="#"><?php echo $equipeData['dateEquipe']?></a>
                                            
                                        </div>
                                        <div class="days">       
                                            <i class="fa fa-search"></i>
                                                <a href="#">Recherche joueurs</a>
                                            </div>
                                        
                                      
                                        
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        
                        <?php } 
                ?>
                    
                
                
                
            </div>
        </div>
    </div>

        <!-- newletter_area_start  -->
        <div class="newletter_area overlay">
            <div class="container">
                <div class="row justify-content-center align-items-center">
                    <div class="col-lg-10">
                        <div class="row align-items-center">
                            <div class="col-lg-5">
                                <div class="newsletter_text">
                                    <h4>Envoyez nous un mail !</h4>
                                    <p>Pour tout questionnement, envoyez nous un mail, nous vous répondrons dans les plus brefs délais</p>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="mail_form">
                                    <div class="row no-gutters">
                                        <div class="col-lg-9 col-md-8">
                                            <div class="newsletter_field">
                                                <input type="email" placeholder="votre email" >
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-4">
                                            <div class="newsletter_btn">
                                                <button class="boxed-btn4 " type="submit" >Envoyer</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- newletter_area_end  -->
  

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
    <!-- link that opens popup -->
    

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
    <script src="js/jquery-ui.min.js"> </script>
    <script src="js/nice-select.min.js"></script>
    <script src="js/jquery.slicknav.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/range.js"></script>
        <!-- <script src="js/gijgo.min.js"></script> -->
    <script src="js/slick.min.js"></script>
   

    
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
    </script>
   
        </div>
    </div>
</body>

</html>

