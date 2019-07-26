<?php
session_start();
include_once 'navbarProfessionnal.php';
require_once '../regex.php';
include_once '../models/database.php';
include_once '../models/particularUsers.php';
include_once '../models/city.php';
include_once '../models/company.php';
include_once '../controllers/professionnalAccountModifyCtrl.php';
?>

<div class="row">
    <div class="bigCompanyCard col-12 offset-sm-2 col-sm-8 offset-md-2 col-md-8 offset-lg-2 col-lg-8 userCards">
        <?php
        if (count($_POST) == 0 || count($formErrors) > 0) {
            if (isset($formErrors['add'])) {
                ?>
                <p><?= $formErrors['add'] ?></p>   
            <?php } ?>
            <h2>Modification de votre profil</h2>
            <form action="professionnalAccountModify.php" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                        <label class="d-flex justify-content-start" for="lastname">Nom de famille du gestionnaire du compte</label>
                        <input class="form-control lastname <?= isset($formErrors['lastname']) ? 'is-invalid' : (isset($lastname) ? 'is-valid' : '') ?>" type="text" name="lastname" id="lastname" placeholder="Doe" value="<?= count($formErrors) > 0 ? htmlspecialchars($_POST['lastname']) : $professionnalUserInfo->lastname ?>" required />
                        <?php if (isset($formErrors['lastname'])) {
                            ?>
                            <div class="invalid-feedback">
                                <p><?= $formErrors['lastname'] ?></p>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                        <!-- Utiliser les class : is-invalid et is-valid et invalid-feedback (pour les messages d'erreur) pour la mise en forme des input en fonction du remplissage correct ou pas. -->
                        <label for="firstname">Prénom du gestionnaire du compte</label>
                        <input class="form-control <?= isset($formErrors['firstname']) ? 'is-invalid' : (isset($firstname) ? 'is-valid' : '') ?>" type="text" name="firstname" id="firstname" placeholder="John" value="<?= count($formErrors) > 0 ? htmlspecialchars($_POST['firstname']) : $professionnalUserInfo->firstname ?>" required />
                        <?php if (isset($formErrors['firstname'])) {
                            ?>
                            <div class="invalid-feedback">
                                <p><?= $formErrors['firstname'] ?></p>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                        <label for="address">Adresse de l'entreprise</label>
                        <input class="form-control <?= isset($formErrors['address']) ? 'is-invalid' : (isset($address) ? 'is-valid' : '') ?>" type="text" name="address" id="address" placeholder="1 rue des métiers" value="<?= count($formErrors) > 0 ? htmlspecialchars($_POST['address']) : $professionnalUserInfo->address ?>" required />
                        <?php if (isset($formErrors['address'])) {
                            ?>
                            <div class="invalid-feedback">
                                <p><?= $formErrors['address'] ?></p>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                        <label for="search">Ville de l'entreprise</label>
                        <input list="navigateurs" class="form-control search <?= isset($formErrors['search']) ? 'is-invalid' : (isset($search) ? 'is-valid' : '') ?>" type="text" name="search" id="search" placeholder="Beauvais" value="<?= count($formErrors) > 0 ? htmlspecialchars($_POST['search']) : $professionnalUserInfo->city . ' ' . $professionnalUserInfo->zipcode ?>" required />
                        <datalist id="navigateurs" class="search"></datalist>
                        <?php if (isset($formErrors['search'])) {
                            ?>
                            <div class="invalid-feedback">
                                <p><?= $formErrors['search'] ?></p>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                        <input class="form-control cityId" type="hidden" name="cityId" id="cityId" placeholder="" value="<?= count($formErrors) > 0 ? htmlspecialchars($_POST['cityId']) : $professionnalUserInfo->id_al2jt_city ?>"  />    
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                        <label for="phoneNumber">Numéro de téléphone de l'entreprise</label>
                        <input class="form-control <?= isset($formErrors['phoneNumber']) ? 'is-invalid' : (isset($phoneNumber) ? 'is-valid' : '') ?>" type="text" name="phoneNumber" id="phoneNumber" placeholder="06 01 02 03 04" value="<?= count($formErrors) > 0 ? htmlspecialchars($_POST['phoneNumber']) : $professionnalUserInfo->phoneNumber ?>" required />
                        <?php if (isset($formErrors['phoneNumber'])) {
                            ?>
                            <div class="invalid-feedback">
                                <p><?= $formErrors['phoneNumber'] ?></p>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                        <label for="name">Nom de l'entreprise</label>
                        <input class="form-control <?= isset($formErrors['name']) ? 'is-invalid' : (isset($name) ? 'is-valid' : '') ?>" type="text" name="name" id="name" placeholder="" value="<?= count($formErrors) > 0 ? htmlspecialchars($_POST['name']) : $professionnalUserInfo->name ?>" required />
                        <?php if (isset($formErrors['name'])) {
                            ?>
                            <div class="invalid-feedback">
                                <p><?= $formErrors['name'] ?></p>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                        <label for="siret">Numéro de SIRET</label>
                        <input class="form-control <?= isset($formErrors['siret']) ? 'is-invalid' : (isset($siret) ? 'is-valid' : '') ?>" type="text" name="siret" id="siret" placeholder="" value="<?= count($formErrors) > 0 ? htmlspecialchars($_POST['siret']) : $professionnalUserInfo->siret ?>" required />
                        <?php if (isset($formErrors['siret'])) {
                            ?>
                            <div class="invalid-feedback">
                                <p><?= $formErrors['siret'] ?></p>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group">
                        <div class="form-group">
                            <label for="presentationPhoto"><span class="orange">.</span>Photo de présentation (.png, .jpg ou .jpeg)</label>
                            <input class="form-control" type="file" name="presentationPhoto" id="presentationPhoto" />
                        </div>
                        <?php if (isset($formErrors['presentationPhoto'])) { ?>
                            <div class="alert-danger">
                                <p><?= $formErrors['presentationPhoto'] ?></p>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                        <label for="leader">Nom de famille du chef d'entreprise</label>
                        <input class="form-control <?= isset($formErrors['leader']) ? 'is-invalid' : (isset($leader) ? 'is-valid' : '') ?>" type="text" name="leader" id="leader" placeholder="" value="<?= count($formErrors) > 0 ? htmlspecialchars($_POST['leader']) : $professionnalUserInfo->leader ?>" required />
                        <?php if (isset($formErrors['leader'])) {
                            ?>
                            <div class="invalid-feedback">
                                <p><?= $formErrors['leader'] ?></p>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                        <label for="numberOfEmploy">Nombre d'employés</label>
                        <input class="form-control <?= isset($formErrors['numberOfEmploy']) ? 'is-invalid' : (isset($numberOfEmploy) ? 'is-valid' : '') ?>" type="text" name="numberOfEmploy" id="numberOfEmploy" placeholder="" value="<?= count($formErrors) > 0 ? htmlspecialchars($_POST['numberOfEmploy']) : $professionnalUserInfo->numberOfEmploy ?>" required />
                        <?php if (isset($formErrors['numberOfEmploy'])) {
                            ?>
                            <div class="invalid-feedback">
                                <p><?= $formErrors['numberOfEmploy'] ?></p>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <input type="submit" name="submit" value="Modifier" class="btn btn-outline-warning registrationBtn" />
            </form>
        </div>
    </div>
    <button type="button" class="btn registrationBtn useraccountModify" onclick="history.go(-1)">Retour</button>
<?php } else { ?>
        <div class="col-12 col-sm-12 col-md-12 col-lg-12 userCards">
            <h2>Votre profil a bien été modifié</h2>
        </div>
    </div>
<?php } 

include_once '../footerSecondary.php' ?>