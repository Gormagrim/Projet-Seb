<?php

require_once '../regex.php';

$professionnalUsers = new particularUsers();

if (!empty($_SESSION['id'])) {
    if (preg_match($regexId, $_SESSION['id'])) {
        $professionnalUsers->id = htmlspecialchars($_SESSION['id']);
        $professionnalUserInfo = $professionnalUsers->getProfessionnalInformation();
        
    }
}