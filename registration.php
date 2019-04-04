<?php include_once 'navbarSecondary.php'; ?>
<?php include('regex.php'); ?>

<?php
$formErrors = array();

if (count($_POST) > 0) {
    // on vérifie que la variable $_POST['lastname'] existe ET n'est pas vide.
    if (!empty($_POST['lastname'])) {
        // Je vérifie bien que ma variable $_POST['lastname'] correspond à ma patternName.
        if (preg_match($patternName, $_POST['lastname'])) {
            // On stocke dans la variable lastname la variable $_POST['lastname'] dont on a désactivé les balises HTML.
            $lastname = htmlspecialchars($_POST['lastname']);
        } else {
            // Si la saisie utilisateur ne correspond pas à la regex on va stocker une erreur lastname dans notre tableau d'erreurs.
            $formErrors['lastname'] = 'Votre nom de famille est incorrect.';
        }
    } else {
        // On va réutiliser notre erreur lastName parce que les deux ne peuvent pas exister en même temps.
        $formErrors['lastname'] = 'Veuillez renseigner votre nom de famille.';
    }

    if (!empty($_POST['firstname'])) {
        if (preg_match($patternName, $_POST['firstname'])) {
            $firstname = htmlspecialchars($_POST['firstname']);
        } else {
            $formErrors['firstname'] = 'Votre prénom est incorrect.';
        }
    } else {
        $formErrors['firstname'] = 'Veuillez renseigner votre prénom.';
    }

    if (!empty($_POST['type'])) {
        if ($_POST['type'] === 'Particulier' || $_POST['type'] === 'Professionnel') {
            $type = $_POST['type'];
        } else {
            $formErrors['type'] = 'Vôtre choix est incorrect.';
        }
    } else {
        $formErrors['type'] = 'Veuillez renseigner si vous êtes un partuculier ou un professionnel.';
    }

    if (!empty($_POST['address'])) {
        if (preg_match($patternAddress, $_POST['address'])) {
            $address = htmlspecialchars($_POST['address']);
        } else {
            $formErrors['address'] = 'Votre adresse est incorrecte.';
        }
    } else {
        $formErrors['address'] = 'Veuillez renseigner votre adresse.';
    }

    if (!empty($_POST['postalCode'])) {
        if (preg_match($patternPostalCode, $_POST['postalCode'])) {
            $postalCode = htmlspecialchars($_POST['postalCode']);
        } else {
            $formErrors['postalCode'] = 'Votre code postal est incorrect.';
        }
    } else {
        $formErrors['postalCode'] = 'Veuillez renseigner votre code postal.';
    }

    if (!empty($_POST['city'])) {
        if (preg_match($patternName, $_POST['city'])) {
            $city = htmlspecialchars($_POST['city']);
        } else {
            $formErrors['city'] = 'Votre ville est incorrecte.';
        }
    } else {
        $formErrors['city'] = 'Veuillez renseigner votre ville.';
    }

    if (!empty($_POST['phone'])) {
        if (preg_match($patternPhone, $_POST['phone'])) {
            $phone = htmlspecialchars($_POST['phone']);
        } else {
            $formErrors['phone'] = 'Votre numéro de téléphone est incorrect.';
        }
    } else {
        $formErrors['phone'] = 'Veuillez renseigner votre numéro de téléphone.';
    }

    if (!empty($_POST['mail'])) {
        if (preg_match($patternMail, $_POST['mail'])) {
            $mail = htmlspecialchars($_POST['mail']);
        } else {
            $formErrors['mail'] = 'Votre adresse mail est incorrecte.';
        }
    } else {
        $formErrors['mail'] = 'Veuillez renseigner votre adresse mail.';
    }

    if ($_POST['mail'] != $_POST['mailVerification']) {
        $formErrors['mailAreDifferent'] = 'Veuillez confirmer votre adresse mail correctement.';
    }

    if (!empty($_POST['password'])) {
         $password = htmlspecialchars($_POST['password']);
    } else {
        $formErrors['password'] = 'Veuillez renseigner votre mot de passe.';
    }
    
    if (!empty($_POST['termsOfUse'])) {
         $termsOfUse = htmlspecialchars($_POST['termsOfUse']);
    } else {
        $formErrors['termsOfUse'] = 'Veuillez accepter les conditions d\'utilisation.';
    }
}
?>
<section class="registrationSection">
<div class="row">
    <div class="offset-1 col-10 offset-sm-4 col-sm-4 offset-md-4 col-md-4 offset-lg-4 col-lg-4 registration">
        <?php
