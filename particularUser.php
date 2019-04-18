<?php
include_once 'navbarSecondary.php';
include_once 'TestBaseDeDonnées.php';
include_once 'function.php';
?>
<div class="row">
    <!-- Début Menu Slide --> 

    <div class="w3-sidebar w3-bar-block w3-card w3-animate-left sideBarMenu" style="display:none" id="mySidebar">
        <button class="w3-bar-item w3-button w3-large slideMenuCloseBtn" onclick="w3_close()">Fermer le Menu &times;</button>
        <p><span class="orange">.</span>Recherches par :</p>
        <a href="/particularUser.php" class="w3-bar-item w3-button"><span class="orange">.</span>Entreprises</a>
        <a href="/partUserProduction.php" class="w3-bar-item w3-button noMargingTop"><span class="orange">.</span>Réalisations</a>
        <a href="#" class="w3-bar-item w3-button noMargingTop"><span class="orange">.</span>Secteurs</a>
        <p><span class="orange">.</span>Mon activité :</p>
        <a href="#" class="w3-bar-item w3-button"><span class="orange">.</span>Mes devis</a>
        <a href="#" class="w3-bar-item w3-button"><span class="orange">.</span>Mes travaux</a>
        <a href="#" class="w3-bar-item w3-button"><span class="orange">.</span>Mes favoris</a>
        <a href="#" class="w3-bar-item w3-button"><span class="orange">.</span>Mes contacts</a>
        <p><a href="#"><span class="orange">.</span>Mon compte</a></p>
    </div>
    <div id="main">
        <!-- Zone de remplissage du menu Slide -->
        <div class="col-12 offset-sm-1 col-sm-10 offset-md-1 col-md-10 offset-lg-1 col-lg-10 firstCard">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 firstCard">
                    <h2>Les entreprises ayant fait "votre exemple de réalisation" :</h2>
                </div>
                <?= showBigCards($productionArray) ?>
            </div>
            <div class="row secondCards">
                <?= showSmallCards($productionArray2) ?>
                <?= showSmallCards($productionArray3) ?>
                <?= showSmallCards($productionArray4) ?>
                <?= showSmallCards($productionArray5) ?>
                <?= showSmallCards($productionArray6) ?>
            </div>
        </div>
    </div> <!-- Fin de div de remplissage du menu Slide -->
</div>
<!-- A partir d'ici entrer le contenu -->
<?php include_once 'footerSecondary.php'; ?>

