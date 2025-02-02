<?php
/*
 * VIEW de mon controlleur inserParticularUserCtrl.php
 * 
 */
include_once 'navbarSecondary.php';
/*
 * on utilise require pour arrêter le script en cas d'erreur et once pour vérifier si le fichier a déjà été inclus, et si c'est le cas, ne l'inclut pas une deuxième fois. 
 */
require_once 'regex.php';
/*
 * Attention il ne faut pas oublier d'inclure mon model particularUser et mon controller addParticularUserCtrl pour pouvoir éxecuter ma requête
 * J'inclue également mon model database qui me permet de me connecter à la base de données.
 * Les autres classes des différents models hériteront de cette classe du model database grâce au mot-clé extends
 */
require_once 'models/database.php';
require_once 'models/city.php';
require_once 'models/particularUsers.php';
require_once 'models/company.php';
require_once 'controllers/inserParticularUserCtrl.php';

?>

<div class="registrationSection row">
    <div class="offset-1 col-10 offset-sm-1 col-sm-10 offset-md-1 col-md-10 offset-lg-3 col-lg-6 registration">
        <?php
        /*
         * je gère l'affichage de mon formulaire : 
         * si le calcul de $_POST est égal à 0 ou si il y a des erreurs dans mon tableau d'erreur 
         * alors je laisse afficher le formulaire (sinon j'affiche les informations renseignées). 
         * 
         */
        if (count($_POST) == 0 || count($formErrors) > 0) {
            /*
             * je vérifie également avec mon tableau d'erreur que ma requête SQL s'est bien éxecutée, 
             * si ce n'est pas le cas j'affiche mon message d'erreur
             */
            if (isset($formErrors['add'])) {
                ?>
                <p><?= $formErrors['add'] ?></p>
            <?php }
            ?>
            <div class="formRegistration">
                <h2><span class="orange">.</span>Formulaire d'inscription :</h2>
                <form name="registrationForm" action="registration.php?type=<?= $_GET['type'] ?>" method="POST">
                    <fieldset>
                        <legend><span class="orange">.</span>Type D'inscription</legend>
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                <?php if (isset($_GET['type']) && $_GET['type'] == 'particulier') { ?>
                                    <input type="radio" name="id_al2jt_userGroup" <?= isset($_GET['type']) && $_GET['type'] == 'particulier' ? 'checked' : '' ?> value="2" id="Particulier" /> <label for="Particulier">Particulier</label>
                                <?php } else { ?>
                                    <input type="radio" name="id_al2jt_userGroup" <?= isset($_GET['type']) && $_GET['type'] == 'professionnel' ? 'checked' : '' ?> value="3" id="Professionnel" /> <label for="Professionnel">Professionnel</label>
                                <?php } ?>
                                <?php if (isset($formErrors['id_al2jt_userGroup'])) { ?>
                                    <div class="invalid-feedback">
                                        <p><?= $formErrors['id_al2jt_userGroup'] ?></p>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </fieldset>
                    <?php if (isset($_GET['type']) && $_GET['type'] === 'particulier') { ?>
                        <div class="particularUser">
                            <fieldset>
                                <legend><span class="orange">.</span>Civilité</legend>
                                <div class="row">
                                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                        <input type="radio" name="gender" <?= isset($_POST['gender']) && $_POST['gender'] == 'Madame' ? 'checked' : '' ?> value="Madame" id="Madame" checked="checked" /> <label for="Madame">Madame</label>
                                        <input type="radio" name="gender" <?= isset($_POST['gender']) && $_POST['gender'] == 'Monsieur' ? 'checked' : '' ?> value="Monsieur" id="Monsieur" /> <label for="Monsieur">Monsieur</label>
                                        <?php if (isset($formErrors['gender'])) { ?>
                                            <div class="invalid-feedback">
                                                <p><?= $formErrors['gender'] ?></p>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                                        <label class="d-flex justify-content-start" for="lastname">Nom de famille</label>                                   
                                        <input class="form-control lastname <?= isset($formErrors['lastname']) ? 'is-invalid' : (isset($lastname) ? 'is-valid' : '') ?>" type="text" name="lastname" id="lastname" placeholder="Doe" value="<?= isset($_POST['lastname']) ? $_POST['lastname'] : '' ?>" <?= $isProfessionnal ? '' : 'required' ?> />
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
                                        <input class="form-control <?= isset($formErrors['firstname']) ? 'is-invalid' : (isset($firstname) ? 'is-valid' : '') ?>" type="text" name="firstname" id="firstname" placeholder="John" value="<?= isset($_POST['firstname']) ? $_POST['firstname'] : '' ?>" <?= $isProfessionnal ? '' : 'required' ?> />
                                        <?php if (isset($formErrors['firstname'])) {
                                            ?>
                                            <div class="invalid-feedback">
                                                <p><?= $formErrors['firstname'] ?></p>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </fieldset>
                        </div>
                    <?php } else { ?>
                        <div class="professionnalUser">
                            <fieldset>
                                <legend><span class="orange">.</span>Entreprise</legend>
                                <div class="row">
                                    <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                                        <label for="companyName">Nom de l'entreprise</label>
                                        <input class="form-control <?= isset($formErrors['companyName']) ? 'is-invalid' : (isset($companyName) ? 'is-valid' : '') ?>" type="text" name="companyName" id="companyName" placeholder="an izi company" value="<?= isset($_POST['companyName']) ? $_POST['companyName'] : '' ?>" <?= $isProfessionnal ? 'required' : '' ?> />
                                        <?php if (isset($formErrors['companyName'])) {
                                            ?>
                                            <div class="invalid-feedback">
                                                <p><?= $formErrors['companyName'] ?></p>
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                                        <label for="companySiret">Numero de Siret</label>
                                        <input class="form-control <?= isset($formErrors['siret']) ? 'is-invalid' : (isset($siret) ? 'is-valid' : '') ?>" type="text" name="siret" id="siret" placeholder="123 456 789 12345" value="<?= isset($_POST['siret']) ? $_POST['siret'] : '' ?>" <?= $isProfessionnal ? 'required' : '' ?> />
                                        <?php if (isset($formErrors['siret'])) {
                                            ?>
                                            <div class="invalid-feedback">
                                                <p><?= $formErrors['siret'] ?></p>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                                        <label class="d-flex justify-content-start" for="leaderLastname">Nom de famille</label>
                                        <input class="form-control lastname <?= isset($formErrors['leaderLastname']) ? 'is-invalid' : (isset($leaderLastname) ? 'is-valid' : '') ?>" type="text" name="leaderLastname" id="leaderLastname" placeholder="Doe" value="<?= isset($_POST['leaderLastname']) ? $_POST['leaderLastname'] : '' ?>" <?= $isProfessionnal ? 'required' : '' ?> />
                                        <?php if (isset($formErrors['leaderLastname'])) {
                                            ?>
                                            <div class="invalid-feedback">
                                                <p><?= $formErrors['leaderLastname'] ?></p>
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                                        <label for="leaderFirstname">Prénom</label>
                                        <input class="form-control <?= isset($formErrors['leaderFirstname']) ? 'is-invalid' : (isset($leaderFirstname) ? 'is-valid' : '') ?>" type="text" name="leaderFirstname" id="leaderFirstname" placeholder="John" value="<?= isset($_POST['leaderFirstname']) ? $_POST['leaderFirstname'] : '' ?>" <?= $isProfessionnal ? 'required' : '' ?> />
                                        <?php if (isset($formErrors['leaderFirstname'])) {
                                            ?>
                                            <div class="invalid-feedback">
                                                <p><?= $formErrors['leaderFirstname'] ?></p>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>

                            </fieldset>
                        </div>
                    <?php } ?>
                    <fieldset>
                        <legend><span class="orange">.</span>Adresse et contact</legend>
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                <label for="address">Adresse</label>
                                <input class="form-control <?= isset($formErrors['address']) ? 'is-invalid' : (isset($address) ? 'is-valid' : '') ?>" type="text" name="address" id="address" placeholder="1 rue des métiers" value="<?= isset($_POST['address']) ? $_POST['address'] : '' ?>" required />
                                <?php if (isset($formErrors['address'])) {
                                    ?>
                                    <div class="invalid-feedback">
                                        <p><?= $formErrors['address'] ?></p>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                                <label for="search">Ville</label>
                                <input list="navigateurs" class="form-control search <?= isset($formErrors['search']) ? 'is-invalid' : (isset($search) ? 'is-valid' : '') ?>" type="text" name="search" id="search" placeholder="Beauvais" value="<?= isset($_POST['search']) ? $_POST['search'] : '' ?>" required />
                                <datalist id="navigateurs" class="search"></datalist>
                                <?php if (isset($formErrors['search'])) {
                                    ?>
                                    <div class="invalid-feedback">
                                        <p><?= $formErrors['search'] ?></p>
                                    </div>
                                <?php } ?>
                            </div>
                            <input class="form-control cityId" type="hidden" name="cityId" id="cityId" placeholder="" value=""  />    
                            <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                                <label for="phoneNumber">Numéro de téléphone</label>
                                <input class="form-control <?= isset($formErrors['phoneNumber']) ? 'is-invalid' : (isset($phoneNumber) ? 'is-valid' : '') ?>" type="phone" name="phoneNumber" id="phoneNumber" placeholder="06 01 02 03 04" value="<?= isset($_POST['phoneNumber']) ? $_POST['phoneNumber'] : '' ?>" required />
                                <?php if (isset($formErrors['phoneNumber'])) {
                                    ?>
                                    <div class="invalid-feedback">
                                        <p><?= $formErrors['phoneNumber'] ?></p>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset>
                        <legend><span class="orange">.</span>Connexion</legend>
                        <div class="row">
                            <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                                <label for="mail">Adresse mail</label>
                                <input class="form-control <?= isset($formErrors['mail']) ? 'is-invalid' : (isset($mail) ? 'is-valid' : '') ?>" type="email" name="mail" id="mail" placeholder="exemple@mail.com" value="<?= isset($_POST['mail']) ? $_POST['mail'] : '' ?>" required />
                                <?php if (isset($formErrors['mail'])) {
                                    ?>
                                    <div class="invalid-feedback">
                                        <p><?= $formErrors['mail'] ?></p>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                                <label for="mailVerification">Confirmation de l'adresse mail</label>
                                <input class="form-control <?= !isset($formErrors['mailAreDifferent']) ? '' : 'is-invalid' ?>" type="email" name="mailVerification" id="mailVerification" placeholder="exemple@mail.com" value="<?= isset($_POST['mailVerification']) ? $_POST['mailVerification'] : '' ?>" required />
                                <?php if (isset($formErrors['mailAreDifferent'])) {
                                    ?>
                                    <div class="invalid-feedback">
                                        <p><?= $formErrors['mailAreDifferent'] ?></p>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                                <label for="password">Mot de passe</label>
                                <input class="form-control <?= isset($formErrors['password']) ? 'is-invalid' : (isset($password) ? 'is-valid' : '') ?>" type="password" name="password" id="userName" placeholder="Votre mot de passe" value="<?= isset($_POST['password']) ? $_POST['password'] : '' ?>" required />
                                <?php if (isset($formErrors['password'])) {
                                    ?>
                                    <div class="invalid-feedback">
                                        <p><?= $formErrors['password'] ?></p>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                                <label for="passwordVerification">Confirmation du mot de passe</label>
                                <input class="form-control <?= !isset($formErrors['passwordAreDifferent']) ? '' : 'is-invalid' ?>" type="password" name="passwordVerification" id="passwordVerification" placeholder="Confirmez votre mot de passe" value="<?= isset($_POST['passwordVerification']) ? $_POST['passwordVerification'] : '' ?>" required />
                                <?php if (isset($formErrors['passwordAreDifferent'])) {
                                    ?>
                                    <div class="invalid-feedback">
                                        <p><?= $formErrors['passwordAreDifferent'] ?></p>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </fieldset>
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-12 col-lg-12 checkbox">
                            <input class="form-check-input <?= !isset($formErrors['termsOfUse']) ? '' : 'is-invalid' ?>" type="checkbox" id="termsOfUse" name="termsOfUse">
                            <label class="form-check-label" for="termsOfUse">J'accepte les conditions d'utilisation.</label>
                        </div>
                    </div>
                    <input type="submit" name="submit" value="Envoyer" class="btn btn-outline-warning registrationBtn" />
                </form>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12 col-lg-12">
            <button type="button" class="btn registrationBtn" onclick="history.go(-1)">Retour</button>
        </div>
    </div>
    <?php
    /*
     * Si les vérifications de mon formulaire se sont bien éxecutées alors j'affiche le message de succès
     */
} else {
    ?>
    <?php if (isset($formSuccess)) { ?>
        <p><?= $formSuccess ?></p>
    <?php } ?>
    <div class="jumbotron">
        <h2>Votre inscription a été validée</h2>
    </div>
    <button type="button" class="btn btn-outline-warning registrationBtn" onclick="javascript:location.href = 'connection.php'">Suivant</button>
<?php } ?>
</div>
</div>
<?php include_once 'footerSecondary.php'; ?>