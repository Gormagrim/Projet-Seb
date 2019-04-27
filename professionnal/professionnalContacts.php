<?php
include_once 'navbarProfessionnal.php';
include_once '../TestBaseDeDonnées.php';
include_once '../function.php';
?>

<div class="row">
    <div class="col-12 col-sm-12 col-md-12 col-lg-12 firstCard">
        <h2 class="estimateTitle"><span class="orange">.</span>Mes Contacts</h2>
    </div>
</div>
<?= showSmallPartUserCards($userTest) ?>



<?php include_once '../footerSecondary.php'; ?>
