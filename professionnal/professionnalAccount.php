<?php
session_start();
include_once '../models/database.php';
include_once '../models/particularUsers.php';
include_once '../models/city.php';
include_once '../models/company.php';
include_once '../models/likeProduction.php';
include_once '../models/likeCompany.php';
include_once '../models/dislikeProduction.php';
include_once '../models/dislikeCompany.php';
include_once '../models/favoriteProduction.php';
include_once '../models/favoriteCompany.php';
include_once '../controllers/professionnalAccountCtrl.php';
include_once 'navbarProfessionnal.php';
?>


<div class="row">
    <div class="bigCompanyCard col-12 offset-sm-2 col-sm-8 offset-md-2 col-md-8 offset-lg-2 col-lg-8 userCards">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 userIdentity">
                <a href="/professionnal/professionnalAccountModify.php"><i class="fas fa-user-edit fa-2x Usermodification" title="Modifier mes infos"></i></a>
                <a href="/professionnal/deleteProfessionnalUser.php"><i class="fas fa-user-slash fa-2x Usermodification" title="Desactiver mon compte"></i></a>
            </div>
        </div>
        <div class="row">
            <div class="col-12 offset-sm-1 col-sm-10 offset-md-1 col-md-10 offset-lg-1 col-lg-10 userIdentity">
                <h2 class="companyCard">Entreprise <?= $professionnalUserInfo->name ?></h2>
            </div>
        </div>
        <div class="row">
            <div class="offset-1 col-1 offset-sm-1 col-sm-10 offset-md-1 col-md-10 offset-lg-1 col-lg-10 userIdentity">
                <p class="companyCard"><span class="orange">.</span>Compte <?= $professionnalUserInfo->type ?></p>
                <p class="companyCard"><span class="orangeText"><?= $numberTotalOfCompLike->likeNumber ?></span> <?= $numberTotalOfCompLike->likeNumber > 1 ? 'utilisateurs' : 'utilisateur' ?> <?= $numberTotalOfCompLike->likeNumber > 1 ? 'aiment' : 'aime' ?> votre entreprise.</p>
                <p class="companyCard"><span class="orangeText"><?= $numberTotalOfCompDislike->likeNumber ?></span> <?= $numberTotalOfCompDislike->likeNumber > 1 ? 'utilisateurs' : 'utilisateur' ?> <?= $numberTotalOfCompDislike->likeNumber > 1 ? 'aiment' : 'aime' ?> moins votre entreprise.</p>
                <p class="companyCard"><span class="orangeText"><?= $numberTotalOfCompFavorite->likeNumber ?></span> <?= $numberTotalOfCompFavorite->likeNumber > 1 ? 'utilisateurs' : 'utilisateur' ?> <?= $numberTotalOfCompFavorite->likeNumber > 1 ? 'ont' : 'a' ?> votre entreprise en favoris.</p>
            </div>
        </div>
        <?php if (isset($professionnalUserInfo->presentationPhoto)) { ?>
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 userIdentity">
                    <img class="proUserPresentationPhoto" src="<?= $professionnalUserInfo->presentationPhoto ?>" alt="Photo de l'entreprise <?= $professionnalUserInfo->name ?>" title="Photo de l'entreprise <?= $professionnalUserInfo->name ?>">
                </div>
            </div>
        <?php } ?>
        <div class="row">
            <div class="col-12 offset-sm-1 col-sm-10 offset-md-1 col-md-10 offset-lg-1 col-lg-10">
                <p class="companyCard"><span class="orange">.</span><span class="accountDetails">Nom du dirigeant : </span><span class="orangeText">Monsieur <?= $professionnalUserInfo->leader ?></span></p>
            </div>
        </div>
        <div class="row">
            <div class="col-12 offset-sm-1 col-sm-5 offset-md-1 col-md-5 offset-lg-1 col-lg-5">
                <p class="companyCard"><span class="orange">.</span><span class="accountDetails">Numéro de SIRET : </span><span class="orangeText"><?= $professionnalUserInfo->siret ?></span></p>
            </div>
        </div>
        <div class="row">
            <div class="col-12 offset-sm-1 col-sm-5 offset-md-1 col-md-5 offset-lg-1 col-lg-5">
                <p class="companyCard"><span class="orange">.</span><span class="accountDetails">Adresse : </span><span class="orangeText"><?= $professionnalUserInfo->address ?></span></p>
            </div>
            <div class="col-12 col-sm-5 col-md-5 col-lg-5">
                <p class="companyCard"><span class="orange">.</span><span class="accountDetails">Ville : </span><span class="orangeText"><?= $professionnalUserInfo->zipcode . ' ' . $professionnalUserInfo->city ?></span></p>
            </div>
        </div>
        <div class="row">
            <div class="col-12 offset-sm-1 col-sm-5 offset-md-1 col-md-5 offset-lg-1 col-lg-5">
                <p class="companyCard"><span class="orange">.</span><span class="accountDetails">Numéro de téléphone : </span><span class="orangeText"><?= $professionnalUserInfo->phoneNumber ?></span></p>
            </div>
            <div class="col-12 col-sm-5 col-md-5 col-lg-5">
                <p class="companyCard"><span class="orange">.</span><span class="accountDetails">Adresse mail: </span><span class="orangeText"><?= $professionnalUserInfo->mail ?></span></p>
            </div>
        </div>
        <div class="row phone">
            <?php if (isset($professionnalUserInfo->numberOfEmploy)) { ?>
                <div class="col-12 offset-sm-1 col-sm-5 offset-md-1 col-md-5 offset-lg-1 col-lg-5">
                    <p class="companyCard"><span class="orange">.</span><span class="accountDetails">Nombre d'employés : </span><span class="orangeText"><?= $professionnalUserInfo->numberOfEmploy ?></span></p>
                </div>
            <?php } ?>
            <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                <p class="companyCard"><span class="orange">.</span><span class="accountDetails">Nombre de chantiers sur le site : </span><span class="orangeText"><?= $checkProductionNumberWithId->prodNumber ?></span></p>
            </div>
        </div>
        <div class="row">
            <div class="col-12 offset-sm-1 col-sm-8 offset-md-1 col-md-8 offset-lg-1 col-lg-8">
                <p class="companyCard"><span class="orange">.</span><span class="accountDetails">Nombre de J'aime : </span><span class="orangeText"><?= $numberOfLikePerCompany->likeNumber ?></span> chantiers.</p>
                <p class="companyCard"><span class="orange">.</span><span class="accountDetails">Nombre de J'aime moins : </span><span class="orangeText"><?= $numberOfDislikePerCompany->number ?></span> chantiers.</p>
                <p class="companyCard"><span class="orange">.</span><span class="accountDetails">Nombre de fois dans les favoris : </span><span class="orangeText"><?= $numberOfFavoritePerCompany->number ?></span> chantiers</p>
            </div>
        </div>
        <div class="col-12 offset-sm-1 col-sm-10 offset-md-1 col-md-10 offset-lg-1 col-lg-10">
            <p class="companyCard"><a href="/professionnal/professionnalEstimate.php"><span class="orange">.</span>Mes devis envoyés</a></p>
        </div>
        <div class="col-12 offset-sm-1 col-sm-10 offset-md-1 col-md-10 offset-lg-1 col-lg-10">
            <p class="companyCard"><a href="/professionnal/professionnalProduction.php"><span class="orange">.</span>Mes réalisations</a></p>
        </div>
    </div>
</div>

<?php include_once '../footerSecondary.php'; ?>
