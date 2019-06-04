<?php
session_start();
include_once '../models/database.php';
include_once '../models/particularUsers.php';
include_once '../models/city.php';
include_once '../models/company.php';
include_once '../models/userGroup.php';
include_once '../controllers/professionnalUserCtrl.php';
include_once 'navbarProfessionnal.php';
?>
<div class="row">
    <div class="col-12 col-sm-12 col-md-12 col-lg-12 topSite welcomePro">
        <h1>izi<span class="orange">.</span>travaux<span class="orange">.</span>com<span class="orange">/Pro</span></h1>
    </div>
</div>
<div class="row">
    <div class="col-12 col-sm-12 col-md-12 col-lg-12 welcomePro">
        <h2>Bienvenue sur votre espace professionnel</h2>
        <h2>Entreprise <?= $professionnalUserInfo->name ?></h2>
    </div>
</div>
<?php include_once '../footerSecondary.php'; ?>