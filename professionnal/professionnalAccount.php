<?php
session_start();
include_once '../models/database.php';
include_once '../models/particularUsers.php';
include_once '../models/city.php';
include_once '../models/company.php';
include_once '../controllers/professionnalAccountCtrl.php';
include_once 'navbarProfessionnal.php';
?>


<div class="row">
    <div class="bigCompanyCard col-12 offset-sm-2 col-sm-8 offset-md-2 col-md-8 offset-lg-2 col-lg-8 userCards">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 userIdentity">
                <a href="/professionnal/professionnalAccountModify.php"><i class="fas fa-user-edit fa-2x Usermodification" title="Modifier mes infos"></i></a>
                <a href="/professionnal/deleteProfessionnalUser.php"><i class="fas fa-user-slash fa-2x Usermodification" title="Supprimer mon compte"></i></a>
            </div>
        </div>
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-12 userIdentity">
                <h2 class="companyCard">Entreprise <?= $professionnalUserInfo->name ?></h2>
            </div>
        </div>
        <div class="row">
            <div class=" offset-1 col-1 offset-sm-1 col-sm-10 offset-md-1 col-md-10 offset-lg-1 col-lg-10 userIdentity">
                <p class="companyCard"><span class="orange">.</span>Compte <?= $professionnalUserInfo->type ?></p>
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
                <p class="companyCard"><span class="orange">.</span><span class="accountDetails">Nom du dirigeant : </span>Monsieur <?= $professionnalUserInfo->leader ?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-12 offset-sm-1 col-sm-5 offset-md-1 col-md-5 offset-lg-1 col-lg-5">
                <p class="companyCard"><span class="orange">.</span><span class="accountDetails">Numéro de SIRET : </span><?= $professionnalUserInfo->siret ?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-12 offset-sm-1 col-sm-5 offset-md-1 col-md-5 offset-lg-1 col-lg-5">
                <p class="companyCard"><span class="orange">.</span><span class="accountDetails">Adresse : </span><?= $professionnalUserInfo->address ?></p>
            </div>
            <div class="col-12 col-sm-5 col-md-5 col-lg-5">
                <p class="companyCard"><span class="orange">.</span><span class="accountDetails">Ville : </span><?= $professionnalUserInfo->zipcode . ' ' . $professionnalUserInfo->city ?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-12 offset-sm-1 col-sm-5 offset-md-1 col-md-5 offset-lg-1 col-lg-5">
                <p class="companyCard"><span class="orange">.</span><span class="accountDetails">Numéro de téléphone : </span><?= $professionnalUserInfo->phoneNumber ?></p>
            </div>
            <div class="col-12 col-sm-5 col-md-5 col-lg-5">
                <p class="companyCard"><span class="orange">.</span><span class="accountDetails">Adresse mail: </span><?= $professionnalUserInfo->mail ?></p>
            </div>
        </div>
        <div class="row phone">
            <?php if (isset($professionnalUserInfo->numberOfEmploy)) { ?>
                <div class="col-12 offset-sm-1 col-sm-5 offset-md-1 col-md-5 offset-lg-1 col-lg-5">
                    <p class="companyCard"><span class="orange">.</span><span class="accountDetails">Nombre d'employés : </span><?= $professionnalUserInfo->numberOfEmploy ?></p>
                </div>
            <?php } ?>
        </div>
        <div class="row phone">
            <div class="col-12 offset-sm-1 col-sm-5 offset-md-1 col-md-5 offset-lg-1 col-lg-5">
                <p class="companyCard"><span class="orange">.</span><span class="accountDetails">Nombre de "j'aime moins" : </span></p>
            </div>
        </div>
        <div class="col-12 offset-sm-1 col-sm-10 offset-md-1 col-md-10 offset-lg-1 col-lg-10">
            <p class="companyCard"><a href="/professionnal/professionnalEstimate.php"><span class="orange">.</span>Devis envoyés</a></p>
        </div>
        <div class="col-12 offset-sm-1 col-sm-10 offset-md-1 col-md-10 offset-lg-1 col-lg-10">
            <p class="companyCard"><a href="/professionnal/professionnalProduction.php"><span class="orange">.</span>Réalisations</a></p>
        </div>
    </div>
</div>

<?php include_once '../footerSecondary.php'; ?>
