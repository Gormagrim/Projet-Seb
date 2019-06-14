<?php

$formErrors = array();

$professionnalUsers = new particularUsers();
$production = new production();
$company = new company();

if (!empty($_POST['zipcodeSearch'])) {
    if (isset($_POST['zipcodeSearch'])) {
        $productionSearchByZipcode = $production->searchProductionByZipcode(htmlspecialchars($_POST['zipcodeSearch']));
    }
} else {
    $productionSearchByZipcode = $company->getProductionInformation();
}