<?php

$professionnalUsers = new particularUsers();
$company = new company();
$production = new production();
$photo = new photo();
$favoriteCompany = new favoriteCompany();

if (!empty($_SESSION['id'])) {
    $professionnalUsers->id = $_SESSION['id'];
    $getOneCompanyInformation = $company->getOneCompanyInformation();
}

if (!empty($_GET['companySearch'])) {
    $companySearch = $company->searchCompany(htmlspecialchars($_GET['companySearch']));
} else {
    $companySearch = $company->getCompanyList();
}


