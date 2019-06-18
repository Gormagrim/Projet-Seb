<?php

$formErrors = array();

$professionnalUsers = new particularUsers();
$production = new production();
$company = new company();
$ouvrage = new ouvrage();
$category = new category();
//$getouvrage = $ouvrage->getOuvrage();
//$getOuvrageAndCategory = $ouvrage->getOuvrageAndCategory();
$getProduction = $ouvrage->getProduction();

$tata =array();
foreach ($getProduction as $getType){
        $typeArray[$getType->ouvrage][$getType->category][] = $getType->type;
}

if (isset($_GET['zipcodeSearch'])) {
    $productionSearchByZipcode = $production->searchProductionByZipcode(htmlspecialchars($_GET['zipcodeSearch']));
} else {
    $productionSearchByZipcode = $company->getProductionInformation();
}
