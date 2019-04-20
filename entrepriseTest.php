<?php
include_once 'navbarSecondary.php';
include_once 'TestBaseDeDonnées.php';
include_once 'function.php';
?>
<!-- Début Menu Slide --> 

<div class="w3-sidebar w3-bar-block w3-card w3-animate-left sideBarMenu entreprise" style="display:none" id="mySidebar">
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

    <?= showCompany($entrepriseTest); ?>

</div>





















<?php include_once 'footerSecondary.php'; ?>
