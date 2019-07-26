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
include_once 'models/dislikeProduction.php';
include_once 'models/likeProduction.php';
include_once 'models/favoriteProduction.php';
include_once 'controllers/productionDetailCtrl.php';
$page = $_SERVER['PHP_SELF'];
?>

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
    <div class="row">
        <div class="bigCompanyCard col-12 offset-sm-2 col-sm-8 offset-md-2 col-md-8 offset-lg-2 col-lg-8 userCards">
            <div class="row">
                <div class="col-12 offset-sm-1 col-sm-10 offset-md-1 col-md-10 offset-lg-1 col-lg-10">
                    <h2><span class="orange">.</span>Entreprise <?= $getProductionInformation->name ?></h2>
                </div>
            </div>
            <div class="row">
                <div class="col-12 offset-sm-1 col-sm-10 offset-md-1 col-md-10 offset-lg-1 col-lg-10 realisation">
                    <h3><span class="orange">.</span>Chantier de <?= $getProductionInformation->category ?> / <?= $getProductionInformation->type ?> à <?= $getProductionInformation->city ?> (<?= $getProductionInformation->zipcode ?>)</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-12 offset-sm-1 col-sm-10 offset-md-1 col-md-10 offset-lg-1 col-lg-10">
                    <h2><span class="orange">.</span><?= $getProductionInformation->title ?></h2>
                </div>
            </div>
            <div class="bd-example">
                <img src="professionnal/<?= $getProductionInformation->photo ?>" class="d-block w-100" alt="<?= $getProductionInformation->description ?>" title="<?= $getProductionInformation->description ?>">
            </div>
            <div class="row">
                <div class="col-12 offset-sm-1 col-sm-10 offset-md-1 col-md-10 offset-lg-1 col-lg-10 realisationText">
                    <p><span class="orange">.</span><span class="accountDetails">Descriptif des travaux réalisés : </span><br /><br /><?= $getProductionInformation->descriptionText ?></p>
                </div>
            </div>
            <div class="media">
                <i title="<?= $checkLikeProduction->number == 1 ? 'J\'aime déjà' : 'J\'aime' ?>" id="placeLike_<?= $getProductionInformation->id ?>" data-like ="<?= $getProductionInformation->id ?>" class="fas fa-sun fa-2x likeProduction <?= $checkLikeProduction->number == 1 ? 'likedProduction' : '' ?> likeIcon"></i>
                <span class="badge badge-primary badge-pill <?= $checkLikeProduction->number == 1 ? 'likedProductionSpan' : '' ?>"><?= $numberOfLike->likeNumber ?></span>
                <i title="<?= $checkDislikeProduction->number == 1 ? 'J\'aime moins...' : 'J\'aime moins' ?>" id="placeDislike_<?= $getProductionInformation->id ?>" data-dislike="<?= $getProductionInformation->id ?>" class="fas fa-snowflake fa-2x dislikeProduction <?= $checkDislikeProduction->number == 1 ? 'dislikedProduction' : '' ?> dislikeIcon"></i>
                <span class="badge badge-primary badge-pill <?= $checkDislikeProduction->number == 1 ? 'dislikedProductionSpan' : '' ?>"><?= $numberOfDislike->number ?></span>
                <i title="<?= $checkFavoriteProduction->number == 1 ? 'Déjà favoris' : 'Ajouter à mes favoris' ?>" id="placeFavorite_<?= $getProductionInformation->id ?>" data-favorite="<?= $getProductionInformation->id ?>" class="far fa-plus-square fa-2x <?= $checkFavoriteProduction->number == 1 ? 'isFavorite' : '' ?> addFavorite"></i>
                <span class="badge badge-primary badge-pill <?= $checkFavoriteProduction->number == 1 ? 'isFavoriteSpan' : '' ?>"><?= $numberOfFavorite->number ?></span>
            </div>
            <button type="button" class="btn registrationBtn" onclick="history.go(-1)">Retour</button>
        </div>
    </div>
</div>

<?php include_once 'footerSecondary.php'; ?>
