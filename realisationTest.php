<?php
session_start();
include_once 'navbarSecondary.php';
include_once 'TestBaseDeDonnées.php';
include_once 'function.php';
?>

<div class="w3-sidebar w3-bar-block w3-card w3-animate-left sideBarMenu" style="display:none" id="mySidebar">
    <button class="w3-bar-item slide-button w3-large slideMenuCloseBtn" onclick="slide_close()">Fermer le Menu &times;</button>
    <p><span class="orange">.</span>Recherches par :</p>
    <a href="/partUserCompany.php" class="w3-bar-item slide-button"><span class="orange">.</span>Entreprises</a>
    <a href="/partUserProduction.php" class="w3-bar-item slide-button"><span class="orange">.</span>Réalisations</a>
    <a href="/sectorSearch.php" class="w3-bar-item slide-button"><span class="orange">.</span>Secteurs</a>
    <p><span class="orange">.</span>Mon activité :</p>
    <a href="/estimate.php" class="w3-bar-item slide-button"><span class="orange">.</span>Mes devis</a>
    <a href="/userWorks.php" class="w3-bar-item slide-button"><span class="orange">.</span>Mes travaux</a>
    <a href="/userFavorites.php" class="w3-bar-item slide-button"><span class="orange">.</span>Mes favoris</a>
    <a href="/userContact.php" class="w3-bar-item slide-button"><span class="orange">.</span>Mes contacts</a>
    <p><a href="/userAccount.php"><span class="orange">.</span>Mon compte</a></p>
</div>
<div id="main">
    <div class="row">
        <div class="bigCompanyCard col-12 offset-sm-2 col-sm-8 offset-md-2 col-md-8 offset-lg-2 col-lg-8 userCards">
            <div class="row">
                <div class="col-12 offset-sm-1 col-sm-10 offset-md-1 col-md-10 offset-lg-1 col-lg-10">
                    <h2><span class="orange">.</span><?= $globalPortrait['companyName'] ?></h2>
                </div>
            </div>
            <div class="row">
                <div class="col-12 offset-sm-1 col-sm-10 offset-md-1 col-md-10 offset-lg-1 col-lg-10 realisation">
                    <h3><span class="orange">.</span>Chantier de <?= $globalPortrait['realisationType'] ?> à <?= $globalPortrait['realisationCity'] ?></h3>
                </div>
            </div>
            <div class="bd-example">
                <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                        <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="<?= $globalPortrait['realisationPhoto'] ?>" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5><?= $globalPortrait['titlePhoto'] ?></h5>
                                <p><?= $globalPortrait['textePhoto'] ?></p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="<?= $globalPortrait['realisationPhotoTwo'] ?>" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5><?= $globalPortrait['titlePhotoTwo'] ?></h5>
                                <p><?= $globalPortrait['textePhotoTwo'] ?></p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="<?= $globalPortrait['realisationPhotoThree'] ?>" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5><?= $globalPortrait['titlePhotoThree'] ?></h5>
                                <p><?= $globalPortrait['textePhotoThree'] ?></p>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-12 offset-sm-1 col-sm-10 offset-md-1 col-md-10 offset-lg-1 col-lg-10 realisationText">
                    <p><span class="orange">.</span>Descriptif des travaux réalisés : <br /><?= $globalPortrait['realisationText'] ?></p>
                </div>
            </div>
            <div class="socialMedia">
                <a href="#" title="J'aime"><i class="fas fa-sun fa-2x"></i></a>
                <span><p><?= $globalPortrait['realisationLike'] ?></p></span>
                <a href="#" title="J'aime moins"><i class="fas fa-snowflake fa-2x"></i></a>
                <span><p><?= $globalPortrait['realisationDislike'] ?></p></span>
                <a href="#" title="Ajouter aux favoris"><i class="far fa-plus-square fa-2x"></i></a>
                <span><p><?= $globalPortrait['realisationFavory'] ?></p></span>
            </div>
        </div>
    </div>
</div>

<?php include_once 'footerSecondary.php'; ?>
