<?php

$formErrors = array();

if (!empty($_SESSION['id'])) {
    if (preg_match($regexId, $_SESSION['id'])) {
        $professionnalUsers = new particularUsers();
        $company = new company();
        $getProductionInfo = $company->getOneProductionInformation();
        $production = new production();
        $photo = new photo();

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
                $production = new production();
                $photo = new photo();
                $category = new category();

                if (!empty($_POST['photoDescription'])) {
                    $photo->description = htmlspecialchars($_POST['photoDescription']);
                } else {
                    $formErrors['photoDescription'] = 'Veuillez renseigner votre nom de chantier';
                }

                if (!empty($_POST['produtionName'])) {
                    $production->title = htmlspecialchars($_POST['produtionName']);
                } else {
                    $formErrors['produtionName'] = 'Veuillez renseigner votre nom de chantier';
                }

                if (!empty($_POST['photoName'])) {
                    $photo->title = htmlspecialchars($_POST['photoName']);
                } else {
                    $formErrors['photoName'] = 'Veuillez renseigner votre nom de photo';
                }
                
                if (!empty($_FILES['file']) && $_FILES['file']['error'] == 0) {
                    // On stock dans $fileInfos les informations concernant le chemin du fichier.
                    $fileInfos = pathinfo($_FILES['file']['name']);
                    // On crée un tableau contenant les extensions autorisées.
                    $fileExtension = ['jpeg', 'jpg', 'JPG'];
                    // On verifie si l'extension de notre fichier est dans le tableau des extension autorisées.
                    if (in_array($fileInfos['extension'], $fileExtension)) {
                        //On définit le chemin vers lequel uploader le fichier
                        $path = 'uploads/';
                        //On crée une date pour différencier les fichiers
                        $date = date('Y-m-d_H-i-s');
                        //On crée le nouveau nom du fichier (celui qu'il aura une fois uploadé)
                        $fileNewName = $photo->title . '_' . $date;
                        //On stocke dans une variable le chemin complet du fichier (chemin + nouveau nom + extension une fois uploadé) Attention : ne pas oublier le point
                        $fileFullPath = $path . $fileNewName . '.' . $fileInfos['extension'];
                        //move_uploaded_files : déplace le fichier depuis son emplacement temporaire ($_FILES['file']['tmp_name']) vers son emplacement définitif ($fileFullPath)
                        if (move_uploaded_file($_FILES['file']['tmp_name'], $fileFullPath)) {
                            //On définit les droits du fichiers uploadé (Ici : écriture et lecture pour l'utilisateur apache, lecture uniquement pour le groupe et tout le monde)
                            chmod($fileFullPath, 0744);
                            $photo->photo = $fileFullPath;
                        } else {
                            $formErrors['file'] = 'Votre fichier ne s\'est pas téléversé correctement';
                        }
                    } else {
                        $formErrors['file'] = 'Votre fichier n\'est pas du format attendu';
                    }
                } else {
                    $formErrors['file'] = 'Veuillez selectionner un fichier';
                }
                // VERIFICATION TYPE DE PRODUCTION
                if (!empty($_POST['productionType'])) {
                    $production->id_al2jt_typeOfProduction = htmlspecialchars($_POST['productionType']);
                } else {
                    $formErrors['productionType'] = 'Veuillez renseigner un type de chantier';
                }

                if (!empty($_POST['explanatoryText'])) {
                    $production->descriptionText = htmlspecialchars($_POST['explanatoryText']);
                } else {
                    $formErrors['explanatoryText'] = 'Veuillez renseigner un descriptif à votre réalisation';
                }

                if (!empty($_POST['cityId'])) {
                    $cityId = htmlspecialchars($_POST['cityId']);
                    $production->id_al2jt_city = $cityId;
                } else {
                    $formErrors['cityId'] = 'Veuillez renseigner votre ville.';
                }
                
                if (count($formErrors) == 0) {
                    if ($insertProduction = $production->updateProduction()) {
                        $formSuccess = 'Modification effectué';
                    } else {
                        $formErrors['add'] = 'Une erreur est survenue';
//                DELETE  à prevoir !!!!!!
                    }
                }
            }
        }
    }
}
?>

