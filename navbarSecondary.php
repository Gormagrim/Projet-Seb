<?php
$page = $_SERVER['PHP_SELF'];
if ($page == '/registration.php' || $page == '/connection.php') {
    ?>
    <!DOCTYPE html>
    <html lang="fr" dir="ltr">
        <head>
            <meta charset="utf-8" />
            <meta name="viewport" content="width=device-width, user-scalable=no" />
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
            <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
            <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
            <link rel="stylesheet" href="assets/css/style.css" />
            <link href="https://fonts.googleapis.com/css?family=Crete+Round" rel="stylesheet" />
            <title>Projet BTP</title>
        </head>
        <body>
            <nav class="navbar fixed-top navbar-expand-lg navbar-light solid navbarSecondary">
                <a href="/accueil" class="navbar-left">izi<span class="orange">.</span>travaux<span class="orange">.</span>com</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <form class="form-inline">
                                <input class="form-control mr-sm-2 searchNav" type="search" placeholder="Recherche" aria-label="Search">
                                <button class="btn btn-outline-warning searchNav" type="submit">Rechercher</button>
                            </form>
                        </li>
                        <li class="nav-item">
                            <button type="button" class="btn btn-outline-warning" onclick="javascript:location.href = 'connection.php'">Connexion</button>
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
                        <link rel="stylesheet" href="assets/css/style.css" />
                        <link href="https://fonts.googleapis.com/css?family=Crete+Round" rel="stylesheet" />
                        <title>Projet BTP</title>
                    </head>
                    <body>
                        <nav class="navbar fixed-top navbar-expand-lg navbar-light solid navbarSecondary">
                            <a href="/index.php" class="navbar-left">izi<span class="orange">.</span>travaux<span class="orange">.</span>com</a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                                <ul class="navbar-nav">
                                    <li class="nav-item">
                                        <button id="openNav" class="w3-button searchNav" onclick="w3_open()">Menu</button>
                                    </li>
                                    <li class="nav-item">
                                        <form class="form-inline">
                                            <input class="form-control mr-sm-2 searchNav" type="search" placeholder="Recherche" aria-label="Search">
                                            <button class="btn btn-outline-warning searchNav" type="submit">Rechercher</button>
                                        </form>
                                    </li>
                                    <li class="nav-item">
                                        <button type="button" class="btn btn-outline-warning" onclick="javascript:location.href = '#'">Déconnexion</button>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                        <div class="container-fluid">
<?php } ?>