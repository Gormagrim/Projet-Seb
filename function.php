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
                            <span><p><?= $globalPortrait['realisationLike'] ?></p></span>
                            <a href="#"><i class="fas fa-snowflake fa-2x" title="J'aime moins"></i></a>
                            <span><p><?= $globalPortrait['realisationDislike'] ?></p></span>
                            <a href="#"><i class="far fa-plus-square fa-2x" title="Ajouter aux favoris"></i></a>
                            <span><p><?= $globalPortrait['realisationFavory'] ?></p></span>
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
                            <span><p><?= $globalPortrait['realisationLike'] ?></p></span>
                            <a href="#"><i class="fas fa-snowflake fa-2x" title="J'aime moins"></i></a>
                            <span><p><?= $globalPortrait['realisationDislike'] ?></p></span>
                            <a href="#"><i class="far fa-plus-square fa-2x" title="Ajouter aux favoris"></i></a>
                            <span><p><?= $globalPortrait['realisationFavory'] ?></p></span>
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
                        <button type="button" class="btn btn-outline-warning registrationBtn cardBtn" onclick="javascript:location.href = '/realisationTest.php'">Voir plus</button>
                        <div class="socialMedia">
                            <a href="#"><i class="fas fa-sun fa-2x" title="J'aime"></i></a>
                            <span><p><?= $globalPortrait['realisationLike'] ?></p></span>
                            <a href="#"><i class="fas fa-snowflake fa-2x" title="J'aime moins"></i></a>
                            <span><p><?= $globalPortrait['realisationDislike'] ?></p></span>
                            <a href="#"><i class="far fa-plus-square fa-2x" title="Ajouter aux favoris"></i></a>
                            <span><p><?= $globalPortrait['realisationFavory'] ?></p></span>
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
                            <span><p><?= $globalPortrait['realisationLike'] ?></p></span>
                            <a href="#"><i class="fas fa-snowflake fa-2x" title="J'aime moins"></i></a>
                            <span><p><?= $globalPortrait['realisationDislike'] ?></p></span>
                            <a href="#"><i class="far fa-plus-square fa-2x" title="Ajouter aux favoris"></i></a>
                            <span><p><?= $globalPortrait['realisationFavory'] ?></p></span>
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
                <div class="col-12 offset-sm-1 col-sm-5 offset-md-1 col-md-5 offset-lg-1 col-lg-5">
                    <p class="companyCard">Nom du Dirigeant : <?= $globalPortrait['companyBoss'] ?></p>
                </div>
            </div>
            <div class="row">
                <div class="col-12 offset-sm-1 col-sm-9 offset-md-1 col-md-9 offset-lg-1 col-lg-9 userIdentity companyPhoto">
                    <img class="companyCard" src="<?= $globalPortrait['companyPhoto'] ?>" class="card-img firstImg" title="Siège de l'entreprise <?= $globalPortrait['companyName'] ?>" alt="Exemple de travaux">
                </div>
            </div>
            <div class="row">
                <div class="col-12 offset-sm-1 col-sm-5 offset-md-1 col-md-5 offset-lg-1 col-lg-5">
                    <p class="companyCard">Adresse : <?= $globalPortrait['companyAddress'] ?></p>
                </div>
                <div class="col-12 col-sm-5 col-md-5 col-lg-5">
                    <p class="companyCard">Ville : <?= $globalPortrait['companyCity'] ?></p>
                </div>
            </div>
            <div class="row">
                <div class="col-12 offset-sm-1 col-sm-5 offset-md-1 col-md-5 offset-lg-1 col-lg-5">
                    <p class="companyCard">Numéro de téléphone : <?= $globalPortrait['companyPhoneNumber'] ?></p>
                </div>
                <div class="col-12 col-sm-5 col-md-5 col-lg-5">
                    <p class="companyCard">Numéro de Sirret : <?= $globalPortrait['companySirret'] ?></p>
                </div>
            </div>
            <div class="row"> 
                <div class="col-12 offset-sm-1 col-sm-5 offset-md-1 col-md-5 offset-lg-1 col-lg-5">
                    <p class="companyCard">Nombre d'employés : <?= $globalPortrait['companyNumberOfEmployer'] ?></p>
                </div>
                <div class="col-12 col-sm-5 col-md-5 col-lg-5">
                    <p class="companyCard">Nombre de "J'aime" : <?= $globalPortrait['companyLike'] ?></p>
                </div>
            </div>
            <div class="row">
                <div class="col-12 offset-sm-1 col-sm-5 offset-md-1 col-md-5 offset-lg-1 col-lg-5">
                    <p class="companyCard">Nombre de "j'aime moins" : <?= $globalPortrait['companyDislike'] ?></p>
                </div>
                <div class="col-12 col-sm-5 col-md-5 col-lg-5">
                    <p class="companyCard">Nombre de réalisation sur le site : <?= $globalPortrait['companyRealisationNumber'] ?></p>
                </div>
            </div>
            <div class="row mediaLike"> 
                <div class="col-12 offset-sm-1 col-sm-5 offset-md-1 col-md-5 offset-lg-1 col-lg-5">
                    <p class="companyCard">Nombre de réalisation ajoutés en favori: <?= $globalPortrait['companyFavory'] ?></p>
                </div>
            </div>
            <div class="socialMedia">
                <a href="#"><i class="fas fa-sun fa-2x" title="J'aime"></i></a>
                <span><p><?= $globalPortrait['companyLike'] ?></p></span>
                <a href="#"><i class="fas fa-snowflake fa-2x" title="J'aime moins"></i></a>
                <span><p><?= $globalPortrait['companyDislike'] ?></p></span>
                <a href="#"><i class="far fa-plus-square fa-2x" title="Ajouter aux favoris"></i></a>
                <span><p><?= $globalPortrait['companyFavory'] ?></p></span>
            </div>
        </div>
    </div>
    <?php
}

