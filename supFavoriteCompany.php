<?php
session_start();
include_once 'models/database.php';
include_once 'models/production.php';
include_once 'models/photo.php';
include_once 'models/company.php';
include_once 'models/favoriteCompany.php';
include_once 'controllers/supFavoriteCompanyCtrl.php';
include_once 'navbarSecondary.php';
?>



<div id="main">
    <div class="row">
        <div class="bigCompanyCard col-12 offset-sm-2 col-sm-8 offset-md-2 col-md-8 offset-lg-2 col-lg-8 userCards" id="deleteProduction">
            <h2>Voulez-vous vraiment supprimer l'entreprise <span class="orange"><?= $getCompanyInformation->name ?></span> de vos favoris ?</h2>
            <form action="supFavoriteCompany.php?id=<?= $getCompanyInformation->id ?>" method="POST">
                <input type="submit" name="deleteFavComp" class="btn btn-outline-warning registrationBtn" value="Confirmer" />
            </form>
        </div>
    </div>
    <button type="button" class="btn registrationBtn useraccountModify" onclick="history.go(-1)">Retour</button>
</div>

<?php include_once '../footerSecondary.php'; ?>