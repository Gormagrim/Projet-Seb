<?php
session_start();
include_once 'navbarSecondary.php';
require_once 'models/database.php';
require_once 'models/city.php';
require_once 'models/company.php';
require_once 'models/production.php';
require_once 'models/category.php';
require_once 'models/ouvrage.php';
require_once 'controllers/sectorSearchCtrl.php';
$concat = array(',', ' ');
?>

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
    <?php if (!isset($_GET['zipcodeSearch'])) { ?>
        <div class="row">
            <div class="bigCompanyCard col-12 offset-sm-1 col-sm-10 offset-md-1 col-md-10 offset-lg-1 col-lg-10 sectorSearch">
                <h2 class="sectorSearchMainTitle" id="topPage"><span class="orange">.</span>Recherche par secteur géographique ou par secteur d'activité :</h2>
                <div class="row">
                    <div class="col-12 offset-sm-3 col-sm-6 offset-md-3 col-md-6 offset-lg-3 col-lg-6">
                        <form class="form-inline position-center"  action="sectorSearch.php" method="GET">
                            <label for="zipcodeSearch"><span class="orange">.</span>Votre code postal :</label>
                            <input class="form-control mr-sm-2 searchNav" id="zipcodeSearch" name="zipcodeSearch" type="search" placeholder="60000" />
                            <button class="btn btn-outline-warning hightBtn" type="submit">Rechercher</button>
                        </form>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                        <p>Cliquez sur une titre pour afficher le menu</p>
                    </div>
                </div>
                <div class="row">
                    <?php foreach ($typeArray as $typeArrayKey => $oneOuvrage) { ?>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                    <h2 class="sectorSearchTitle" id="<?= str_replace($concat, '', $typeArrayKey) ?>"><span class="orange">.</span><?= $typeArrayKey ?></h2>
                                    <p class="reHideOne">(Masquer)</p>
                                </div>
                            </div>
                            <div class="row hideMenu">
                                <?php foreach ($oneOuvrage as $oneOuvrageKey => $CatOfOuvrage) { ?>
                                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 hideOne detail_<?= str_replace($concat, '', $typeArrayKey) ?>">
                                        <h5 class="searchMarg"  ><span class="orange">.</span><?= $oneOuvrageKey ?></h5>
                                        <ul>
                                            <?php foreach ($CatOfOuvrage as $CatOfOuvrageAndCat) { ?>
                                                <li><a class="dropdown-item" href="typeSearch.php?type=<?= $CatOfOuvrageAndCat ?>"><span class="orange">.</span><?= $CatOfOuvrageAndCat ?></a></li>
                                            <?php } ?>
                                        </ul>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    <?php } else { ?>
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 firstCard">
                <h2><span class="orange">.</span>Résultat de votre recherche pour le code postal "<?= $_GET['zipcodeSearch'] ?>"</h2>
            </div>
        </div>
        <div class="row secondCards">
            <?php foreach ($productionSearchByZipcode as $smallProduction) { ?>
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
        <?php
    }
    include_once 'footerSecondary.php';
    ?>