function showUser($globalPortrait) {
    ?>
    <div class="row">
        <div class="bigCompanyCard col-12 offset-sm-2 col-sm-8 offset-md-2 col-md-8 offset-lg-2 col-lg-8 userCards">
            <a href="#"><i class="fas fa-user-edit fa-2x Usermodification" title="Modifier mes infos"></i></a>
            <div class="row">
                <div class="col-12 offset-sm-1 col-sm-10 offset-md-1 col-md-10 offset-lg-1 col-lg-10 userIdentity">
                    <i class="fas fa-user-circle fa-9x userIcon"></i>
                    <h2 class="companyCard"><?= $globalPortrait['userFirstname'] ?> <?= $globalPortrait['userLastname'] ?></h2>
                </div>
            </div>
            <div class="row">
                <div class="col-12 offset-sm-1 col-sm-5 offset-md-1 col-md-5 offset-lg-1 col-lg-5">
                    <p class="companyCard">Adresse : <?= $globalPortrait['userAddress'] ?></p>
                </div>
                <div class="col-12 col-sm-5 col-md-5 col-lg-5">
                    <p class="companyCard">Ville : <?= $globalPortrait['userCity'] ?></p>
                </div>
            </div>
            <div class="row">
                <div class="col-12 offset-sm-1 col-sm-5 offset-md-1 col-md-5 offset-lg-1 col-lg-5">
                    <p class="companyCard">Numéro de téléphone : <?= $globalPortrait['userPhoneNumber'] ?></p>
                </div>
                <div class="col-12 col-sm-5 col-md-5 col-lg-5">
                    <p class="companyCard">Nombre de réalisation ajoutés en favori: <?= $globalPortrait['userFavory'] ?></p>
                </div>
            </div>
            <div class="row phone">
                <div class="col-12 offset-sm-1 col-sm-5 offset-md-1 col-md-5 offset-lg-1 col-lg-5">
                    <p class="companyCard">Nombre de "J'aime" : <?= $globalPortrait['userLike'] ?></p>
                </div>
                <div class="col-12 col-sm-5 col-md-5 col-lg-5">
                    <p class="companyCard">Nombre de "j'aime moins" : <?= $globalPortrait['userDislike'] ?></p>
                </div>
            </div>
            <div class="row">
                <div class="col-12 offset-sm-1 col-sm-10 offset-md-1 col-md-10 offset-lg-1 col-lg-10">
                    <p class="companyCard"><a href="/estimate.php"><span class="orange">.</span>Mes devis</a></p>
                </div>
            </div>
            <div class="row">
                <div class="col-12 offset-sm-1 col-sm-10 offset-md-1 col-md-10 offset-lg-1 col-lg-10">
                    <p class="companyCard"><a href="/userWorks.php"><span class="orange">.</span>Mes travaux</a></p>
                </div>
            </div>
            <div class="row">
                <div class="col-12 offset-sm-1 col-sm-10 offset-md-1 col-md-10 offset-lg-1 col-lg-10">
                    <p class="companyCard"><a href="/userFavorites.php"><span class="orange">.</span>Mes favoris</a></p>
                </div>
            </div>
            <div class="row">
                <div class="col-12 offset-sm-1 col-sm-10 offset-md-1 col-md-10 offset-lg-1 col-lg-10">
                    <p class="companyCard"><a href="/userContact.php"><span class="orange">.</span>Mes contacts: </a</p>
                </div>
            </div>
        </div>
    </div>
    <?php
}

