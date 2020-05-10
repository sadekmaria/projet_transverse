<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=foot', 'root', '');
    
$equipe = $bdd->prepare('SELECT * FROM equipe_membre_pair LEFT JOIN  equipe ON equipe.equipeId = equipe_membre_pair.equipeId WHERE equipe_membre_pair.membreId= ? ');
$equipe->execute(array($_SESSION['membreId']));


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
                        <h3>Quelle équipe cherchez vous ?</h3>
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
                        <br/><br/><h3>Mes équipes</h3>
                        <p>Ici sont affichées les équipes auquelles vous faites partie</p>
                        <p>Vous pouvez supprimer une équipe lorsque vous en êtes le créateur</p>
                    </div>
                </div>
            </div>
    
    
    
               
    
                
           <style>
            
            table {
              border-collapse: collapse;/* Les bordures du tableau seront collées (plus joli) */
              border-spacing: 0;
              width: 100%;
              border: 1px solid #ddd;
            }

            th, td {
              text-align: left;
              padding: 16px;
                border: 1px solid black; /* auront une bordure de 1px */
            }

            tr:nth-child(even) {
              background-color: #f2f2f2;
            }

            </style>      
                        
                        
                        <ul>
            <table>
                        
                            <tr>
                                <th>
                                    Nom de l'équipe
                                </th>
                                <th>
                                    Ville du match
                                </th>
                                <th>
                                    Lieu du match
                                </th>
                                <th>
                                    Capitaine
                                </th>
                                <th>
                                    Date du match
                                </th>
                                <th>
                                    Heure du match
                                </th>
                                <th>
                                    Supprimer
                                </th>
                            </tr>
           <?php 
                
                while($e = $equipe->fetch()){
                    
                    
                        $requete1 = $bdd->query("SELECT pseudo FROM membre WHERE membreId= '".$e['createur']."' ");
                        $count1 = $requete1->fetch();
                
                    echo 
                        '                           
                            <tr>
                                <td>
                                    '.$e['equipe_nom'] .'
                                </td>
                                <td>
                                    '. $e['villeEquipe'] .'
                                </td>
                                <td>
                                    '.$e['five'].'
                                </td>
                                <td>
                                    '.$count1['pseudo'].'
                                </td>
                                <td>
                                    '.$e['dateEquipe'].'
                                </td>
                                <td>
                                    '.$e['heure'].'
                                </td>
                                <td>
                                    ';
                
                if($e['createur'] == $_SESSION['membreId']){
                ?>
                                <form class="search_form" action="supprimer.php?id=<?php echo ($e['equipeId']); ?>" method="post">
                                    <div class="search_btn">
                                        
                                            <button class="boxed-btn4 " type="submit" name="supprimer" >Supprimer</button>
                                        
                                    </div>
                                </form>
                                <?php }
                    echo'
                                </td>
                                
                                
                            </tr>
                            
                       ';
            ?>
            
            <?php
                
                }
            
            ?>
                 </table>
        </ul>
                        
                        
                        
                        
                       
                        
                       
                    
                
                
      <br/><br/>

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
    <script>
function myFunction() {
  var x = document.getElementById("myTime").value;
  document.getElementById("demo").innerHTML = x;
}
</script>
    
</body>

</html>

