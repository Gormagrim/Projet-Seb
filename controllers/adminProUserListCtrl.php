<?php

$professionnalUsers = new particularUsers();
$getProUserList = $professionnalUsers->getProUserList();
$production = new production();
$getNumberOfProduction = $production->getNumberOfProduction();
$countProfessionnalUser = $professionnalUsers->countProfessionnalUser();

if (!empty($_GET['id'])) {
    if (preg_match($regexId, $_GET['id'])) {
        $professionnalUsers->id = htmlspecialchars($_GET['id']);
        $deleteUser = $professionnalUsers->deleteUser();
        $getProUserList = $professionnalUsers->getProUserList();
    }
}

