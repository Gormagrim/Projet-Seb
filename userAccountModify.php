<?php
session_start();
include_once 'navbarSecondary.php';
require_once 'regex.php';
include_once 'models/database.php';
include_once 'models/particularUsers.php';
include_once 'models/city.php';
include_once 'models/company.php';
include_once 'controllers/userAccountModifyCtrl.php';
?>

<div class="w3-sidebar w3-bar-block w3-card w3-animate-left sideBarMenu" style="display:none" id="mySidebar">
    <button class="w3-bar-item slide-button w3-large slideMenuCloseBtn" onclick="slide_close()">Fermer le Menu &times;</button>
    <p><span class="orange">.</span>Recherches par :</p>
    <a href="/recherche-entreprise.html" class="w3-bar-item slide-button"><span class="orange">.</span>Entreprises</a>
    <a href="/recherche-travaux.html" class="w3-bar-item slide-button"><span class="orange">.</span>Réalisations</a>
    <a href="/recherche-secteur.html" class="w3-bar-item slide-button"><span class="orange">.</span>Secteurs</a>
    <p><span class="orange">.</span>Mon activité :</p>
    <a href="/estimate.php" class="w3-bar-item slide-button"><span class="orange">.</span>Mes devis</a>
    <a href="/userWorks.php" class="w3-bar-item slide-button"><span class="orange">.</span>Mes travaux</a>
    <a href="/userFavorites.php" class="w3-bar-item slide-button"><span class="orange">.</span>Mes favoris</a>
    <a href="/userContact.php" class="w3-bar-item slide-button"><span class="orange">.</span>Mes contacts</a>
    <p><a href="/mon-compte.html"><span class="orange">.</span>Mon compte</a></p>
</div>
<div id="main">

    <div class="row">
        <div class="bigCompanyCard col-12 offset-sm-2 col-sm-8 offset-md-2 col-md-8 offset-lg-2 col-lg-8 userCards">
            <?php
            if (count($_POST) == 0 || count($formErrors) > 0) {
                if (isset($formErrors['add'])) {
                    ?>
                    <p><?= $formErrors['add'] ?></p>   
                <?php } ?>
                <h2>Modification de votre profil</h2>
                <form action="userAccountModify.php" method="POST">
                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                            <label class="d-flex justify-content-start" for="lastname">Nom de famille</label>
                            <input class="form-control lastname <?= isset($formErrors['lastname']) ? 'is-invalid' : (isset($lastname) ? 'is-valid' : '') ?>" type="text" name="lastname" id="lastname" placeholder="Doe" value="<?= count($formErrors) > 0 ? htmlspecialchars($_POST['lastname']) : $particularUserInfo->lastname ?>" required />
                            <?php if (isset($formErrors['lastname'])) {
                                ?>
                                <div class="invalid-feedback">
                                    <p><?= $formErrors['lastname'] ?></p>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                            <!-- Utiliser les class : is-invalid et is-valid et invalid-feedback (pour les messages d'erreur) pour la mise en forme des input en fonction du remplissage correct ou pas. -->
                            <label for="firstname">Prénom</label>
                            <input class="form-control <?= isset($formErrors['firstname']) ? 'is-invalid' : (isset($firstname) ? 'is-valid' : '') ?>" type="text" name="firstname" id="firstname" placeholder="John" value="<?= count($formErrors) > 0 ? htmlspecialchars($_POST['firstname']) : $particularUserInfo->firstname ?>" required />
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
                            <label for="address">Adresse</label>
                            <input class="form-control <?= isset($formErrors['address']) ? 'is-invalid' : (isset($address) ? 'is-valid' : '') ?>" type="text" name="address" id="address" placeholder="1 rue des métiers" value="<?= count($formErrors) > 0 ? htmlspecialchars($_POST['address']) : $particularUserInfo->address ?>" required />
                            <?php if (isset($formErrors['address'])) {
                                ?>
                                <div class="invalid-feedback">
                                    <p><?= $formErrors['address'] ?></p>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                            <label for="city">Ville</label>
                            <input list="navigateurs" class="form-control search <?= isset($formErrors['search']) ? 'is-invalid' : (isset($search) ? 'is-valid' : '') ?>" type="text" name="search" id="search" placeholder="Beauvais" value="<?= count($formErrors) > 0 ? htmlspecialchars($_POST['search']) : $particularUserInfo->city . ' ' . $particularUserInfo->zipcode ?>" required />
                            <datalist id="navigateurs" class="search"></datalist>
                            <?php if (isset($formErrors['search'])) {
                                ?>
                                <div class="invalid-feedback">
                                    <p><?= $formErrors['search'] ?></p>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                            <input class="form-control cityId" type="hidden" name="cityId" id="cityId" placeholder="" value="<?= count($formErrors) > 0 ? htmlspecialchars($_POST['cityId']) : $particularUserInfo->id_al2jt_city ?>"  />    
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                            <label for="phoneNumber">Numéro de téléphone</label>
                            <input class="form-control <?= isset($formErrors['phoneNumber']) ? 'is-invalid' : (isset($phoneNumber) ? 'is-valid' : '') ?>" type="text" name="phoneNumber" id="phoneNumber" placeholder="06.01.02.03.04" value="<?= count($formErrors) > 0 ? htmlspecialchars($_POST['phoneNumber']) : $particularUserInfo->phoneNumber ?>" required />
                            <?php if (isset($formErrors['phoneNumber'])) {
                                ?>
                                <div class="invalid-feedback">
                                    <p><?= $formErrors['phoneNumber'] ?></p>
                                </div>
                            <?php } ?>
                        </div>
                        <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                            <label for="mail">Adresse mail</label>
                            <input class="form-control <?= isset($formErrors['mail']) ? 'is-invalid' : (isset($mail) ? 'is-valid' : '') ?>" type="email" name="mail" id="mail" placeholder="exemple@mail.com" value="<?= count($formErrors) > 0 ? htmlspecialchars($_POST['mail']) : $particularUserInfo->mail ?>" required />
                            <?php if (isset($formErrors['mail'])) {
                                ?>
                                <div class="invalid-feedback">
                                    <p><?= $formErrors['mail'] ?></p>
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
        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
            <h2>Votre profil a bien été modifié</h2>
        </div>

    <?php } ?>
</div>
<?php include_once 'footerSecondary.php'; ?>