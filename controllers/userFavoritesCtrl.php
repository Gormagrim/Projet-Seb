<?php

$professionnalUsers = new particularUsers();
$company = new company();
$production = new production();


if (isset($_SESSION['id'])) {
    $favoriteProduction = new favoriteProduction();
    $favoriteProduction->id_al2jt_user = htmlspecialchars($_SESSION['id']);
    $listeOfFavorite = $favoriteProduction->listeOfFavorite();
    $favoriteCompany = new favoriteCompany();
    $favoriteCompany->id_al2jt_user = htmlspecialchars($_SESSION['id']);
    $listeOfFavoriteCompany = $favoriteCompany->listeOfFavoriteCompany();
}