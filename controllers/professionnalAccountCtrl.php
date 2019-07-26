<?php

require_once '../regex.php';

$professionnalUsers = new particularUsers();
$company = new company();
$likeProduction = new likeProduction();
$dislikeProduction = new dislikeProduction();
$favoriteProduction = new favoriteProduction();
$likeCompany = new likeCompany();
$dislikeCompany = new dislikeCompany();
$favoriteCompany = new favoriteCompany();

if (!empty($_SESSION['id'])) {
    if (preg_match($regexId, $_SESSION['id'])) {
        $professionnalUsers->id = htmlspecialchars($_SESSION['id']);
        $professionnalUserInfo = $professionnalUsers->getProfessionnalInformation();
        $company->id = $professionnalUsers->id;
        $checkProductionNumberWithId = $company->checkProductionNumberWithId();
        $likeProduction->id = $_SESSION['id'];
        $dislikeProduction->id = $likeProduction->id;
        $favoriteProduction->id = $dislikeProduction->id;
        $numberOfLikePerCompany = $likeProduction->numberOfLikePerCompany();
        $numberOfDislikePerCompany = $dislikeProduction->numberOfDislikePerCompany();
        $numberOfFavoritePerCompany = $favoriteProduction->numberOfFavoritePerCompany();

        $likeCompany->id = htmlspecialchars($_SESSION['id']);
        $numberTotalOfCompLike = $likeCompany->numberTotalOfCompLike();
        $dislikeCompany->id = htmlspecialchars($_SESSION['id']);
        $numberTotalOfCompDislike = $dislikeCompany->numberTotalOfCompDislike();
        $favoriteCompany->id = htmlspecialchars($_SESSION['id']);
        $numberTotalOfCompFavorite = $favoriteCompany->numberTotalOfCompFavorite();
    }
}