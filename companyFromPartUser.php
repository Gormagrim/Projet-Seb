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
include_once 'models/company.php';
include_once 'models/production.php';
include_once 'models/likeCompany.php';
include_once 'models/dislikeCompany.php';
include_once 'models/favoriteCompany.php';
include_once 'controllers/companyFromPartUserCtrl.php';
?>
<!-- Début Menu Slide --> 

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
        <div class="bigCompanyCard col-12 offset-sm-2 col-sm-8 offset-md-2 col-md-8 offset-lg-2 col-lg-8">
            <div class="row media"> 
                <div class="media">
                    <i title="<?= $checkLikeCompany->number == 1 ? 'J\'aime déjà' : 'J\'aime' ?>" id="companyLike_<?= $getCompanyInformation->id ?>" data-companyLike ="<?= $getCompanyInformation->id ?>" class="fas fa-sun fa-2x likeCompany <?= $checkLikeCompany->number == 1 ? 'likedCompany' : '' ?> likeComp"></i>
                    <span class="badge badge-primary badge-pill <?= $checkLikeCompany->number == 1 ? 'likedCompanySpan' : '' ?>"><?= $numberOfCompanyLike->likeNumber ?></span>
                    <i title="<?= $checkDislikeCompany->number == 1 ? 'J\'aime moins...' : 'J\'aime moins' ?>" id="companyDislike_<?= $getCompanyInformation->id ?>" data-companyDislike ="<?= $getCompanyInformation->id ?>" class="fas fa-snowflake fa-2x dislikeCompany <?= $checkDislikeCompany->number == 1 ? 'dislikedCompany' : '' ?> dislikeComp"></i>
                    <span class="badge badge-primary badge-pill <?= $checkDislikeCompany->number == 1 ? 'dislikedCompanySpan' : '' ?>"><?= $numberOfCompanyDislike->likeNumber ?></span>
                    <i title="<?= $checkFavoriteCompany->number == 1 ? 'Déjà favoris' : 'Ajouter à mes favoris' ?>" id="placeFavoriteCompany_<?= $getCompanyInformation->id ?>" data-favoriteCompany="<?= $getCompanyInformation->id ?>" class="far fa-plus-square fa-2x favoriteCompany <?= $checkFavoriteCompany->number == 1 ? 'isFavoriteComp' : '' ?> addFavoriteComp"></i>
                    <span class="badge badge-primary badge-pill <?= $checkFavoriteCompany->number == 1 ? 'isFavoriteCompSpan' : '' ?>"><?= $numberOfCompanyFavorite->likeNumber ?></span>
                </div>
            </div>
            <div class="row">
                <div class="col-12 offset-sm-1 col-sm-10 offset-md-1 col-md-10 offset-lg-1 col-lg-10">
                    <h2 class="companyCard">Entreprise <?= $getCompanyInformation->name ?></h2>
                </div>
            </div>
            <div class="row">
                <div class="col-12 offset-sm-1 col-sm-5 offset-md-1 col-md-5 offset-lg-1 col-lg-5">
                    <p class="companyCard"><span class="orange">.</span><span class="accountDetails">Nom du Dirigeant :</span> Monsieur <?= $getCompanyInformation->leader ?></p>
                </div>
            </div>
            <?php if (isset($getCompanyInformation->presentationPhoto)) { ?>
                <div class="row">
                    <div class="col-12 offset-sm-1 col-sm-9 offset-md-1 col-md-9 offset-lg-1 col-lg-9 userIdentity companyPhoto">
                        <img class="companyCard" src="/professionnal/<?= $getCompanyInformation->presentationPhoto ?>" class="card-img firstImg" title="Siège de l'entreprise <?= $getCompanyInformation->name ?>" alt="Siège de l'entreprise <?= $getCompanyInformation->name ?>" />
                    </div>
                </div>
            <?php } ?>
            <div class="row">
                <div class="col-12 offset-sm-1 col-sm-5 offset-md-1 col-md-5 offset-lg-1 col-lg-5">
                    <p class="companyCard"><span class="orange">.</span><span class="accountDetails">Adresse :</span> <?= $getCompanyInformation->address ?></p>
                </div>
                <div class="col-12 col-sm-5 col-md-5 col-lg-5">
                    <p class="companyCard"><span class="orange">.</span><span class="accountDetails">Ville :</span> <?= $getCompanyInformation->zipcode ?> <?= $getCompanyInformation->city ?></p>
                </div>
            </div>
            <div class="row">
                <div class="col-12 offset-sm-1 col-sm-5 offset-md-1 col-md-5 offset-lg-1 col-lg-5">
                    <p class="companyCard"><span class="orange">.</span><span class="accountDetails">Numéro de téléphone :</span> <?= $getCompanyInformation->phoneNumber ?></p>
                </div>
                <div class="col-12 col-sm-5 col-md-5 col-lg-5">
                    <p class="companyCard"><span class="orange">.</span><span class="accountDetails">Numéro de Sirret :</span> <?= $getCompanyInformation->siret ?></p>
                </div>
            </div>
            <div class="row"> 
                <div class="col-12 offset-sm-1 col-sm-5 offset-md-1 col-md-5 offset-lg-1 col-lg-5">
                    <p class="companyCard"><span class="orange">.</span><span class="accountDetails">Nombre d'employés :</span> <?= $getCompanyInformation->numberOfEmploy ?></p>
                </div>
                <div class="col-12 col-sm-5 col-md-5 col-lg-5">
                    <p class="companyCard"><span class="orange">.</span><span class="accountDetails">Nombre de réalisation sur le site :</span> <?= $checkProductionNumber->number ?></p>
                </div>
            </div>
            <div class="row"> 
                <div class="col-12 offset-sm-1 col-sm-5 offset-md-1 col-md-5 offset-lg-1 col-lg-5">
                    <a class="production" href="/companyProduction.php?id=<?= $_GET['id'] ?>">Voir les chantiers de cette entreprise</a>
                </div>
            </div>
            <button type="button" class="btn registrationBtn" onclick="history.go(-1)">Retour</button>
        </div>
    </div>
</div>

<?php include_once 'footerSecondary.php'; ?>
