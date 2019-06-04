<?php 
session_start();
include_once 'navbarSecondary.php'; 
include_once 'TestBaseDeDonnées.php';
include_once 'function.php';
$page = $_SERVER['PHP_SELF'];
?>

<div class="row">
    <!-- Début des col de remplissage --> 

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

        <!-- Zone de test -->
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 firstCard">
                <h2><span class="orange">.</span>Recherche par type de réalisation :</h2>
            </div>
            <div class="col-12 offset-sm-4 col-sm-4 offset-md-4 col-md-4 offset-lg-4 col-lg-4">
                <label for="zipCode"><span class="orange">.</span>Rechercher une réalisation :</label>
                <form class="form-inline position-center">
                    <input class="form-control mr-sm-2 searchNav" type="search" placeholder="Réalisation" aria-label="Search">
                    <button class="btn btn-outline-warning hightBtn" type="submit">Rechercher</button>
                </form>
            </div>
        </div>
        <div class="col-12 offset-sm-1 col-sm-10 offset-md-1 col-md-10 offset-lg-1 col-lg-10 firstCard">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 firstCard">
                    <h2><span class="orange">.</span>Réalisations mises en avant cette semaine :</h2>
                </div>
           </div>
            <div class="row">
                <?= showBigProductionCards($productionArray) ?>
            </div>
            <div class="row secondCards">
                <?= showSmallProductionCards($productionArray2) ?>
                <?= showSmallProductionCards($productionArray3) ?>
                <?= showSmallProductionCards($productionArray4) ?>
                <?= showSmallProductionCards($productionArray5) ?>
                <?= showSmallProductionCards($productionArray6) ?>
            </div>
        </div>
    </div>
</div>
<?php include_once 'footerSecondary.php'; ?>

