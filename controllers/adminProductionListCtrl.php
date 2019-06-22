<?php

$production = new production();
$getProductionList = $production->getProductionList();
$getNumberOfProduction = $production->getNumberOfProduction();

if (!empty($_GET['id'])) {
    if (preg_match($regexId, $_GET['id'])) {
        $production->id = htmlspecialchars($_GET['id']);
        $deleteProduction = $production->deleteProduction();
        $getNumberOfProduction = $production->getNumberOfProduction();
    }
}
