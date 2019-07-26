<?php
session_start();
require_once '../regex.php';
include_once '../models/database.php';
include_once '../models/particularUsers.php';
include_once '../models/city.php';
include_once '../models/company.php';
include_once '../controllers/deleteProfessionnalUserCtrl.php';
include_once 'navbarProfessionnal.php';
?>

<div class="row">
    <div class="bigCompanyCard col-12 offset-sm-2 col-sm-8 offset-md-2 col-md-8 offset-lg-2 col-lg-8 userCards" id="deleteProUser">
        <h2>Voulez-vous vraiment desactiver votre compte ?</h2>
        <form action="deleteProfessionnalUser.php" method="POST">
            <input type="submit" name="deleteProUser" class="btn btn-outline-warning registrationBtn" value="Confirmer" />
        </form>
    </div>
</div>
<button type="button" class="btn registrationBtn useraccountModify" onclick="history.go(-1)">Retour</button>

<?php include_once '../footerSecondary.php'; ?>

