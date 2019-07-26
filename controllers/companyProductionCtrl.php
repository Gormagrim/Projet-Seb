<?php

$company = new company();

if (!empty($_GET['id'])) {
    $company->id = htmlspecialchars($_GET['id']);
    $getCompanyProductionInformationByCompId = $company->getCompanyProductionInformationByCompId();
    $getCompanyInformation = $company->getCompanyInformation();
}