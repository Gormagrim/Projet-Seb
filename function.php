<?php

function showBigCards($globalPortrait) { ?>
    <div class="col-12 col-sm-12 col-md-12 col-lg-12 firstCard">
        <div class="card mb-3">
            <div class="row no-gutters">
                <div class="col-md-4">
                    <img src="<?= $globalPortrait['productionImageOne'] ?>" class="card-img firstImg" title="Travaux de l'entreprise <?= $globalPortrait['companyName'] ?>" alt="Exemple de travaux">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h4 class="card-title"><?= $globalPortrait['companyName'] ?></h4>
                        <h5 class="card-title"><?= $globalPortrait['productionTitle'] ?></h5>
                        <p class="card-text"><?= $globalPortrait['productionDescription'] ?></p>
                        <button type="button" class="btn btn-outline-warning registrationBtn cardBtn" onclick="javascript:location.href = '/entrepriseTest.php'">Voir plus</button>
                        <div class="socialMedia">
                            <a href="#"><i class="fas fa-sun fa-2x" title="J'aime"></i></a>
                            <a href="#"><i class="fas fa-snowflake fa-2x" title="J'aime moins"></i></a>
                            <a href="#"><i class="far fa-plus-square fa-2x" title="Ajouter aux favoris"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
}

function showSmallCards($globalPortrait) {
    ?>
    <div class="col-12 col-sm-12 col-md-6 col-lg-6">
        <div class="card mb-3">
            <div class="row no-gutters">
                <div class="col-md-4">
                    <img src="<?= $globalPortrait['productionImageOne'] ?>" class="card-img firstImg" title="Travaux de l'entreprise <?= $globalPortrait['companyName'] ?>" alt="Exemple de travaux">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h4 class="card-title"><?= $globalPortrait['companyName'] ?></h4>
                        <h5 class="card-title"><?= $globalPortrait['productionTitle'] ?></h5>
                        <p class="card-text"><?= $globalPortrait['productionDescription'] ?></p>
                        <button type="button" class="btn btn-outline-warning registrationBtn cardBtn" onclick="javascript:location.href = '#'">Voir plus</button>
                        <div class="socialMedia">
                            <a href="#"><i class="fas fa-sun fa-2x" title="J'aime"></i></a>
                            <a href="#"><i class="fas fa-snowflake fa-2x" title="J'aime moins"></i></a>
                            <a href="#"><i class="far fa-plus-square fa-2x" title="Ajouter aux favoris"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
}

function showBigProductionCards($globalPortrait) {
    ?>
    <div class="col-12 col-sm-12 col-md-12 col-lg-12 firstCard">
        <div class="card mb-3">
            <div class="row no-gutters">
                <div class="col-md-4">
                    <img src="<?= $globalPortrait['productionImageOne'] ?>" class="card-img firstImg" title="Travaux de l'entreprise <?= $globalPortrait['companyName'] ?>" alt="Exemple de travaux">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h4 class="card-title"><?= $globalPortrait['productionTitle'] ?></h4>
                        <h5 class="card-title"><?= $globalPortrait['companyName'] ?></h5>
                        <p class="card-text"><?= $globalPortrait['productionDescription'] ?></p>
                        <button type="button" class="btn btn-outline-warning registrationBtn cardBtn" onclick="javascript:location.href = '#'">Voir plus</button>
                        <div class="socialMedia">
                            <a href="#"><i class="fas fa-sun fa-2x" title="J'aime"></i></a>
                            <a href="#"><i class="fas fa-snowflake fa-2x" title="J'aime moins"></i></a>
                            <a href="#"><i class="far fa-plus-square fa-2x" title="Ajouter aux favoris"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
}

