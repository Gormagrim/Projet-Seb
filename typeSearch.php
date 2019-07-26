<?php
session_start();
include_once 'navbarSecondary.php';
require_once 'models/database.php';
require_once 'models/city.php';
require_once 'models/company.php';
require_once 'models/production.php';
require_once 'models/category.php';
require_once 'controllers/typeSearchCtrl.php';
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
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 firstCard">
            <h2><span class="orange">.</span>Résultat de votre recherche de travaux de type <?= $getCategoryFromType->category ?> / <?= $production->type ?></h2>
        </div>
    </div>
    <div class="row secondCards" id="typeSearch">
        <?php foreach ($productionSearchByType as $smallProduction) { ?>
            <div class="col-12 col-sm-12 col-md-6 col-lg-6">
                <div class="card mb-3">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <img src="professionnal/<?= $smallProduction->photo ?>" class="card-img firstImg" title="Travaux de l'entreprise <?= $smallProduction->name ?> : <?= $smallProduction->description ?>" alt="Travaux de l'entreprise <?= $smallProduction->name ?> : <?= $smallProduction->description ?>">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h4 class="card-title"><?= $smallProduction->title ?></h4>
                                <h5 class="card-title">Chantier réalisé à <?= $smallProduction->city ?> (<?= $smallProduction->zipcode ?>) par l'entreprise <?= $smallProduction->name ?></h5>
                                <h5 class="card-title">De type : <?= $smallProduction->category ?> / <?= $smallProduction->type ?></h5>
                                <button type="button" class="btn btn-outline-warning registrationBtn cardBtn" onclick="javascript:location.href = '/productionDetail.php?id=<?= $smallProduction->id ?>'">Voir plus</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
    <button type="button" class="btn registrationBtn" onclick="history.go(-1)">Retour</button>
</div>
<?php
include_once 'footerSecondary.php';
?>