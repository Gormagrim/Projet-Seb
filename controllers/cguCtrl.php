<?php require_once 'regex.php';

$user = new particularUsers();

if (!empty($_SESSION['id'])) {
    if (preg_match($regexId, $_SESSION['id'])) {
        $user->id = htmlspecialchars($_SESSION['id']);
        $getUserInformation = $user->getUserInformation();
    }
}

