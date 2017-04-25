<?php require_once('db.php'); ?>
<?php $db = new db(); ?>
<?php session_start();?>
<!DOCTYPE html>
<!--suppress LossyEncoding -->
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
                        <li class="scroll"><a href="Bureau.php">Bureau</a></li>
                        <?php
                        if(!isset($_SESSION['mail'])){
                            echo '<li class="scroll"><a href="Connexion.php">Connexion</a></li>
                        <li class="scroll"><a href="Inscription.php">Inscription</a></li>';
                        }else{
                            echo '<li class="scroll"><a href="Adhesion.php">Adherer</a></li>';
                        }
                        if(isset($_SESSION['root']) && $_SESSION['root']){
                            echo '<li class="scroll"><a href="Admin.php">Administrer</a></li>';
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
                <h2>Notre prochain Evénement : </h2>
            </div>
            <?php $event = $db->getLatestEvent();?>
            <div class="col-sm-7 col-md-6">
                <h3><?php echo $event->datedebut ?></h3>
                <h2><?php echo $event->titreevenement ?></h2>
            </div>
        </div>
    </div>
</section><!--/#explore-->

<?php $all = $db->getBureau(); ?>
<section id="event">
    <div class="container">
        <?php
        echo <<< END

            <div class="col-sm-12 col-md-9">
                <div id="event-carousel" class="carousel slide" data-interval="false">
                    
END;
        foreach($all as $one) {
            $user = $db->getUser($one);
            $statut = $db->getStatut($user['idstatut']);
            echo '
                    <h2 class="heading">' . $one['titreevenement'] . '</h2>
                    <div class="carousel-inner">

                        <div class="item active">
                            <div class="row">
                                <div class="col-sm-10">
                                    <div class="single-event">
                                        <h3>'.$statut.'</h3>
                                        <h4>' . $user['nom'] .' '. $user['prenom']. '</h4>
                                    </div>
                                </div>
							    <div class="col-sm-10">
                                    <div class="single-event">
                                        <h5>' . $user['adresse'] . '</h5>
                                        <h5>' . $user['codepostal'] .' '. $user['ville']. '</h5>
                                    </div>
                                </div>
							<div>
						</div>
					</div>';
       
        }

        echo <<< END
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