<?php
session_start();
include_once 'navbarSecondary.php';
require_once 'regex.php';
include_once 'models/database.php';
include_once 'models/particularUsers.php';
include_once 'models/city.php';
include_once 'models/company.php';
include_once 'models/photo.php';
include_once 'models/production.php';
include_once 'models/type.php';
include_once 'models/favoriteCompany.php';
include_once 'controllers/partUserCompanyCtrl.php';
$page = $_SERVER['PHP_SELF'];
?>
<!-- Début des col de remplissage --> 

<div class="w3-sidebar w3-bar-block w3-card w3-animate-left sideBarMenu" style="display:none" id="mySidebar">
    <button class="w3-bar-item slide-button w3-large slideMenuCloseBtn" onclick="slide_close()">Fermer le Menu &times;</button>
    <p><span class="orange">.</span>Recherches par :</p>
    <a href="/recherche-entreprise.html" class="w3-bar-item slide-button"><span class="orange">.</span>Entreprises</a>
    <a href="/recherche-travaux.html" class="w3-bar-item slide-button"><span class="orange">.</span>Réalisations</a>
    <a href="/recherche-secteur.html" class="w3-bar-item slide-button"><span class="orange">.</span>Secteurs</a>
    <p><span class="orange">.</span>Mon activité :</p>
    <a href="/estimate.php" class="w3-bar-item slide-button"><span class="orange">.</span>Mes devis</a>
    <a href="/userWorks.php" class="w3-bar-item slide-button"><span class="orange">.</span>Mes travaux</a>
    <a href="/userFavorites.php" class="w3-bar-item slide-button"><span class="orange">.</span>Mes favoris</a>
    <a href="/userContact.php" class="w3-bar-item slide-button"><span class="orange">.</span>Mes contacts</a>
    <p><a href="/mon-compte.html"><span class="orange">.</span>Mon compte</a></p>
</div>

<div id="main">

    <!-- Zone de test -->
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 firstCard">
            <h2><span class="orange">.</span>Recherche par entreprises :</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-12 offset-sm-4 col-sm-4 offset-md-4 col-md-4 offset-lg-4 col-lg-4">
            <form class="form-inline position-center" action="partUserCompany.php" method="GET">
                <label for="companySearch"><span class="orange">.</span>Rechercher une entreprise :</label>
                <input class="form-control mr-sm-2 searchNav" type="search" placeholder="Entreprise" name="companySearch" aria-label="Search" />
                <button class="btn btn-outline-warning hightBtn" type="submit">Rechercher</button>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-12 offset-sm-1 col-sm-10 offset-md-1 col-md-10 offset-lg-1 col-lg-10 firstCard">
            <div class="row">
                <?php if (!isset($_GET['companySearch'])) { ?>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 firstCard">
                        <h2><span class="orange">.</span>Entreprise mise en avant cette semaine :</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 firstCard">
                        <div class="card mb-3">
                            <div class="row no-gutters">
                                <div class="col-md-4">
                                    <img src="professionnal/<?= $getOneCompanyInformation->presentationPhoto ?>" class="card-img firstImg" title="Travaux de l'entreprise <?= $getOneCompanyInformation->name ?>" alt="Travaux de l'entreprise <?= $getOneCompanyInformation->name ?>">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h4 class="card-title">Entreprise <?= $getOneCompanyInformation->name ?></h4>
                                        <h3 class="card-title"><?= $getOneCompanyInformation->address ?>, <?= $getOneCompanyInformation->zipcode ?> <?= $getOneCompanyInformation->city ?></h3>
                                        <h3 class="card-title">Tel : <?= $getOneCompanyInformation->phoneNumber ?></h3>
                                        <h5 class="card-title">Entreprise gérée par monsieur <?= $getOneCompanyInformation->leader ?></h5>
                                        <button type="button" class="btn btn-outline-warning registrationBtn cardBtn" onclick="javascript:location.href = '/companyFromPartUser.php?id=<?= $getOneCompanyInformation->id ?>'">Voir plus</button>
                                        <div class="socialMedia">
                                            <a href="#" title="J'aime"><i class="fas fa-sun fa-2x"></i></a>
                                            <span><p></p></span>
                                            <a href="#" title="J'aime moins"><i class="fas fa-snowflake fa-2x"></i></a>
                                            <span><p></p></span>
                                            <i title="Ajouter aux favoris" class="far fa-plus-square fa-2x"></i>
                                            <span><p></p></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } else { ?>
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12 firstCard">
                        <h2><span class="orange">.</span>Résultat de votre recherche d'entreprise dont le nom comprend "<?= $_GET['companySearch'] ?>"</h2>
                    </div>
                </div>
                <div class="row secondCards">
                    <?php foreach ($companySearch as $smallProduction) { ?>
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="card mb-3">
                                <div class="row no-gutters">
                                    <div class="col-md-4">
                                        <img src="professionnal/<?= $smallProduction->presentationPhoto ?>" class="card-img firstImg" title="Présentation de l'entreprise <?= $smallProduction->name ?>" alt="Présentation de l'entreprise <?= $smallProduction->name ?>">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h4 class="card-title">Entreprise <?= $smallProduction->name ?></h4>
                                            <h3 class="card-title"><?= $smallProduction->address ?>, <?= $smallProduction->zipcode ?> <?= $smallProduction->city ?></h3>
                                            <h3 class="card-title">Tel : <?= $smallProduction->phoneNumber ?></h3>
                                            <h5 class="card-title">Entreprise gérée par monsieur <?= $smallProduction->leader ?></h5>
                                            <button type="button" class="btn btn-outline-warning registrationBtn cardBtn" onclick="javascript:location.href = '/companyFromPartUser.php?id=<?= $smallProduction->id ?>'">Voir plus</button>
                                            <div class="socialMedia">
                                                <a href="#" title="J'aime"><i class="fas fa-sun fa-2x"></i></a>
                                                <span><p></p></span>
                                                <a href="#" title="J'aime moins"><i class="fas fa-snowflake fa-2x"></i></a>
                                                <span><p></p></span>
                                                <a href="#" title="Ajouter aux favoris"><i class="far fa-plus-square fa-2x"></i></a>
                                                <span><p></p></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <button type="button" class="btn registrationBtn" onclick="history.go(-1)">Retour</button>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
<?php include_once 'footerSecondary.php'; ?>

