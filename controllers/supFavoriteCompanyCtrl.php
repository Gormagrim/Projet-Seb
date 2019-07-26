<?php

$favoriteCompany = new favoriteCompany();
$company = new company();

if (!empty($_GET['id'])) {
        $favoriteCompany->id_al2jt_company = htmlspecialchars($_GET['id']);
        $favoriteCompany->id_al2jt_user = htmlspecialchars($_SESSION['id']);
        $company->id = htmlspecialchars($_GET['id']);
        $getCompanyInformation = $company->getCompanyInformation();
        if (!empty($_POST['deleteFavComp'])) {
            if ($deleteFavoriteCompany = $favoriteCompany->deleteFavoriteCompany()) {
                header('location: ../userFavorites.php');
            }
        }

} 