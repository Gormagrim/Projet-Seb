<?php

$company = new company();
$production = new production();

if (!empty($_GET['id'])) {
    $company->id = htmlspecialchars($_GET['id']);
    $getCompanyInformation = $company->getCompanyInformation();
    $checkProductionNumber = $company->checkProductionNumber();
}