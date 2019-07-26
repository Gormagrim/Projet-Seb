<?php

$professionnalUsers = new particularUsers();
$company = new company();
$production = new production();
$likeProduction = new likeProduction();

if (!empty($_SESSION['id'])) {
    $professionnalUsers->id = $_SESSION['id'];
    $likeProduction->id_al2jt_user = htmlspecialchars($_SESSION['id']);
    $likeProduction->id_al2jt_production = $production->id;
    $getOneProductionInformation = $company->getThisProductionInformation();
    $checkLikeProduction = $likeProduction->checkLikeProduction();
}

if (isset($_GET['productionSearch'])) {
    $productionSearch = $production->searchProduction(htmlspecialchars($_GET['productionSearch']));
    $checkLikeProduction->id_al2jt_user = htmlspecialchars($_SESSION['id']);
    $checkLikeProduction->id_al2jt_production = $production->id;
    $checkLikeProduction = $likeProduction->checkLikeProduction();
} else {
    $productionSearch = $company->getProductionInformation();
}
