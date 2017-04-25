<?php require_once('db.php'); ?>
<?php $db = new db(); ?>
<?php session_start();?>
<?php
var_dump($_POST);
if (isset($_POST['Modify'])) {
    $db->updateUserInformations($_GET['EditMembre'], $_POST['nom'], $_POST['prenom'], $_POST['datenaiss'], $_POST['adresse'], $_POST['codepostal'], $_POST['ville'], $_POST['idstatut']);
}
?>
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

<section id="event">
    <div class="container">
        <?php
        echo <<< END

                <div class="row">
            <div class="col-sm-12 col-md-9">
                <div id="event-carousel" class="carousel slide" data-interval="false">
                    
END;
        // Modification d'un membre
        if(isset($_GET['EditMembre'])) {    
            $one = $db->getUser($_GET['EditMembre']);
            $combobox = '';
            foreach($db->getAllStatut() as $statut){
                if (strcmp($statut['idstatut'],$one['idstatut']) == 0)
                    $default = 'selected';
                else
                    $default = '';
                $combobox .= '<option value="'.$statut['idstatut'].'" '. $default.'>'.$statut['nomstatut'].'</option>';
            }
            echo '<h2 class="heading">' . $one['prenom'] . ' ' . $one['nom'] . '</h2>
            <form method="post" action="AdminMembre.php?EditMembre=' . $one['idutilisateur'] . '" >
            <div class="carousel-inner">
                <div class="item active">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="single-event">
                                Prenom : <input type="text" name="prenom" value="'.$one['prenom'].'" />
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="single-event">
                                Nom : <input type="text" name="nom" value="'.$one['nom'].'" />
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="single-event">
                                Date de naissance : <input name="datenaiss" type="text" value='.$one['datenaiss'].' />
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="single-event">
                                Code Postal : <input name="codepostal" type="text" value='.$one['codepostal'].' />
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="single-event">
                                Adresse : <input name="adresse" type="text" value="'.$one['adresse'].'"/>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="single-event">
                                Ville : <input name="ville" type="text" value="'.$one['ville'].'"/>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="single-event">
                                <select name="idstatut">'.
                                $combobox
                                .'</select>
                            </div>
                        </div>
                    </div>
                </div>
                <input type="submit" name="Modify" value="Enregistrer" class="btn btn-primary"/>
                </form>';
        } else {
            // Liste des membres modifiables
            $all = $db->getAllMembers();
            foreach($all as $one) {
                echo '
                        <h2 class="heading">' . $one['prenom'] . ' ' . $one['nom'] . '</h2>
                        <form method="post" action="AdminMembre.php?EditMembre=' . $one['idutilisateur'] . '" >
                        <div class="carousel-inner">
                            <div class="item active">
                                <div class="row">
                                    <div class="col-sm-4">
                                        <div class="single-event">
                                            <h4>' . $one['datenaiss'] . '</h4>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="single-event">
                                            <h4>Résidence : '. $one['codepostal'] . ' ' . $one['ville'] . ' ' . $one['adresse'] . '</h4>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="single-event">
                                            <h4>Statut : ' . $db->getStatut($one['idstatut']) . '</h4>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="single-event">
                                            <h4>Mail : ' . $one['mail'] . '</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input  type="submit" class="btn btn-primary" value="Modifier"/>
                        </form>';
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