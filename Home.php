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

<body>
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

<section id="home">
    <div id="main-slider" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#main-slider" data-slide-to="0" class="active"></li>
            <li data-target="#main-slider" data-slide-to="1"></li>
            <li data-target="#main-slider" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="item active">
                <img class="img-responsive" src="images/slider/bg1.jpg" alt="slider">
                <div class="carousel-caption">
                    <h2>Bienvenue sur OrgaEvent !</h2>
                    <h4>Nous organisons l'évènement de vos rêves</h4>
                    <ul>
                        <li>
                            <a href="#contact">Nous contacter<i class="fa fa-angle-right"></i></a>
                        </li>
                        <li>
                            <a href="Evenement.php">Trouver un évènement<i class="fa fa-angle-right"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="item">
                <img class="img-responsive" src="images/slider/bg2.jpg" alt="slider">

                <div class="carousel-caption">
                    <h2>Bienvenue sur OrgaEvent !</h2>
                    <h4>Nous organisons l'évènement de vos rêves</h4>
                    <ul>
                        <li>
                            <a href="#contact">Nous contacter<i class="fa fa-angle-right"></i></a>
                        </li>
                        <li>
                            <a href="Evenement.php">Trouver un évènement<i class="fa fa-angle-right"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="item">
                <img class="img-responsive" src="images/slider/bg3.jpg" alt="slider">

                <div class="carousel-caption">
                    <h2>Bienvenue sur OrgaEvent !</h2>
                    <h4>Nous organisons l'évènement de vos rêves</h4>
                    <ul>
                        <li>
                            <a href="#contact">Nous contacter<i class="fa fa-angle-right"></i></a>
                        </li>
                        <li>
                            <a href="Evenement.php">Trouver un évènement<i class="fa fa-angle-right"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!--/#home-->
<div class="contact-section">
    <div class="ear-piece">
        <img class="img-responsive" src="images/ear-piece.png" alt="">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-sm-3 col-sm-offset-4">
                <div class="contact-text">
                    <h3>Nous contacter</h3>
                    <address>
                        E-mail: OrgaEvent@gmail.com<br>
                        Phone: 00 00 00 00 00 <br>
                    </address>
                </div>
                <div class="contact-address">
                    <h3>Nous contacter</h3>
                    <address>
                        55 Rue du Faubourg Saint-Honoré<br>
                        75008 Paris<br>
                        France
                    </address>
                </div>
            </div>
            <div class="col-sm-5">
                <div id="contact-section">
                    <h3>Contactez nous</h3>
                    <div class="status alert alert-success" style="display: none"></div>
                    <form id="main-contact-form" class="contact-form" name="contact-form" method="post" action="sendemail.php">
                        <div class="form-group">
                            <input type="text" name="name" class="form-control" required="required" placeholder="Nom">
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" class="form-control" required="required" placeholder="Adresse e-mail">
                        </div>
                        <div class="form-group">
                            <textarea name="message" id="message" required="required" class="form-control" rows="4" placeholder="Votre message"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary pull-right">Send</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
<!--/#contact-->

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