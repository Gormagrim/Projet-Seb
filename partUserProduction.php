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
include_once 'controllers/partUserProductionCtrl.php';
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
                <h2><span class="orange">.</span>Recherche par type de chantiers :</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-12 offset-sm-4 col-sm-4 offset-md-4 col-md-4 offset-lg-4 col-lg-4">
                <form class="form-inline position-center" action="partUserProduction.php" method="GET">
                    <label for="productionSearch"><span class="orange">.</span>Rechercher un chantier:</label>
                    <input class="form-control mr-sm-2 searchNav" type="search" name="productionSearch" placeholder="Type de chantier" aria-label="Search">
                    <button class="btn btn-outline-warning hightBtn" type="submit">Rechercher</button>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-12 offset-sm-1 col-sm-10 offset-md-1 col-md-10 offset-lg-1 col-lg-10 firstCard">
                <?php if (!isset($_GET['productionSearch'])) { ?>
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 firstCard">
                            <h2><span class="orange">.</span>Chantier mis en avant cette semaine :</h2>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 firstCard">
                            <div class="card mb-3">
                                <div class="row no-gutters">
                                    <div class="col-md-4">
                                        <img src="professionnal/<?= $getOneProductionInformation->photo ?>" class="card-img firstImg" title="Travaux de l'entreprise <?= $getOneProductionInformation->name ?> : <?= $getOneProductionInformation->description ?>" alt="Travaux de l'entreprise <?= $getOneProductionInformation->name ?> : <?= $getOneProductionInformation->description ?>">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h4 class="card-title"><?= $getOneProductionInformation->title ?></h4>
                                            <h3 class="card-title">Entreprise <?= $getOneProductionInformation->name ?></h3>
                                            <h5 class="card-title">Chantier réalisé à <?= $getOneProductionInformation->city ?> (<?= $getOneProductionInformation->zipcode ?>) de type : <?= $getOneProductionInformation->category ?> / <?= $getOneProductionInformation->type ?></h5>
                                            <p class="card-text"><?= $getOneProductionInformation->descriptionText ?></p>
                                            <?php if ($page == '/userFavorites.php' || $page == '/partUserProduction.php') { ?>
                                                <button type="button" class="btn btn-outline-warning registrationBtn cardBtn" onclick="javascript:location.href = '/productionDetail.php?id=<?= $getOneProductionInformation->id ?>'">Voir plus</button>
                                            <?php } else { ?>
                                                <button type="button" class="btn btn-outline-warning registrationBtn cardBtn" onclick="javascript:location.href = '#'">Modifier</button>
                                            <?php } ?>
                                            <div class="socialMedia">
                                                <a href="#" title="J'aime"><i class="fas fa-sun fa-2x"></i></a>
                                                <span><p></p></span>
                                                <a href="#" title="J'aime moins"><i class="fas fa-snowflake fa-2x"></i></a>
                                                <span><p></p></span>
                                                <a href="#" title="Ajouter aux favoris"><i class="far fa-plus-square fa-2x"></i></a>
                                                <span><p></p></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } else { ?>
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 firstCard">
                            <h2><span class="orange">.</span>Résultat de votre recherche de réalisations dont le type comprend "<?= $_GET['productionSearch'] ?>"</h2>
                        </div>
                    </div>
                    <div class="row secondCards">
                        <?php foreach ($productionSearch as $smallProduction) { ?>
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
                                                <div class="socialMedia">
                                                    <a href="#" title="J'aime"><i class="fas fa-sun fa-2x"></i></a>
                                                    <span><p></p></span>
                                                    <a href="#" title="J'aime moins"><i class="fas fa-snowflake fa-2x"></i></a>
                                                    <span><p></p></span>
                                                    <a href="#" title="Ajouter aux favoris"><i class="far fa-plus-square fa-2x"></i></a>
                                                    <span><p></p></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <button type="button" class="btn registrationBtn" onclick="history.go(-1)">Retour</button>
                <?php } ?>
            </div>
        </div>
    </div>
</div>
<?php include_once 'footerSecondary.php'; ?>



