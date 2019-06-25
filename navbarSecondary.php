<?php
include_once 'models/database.php';
include_once 'models/particularUsers.php';
include_once 'controllers/navbarSecondaryCtrl.php';

$page = $_SERVER['PHP_SELF'];
if ($page == '/registration.php' || $page == '/connection.php' || $page == '/mentionsLegales.php') {
    ?>
    <!DOCTYPE html>
    <html lang="fr" dir="ltr">
        <head>
            <meta charset="utf-8" />
            <meta name="viewport" content="width=device-width, user-scalable=no" />
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
            <link rel="stylesheet" href="assets/css/style.css" />
            <link rel="stylesheet" href="assets/css/animate.css"/>
            <link href="https://fonts.googleapis.com/css?family=Crete+Round" rel="stylesheet" />
            <title>izi.travaux.com</title>
        </head>
        <body>
            <nav class="navbar fixed-top navbar-expand-lg navbar-light navbar-dark solid navbarSecondary">
                <a href="/index.php" class="navbar-left">izi<span class="orange">.</span>travaux<span class="orange">.</span>com</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <button type="button" class="btn btn-outline-warning" id="connexionBtn" onclick="javascript:location.href = 'connection.php'">Connexion</button>
                        </li>
                        <li class="nav-item dropdown hideMenu">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownOne" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="orange">.</span>Recherches par
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="/particularUser.php"><span class="orange">.</span>Entreprises</a>
                                <a class="dropdown-item" href="/partUserProduction.php"><span class="orange">.</span>Réalisations</a>
                                <a class="dropdown-item" href="/sectorSearch.php"><span class="orange">.</span>Secteurs</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown hideMenu">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownTwo" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="orange">.</span>Mon activité
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="/estimate.php"><span class="orange">.</span>Mes devis</a>
                                <a class="dropdown-item" href="/userWorks.php"><span class="orange">.</span>Mes travaux</a>
                                <a class="dropdown-item" href="/userFavorites.php"><span class="orange">.</span>Mes favoris</a>
                                <a class="dropdown-item" href="/userContact.php"><span class="orange">.</span>Mes contacts</a>
                            </div>
                        </li>  
                        <li class="nav-item hideMenu">
                            <a class="nav-link" href="/userAccount.php"><span class="orange">.</span>Mon compte</a>
                        </li>
                    </ul>
                </div>
            </nav>
            <div class="container-fluid">
            <?php } else { ?>
                <!DOCTYPE html>
                <html lang="fr" dir="ltr">
                    <head>
                        <meta charset="utf-8" />
                        <meta name="viewport" content="width=device-width, user-scalable=no" />
                        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
                        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
                        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
                        <link rel="stylesheet" href="/assets/css/style.css" />
                        <link rel="stylesheet" href="assets/css/animate.css"/>
                        <link href="https://fonts.googleapis.com/css?family=Crete+Round" rel="stylesheet" />
                        <title>izi.travaux.com/<?= $particularUserInfo->firstname ?></title>
                    </head>
                    <body>
                        <nav class="navbar fixed-top navbar-expand-lg navbar-light solid navbarSecondary">
                            <a href="/particularUser.php" class="navbar-left">izi<span class="orange">.</span>travaux<span class="orange">.</span>com</a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                                <ul class="navbar-nav">
                                    <li class="nav-item helloName">
                                        Bonjour, <?= $particularUserInfo->firstname ?>
                                    </li>
                                    <li class="nav-item">
                                        <button id="openNav" class="btn btn-outline-warning searchNav" onclick="slide_open()">Menu</button>
                                    </li>
                                    <li class="nav-item">
                                        <button type="button" class="btn btn-outline-warning" id="deconnexionBtn" onclick="javascript:location.href = '/controllers/deconnectionCtrl.php'">Déconnexion</button>
                                    </li>
                                    <li class="nav-item dropdown hideMenu">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownOne" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <span class="orange">.</span>Recherches par
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="/partUserCompany.php"><span class="orange">.</span>Entreprises</a>
                                            <a class="dropdown-item" href="/partUserProduction.php"><span class="orange">.</span>Réalisations</a>
                                            <a class="dropdown-item" href="/sectorSearch.php"><span class="orange">.</span>Secteurs</a>
                                        </div>
                                    </li>
                                    <li class="nav-item dropdown hideMenu">
                                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownTwo" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <span class="orange">.</span>Mon activité
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            <a class="dropdown-item" href="/estimate.php"><span class="orange">.</span>Mes devis</a>
                                            <a class="dropdown-item" href="/userWorks.php"><span class="orange">.</span>Mes travaux</a>
                                            <a class="dropdown-item" href="/userFavorites.php"><span class="orange">.</span>Mes favoris</a>
                                            <a class="dropdown-item" href="/userContact.php"><span class="orange">.</span>Mes contacts</a>
                                        </div>
                                    </li>  
                                    <li class="nav-item hideMenu">
                                        <a class="nav-link" href="/userAccount.php"><span class="orange">.</span>Mon compte</a>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                        <div class="container-fluid">
                        <?php } ?>