<?php

$formErrors = array();

if (count($_POST) > 0) {
    $particularUsers = new particularUsers();
    if (!empty($_POST['mail'])) {
        if (preg_match($patternMail, $_POST['mail'])) {
            $particularUsers->mail = htmlspecialchars($_POST['mail']);
        } else {
            $formErrors['mail'] = 'Ce mail est incorrect';
        }
    } else {
        $formErrors['mail'] = 'L\'adresse mail est obligatoire';
    }

    if (!isset($_POST['password']) || empty($_POST['password'])) {
        $formErrors['password'] = 'Le mot de passe est obligatoire';
    }

    if (count($formErrors) == 0) {
        //Après mes vérifications habituelles, je lance ma méthode checkUser afin de vérifier si l'utilisateur existe bien.
        $check = $particularUsers->checkUser();
        if ($check->number == 1) {
            //Si l'utilisateur existe je récupère le hash de son mot de passe pour le comparé au mot de passe tapé
            $hash = $particularUsers->getHashByMail();
            //On utilise la fonction password_verify pour vérifier que les mots de passe correspondent
            if (password_verify($_POST['password'], $hash->password)) {
                /**
                 * Si les mots de passe correspondent, on crée une session et les variables de session qui contiendront
                 * tous les éléments que l'on souhaite conserver tout au long de la connexion
                 * Il faut appeler session_start sur toutes les pages pour que l'on ai accès aux
                 * variables de session. C'est ce qui constitue la connexion en elle-même.
                 */
                session_start();
                $_SESSION['id'] = $hash->id;
                if ($hash->id_al2jt_userGroup == 2) {
                    header('Location: bienvenue.html');
                } elseif ($hash->id_al2jt_userGroup == 3) {
                    header('Location: ../professionnal/professionnalUser.php');
                } elseif ($hash->id_al2jt_userGroup == 1) {
                    header('Location: ../admin/adminUser.php');
            }
            } else {
                $formErrors['mail'] = 'L\'email et/ou le mot de passe est invalide';
                $formErrors['password'] = 'L\'email et/ou le mot de passe est invalide';
            }
        } else {
            $formErrors['mail'] = 'L\'email et/ou le mot de passe est invalide';
            $formErrors['password'] = 'L\'email et/ou le mot de passe est invalide';
        }
    }
}


