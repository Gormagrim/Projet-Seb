<?php
include_once 'navbarSecondary.php';
include_once('regex.php');
$page = $_SERVER['PHP_SELF'];
?>

<?php
$formErrors = array();

if (count($_POST) > 0) {

    if (!empty($_POST['type'])) {
        if ($_POST['type'] === 'Particulier' || $_POST['type'] === 'Professionnel') {
            $type = $_POST['type'];
        } else {
            $formErrors['type'] = 'Vôtre choix est incorrect.';
        }
    } else {
        $formErrors['type'] = 'Veuillez renseigner si vous êtes un partuculier ou un professionnel.';
    }

    if (!empty($_POST['gender'])) {
        if ($_POST['gender'] == 'Madame' || $_POST['gender'] == 'Monsieur') {
            $gender = htmlspecialchars($_POST['gender']);
        } else {
            $formErrors['gender'] = 'Merci de selectionner un genre existant.';
        }
    } else {
        $formErrors['gender'] = 'Veuillez faire un choix.';
    }

    if ($_POST['type'] === 'Particulier' && (!isset($formErrors['type']))) {
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
    }

    if ($_POST['type'] === 'Professionnel' && (!isset($formErrors['type']))) {
        if (!empty($_POST['companyName'])) {
            if (preg_match($patternName, $_POST['companyName'])) {
                $companyName = htmlspecialchars($_POST['companyName']);
            } else {
                $formErrors['companyName'] = 'Le nom de l\'entreprise est incorrect.';
            }
        } else {
            $formErrors['companyName'] = 'Veuillez renseigner le nom de votre entreprise.';
        }

        if (!empty($_POST['siretNumber'])) {
            if (preg_match($patternSiretNumber, $_POST['siretNumber'])) {
                $siretNumber = htmlspecialchars($_POST['siretNumber']);
            } else {
                $formErrors['siretNumber'] = 'Le numéro de siret est incorrect.';
            }
        } else {
            $formErrors['siretNumber'] = 'Veuillez renseigner le numéro de siret de votre entreprise.';
        }

        if (!empty($_POST['leaderLastname'])) {
            if (preg_match($patternName, $_POST['leaderLastname'])) {
                $leaderLastname = htmlspecialchars($_POST['leaderLastname']);
            } else {
                $formErrors['leaderLastname'] = 'Votre nom est incorrect.';
            }
        } else {
            $formErrors['leaderLastname'] = 'Veuillez renseigner votre nom.';
        }

        if (!empty($_POST['leaderFirstname'])) {
            if (preg_match($patternName, $_POST['leaderFirstname'])) {
                $leaderFirstname = htmlspecialchars($_POST['leaderFirstname']);
            } else {
                $formErrors['leaderFirstname'] = 'Votre prénom est incorrect.';
            }
        } else {
            $formErrors['leaderFirstname'] = 'Veuillez renseigner votre prénom.';
        }
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

    if ($_POST['password'] != $_POST['passwordVerification']) {
        $formErrors['passwordAreDifferent'] = 'Veuillez confirmer votre mot de passe correctement.';
    }

    if (!empty($_POST['termsOfUse'])) {
        $termsOfUse = htmlspecialchars($_POST['termsOfUse']);
    } else {
        $formErrors['termsOfUse'] = 'Veuillez accepter les conditions d\'utilisation.';
    }
}
?>
<div class="registrationSection row">
    <div class="offset-1 col-10 offset-sm-1 col-sm-10 offset-md-1 col-md-10 offset-lg-3 col-lg-6 registration">
        <?php
// On affiche le formulaire si rien a été envoyé ou qu'il y a une erreur dans ce qui à été saisi.
        if (count($_POST) == 0 || count($formErrors) > 0) {
            ?>
            <div class="formRegistration">
                <h2><span class="orange">.</span>Formulaire d'inscription :</h2>
                <form name="registrationForm" action="registration.php" method="POST">
                    <fieldset>
                        <legend><span class="orange">.</span>Type D'inscription</legend>
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12">
                                <input type="radio" name="type" <?= isset($_POST['type']) && $_POST['type'] == 'Particulier' ? 'checked' : '' ?> value="Particulier" id="Particulier" /> <label for="Particulier">Particulier</label>
                                <input type="radio" name="type" <?= isset($_POST['type']) && $_POST['type'] == 'Professionnel' ? 'checked' : '' ?> value="Professionnel" id="Professionnel" /> <label for="Professionnel">Professionnel</label>
                                <?php if (isset($formErrors['type'])) { ?>
                                    <div class="invalid-feedback">
                                        <p><?= $formErrors['type'] ?></p>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </fieldset>
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
                                    <input class="form-control lastname <?= isset($formErrors['lastname']) ? 'is-invalid' : (isset($lastname) ? 'is-valid' : '') ?>" type="text" name="lastname" id="lastname" placeholder="Doe" value="<?= isset($_POST['lastname']) ? $_POST['lastname'] : '' ?>" required />
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
                                    <input class="form-control <?= isset($formErrors['firstname']) ? 'is-invalid' : (isset($firstname) ? 'is-valid' : '') ?>" type="text" name="firstname" id="firstname" placeholder="John" value="<?= isset($_POST['firstname']) ? $_POST['firstname'] : '' ?>" required />
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
                    <div class="professionnalUser">
                        <fieldset>
                            <legend><span class="orange">.</span>Entreprise</legend>
                            <div class="row">
                                <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                                    <label for="companyName">Nom de l'entreprise</label>
                                    <input class="form-control <?= isset($formErrors['companyName']) ? 'is-invalid' : (isset($companyName) ? 'is-valid' : '') ?>" type="text" name="companyName" id="companyName" placeholder="an izi company" value="<?= isset($_POST['companyName']) ? $_POST['companyName'] : '' ?>" required />
                                    <?php if (isset($formErrors['companyName'])) {
                                        ?>
                                        <div class="invalid-feedback">
                                            <p><?= $formErrors['companyName'] ?></p>
                                        </div>
                                    <?php } ?>
                                </div>
                                <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                                    <label for="companySiret">Numero de Siret</label>
                                    <input class="form-control <?= isset($formErrors['siretNumber']) ? 'is-invalid' : (isset($siretNumber) ? 'is-valid' : '') ?>" type="text" name="siretNumber" id="siretNumber" placeholder="123 456 789 12345" value="<?= isset($_POST['siretNumber']) ? $_POST['siretNumber'] : '' ?>" required />
                                    <?php if (isset($formErrors['siretNumber'])) {
                                        ?>
                                        <div class="invalid-feedback">
                                            <p><?= $formErrors['siretNumber'] ?></p>
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                                    <label class="d-flex justify-content-start" for="lastname">Nom de famille du dirigeant</label>
                                    <input class="form-control lastname <?= isset($formErrors['leaderLastname']) ? 'is-invalid' : (isset($leaderLastname) ? 'is-valid' : '') ?>" type="text" name="leaderLastname" id="leaderLastname" placeholder="Doe" value="<?= isset($_POST['leaderLastname']) ? $_POST['leaderLastname'] : '' ?>" required />
                                    <?php if (isset($formErrors['leaderLastname'])) {
                                        ?>
                                        <div class="invalid-feedback">
                                            <p><?= $formErrors['leaderLastname'] ?></p>
                                        </div>
                                    <?php } ?>
                                </div>
                                <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                                    <label for="firstname">Prénom du dirigeant</label>
                                    <input class="form-control <?= isset($formErrors['leaderFirstname']) ? 'is-invalid' : (isset($leaderFirstname) ? 'is-valid' : '') ?>" type="text" name="leaderFirstname" id="leaderFirstname" placeholder="John" value="<?= isset($_POST['leaderFirstname']) ? $_POST['leaderFirstname'] : '' ?>" required />
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
                                <label for="postalCode">Code postal</label>
                                <input class="form-control <?= isset($formErrors['postalCode']) ? 'is-invalid' : (isset($postalCode) ? 'is-valid' : '') ?>" type="text" name="postalCode" id="postalCode" placeholder="60000" value="<?= isset($_POST['postalCode']) ? $_POST['postalCode'] : '' ?>" required />
                                <?php if (isset($formErrors['postalCode'])) {
                                    ?>
                                    <div class="invalid-feedback">
                                        <p><?= $formErrors['postalCode'] ?></p>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                                <label for="city">Ville</label>
                                <input class="form-control <?= isset($formErrors['city']) ? 'is-invalid' : (isset($city) ? 'is-valid' : '') ?>" type="text" name="city" id="city" placeholder="Beauvais" value="<?= isset($_POST['city']) ? $_POST['city'] : '' ?>" required />
                                <?php if (isset($formErrors['city'])) {
                                    ?>
                                    <div class="invalid-feedback">
                                        <p><?= $formErrors['city'] ?></p>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-6 col-md-6 col-lg-6">
                                <label for="phone">Numéro de téléphone</label>
                                <input class="form-control <?= isset($formErrors['phone']) ? 'is-invalid' : (isset($phone) ? 'is-valid' : '') ?>" type="text" name="phone" id="phone" placeholder="06.01.02.03.04" value="<?= isset($_POST['phone']) ? $_POST['phone'] : '' ?>" required />
                                <?php if (isset($formErrors['phone'])) {
                                    ?>
                                    <div class="invalid-feedback">
                                        <p><?= $formErrors['phone'] ?></p>
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
    <a href="index.php">Retour</a>
<?php } else { ?>
    <div class="validSubmit">
        <p>Vos données ont bien été envoyées.</p>
    </div>
    <div class="jumbotron">
        <p>Vous êtes un <?= $type ?></p>
        <?php if($_POST['type'] === 'Particulier') {  ?>
        <p>Nom : <?= $lastname; ?></p>
        <p>Prénom : <?= $firstname; ?></p>
        <?php } else {  ?>
        <p>Nom de l'entreprise : <?= $companyName; ?></p>
        <p>Numéro de siret : <?= $siretNumber; ?></p>
        <p>Nom du dirigeant : <?= $leaderLastname; ?></p>
        <p>Prénom du dirigeant : <?= $leaderFirstname; ?></p>
        <?php } ?>
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
<?php include_once 'footerSecondary.php'; ?>