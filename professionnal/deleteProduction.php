<?php
session_start();
require_once '../regex.php';
include_once '../models/database.php';
include_once '../models/production.php';
include_once '../models/photo.php';
include_once '../models/company.php';
include_once '../controllers/deleteProductionCtrl.php';
include_once 'navbarProfessionnal.php';
?>



<div id="main">
    <div class="row">
        <div class="bigCompanyCard col-12 offset-sm-2 col-sm-8 offset-md-2 col-md-8 offset-lg-2 col-lg-8 userCards">
            <h2>Voulez-vous vraiment supprimer le chantier <?php $production->title  ?> ?</h2>
            <form action="deleteProduction.php?id=<?= $production->id ?>" method="POST">
            <input type="submit" name="delete" class="btn btn-outline-warning registrationBtn" value="Confirmer" />
            </form>
        </div>
    </div>
</div>

<?php include_once '../footerSecondary.php'; ?>