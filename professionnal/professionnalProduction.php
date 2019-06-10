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
                            <img src="<?= $production->photo ?>" class="card-img firstImg" title="Travaux de l'entreprise <?= $production->name ?> : <?= $production->description ?>" alt="Exemple de travaux">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h4 class="card-title"><?= $production->title ?></h4>
                                <h3 class="card-title">Entreprise <?= $production->name ?></h3>
                                <h5 class="card-title">Chantier réalisé à <?= $production->city ?> (<?= $production->zipcode ?>) de type : <?= $production->category ?> / <?= $production->type ?></h5>
                                <p class="card-text"><?= $production->descriptionText ?></p>
                                <?php if ($page == '/userFavorites.php' || $page == '/partUserProduction.php') { ?>
                                    <button type="button" class="btn btn-outline-warning registrationBtn cardBtn" onclick="javascript:location.href = '/realisationTest.php'">Voir plus</button>
                                <?php } else { ?>
                                    <div class="row">
                                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 prodModif">
                                            <a href="/professionnal/downloadedFilesModify.php"><i class="fas fa-edit fa-2x Usermodification" title="Modifier mon chantier"></i></a>
                                            <a href="/professionnal/deleteProfessionnalUser.php"><i class="fas fa-trash-alt fa-2x Usermodification" title="Supprimer mon chantier"></i></a>
                                        </div>
                                    </div>
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
        <?php } ?>
    </div>
</div>

<?php include_once '../footerSecondary.php'; ?>