function showSmallProductionCards($globalPortrait) {
    ?>
    <div class="col-12 col-sm-12 col-md-6 col-lg-6">
        <div class="card mb-3">
            <div class="row no-gutters">
                <div class="col-md-4">
                    <img src="<?= $globalPortrait['productionImageOne'] ?>" class="card-img firstImg" title="Travaux de l'entreprise <?= $globalPortrait['companyName'] ?>" alt="Exemple de travaux">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h4 class="card-title"><?= $globalPortrait['productionTitle'] ?></h4>
                        <h5 class="card-title"><?= $globalPortrait['companyName'] ?></h5>
                        <p class="card-text"><?= $globalPortrait['productionDescription'] ?></p>
                        <button type="button" class="btn btn-outline-warning registrationBtn cardBtn" onclick="javascript:location.href = '#'">Voir plus</button>
                        <div class="socialMedia">
                            <a href="#"><i class="fas fa-sun fa-2x" title="J'aime"></i></a>
                            <a href="#"><i class="fas fa-snowflake fa-2x" title="J'aime moins"></i></a>
                            <a href="#"><i class="far fa-plus-square fa-2x" title="Ajouter aux favoris"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
}

function showCompany($globalPortrait) {
    ?>
    <div class="row">
    <div class="bigCompanyCard col-12 offset-sm-2 col-sm-8 offset-md-2 col-md-8 offset-lg-2 col-lg-8">
        <div class="row">
            <div class="col-12 offset-sm-1 col-sm-10 offset-md-1 col-md-10 offset-lg-1 col-lg-10">
                <h2 class="companyCard"><?= $globalPortrait['companyName'] ?></h2>
            </div>
        </div>
         <div class="row">
            <div class="col-12 offset-sm-1 col-sm-10 offset-md-1 col-md-10 offset-lg-1 col-lg-10">
                <p class="companyCard">Photo du site :</p>
                <img class="companyCard" src="<?= $globalPortrait['companyPhoto'] ?>" class="card-img firstImg" title="Siège de l'entreprise <?= $globalPortrait['companyName'] ?>" alt="Exemple de travaux">
            </div>
        </div>
        <div class="row">
            <div class="col-12 offset-sm-1 col-sm-10 offset-md-1 col-md-10 offset-lg-1 col-lg-10">
                <p class="companyCard">Adresse : <?= $globalPortrait['companyAdress'] ?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-12 offset-sm-1 col-sm-10 offset-md-1 col-md-10 offset-lg-1 col-lg-10">
                <p class="companyCard">Ville : <?= $globalPortrait['companyCity'] ?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-12 offset-sm-1 col-sm-10 offset-md-1 col-md-10 offset-lg-1 col-lg-10">
                <p class="companyCard">Numéro de Sirret : <?= $globalPortrait['companySirret'] ?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-12 offset-sm-1 col-sm-10 offset-md-1 col-md-10 offset-lg-1 col-lg-10">
                <p class="companyCard">Nom du Dirigeant : <?= $globalPortrait['companyBoss'] ?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-12 offset-sm-1 col-sm-10 offset-md-1 col-md-10 offset-lg-1 col-lg-10">
                <p class="companyCard">Nombre d'employés : <?= $globalPortrait['companyNumberOfEmployer'] ?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-12 offset-sm-1 col-sm-10 offset-md-1 col-md-10 offset-lg-1 col-lg-10">
                <p class="companyCard">Nombre de réalisation sur le site : <?= $globalPortrait['companyRealisationNumber'] ?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-12 offset-sm-1 col-sm-10 offset-md-1 col-md-10 offset-lg-1 col-lg-10">
                <p class="companyCard">Nombre de "J'aime" : <?= $globalPortrait['companyLike'] ?></p>
            </div>
        </div>
        <div class="row">
        <div class="col-12 offset-sm-1 col-sm-10 offset-md-1 col-md-10 offset-lg-1 col-lg-10">
            <p class="companyCard">Nombre de "j'aime moins" : <?= $globalPortrait['companyDislike'] ?></p>
        </div>
    </div>
        <div class="row">
        <div class="col-12 offset-sm-1 col-sm-10 offset-md-1 col-md-10 offset-lg-1 col-lg-10">
            <p class="companyCard">Nombre de réalisation ajoutés en favori: <?= $globalPortrait['companyFavory'] ?></p>
        </div>
    </div>
    </div>
    </div>
<?php } ?>


