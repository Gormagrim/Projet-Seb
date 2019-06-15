<?php

$professionnalUsers = new particularUsers();
$company = new company();
$production = new production();
$photo = new photo();

if (!empty($_SESSION['id'])) {
    $professionnalUsers->id = $_SESSION['id'];
    $getOneProductionInformation = $company->getThisProductionInformation();
}

if (!empty($_GET['productionSearch'])) {
        $productionSearch = $production->searchProduction(htmlspecialchars($_GET['productionSearch']));
} else {
    $productionSearch = $company->getProductionInformation();
}