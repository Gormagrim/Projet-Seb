<?php

$production = new production();
$getProductionList = $production->getProductionList();
$getNumberOfProduction = $production->getNumberOfProduction();

if (!empty($_GET['id'])) {
    if (preg_match($regexId, $_GET['id'])) {
        $production->id = htmlspecialchars($_GET['id']);
        $activeProduction = $production->activeProduction();
        $getProductionList = $production->getProductionList();
    }
}

if (!empty($_GET['idDesactive'])) {
    if (preg_match($regexId, $_GET['idDesactive'])) {
        $production->id = htmlspecialchars($_GET['idDesactive']);
        $deleteProduction = $production->deleteProduction();
        $getProductionList = $production->getProductionList();
    }
}