function showSmallCompanyCards($globalPortrait) {
    ?>
    <div class="col-12 col-sm-12 col-md-6 col-lg-6">
        <div class="card mb-3">
            <div class="row no-gutters">
                <div class="col-md-4">
                    <img src="<?= $globalPortrait['companyPhoto'] ?>" class="card-img firstImg" title="Travaux de l'entreprise <?= $globalPortrait['companyName'] ?>" alt="Exemple de travaux">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h4 class="card-title"><?= $globalPortrait['companyName'] ?></h4>
                        <h5 class="card-title"><?= $globalPortrait['companyBoss'] ?></h5>
                        <h5 class="card-title"><?= $globalPortrait['companyAdress'] ?> <?= $globalPortrait['companyCity'] ?></h5>
                        <h5 class="card-title"><?= $globalPortrait['companyPhoneNumber'] ?></h5>
                        <button type="button" class="btn btn-outline-warning registrationBtn cardBtn" onclick="javascript:location.href = '#'">Voir plus</button>
                    </div>
                </div>
            </div>
            <div class="socialMedia">
                <a href="#"><i class="fas fa-sun fa-2x" title="J'aime"></i></a>
                <span><p><?= $globalPortrait['realisationLike'] ?></p></span>
                <a href="#"><i class="fas fa-snowflake fa-2x" title="J'aime moins"></i></a>
                <span><p><?= $globalPortrait['realisationDislike'] ?></p></span>
                <a href="#"><i class="far fa-plus-square fa-2x" title="Ajouter aux favoris"></i></a>
                <span><p><?= $globalPortrait['realisationFavory'] ?></p></span>
            </div>
        </div>
    </div>
    <?php
}

function showRealisation($globalPortrait) {
    ?>
    <div class="row">
        <div class="bigCompanyCard col-12 offset-sm-2 col-sm-8 offset-md-2 col-md-8 offset-lg-2 col-lg-8 userCards">
            <div class="row">
                <div class="col-12 offset-sm-1 col-sm-10 offset-md-1 col-md-10 offset-lg-1 col-lg-10">
                    <h2><?= $globalPortrait['companyName'] ?></h2>
                </div>
            </div>
            <div class="row">
                <div class="col-12 offset-sm-1 col-sm-10 offset-md-1 col-md-10 offset-lg-1 col-lg-10 realisation">
                    <h3>Chantier de <?= $globalPortrait['realisationType'] ?> à <?= $globalPortrait['realisationCity'] ?></h3>
                </div>
            </div>
            <div class="bd-example">
                <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
                    <ol class="carousel-indicators">
                        <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
                        <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
                        <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
                    </ol>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="<?= $globalPortrait['realisationPhoto'] ?>" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5><?= $globalPortrait['titlePhoto'] ?></h5>
                                <p><?= $globalPortrait['textePhoto'] ?></p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="<?= $globalPortrait['realisationPhotoTwo'] ?>" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5><?= $globalPortrait['titlePhotoTwo'] ?></h5>
                                <p><?= $globalPortrait['textePhotoTwo'] ?></p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="<?= $globalPortrait['realisationPhotoThree'] ?>" class="d-block w-100" alt="...">
                            <div class="carousel-caption d-none d-md-block">
                                <h5><?= $globalPortrait['titlePhotoThree'] ?></h5>
                                <p><?= $globalPortrait['textePhotoThree'] ?></p>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
            <div class="row">
                <div class="col-12 offset-sm-1 col-sm-10 offset-md-1 col-md-10 offset-lg-1 col-lg-10 realisationText">
                    <p>Descriptif des travaux réalisés : <br /><?= $globalPortrait['realisationText'] ?></p>
                </div>
            </div>
            <div class="socialMedia">
                <a href="#"><i class="fas fa-sun fa-2x" title="J'aime"></i></a>
                <span><p><?= $globalPortrait['realisationLike'] ?></p></span>
                <a href="#"><i class="fas fa-snowflake fa-2x" title="J'aime moins"></i></a>
                <span><p><?= $globalPortrait['realisationDislike'] ?></p></span>
                <a href="#"><i class="far fa-plus-square fa-2x" title="Ajouter aux favoris"></i></a>
                <span><p><?= $globalPortrait['realisationFavory'] ?></p></span>
            </div>
        </div>
    </div>
<?php } ?>