<?php require_once('db.php'); ?>
<?php $db = new db(); ?>
<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>OrgaEvent</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/responsive.css" rel="stylesheet">

    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <link rel="shortcut icon" href="images/ico/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<header id="header" role="banner">
    <div class="main-nav">
        <div class="container">
            <div class="header-top">
                <div class="pull-right social-icons">
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-google-plus"></i></a>
                    <a href="#"><i class="fa fa-youtube"></i></a>
                </div>
            </div>
            <div class="row">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="scroll active"><a href="Home.php">Accueil</a></li>
                        <li class="scroll"><a href="Evenement.php">Evenements</a></li>
                        <li class="scroll"><a href="About.php">A propos</a></li>
                        <li class="scroll"><a href="Bureau.php">Bureau</a></li>
						<?php
							if(!isset($_SESSION['mail']){
								echo '<li class="scroll"><a href="Connexion.php">Connexion</a></li>
                        <li class="scroll"><a href="Inscription.php">Inscription</a></li>'
							}else{
									echo '<li class="scroll"><a href="Adhesion.php">Adherer</a></li>'
							}
						?>
                      
                    </ul>
                </div>
            </div>
        </div>
    </div>
</header>
<!--/#header-->


<section id="explore">
    <div class="container">
        <div class="row">
            <div class="watch">
                <img class="img-responsive" src="images/watch.png" alt="">
            </div>
            <div class="col-md-4 col-md-offset-2 col-sm-5">
                <h2>Notre prochain évènement : </h2>
            </div>
            <?php $event = $db->getLatestEvent();?>
            <div class="col-sm-7 col-md-6">
                <h3><?php echo $event->dateDebut ?></h3>
                <h2><?php echo $event->titreEvenement ?></h2>
            </div>
        </div>
    </div>
</section><!--/#explore-->

<?php $all = $db->getAllEvents(); ?>
<section id="event">
    <div class="container">
        <?php
        echo <<< END

            <div class="col-sm-12 col-md-9">
                <div id="event-carousel" class="carousel slide" data-interval="false">
                    
END;
        foreach($all as $one) {
            $comments = $db->getComments($one['idevenement']);
            $nbPart = $db->getNbParticipants($one['idevenement']);
            echo '
                    <h2 class="heading">' . $one['titreevenement'] . '</h2>
                    <div class="carousel-inner">

                        <div class="item active">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="single-event">
                                        <h4>' . $one['description'] . '</h4>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="single-event">
                                        <h4>A : ' . $one['lieu'] . '</h4>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="single-event">
                                        <h4>Du :' . $one['datedebut'] . '</h4>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="single-event">
                                        <h4>Au : ' . $one['datefin'] . '</h4>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="single-event">
                                        <h4>Au : ' . $one['datefin'] . '</h4>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="single-event">
                                        <h4>Nombre de places: ' . $one['nbplaces'] . '</h4>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="single-event">
                                        <h4>Nombre de participants: ' . $nbPart . '</h4>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="single-event">
                                    <!--A MODIFIER QUAND ON A LES SESSIONS -->
                                        <h4>Votre tarif : ';
            if(isset($_SESSION['mail'])){
                $tarif = $db->getTarifForUser($_SESSION['mail'], $one['idevenement']);
            }else{
                $tarif = $one['tarifbase'];
            }
            echo $tarif .'€</h4>
                                    </div>
                                </div>
                            </div>
                            </div>
                            <div class="col-sm-10">Commentaires :';
            echo '<div class="row">';
            foreach($comments as $comment){
                $prenom = $db->getNameFromComment($comment['idutilisateur']);
                echo ' <div class="col-sm-10">
                            <h4>-------------------------------------------------------------------------------</h4>
                            <div class="single-event">
                                <h4> De : ' . $prenom . '</h4>
                            </div>
                            <div class="single-event">
                                <h4>' . $comment['texte'] . '</h4>
                            </div>
                            <h4>-------------------------------------------------------------------------------</h4>
                       </div>';
            }
            if(isset($_SESSION['mail'])){
                echo '
               <div class="col-sm-4">
                <div class="single-event">
                    <form method="post" action="Commente.php">
                        <input type="hidden" value="' . $one['idevenement'] . '" name="idevent" id="idevent">
                        <input type="hidden" value="' . $_SESSION['mail'] . '" name="mail" id="mail">
                            <button type="submit" class="btn btn-primary">Commentez !</button>
                    </form>
                </div>
               </div>
               <div class="col-sm-4">
                <div class="single-event">
                    <form method="post" action="Evenement.php">
                        <input type="hidden" value="' . $one['idevenement'] . '" name="idevent" id="idevent">
                        <input type="hidden" value="participe" name="ptcp" id="ptcp">
                        <input type="hidden" value="' . $_SESSION['mail'] . '" name="mail" id="mail">
                            <button type="submit" class="btn btn-primary">Je participe</button>
                    </form>
                </div>
              </div>
            ';
                echo '</div>';
            }
            if(isset($_POST['ptcp']) && isset($_POST['mail'])){
                $db->addParticipe($_POST['idevent'], $_POST['mail']);
                echo "Vous avez indiqué participer à l'évènement, votre compte sera débité du tarif affiché";
            }

        }

        echo <<< END
        </div>
        </div>
    </div>
END;






        ?>


</section><!--/#event-->




<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
<script type="text/javascript" src="js/gmaps.js"></script>
<script type="text/javascript" src="js/smoothscroll.js"></script>
<script type="text/javascript" src="js/jquery.parallax.js"></script>
<script type="text/javascript" src="js/coundown-timer.js"></script>
<script type="text/javascript" src="js/jquery.scrollTo.js"></script>
<script type="text/javascript" src="js/jquery.nav.js"></script>
<script type="text/javascript" src="js/main.js"></script>
</body>
</html>