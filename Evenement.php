<?php require_once('db.php'); ?>
<?php $db = new db(); ?>
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
                        <li class="scroll active"><a href=Home.php">Accueil</a></li>
                        <li class="scroll"><a href="Evenement.php">Evenements</a></li>
                        <li class="scroll"><a href="About.php">A propos</a></li>
                        <li class="scroll"><a href="Bureau.php">Bureau</a></li>
                        <li class="scroll"><a href="Connexion.php">Connexion</a></li>
                        <li class="scroll"><a href="Inscription">Inscription</a></li>
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
                <h2>Notre prochain évènement dans : </h2>
            </div>
            <div class="col-sm-7 col-md-6">
                <ul id="countdown">
                    <li>
                        <span class="days time-font">00</span>
                        <p>days </p>
                    </li>
                    <li>
                        <span class="hours time-font">00</span>
                        <p class="">hours </p>
                    </li>
                    <li>
                        <span class="minutes time-font">00</span>
                        <p class="">minutes</p>
                    </li>
                    <li>
                        <span class="seconds time-font">00</span>
                        <p class="">seconds</p>
                    </li>
                </ul>
            </div>
        </div>
        <div class="cart">
            <a href="#"><i class="fa fa-shopping-cart"></i> <span>Purchase Tickets</span></a>
        </div>
    </div>
</section><!--/#explore-->


<section id="event">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-9">
                <div id="event-carousel" class="carousel slide" data-interval="false">
                    <h2 class="heading">THE ROCKING Performers</h2>
                    <a class="even-control-left" href="#event-carousel" data-slide="prev"><i class="fa fa-angle-left"></i></a>
                    <a class="even-control-right" href="#event-carousel" data-slide="next"><i class="fa fa-angle-right"></i></a>
                    <div class="carousel-inner">
                        <div class="item active">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="single-event">
                                        <img class="img-responsive" src="images/event/event1.jpg" alt="event-image">
                                        <h4>Chester Bennington</h4>
                                        <h5>Vocal</h5>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="single-event">
                                        <img class="img-responsive" src="images/event/event2.jpg" alt="event-image">
                                        <h4>Mike Shinoda</h4>
                                        <h5>vocals, rhythm guitar</h5>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="single-event">
                                        <img class="img-responsive" src="images/event/event3.jpg" alt="event-image">
                                        <h4>Rob Bourdon</h4>
                                        <h5>drums</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="single-event">
                                        <img class="img-responsive" src="images/event/event1.jpg" alt="event-image">
                                        <h4>Chester Bennington</h4>
                                        <h5>Vocal</h5>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="single-event">
                                        <img class="img-responsive" src="images/event/event2.jpg" alt="event-image">
                                        <h4>Mike Shinoda</h4>
                                        <h5>vocals, rhythm guitar</h5>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="single-event">
                                        <img class="img-responsive" src="images/event/event3.jpg" alt="event-image">
                                        <h4>Rob Bourdon</h4>
                                        <h5>drums</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="guitar">
                <img class="img-responsive" src="images/guitar.png" alt="guitar">
            </div>
        </div>
    </div>
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