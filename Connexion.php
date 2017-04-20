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

<li class="scroll"><a href="Home.php">Accueil</a></li>
<li class="scroll"><a href="Evenement.php">Evenements</a></li>
<li class="scroll"><a href="About.php">A propos</a></li>
<li class="scroll"><a href="Bureau.php">Bureau</a></li>
<li class="scroll"><a href="Connexion.php">Connexion</a></li>
<li class="scroll"><a href="Inscription.php">Inscription</a></li>
<form method="post" action="Connexion.php" >
    <div class="form-group row">
        <label for="example-text-input" class="col-2 col-form-label">Adresse E-mail</label>
        <div class="col-6">
            <input class="form-control" type="text" value="test@gmail.com" id="mail" name="mail">
        </div>
    </div>
    <div class="form-group row">
        <label for="example-text-input" class="col-2 col-form-label">Mot de passe</label>
        <div class="col-6">
            <input class="form-control" type="password"  id="pwd" name="pwd">
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Se connecter</button>
</form>


<?php
if(!is_null($_POST['mail'])){
   $count=$db->connect($_POST['mail'],$_POST['pwd']);
    if($count == 1){
        session_start();
        $_SESSION['mail'] = $_POST['mail'];
        $_SESSION['pwd'] = $_POST['pwd'];
    }

}



?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>

</html>