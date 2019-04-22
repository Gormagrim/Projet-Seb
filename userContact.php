<?php
include_once 'navbarSecondary.php';
include_once 'TestBaseDeDonnées.php';
include_once 'function.php';
?>

<div class="w3-sidebar w3-bar-block w3-card w3-animate-left sideBarMenu entreprise" style="display:none" id="mySidebar">
    <button class="w3-bar-item w3-button w3-large slideMenuCloseBtn" onclick="w3_close()">Fermer le Menu &times;</button>
    <p><span class="orange">.</span>Recherches par :</p>
    <a href="/particularUser.php" class="w3-bar-item w3-button"><span class="orange">.</span>Entreprises</a>
    <a href="/partUserProduction.php" class="w3-bar-item w3-button noMargingTop"><span class="orange">.</span>Réalisations</a>
    <a href="/sectorSearch.php" class="w3-bar-item w3-button noMargingTop"><span class="orange">.</span>Secteurs</a>
    <p><span class="orange">.</span>Mon activité :</p>
    <a href="/estimate.php" class="w3-bar-item w3-button"><span class="orange">.</span>Mes devis</a>
    <a href="/userWorks.php" class="w3-bar-item w3-button"><span class="orange">.</span>Mes travaux</a>
    <a href="/userFavorites.php" class="w3-bar-item w3-button"><span class="orange">.</span>Mes favoris</a>
    <a href="/userContact.php" class="w3-bar-item w3-button"><span class="orange">.</span>Mes contacts</a>
    <p><a href="/userAccount.php"><span class="orange">.</span>Mon compte</a></p>
</div>
<div id="main">
    <div class="row">
        <div class="bigCompanyCard col-12 offset-sm-2 col-sm-8 offset-md-2 col-md-8 offset-lg-2 col-lg-8">
            <h2 class="estimateTitle"><span class="orange">.</span>Mes favoris</h2>
            <div class="row">
                <div class="col-12 offset-sm-1 col-sm-10 offset-md-1 col-md-10 offset-lg-1 col-lg-10 userEstimate">
                    <?= showSmallCompanyCards($entrepriseTest) ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include_once 'footerSecondary.php'; ?>
