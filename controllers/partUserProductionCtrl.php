<?php

$professionnalUsers = new particularUsers();
$company = new company();
$production = new production();
$photo = new photo();

if (!empty($_SESSION['id'])) {
    $professionnalUsers->id = $_SESSION['id'];
    $getOneProductionInformation = $company->getThisProductionInformation();
}

if (!empty($_POST['productionSearch'])) {
        $productionSearch = $production->searchProduction(htmlspecialchars($_POST['productionSearch']));
} else {
    $productionSearch = $company->getProductionInformation();
}