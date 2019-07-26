<?php

$professionnalUsers = new particularUsers();
$company = new company();
$production = new production();
$photo = new photo();
if (!empty($_SESSION['id'])) {
    $professionnalUsers->id = $_SESSION['id'];
    $company->id_al2jt_user = $_SESSION['id'];
    $getCompanyProductionInformation = $company->getCompanyProductionInformation();
    $likeProduction = new likeProduction();
    $dislikeProduction = new dislikeProduction();
    $favoriteProduction = new favoriteProduction();
    $likeProduction->id_al2jt_production = $company->id;
    $numberOfDislike = $dislikeProduction->numberOfDislike();
    $numberOfLike = $likeProduction->numberOfLike();
    $numberOfFavorite = $favoriteProduction->numberOfFavorite();
    
}
