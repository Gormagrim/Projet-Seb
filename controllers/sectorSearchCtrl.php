<?php

$formErrors = array();

$professionnalUsers = new particularUsers();
$production = new production();
$company = new company();

if (isset($_GET['zipcodeSearch'])) {
        $productionSearchByZipcode = $production->searchProductionByZipcode(htmlspecialchars($_GET['zipcodeSearch']));
} else {
    $productionSearchByZipcode = $company->getProductionInformation();
}