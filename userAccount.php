<?php
session_start();
include_once 'models/database.php';
include_once 'models/particularUsers.php';
include_once 'controllers/particularUserCtrl.php';
include_once 'controllers/deleteUserCtrl.php';
include_once 'navbarSecondary.php';
include_once 'TestBaseDeDonnées.php';
include_once 'function.php';
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
        <div class="bigCompanyCard offset-1 col-10 offset-sm-2 col-sm-8 offset-md-2 col-md-8 offset-lg-2 col-lg-8 userCards">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 userIdentity">
                    <a href="/modifier-mon-compte.html"><i class="fas fa-user-edit fa-2x Usermodification" title="Modifier mes infos"></i></a>
                    <a href="/desactiver-mon-compte.html"><i class="fas fa-user-slash fa-2x Usermodification" title="Desactiver mon compte"></i></a>
                </div>
            </div>
            <div class="row">
                <div class="col-12 offset-sm-1 col-sm-10 offset-md-1 col-md-10 offset-lg-1 col-lg-10 userIdentity">
                    <h2 class="companyCard"><?= $particularUserInfo->firstname ?> <?= $particularUserInfo->lastname ?></h2>
                </div>
            </div>
            <div class="row">
                <div class="col-12 offset-sm-1 col-sm-10 offset-md-1 col-md-10 offset-lg-1 col-lg-10 userIdentity">
                    <p class="companyCard"><span class="orange">.</span>Compte <?= $particularUserInfo->type ?></p>
                </div>
            </div>
            <div class="row">
                <div class="col-12 offset-sm-1 col-sm-5 offset-md-1 col-md-5 offset-lg-1 col-lg-5">
                    <p class="companyCard"><span class="orange">.</span><span class="accountDetails">Adresse :</span> <span class="orangeText"><?= $particularUserInfo->address ?></span></p>
                </div>
                <div class="col-12 col-sm-5 col-md-5 col-lg-5">
                    <p class="companyCard"><span class="orange">.</span><span class="accountDetails">Ville :</span> <span class="orangeText"><?= $particularUserInfo->zipcode . ' ' . $particularUserInfo->city ?></span></p>
                </div>
            </div>
            <div class="row">
                <div class="col-12 offset-sm-1 col-sm-5 offset-md-1 col-md-5 offset-lg-1 col-lg-5">
                    <p class="companyCard"><span class="orange">.</span><span class="accountDetails">Numéro de téléphone :</span> <span class="orangeText"><?= $particularUserInfo->phoneNumber ?></span></p>
                </div>
                <div class="col-12 col-sm-5 col-md-5 col-lg-5">
                    <p class="companyCard"><span class="orange">.</span><span class="accountDetails">Adresse mail :</span> <span class="orangeText"><?= $particularUserInfo->mail ?></span></p>
                </div>
            </div>

            <div class="row">
                <div class="col-12 offset-sm-1 col-sm-10 offset-md-1 col-md-10 offset-lg-1 col-lg-10">
                    <p class="companyCard"><a href="/estimate.php"><span class="orange">.</span><span class="accountDetails">Mes devis</span></a></p>
                </div>
            </div>
            <div class="row">
                <div class="col-12 offset-sm-1 col-sm-10 offset-md-1 col-md-10 offset-lg-1 col-lg-10">
                    <p class="companyCard"><a href="/userWorks.php"><span class="orange">.</span><span class="accountDetails">Mes travaux</span></a></p>
                </div>
            </div>
            <div class="row">
                <div class="col-12 offset-sm-1 col-sm-10 offset-md-1 col-md-10 offset-lg-1 col-lg-10">
                    <p class="companyCard"><a href="/userFavorites.php"><span class="orange">.</span><span class="accountDetails">Mes favoris</span></a></p>
                </div>
            </div>
            <div class="row">
                <div class="col-12 offset-sm-1 col-sm-10 offset-md-1 col-md-10 offset-lg-1 col-lg-10">
                    <p class="companyCard"><a href="/userContact.php"><span class="orange">.</span><span class="accountDetails">Mes contacts</span></a</p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once 'footerSecondary.php'; ?>