// On affiche le formulaire si rien a été envoyé ou qu'il y a une erreur dans ce qui à été saisi.
        if (count($_POST) == 0 || count($formErrors) > 0) {
            ?>
            <div class="formRegistration">
                <h2>Formulaire d'inscription :</h2>
                <form name="registrationForm" action="registration.php" method="POST">
                    <label for="type">Vous êtes :</label>
                    <select  class="form-control" name="type" id="type" required>
                        <option disabled selected>Veuillez faire un choix !</option>            
                        <option value="Particulier" <?= isset($_POST['type']) && $_POST['type'] == 'Particulier' ? 'selected' : '' ?>>Particulier</option>
                        <option value="Professionnel" <?= isset($_POST['type']) && $_POST['type'] == 'Professionnel' ? 'selected' : '' ?>>Professionnel</option>
                    </select>
                    <label class="d-flex justify-content-start" for="lastname">Nom de famille</label>
                    <input class="form-control lastname <?= !isset($formErrors['lastname']) ? 'is-valid' : 'is-invalid' ?>" type="text" name="lastname" id="lastname" placeholder="Doe" value="<?= isset($_POST['lastname']) ? $_POST['lastname'] : '' ?>" required />
                    <?php if (isset($formErrors['lastname'])) {
                        ?>
                        <div class="is-invalid">
                            <p class="is-valid"><?= $formErrors['lastname'] ?></p>
                        </div>
                    <?php } ?>
                    <!-- Utiliser les class : is-invalid et is-valid et invalid-feedback (pour les messages d'erreur) pour la mise en forme des input en fonction du remplissage correct ou pas. -->
                    <label for="firstname">Prénom</label>
                    <input class="form-control <?= !isset($formErrors['firstname']) ? 'is-valid' : 'is-invalid' ?>" type="text" name="firstname" id="firstname" placeholder="John" value="<?= isset($_POST['firstname']) ? $_POST['firstname'] : '' ?>" required />
                    <?php if (isset($formErrors['firstname'])) {
                        ?>
                        <div class="invalid-feedback">
                            <p><?= $formErrors['firstname'] ?></p>
                        </div>
                    <?php } ?>
                    <label for="address">Adresse</label>
                    <input class="form-control <?= !isset($formErrors['address']) ? 'is-valid' : 'is-invalid' ?>" type="text" name="address" id="address" placeholder="1 rue des métiers" value="<?= isset($_POST['address']) ? $_POST['address'] : '' ?>" required />
                    <?php if (isset($formErrors['address'])) {
                        ?>
                        <div class="invalid-feedback">
                            <p><?= $formErrors['address'] ?></p>
                        </div>
                    <?php } ?>
                    <label for="postalCode">Code postal</label>
                    <input class="form-control <?= !isset($formErrors['postalCode']) ? 'is-valid' : 'is-invalid' ?>" type="text" name="postalCode" id="postalCode" placeholder="60000" value="<?= isset($_POST['postalCode']) ? $_POST['postalCode'] : '' ?>" required />
                    <?php if (isset($formErrors['postalCode'])) {
                        ?>
                        <div class="invalid-feedback">
                            <p><?= $formErrors['postalCode'] ?></p>
                        </div>
                    <?php } ?>
                    <label for="city">Ville</label>
                    <input class="form-control <?= !isset($formErrors['city']) ? 'is-valid' : 'is-invalid' ?>" type="text" name="city" id="city" placeholder="Beauvais" value="<?= isset($_POST['city']) ? $_POST['city'] : '' ?>" required />
                    <?php if (isset($formErrors['city'])) {
                        ?>
                        <div class="invalid-feedback">
                            <p><?= $formErrors['city'] ?></p>
                        </div>
                    <?php } ?>
                    <label for="phone">Numéro de téléphone</label>
                    <input class="form-control <?= !isset($formErrors['phone']) ? 'is-valid' : 'is-invalid' ?>" type="text" name="phone" id="phone" placeholder="06.01.02.03.04" value="<?= isset($_POST['phone']) ? $_POST['phone'] : '' ?>" required />
                    <?php if (isset($formErrors['phone'])) {
                        ?>
                        <div class="invalid-feedback">
                            <p><?= $formErrors['phone'] ?></p>
                        </div>
                    <?php } ?>
                    <label for="mail">Adresse mail</label>
                    <input class="form-control <?= !isset($formErrors['mail']) ? 'is-valid' : 'is-invalid' ?>" type="email" name="mail" id="mail" placeholder="exemple@mail.com" value="<?= isset($_POST['mail']) ? $_POST['mail'] : '' ?>" required />
                    <?php if (isset($formErrors['mail'])) {
                        ?>
                        <div class="invalid-feedback">
                            <p><?= $formErrors['mail'] ?></p>
                        </div>
                    <?php } ?>
                    <label for="mailVerification">Confirmation de l'adresse mail</label>
                    <input class="form-control <?= !isset($formErrors['mailAreDifferent']) ? 'is-valid' : 'is-invalid' ?>" type="email" name="mailVerification" id="mailVerification" placeholder="exemple@mail.com" value="<?= isset($_POST['mailVerification']) ? $_POST['mailVerification'] : '' ?>" required />
                    <?php if (isset($formErrors['mailAreDifferent'])) {
                        ?>
                        <div class="invalid-feedback">
                            <p><?= $formErrors['mailAreDifferent'] ?></p>
                        </div>
                    <?php } ?>
                    <label for="password">Mot de passe</label>
                    <input class="form-control <?= !isset($formErrors['password']) ? 'is-valid' : 'is-invalid' ?>" type="text" name="password" id="userName" placeholder="Votre mot de passe" value="<?= isset($_POST['password']) ? $_POST['password'] : '' ?>" required />
                    <?php if (isset($formErrors['password'])) {
                        ?>
                        <div class="invalid-feedback">
                            <p><?= $formErrors['password'] ?></p>
                        </div>
                    <?php } ?>
                    <div class="checkbox">
                    <input class="form-check-input <?= !isset($formErrors['termsOfUse']) ? 'is-valid' : 'is-invalid' ?>" type="checkbox" id="termsOfUse" name="termsOfUse">
                    <label class="form-check-label" for="termsOfUse">J'accepte les conditions d'utilisation.</label>
                    </div>
                    <input type="submit" name="submit" value="Envoyer" class="btn btn-outline-warning registrationBtn" />
                </form>
            </div>
            <a href="index.php">Retour</a>
        <?php } else { ?>
            <div class="validSubmit">
                <p>Vos données ont bien été envoyées.</p>
            </div>
            <div class="jumbotron">
                <p>Vous êtes un <?= $type ?></p>
                <p>Nom : <?= $lastname; ?></p>
                <p>Prénom : <?= $firstname; ?></p>
                <p>Adresse : <?= $address; ?></p>
                <p>Code postal : <?= $postalCode; ?></p>
                <p>Ville : <?= $city; ?></p>
                <p>Numéro de téléphone : <?= $phone; ?></p>
                <p>Adresse mail : <?= $mail; ?></p>
                <p>Mot de passe : <?= $password; ?></p>
            </div>
            <button type="button" class="btn btn-outline-warning registrationBtn" onclick="javascript:location.href = 'connection.php'">Suivant</button>

            <div class="return">
                <a class="test" href="index.php">Retour</a>
            </div>
        <?php } ?>
    </div>
</div>
</section>
<?php include_once 'footerSecondary.php'; ?>