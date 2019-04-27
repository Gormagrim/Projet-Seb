<?php
include_once 'navbarProfessionnal.php';
include_once '../TestBaseDeDonnées.php';
include_once '../function.php';
$page = $_SERVER['PHP_SELF'];
?>

<div class="col-12 offset-sm-1 col-sm-10 offset-md-1 col-md-10 offset-lg-1 col-lg-10 firstCard">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 firstCard">
                    <h2><span class="orange">.</span>Vos chantiers sur izi<span class="orange">.</span>travaux<span class="orange">.</span>com :</h2>
                </div>
                <?= showBigProductionCards($productionArray) ?>
            </div>
        </div>

<?php include_once '../footerSecondary.php'; ?>
