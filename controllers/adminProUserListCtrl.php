<?php

$professionnalUsers = new particularUsers();
$getProUserList = $professionnalUsers->getProUserList();
$production = new production();
$getNumberOfProduction = $production->getNumberOfProduction();
$countProfessionnalUser = $professionnalUsers->countProfessionnalUser();

if (!empty($_GET['id'])) {
    if (preg_match($regexId, $_GET['id'])) {
        $professionnalUsers->id = htmlspecialchars($_GET['id']);
        $activeUser = $professionnalUsers->activeUser();
        $getProUserList = $professionnalUsers->getProUserList();
    }
}

if (!empty($_GET['idDesactive'])) {
    if (preg_match($regexId, $_GET['idDesactive'])) {
        $professionnalUsers->id = htmlspecialchars($_GET['idDesactive']);
        $deleteUser = $professionnalUsers->deleteUser();
        $getProUserList = $professionnalUsers->getProUserList();
    }
}