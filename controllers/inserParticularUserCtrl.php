<?php

$formErrors = array();

if (isset($_POST['searchCity'])) {
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

        if (!empty($_POST['id_al2jt_userGroup'])) {
            if ($_POST['id_al2jt_userGroup'] === '2' || $_POST['id_al2jt_userGroup'] === '3') {
                $particularUsers->id_al2jt_userGroup = $_POST['id_al2jt_userGroup'];
            } else {
                $formErrors['id_al2jt_userGroup'] = 'Votre choix est incorrect.';
            }
        } else {
            $formErrors['id_al2jt_userGroup'] = 'Veuillez renseigner si vous êtes un particulier ou un professionnel.';
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

        if ($_POST['id_al2jt_userGroup'] === '2' && (!isset($formErrors['id_al2jt_userGroup']))) {
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
        }

        if ($_POST['id_al2jt_userGroup'] === '3' && (!isset($formErrors['id_al2jt_userGroup']))) {
            if (!empty($_POST['companyName'])) {
                if (preg_match($patternName, $_POST['companyName'])) {
                    $company->name = htmlspecialchars($_POST['companyName']);
                } else {
                    $formErrors['companyName'] = 'Le nom de l\'entreprise est incorrect.';
                }
            } else {
                $formErrors['companyName'] = 'Veuillez renseigner le nom de votre entreprise.';
            }

            if (!empty($_POST['siretNumber'])) {
                if (preg_match($patternSiretNumber, $_POST['siretNumber'])) {
                    $company->siret = htmlspecialchars($_POST['siretNumber']);
                } else {
                    $formErrors['siretNumber'] = 'Le numéro de siret est incorrect.';
                }
            } else {
                $formErrors['siretNumber'] = 'Veuillez renseigner le numéro de siret de votre entreprise.';
            }

            if (!empty($_POST['leaderLastname'])) {
                if (preg_match($patternName, $_POST['leaderLastname'])) {
                    $company->leader = htmlspecialchars($_POST['leaderLastname']);
                    $particularUsers->lastname = htmlspecialchars($_POST['leaderLastname']);
                } else {
                    $formErrors['leaderLastname'] = 'Votre nom est incorrect.';
                }
            } else {
                $formErrors['leaderLastname'] = 'Veuillez renseigner votre nom.';
            }

            if (!empty($_POST['leaderFirstname'])) {
                if (preg_match($patternName, $_POST['leaderFirstname'])) {
                    $particularUsers->firstname = htmlspecialchars($_POST['leaderFirstname']);
                } else {
                    $formErrors['leaderFirstname'] = 'Votre prénom est incorrect.';
                }
            } else {
                $formErrors['leaderFirstname'] = 'Veuillez renseigner votre prénom.';
            }
        }

        if (!empty($_POST['address'])) {
            if (preg_match($patternAddress, $_POST['address'])) {
                $particularUsers->address = htmlspecialchars($_POST['address']);
                if($_POST['id_al2jt_userGroup'] === '3'){
                    $company->address = htmlspecialchars($_POST['address']);
                }
            } else {
                $formErrors['address'] = 'Votre adresse est incorrecte.';
            }
        } else {
            $formErrors['address'] = 'Veuillez renseigner votre adresse.';
        }

        if (!empty($_POST['cityId'])) {
            $cityId = htmlspecialchars($_POST['cityId']);
            $particularUsers->id_al2jt_city = $cityId;
            if($_POST['id_al2jt_userGroup'] === '3'){
                    $company->id_al2jt_city = htmlspecialchars($_POST['cityId']);
                }
        } else {
            $formErrors['cityId'] = 'Veuillez renseigner votre ville.';
        }

        if (!empty($_POST['phoneNumber'])) {
            if (preg_match($patternPhone, $_POST['phoneNumber'])) {
                $particularUsers->phoneNumber = htmlspecialchars($_POST['phoneNumber']);
                if($_POST['id_al2jt_userGroup'] === '3'){
                    $company->phoneNumber = htmlspecialchars($_POST['phoneNumber']);
                }
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

        if ($_POST['mail'] != $_POST['mailVerification']) {
            $formErrors['mailAreDifferent'] = 'Veuillez confirmer votre adresse mail correctement.';
        }

        if (!empty($_POST['password'])) {
            $particularUsers->password = htmlspecialchars($_POST['password']);
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
        if (count($formErrors) == 0) {
            if ($particularUsersInsert = $particularUsers->inserParticularUser()) {
                $formSuccess = 'Enregistrement effectué';
                $companyInser = $company->inserCompany();
            } else {
                $formErrors['add'] = 'Une erreur est survenue';
            }
        }
    }
}
?>



