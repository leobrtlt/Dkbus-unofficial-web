<?php 
include('receiveBusInfo.php');

$actual_page = explode("/","$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]");
if($actual_page[2] == "index" || empty($actual_page[2])){
    $actual_page = "Accueil";
}else{
    $actual_page = $actual_page[2];
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DBI - <?= $actual_page; ?></title>
    <script src="//kit.fontawesome.com/2828f7885a.js" integrity="sha384-WAsFbnLEQcpCk8lM1UTWesAf5rGTCvb2Y+8LvyjAAcxK1c3s5c0L+SYOgxvc6PWG" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.min.css" />
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>

<body>
    <nav class="navbar topNav">
        <div class="container ">
            <div class="navbar-brand">
                <a class="navbar-item" href="#">
                    DUNKERQUE BUS INFO
                </a>
                <a role="button" class="navbar-burger" data-target="navMenu" aria-label="menu" aria-expanded="false">
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                    <span aria-hidden="true"></span>
                </a>
            </div>
        </div>
    </nav>
    <nav class="navbar shadow">
        <div class="container">
            <div class="navbar-menu" id="navMenu">
                <div class="navbar-start bottomNav ">
                    <a class="navbar-item <?php if($actual_page == "Accueil"){ echo 'is-active'; } ?>" href="index">
                        <i class="far fa-tachometer-alt"></i>&nbsp; Accueil</a>
                    <a class="navbar-item <?php if($actual_page == "lignes"){ echo 'is-active'; } ?>" href="lignes">
                        <i class="far fa-list"></i>&nbsp; Lignes</a>
                    <a class="navbar-item <?php if($actual_page == "arrets"){ echo 'is-active'; } ?>" href="arrets">
                        <i class="far fa-bus"></i>
                        </i>&nbsp; Arrêts</a>
                    <a class="navbar-item <?php if($actual_page == "deviations"){ echo 'is-active'; } ?>" href="deviations">
                        <i class="far fa-exclamation-triangle"></i>
                        </i>&nbsp; Déviations</a>
                    <a class="navbar-item" href="https://dkbus.com/" target="_blank">
                        <i class="far fa-sign-out"></i>&nbsp; Site de DK'BUS</a>
                </div>
            </div>
        </div>
    </nav>
    <br>

    <div style="position: fixed;bottom: 0;left: 0;right: 0;text-align: center;background: #be3636;z-index: 100;color: #fff;padding: 10px;">
    DunkerqueBusInfo est actuellement en cours de développement, certaines fonctionnalités peuvent ne pas être disponible. Nous nous excusons pour la gêne occasionnée
    </div>