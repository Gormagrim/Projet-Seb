<?php
session_start();
include_once 'navbarProfessionnal.php';
require_once '../regex.php';
include_once '../models/database.php';
include_once '../models/particularUsers.php';
include_once '../models/city.php';
include_once '../models/company.php';
include_once '../models/photo.php';
include_once '../models/production.php';
include_once '../models/type.php';
include_once '../models/likeProduction.php';
include_once '../models/dislikeProduction.php';
include_once '../models/favoriteProduction.php';
include_once '../controllers/professionnalProductionCtrl.php';
$page = $_SERVER['PHP_SELF'];
?>

<div class="col-12 offset-sm-1 col-sm-10 offset-md-1 col-md-10 offset-lg-1 col-lg-10 firstCard">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 firstCard">
            <h2><span class="orange">.</span>Vos chantiers sur izi<span class="orange">.</span>travaux<span class="orange">.</span>com :</h2>
        </div>
        <?php foreach ($getCompanyProductionInformation as $production) { ?>
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 firstCard">
                <div class="card mb-3">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                            <img src="<?= $production->photo ?>" class="card-img firstImg" title="Travaux de l'entreprise <?= $production->name ?> : <?= $production->description ?>" alt="Exemple de travaux" />
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <div class="socialMedia">
                                    <button type="button" class="btn btn-outline-warning registrationBtn cardBtn" onclick="javascript:location.href = 'professionnalProdDetail.php?id=<?= $production->id ?>'">Voir plus</button>
                                </div>
                                <h4 class="card-title"><?= $production->title ?></h4>
                                <h3 class="card-title">Entreprise <?= $production->name ?></h3>
                                <h5 class="card-title">Chantier réalisé à <?= $production->city ?> (<?= $production->zipcode ?>) de type : <?= $production->category ?> / <?= $production->type ?></h5>
                                <p class="card-text"><?= substr($production->descriptionText, 0, 400) ?></p>
                                <?php if ($page == '/userFavorites.php' || $page == '/partUserProduction.php') { ?>
                                    <button type="button" class="btn btn-outline-warning registrationBtn cardBtn" onclick="javascript:location.href = '/realisationTest.php'">Voir plus</button>
                                <?php } else { ?>
                                    <div class="row">
                                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 prodModif">
                                            <a href="/professionnal/downloadedFilesModify.php?id=<?= $production->id ?>"><i class="fas fa-edit fa-2x Usermodification" title="Modifier mon chantier"></i></a>
                                            <a href="/professionnal/deleteProduction.php?id=<?= $production->id ?>"><i class="fas fa-trash-alt fa-2x Usermodification" title="Supprimer mon chantier"></i></a>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
        <button type="button" class="btn registrationBtn" onclick="history.go(-1)">Retour</button>
    </div>
</div>

<?php include_once '../footerSecondary.php'; ?>
