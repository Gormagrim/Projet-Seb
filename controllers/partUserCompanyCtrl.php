<?php

$professionnalUsers = new particularUsers();
$company = new company();
$production = new production();
$photo = new photo();

if (!empty($_SESSION['id'])) {
    $professionnalUsers->id = $_SESSION['id'];
    $getProductionInformation = $company->getCompanyList();
    $getOneCompanyInformation = $company->getOneCompanyInformation();
}
