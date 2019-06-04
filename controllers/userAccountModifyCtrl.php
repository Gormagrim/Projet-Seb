<?php

$formErrors = array();

if (!empty($_SESSION['id'])) {
    if (preg_match($regexId, $_SESSION['id'])) {
        $particularUsers->id = htmlspecialchars($_SESSION['id']);

        if (isset($_POST['searchCity'])) {
            require_once '../models/database.php';
            require_once '../models/particularUsers.php';
            require_once '../models/city.php';
            require_once '../models/company.php';

            $city = new city();
            if (!empty($_POST['searchCity'])) {
                echo json_encode($city->searchCity(htmlspecialchars($_POST['searchCity'])));
            }
        } else {
            $city = new city();
            $company = new company();
            if (count($_POST) > 0) {
                $particularUsers = new particularUsers();
                $company = new company();

                // on vérifie que la variable $_POST['lastname'] existe ET n'est pas vide.
                if (!empty($_POST['lastname'])) {
                    // Je vérifie bien que ma variable $_POST['lastname'] correspond à ma patternName.
                    if (preg_match($patternName, $_POST['lastname'])) {
                        // On stocke dans la variable lastname la variable $_POST['lastname'] dont on a désactivé les balises HTML.
                        $particularUsers->lastname = htmlspecialchars($_POST['lastname']);
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
                        $particularUsers->firstname = htmlspecialchars($_POST['firstname']);
                    } else {
                        $formErrors['firstname'] = 'Votre prénom est incorrect.';
                    }
                } else {
                    $formErrors['firstname'] = 'Veuillez renseigner votre prénom.';
                }

                if (!empty($_POST['address'])) {
                    if (preg_match($patternAddress, $_POST['address'])) {
                        $particularUsers->address = htmlspecialchars($_POST['address']);
                    } else {
                        $formErrors['address'] = 'Votre adresse est incorrecte.';
                    }
                } else {
                    $formErrors['address'] = 'Veuillez renseigner votre adresse.';
                }

                if (!empty($_POST['cityId'])) {
                    $cityId = htmlspecialchars($_POST['cityId']);
                    $particularUsers->id_al2jt_city = $cityId;
                } else {
                    $formErrors['cityId'] = 'Veuillez renseigner votre ville.';
                }

                if (!empty($_POST['phoneNumber'])) {
                    if (preg_match($patternPhone, $_POST['phoneNumber'])) {
                        $particularUsers->phoneNumber = htmlspecialchars($_POST['phoneNumber']);
                    } else {
                        $formErrors['phoneNumber'] = 'Votre numéro de téléphone est incorrect.';
                    }
                } else {
                    $formErrors['phoneNumber'] = 'Veuillez renseigner votre numéro de téléphone.';
                }

                if (!empty($_POST['mail'])) {
                    if (preg_match($patternMail, $_POST['mail'])) {
                        $particularUsers->mail = htmlspecialchars($_POST['mail']);
                    } else {
                        $formErrors['mail'] = 'Votre adresse mail est incorrecte.';
                    }
                } else {
                    $formErrors['mail'] = 'Veuillez renseigner votre adresse mail.';
                }

                if (count($formErrors) == 0) {
                    $particularUsers->id = $_SESSION['id'];
                    if ($updateUserProfil = $particularUsers->updateUserProfil()) {
                        $formSuccess = 'Enregistrement effectué';
                    } else {
                        $formErrors['add'] = 'Une erreur est survenue';
                    }
                }
            }
        }
    }
}
?>



