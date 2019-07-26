<?php

/*
 * CONTROLLER de ma méthode "inserParticularUser()"
 * 
 * je crée un tableau d'erreur vide, il permettra le stockage des différents messages d'erreurs de mon formulaire
 */
$formErrors = array();
/*
 * Je stocke tout ce dont j'ai besoin pour ma méthode Ajax de recherche de ville dans le premier if
 * Et je dis que  s'il existe un $_POST['searchCity'] alors je lance la méthode Ajax
 */

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
    /*
     * Je stocke dans une variable un ternaire qui me permet de savoir si le $_GET['type'] est égal à "professionnel"
     * Si c'est le cas, je stocke dans ma variable "true" (booléen), ça me permet de gérer l'affichage de mon
     * formulaire d'inscription en fonction de l'onglet choisi sur la page d'accueil.
     */
    $isProfessionnal = (isset($_GET['type']) ? ($_GET['type'] == 'professionnel' ? true : false) : '');
    /*
     * je crée une condition où je compte si le nombre de $_POST est supérieur à 0
     * je vérifie sur les données renseignées sont valides avant d'éxecuter ma méthode "insertParticularUsers()"
     */
    if (count($_POST) > 0) {
        /*
         * j'instancie mon objet particularUsers() 
         * je crée une variable ($particularUsers) qui devient un objet $particularUsers et à accès à tous les attributs et toutes les méthodes
         * je fais le même chose pour mon objet company() pour le professionnel
         */
        $particularUsers = new particularUsers();
        $company = new company();
        // on vérifie que la variable $_POST['id_al2jt_userGroup'] existe ET n'est pas vide.
        if (!empty($_POST['id_al2jt_userGroup'])) {
            if ($_POST['id_al2jt_userGroup'] === '2' || $_POST['id_al2jt_userGroup'] === '3') {
                /*
                 * on initialise l'objet $particularUsers et son attribut ($particularUsers->id_al2jt_userGroup) en lui donnant la valeur de ma variable ($_POST['id_al2jt_userGroup'])
                 */
                $particularUsers->id_al2jt_userGroup = $_POST['id_al2jt_userGroup'];
            } else {
                $formErrors['id_al2jt_userGroup'] = 'Votre choix est incorrect.';
            }
        } else {
            $formErrors['id_al2jt_userGroup'] = 'Veuillez renseigner si vous êtes un particulier ou un professionnel.';
        }



        if (!$isProfessionnal) {
            if ($_POST['id_al2jt_userGroup'] === '2' && (!isset($formErrors['id_al2jt_userGroup']))) {
                if (!empty($_POST['gender'])) {
                    if ($_POST['gender'] == 'Madame' || $_POST['gender'] == 'Monsieur') {
                        $gender = htmlspecialchars($_POST['gender']);
                    } else {
                        $formErrors['gender'] = 'Merci de selectionner un genre existant.';
                    }
                } else {
                    $formErrors['gender'] = 'Veuillez faire un choix.';
                }
                // on vérifie que la variable $_POST['lastname'] existe ET n'est pas vide.
                if (!empty($_POST['lastname'])) {
                    // Je vérifie bien que ma variable $_POST['lastname'] correspond à ma patternName.
                    if (preg_match($patternName, $_POST['lastname'])) {
                        /* On stocke dans la variable lastname la variable $_POST['lastname'] dont on a désactivé les balises HTML.
                         * Pour échapper le code HTML, il suffit d'utiliser la fonction htmlspecialchars qui va transformer les chevrons des balises HTML<>en &lt; et &gt; respectivement. 
                         * Cela provoquera l'affichage de la balise plutôt que son exécution.
                         */
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
        } else if ($isProfessionnal) {
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

                if (!empty($_POST['siret'])) {
                    if (preg_match($patternSiretNumber, $_POST['siret'])) {
                        $company->siret = htmlspecialchars($_POST['siret']);
                    } else {
                        $formErrors['siret'] = 'Le numéro de siret est incorrect.';
                    }
                } else {
                    $formErrors['siret'] = 'Veuillez renseigner le numéro de siret de votre entreprise.';
                }

                if (!empty($_POST['leaderLastname'])) {
                    if (preg_match($patternName, $_POST['leaderLastname'])) {
                        if ($_POST['id_al2jt_userGroup'] === '3') {
                            $company->leader = htmlspecialchars($_POST['leaderLastname']);
                            $particularUsers->lastname = htmlspecialchars($_POST['leaderLastname']);
                        }
                    } else {
                        $formErrors['leaderLastname'] = 'Votre nom est incorrect.';
                    }
                } else {
                    $formErrors['leaderLastname'] = 'Veuillez renseigner votre nom.';
                }

                if (!empty($_POST['leaderFirstname'])) {
                    if ($_POST['id_al2jt_userGroup'] === '3') {
                        if (preg_match($patternName, $_POST['leaderFirstname'])) {
                            $particularUsers->firstname = htmlspecialchars($_POST['leaderFirstname']);
                        }
                    } else {
                        $formErrors['leaderFirstname'] = 'Votre prénom est incorrect.';
                    }
                } else {
                    $formErrors['leaderFirstname'] = 'Veuillez renseigner votre prénom.';
                }
            }
        }

        if (!empty($_POST['address'])) {
            if (preg_match($patternAddress, $_POST['address'])) {
                $particularUsers->address = htmlspecialchars($_POST['address']);
                if ($_POST['id_al2jt_userGroup'] === '3') {
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
            if ($_POST['id_al2jt_userGroup'] === '3') {
                $company->id_al2jt_city = htmlspecialchars($_POST['cityId']);
            }
        } else {
            $formErrors['cityId'] = 'Veuillez renseigner votre ville.';
        }

        if (!empty($_POST['phoneNumber'])) {
            if (preg_match($patternPhone, $_POST['phoneNumber'])) {
                $particularUsers->phoneNumber = htmlspecialchars($_POST['phoneNumber']);
                if ($_POST['id_al2jt_userGroup'] === '3') {
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
                $check = $particularUsers->checkUser();
                if ($check->number > 0) {
                    $formErrors['mail'] = 'Un compte avec ce mail existe déjà';
                }
            } else {
                $formErrors['mail'] = 'Votre adresse mail est incorrecte.';
            }
        } else {
            $formErrors['mail'] = 'Veuillez renseigner votre adresse mail.';
        }

        if ($_POST['mail'] != $_POST['mailVerification']) {
            $formErrors['mailAreDifferent'] = 'Veuillez confirmer votre adresse mail correctement.';
        }

        if (!empty($_POST['password']) && ($_POST['password'] == $_POST['passwordVerification'])) {
            /*
             * Changer le password_default !!!!!!!!
             */
            $particularUsers->password = password_hash($_POST['password'], PASSWORD_ARGON2I);
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

        $_POST['active'] = false;

        $chaine = ('abcdefghijklmnopkrstuvwxyz0123456789');
        $cle = md5(str_shuffle(substr($chaine, rand(0, 36), rand(0, 36))));

        $particularUsers->cle = $cle;

        if (count($formErrors) == 0) {
            if ($particularUsersInsert = $particularUsers->inserParticularUser()) {


                if ($_POST['id_al2jt_userGroup'] === '3') {
                    $company->id_al2jt_user = $particularUsersInsert;
                    // Préparation du mail contenant le lien d'activation
                    $destinataire = $particularUsers->mail;
                    $sujet = "Activation de votre votre compte";
                    $entete = "From: izi.travaux@zohomail.eu";

                    // Le lien d'activation est composé du login(log) et de la clé(cle)
                    $message = 'Bienvenue sur Votre Site,
 
                Pour activer votre compte, veuillez cliquer sur le lien ci dessous
                ou copier/coller dans votre navigateur internet.
 
                http://projetbtp/activation.php?log=' . urlencode($particularUsers->mail) . '&cle=' . urlencode($particularUsers->cle) . ';
 
 
                ---------------
                Ceci est un mail automatique, Merci de ne pas y répondre.';


                    mail($destinataire, $sujet, $message, $entete); // Envoi du mail
                    if ($company->inserCompany()) {
                        $formSuccess = 'Enregistrement de votre compte et de l\'entreprise effectué';
                    } else {
                        $formSuccess = 'Enregistrement de votre compte  effectué. Une erreur est survenue lors de la création de l\entreprise';
                    }
                }
            } else {
                $formErrors['add'] = 'Une erreur est survenue';
//                DELETE $particularUsersInsert à prevoir !!!!!!
            }
        }
    }
}
?>



