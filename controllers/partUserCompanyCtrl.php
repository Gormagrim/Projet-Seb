<?php

$professionnalUsers = new particularUsers();
$company = new company();
$production = new production();
$photo = new photo();

if (!empty($_SESSION['id'])) {
    $professionnalUsers->id = $_SESSION['id'];
    $getOneCompanyInformation = $company->getOneCompanyInformation();
}

if (!empty($_POST['companySearch'])) {
    if (isset($_POST['companySearch'])) {
        $companySearch = $company->searchCompany(htmlspecialchars($_POST['companySearch']));
    }
} else {
    $companySearch = $company->getCompanyList();
}