<?php

$formErrors = array();

if (!empty($_SESSION['id'])) {
    if (preg_match($regexId, $_SESSION['id'])) {
        $professionnalUsers = new particularUsers();
        $professionnalUsers->id = htmlspecialchars($_SESSION['id']);
        $professionnalUserInfo = $professionnalUsers->getProfessionnalInformation();

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
            if (count($_POST) > 0) {
                $professionnalUsers = new particularUsers();
                $company = new company();

                if (!empty($_POST['lastname'])) {
                    // Je vérifie bien que ma variable $_POST['lastname'] correspond à ma patternName.
                    if (preg_match($patternName, $_POST['lastname'])) {
                        // On stocke dans la variable lastname la variable $_POST['lastname'] dont on a désactivé les balises HTML.
                        $professionnalUsers->lastname = htmlspecialchars($_POST['lastname']);
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
                        $professionnalUsers->firstname = htmlspecialchars($_POST['firstname']);
                    } else {
                        $formErrors['firstname'] = 'Votre prénom est incorrect.';
                    }
                } else {
                    $formErrors['firstname'] = 'Veuillez renseigner votre prénom.';
                }

                if (!empty($_POST['phoneNumber'])) {
                    if (preg_match($patternPhone, $_POST['phoneNumber'])) {
                        $professionnalUsers->phoneNumber = htmlspecialchars($_POST['phoneNumber']);
                    } else {
                        $formErrors['phoneNumber'] = 'Votre numéro de téléphone est incorrect.';
                    }
                } else {
                    $formErrors['phoneNumber'] = 'Veuillez renseigner votre numéro de téléphone.';
                }

                if (!empty($_POST['address'])) {
                    if (preg_match($patternAddress, $_POST['address'])) {
                        $professionnalUsers->address = htmlspecialchars($_POST['address']);
                    } else {
                        $formErrors['address'] = 'Votre adresse est incorrecte.';
                    }
                } else {
                    $formErrors['address'] = 'Veuillez renseigner votre adresse.';
                }

                if (!empty($_POST['cityId'])) {
                    $cityId = htmlspecialchars($_POST['cityId']);
                    $professionnalUsers->id_al2jt_city = $cityId;
                } else {
                    $formErrors['cityId'] = 'Veuillez renseigner votre ville.';
                }

                if (!empty($_POST['name'])) {
                    if (preg_match($patternName, $_POST['name'])) {
                        $professionnalUsers->name = htmlspecialchars($_POST['name']);
                    } else {
                        $formErrors['name'] = 'Le nom de l\'entreprise est incorrect.';
                    }
                } else {
                    $formErrors['name'] = 'Veuillez renseigner le nom de votre entreprise.';
                }
                
                if (!empty($_POST['mail'])) {
                    if (preg_match($patternMail, $_POST['mail'])) {
                        $professionnalUsers->mail = htmlspecialchars($_POST['mail']);
                    } else {
                        $formErrors['mail'] = 'L\'adresse mail est incorrect.';
                    }
                } else {
                    $formErrors['mail'] = 'Veuillez renseigner votre adresse mail.';
                }

                if (!empty($_POST['siret'])) {
                    if (preg_match($patternSiretNumber, $_POST['siret'])) {
                        $professionnalUsers->siret = htmlspecialchars($_POST['siret']);
                    } else {
                        $formErrors['siret'] = 'Le numéro de siret est incorrect.';
                    }
                } else {
                    $formErrors['siret'] = 'Veuillez renseigner le numéro de siret de votre entreprise.';
                }

                // PRESENTATION PHOTO
                if (!empty($_FILES['presentationPhoto']) && $_FILES['presentationPhoto']['error'] == 0) {
                    // On stock dans $fileInfos les informations concernant le chemin du fichier.
                    $fileInfos = pathinfo($_FILES['presentationPhoto']['name']);
                    // On crée un tableau contenant les extensions autorisées.
                    $fileExtension = ['jpeg', 'jpg', 'JPG'];
                    // On verifie si l'extension de notre fichier est dans le tableau des extension autorisées.
                    if (in_array($fileInfos['extension'], $fileExtension)) {
                        //On définit le chemin vers lequel uploader le fichier
                        $path = 'uploads/';
                        //On crée une date pour différencier les fichiers
                        $date = date('Y-m-d_H-i-s');
                        //On crée le nouveau nom du fichier (celui qu'il aura une fois uploadé)
                        $fileNewName = $professionnalUsers->name . '_' . $date;
                        //On stocke dans une variable le chemin complet du fichier (chemin + nouveau nom + extension une fois uploadé) Attention : ne pas oublier le point
                        $fileFullPath = $path . $fileNewName . '.' . $fileInfos['extension'];
                        //move_uploaded_files : déplace le fichier depuis son emplacement temporaire ($_FILES['file']['tmp_name']) vers son emplacement définitif ($fileFullPath)
                        if (move_uploaded_file($_FILES['presentationPhoto']['tmp_name'], $fileFullPath)) {
                            //On définit les droits du fichiers uploadé (Ici : écriture et lecture pour l'utilisateur apache, lecture uniquement pour le groupe et tout le monde)
                            chmod($fileFullPath, 0744);
                            $professionnalUsers->presentationPhoto = $fileFullPath;
                        } else {
                            $formErrors['presentationPhoto'] = 'Votre fichier ne s\'est pas téléversé correctement';
                        }
                    } else {
                        $formErrors['presentationPhoto'] = 'Votre fichier n\'est pas du format attendu';
                    }
                } else {
                    $formErrors['presentationPhoto'] = 'Veuillez selectionner un fichier';
                }

                // FIN PHOTO DE PRESENTATION

                if (!empty($_POST['leader'])) {
                    if (preg_match($patternName, $_POST['leader'])) {
                        $professionnalUsers->leader = htmlspecialchars($_POST['leader']);
                    } else {
                        $formErrors['leader'] = 'Votre nom est incorrect.';
                    }
                } else {
                    $formErrors['leader'] = 'Veuillez renseigner votre nom.';
                }

                if (!empty($_POST['numberOfEmploy'])) {
                    if (preg_match($regexId, $_POST['numberOfEmploy'])) {
                        $professionnalUsers->numberOfEmploy = htmlspecialchars($_POST['numberOfEmploy']);
                    } else {
                        $formErrors['numberOfEmploy'] = 'Merci d\'entrer un chiffre.';
                    }
                } else {
                    $formErrors['numberOfEmploy'] = 'Merci d\'entrer un chiffre.';
                }
                
                if (count($formErrors) == 0) {
                    $professionnalUsers->id = $_SESSION['id'];
                    if ($professionnalUsers->updateProfessionnalUserProfil()) {
                        $formSuccess = 'Enregistrement effectué';
                    } else {
                        $formErrors['add'] = 'Une erreur est survenue';
                    }
                }
            }
        }
    }
}