<?php
require_once 'regex.php';
require_once 'models/database.php';
require_once 'models/particularUsers.php';
require_once 'controllers/connectionCtrl.php';
include_once 'navbarSecondary.php';
$page = $_SERVER['PHP_SELF'];
?>
<form action="connection.php" method="POST">
    <div class="row form-row connection">
        <div class="form-group offset-1 col-10 offset-sm-4 col-sm-4 offset-md-4 col-md-4 offset-lg-4 col-lg-4">
            <div class="formConnection">
                <h2><span class="orange">.</span>Connexion</h2>
                <label for="mail"><span class="orange">.</span>Adresse mail :</label>
                <input type="email" name="mail" class="form-control <?= isset($formErrors['mail']) ? 'is-invalid' : (isset($mail) ? 'is-valid' : '') ?>" id="mail" placeholder="exemple@mail.com" value="<?= isset($_POST['mail']) ? $_POST['mail'] : '' ?>" />
                <?php if (isset($formErrors['mail'])) { ?>
                    <div class="invalid-feedback">
                        <p><?= $formErrors['mail'] ?></p>
                    </div>
                <?php } ?>
                <label for="password"><span class="orange">.</span>Mot de passe :</label>
                <input type="password" name="password" class="form-control <?= isset($formErrors['password']) ? 'is-invalid' : (isset($password) ? 'is-valid' : '') ?>" id="password" placeholder="Mot de passe" value="<?= isset($_POST['password']) ? $_POST['password'] : '' ?>" />
                <?php if (isset($formErrors['password'])) { ?>
                    <div class="invalid-feedback">
                        <p><?= $formErrors['password'] ?></p>
                    </div>
                <?php } ?>
                <p><a class="lostPassword" href="#">mot de passe oublié ?</a></p>
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                        <p class="askRegistration">Vous n'avez pas de compte?</p>
                        <p class="askRegistration"><span class="orange">.</span>Si vous êtes un particulier cliquez <a class="registrationLink" href="/registration.php?type=particulier">ici</a>.</p>
                        <p class="askRegistration"><span class="orange">.</span>Si vous êtes un professionnel cliquez <a class="registrationLink" href="/registration.php?type=professionnel">ici</a>.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <input type="submit" class="btn btn-outline-warning registrationBtn connectionBtn" value="Se Connecter">
</form>

<?php include_once 'footerSecondary.php'; ?>