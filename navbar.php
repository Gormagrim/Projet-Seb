<!DOCTYPE html>
<html lang="fr" dir="ltr">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, user-scalable=no" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
        <link rel="stylesheet" href="assets/css/style.css" />
        <link rel="stylesheet" href="assets/css/animate.css"/>
        <link href="https://fonts.googleapis.com/css?family=Crete+Round" rel="stylesheet" />
        <title>Projet BTP</title>
    </head>
    <body>
        <nav class="navbar fixed-top navbar-expand-lg navbar-light">
            <p class="navbar-left">izi<span class="orange">.</span>travaux<span class="orange">.</span>com</p>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <form class="form-inline mobileMenu">
                            <input class="form-control mr-sm-2 searchNav" type="search" placeholder="Recherche" aria-label="Search">
                            <button class="btn btn-outline-warning searchNav hightBtn" type="submit">Rechercher</button>
                        </form>
                    </li>
                    <li class="nav-item">
                        <button type="button" class="btn btn-outline-warning hightBtn" id="indexConnexionBtn" onclick="javascript:location.href = 'connection.php'">Connexion</button>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="container-fluid">
            <div class="topSiteBg">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 topSite">
                        <p class="welcome">Bienvenue sur</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 topSite">
                        <h1 class="animated bounceInLeft">izi<span class="orange">.</span>travaux<span class="orange">.</span>com</h1>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 topSite">
                        <p class="animated zoomIn attract">Vos travaux et projets en toute simplicité.</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 topSite">
                        <img class="img-responsive" src="assets/img/travaux.png" alt="">
                    </div>
                </div>
            </div>
            <!-- A N'UTILISER PEUT ETRE QU'UNE FOIS CONNECTE -->
            <!--                <div class="col-2 col-sm-2 col-md-2 col-lg-2 lateral">
                                <div class="row">
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 lateralNavigation">
                                        <div class="lateralText">
                                            <h3>Vos travaux dans :</h3>
                                            <h2>l'Oise<span class="orange">.</span></h2>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 lateralNavigation">
                                        <p class="lateralText">Recherche par :</p>
                                        <ul class="lateralText">
                                            <li class="lateralList">Secteur</li>
                                            <li class="lateralList">Type de travaux</li>
                                            <li class="lateralList">Entreprise</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 lateralNavigation">
                                        <form action="/search" id="searchthis" method="get" class="searchLateral">
                                            <input class="searchLateral" name="q" type="text" placeholder="Rechercher" />
                                            <button type="button" class="btn btn-outline-warning searchLateral">Rechercher</button>
                                        </form>
                                    </div>
                                </div>
                            </div>-->
            <!-- A partir d'ici entrer le contenu -->