<?php
session_start();
include_once 'models/database.php';
include_once 'models/particularUsers.php';
include_once 'models/city.php';
include_once 'models/userGroup.php';
include_once 'controllers/particularUserCtrl.php';
include_once 'navbarSecondary.php';
?>
    <!-- Début Menu Slide --> 

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
        <!-- Zone de remplissage du menu Slide -->
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 topSite welcomePro">
                <h1>izi<span class="orange">.</span>travaux<span class="orange">.</span>com</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 welcomePro">
                <h2>Bienvenue sur votre espace personnel</h2>
                <h2><?= $particularUserInfo->firstname . ' ' . $particularUserInfo->lastname ?></h2>
            </div>
        </div>
    </div> <!-- Fin de div de remplissage du menu Slide -->
<?php include_once 'footerSecondary.php'; ?>

