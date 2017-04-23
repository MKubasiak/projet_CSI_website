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
                        <li class="scroll"><a href="Connexion.php">Connexion</a></li>
                        <li class="scroll"><a href="Inscription.php">Inscription</a></li>
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
        <div class="cart">
            <a href="#"><i class="fa fa-shopping-cart"></i> <span>Purchase Tickets</span></a>
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
            $comments = $db->getComments($one['idEvenement']);
            echo '
                    <h2 class="heading">' . $one['titreEvenement'] . '</h2>
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
                                        <h4>Du :' . $one['dateDebut'] . '</h4>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="single-event">
                                        <h4>Au : ' . $one['dateFin'] . '</h4>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="single-event">
                                        <h4>Au : ' . $one['dateFin'] . '</h4>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="single-event">
                                        <h4>Nombre de places: ' . $one['nbPlaces'] . '</h4>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="single-event">
                                    <!--A MODIFIER QUAND ON A LES SESSIONS -->
                                        <h4>Votre tarif : ';
            if(isset($_SESSION['mail'])){
                $tarif = $db->getTarifForUser($_SESSION['mail'], $one['idEvenement']);
            }else{
                $tarif = $one['tarifBase'];
            }
            echo $tarif .'€</h4>
                                    </div>
                                </div>
                                 <div class="cart">
                                    <a href="#"><i class="fa fa-shopping-cart"></i> <span>Reservez !</span></a>
                                </div>
                            </div>
                            </div>
                            <div class="col-sm-10">Commentaires :';
            echo '<div class="row">';
            foreach($comments as $comment){
                $prenom = $db->getNameFromComment($comment['idUtilisateur']);
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
            if(!is_null($_SESSION['mail'])){
                echo '
            <form method="post" action="Commente.php">
                <input type="hidden" value="' . $one['idEvenement'] . '" name="idevent" id="idevent">
                <input type="hidden" value="' . $_SESSION['mail'] . '" name="mail" id="mail">
                    <button type="submit" class="btn btn-primary">Commentez !</button>
            </form>';
                echo '</div>';
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