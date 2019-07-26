<?php

if (isset($_POST['companyLike'])) {
    require_once '../models/database.php';
    require_once '../models/likeCompany.php';
    require_once '../models/dislikeCompany.php';
    session_start();

    if (isset($_SESSION['id'])) {
        if (preg_match($regexId, $_SESSION['id'])) {
            $particularUsers = new particularUsers();
            $particularUsers->id = htmlspecialchars($_SESSION['id']);
        }
    }

    $likeCompany = new likeCompany();
    $numberOfCompanyLike = $likeCompany->numberOfCompanyLike();
    $likeCompany->id_al2jt_user = htmlspecialchars($_SESSION['id']);
    $likeCompany->id_al2jt_company = htmlspecialchars($_POST['companyLike']);
    $checkLikeCompany = $likeCompany->checkLikeCompany();
    if ($checkLikeCompany->number == 0) {
        if (json_encode($likeCompany->addLikeToCompany())) {
            $numberOfCompanyLike = $likeCompany->numberOfCompanyLike();
            $dislikeCompany = new dislikeCompany();
            $checkDislikeCompany = $dislikeCompany->checkDislikeCompany();
            $dislikeCompany->id_al2jt_user = $likeCompany->id_al2jt_user;
            $dislikeCompany->id_al2jt_company = $likeCompany->id_al2jt_company;
            $dislikeCompany->deleteDislikeCompany();
            $numberOfCompanyDislike = $dislikeCompany->numberOfCompanyDislike();
            $numberOfCompanyLike = $likeCompany->numberOfCompanyLike();
        }
    }
} else if (isset($_POST['companyDislike'])) {
    require_once '../models/database.php';
    require_once '../models/dislikeCompany.php';
    require_once '../models/likeCompany.php';
    session_start();

    if (isset($_SESSION['id'])) {
        if (preg_match($regexId, $_SESSION['id'])) {
            $professionnalUsers = new particularUsers();
            $professionnalUsers->id = htmlspecialchars($_SESSION['id']);
        }
    }

    $dislikeCompany = new dislikeCompany();
    $numberOfCompanyDislike = $dislikeCompany->numberOfCompanyDislike();
    $dislikeCompany->id_al2jt_user = htmlspecialchars($_SESSION['id']);
    $dislikeCompany->id_al2jt_company = htmlspecialchars($_POST['companyDislike']);
    $checkDislikeCompany = $dislikeCompany->checkDislikeCompany();
    if ($checkDislikeCompany->number == 0) {
        if (json_encode($dislikeCompany->addDislikeToCompany())) {
            $numberOfCompanyDislike = $dislikeCompany->numberOfCompanyDislike();
            $likeCompany = new likeCompany();
            $likeCompany->id_al2jt_user = $dislikeCompany->id_al2jt_user;
            $likeCompany->id_al2jt_company = $dislikeCompany->id_al2jt_company;
            $checkLikeCompany = $likeCompany->checkLikeCompany();
            $likeCompany->deleteLikeCompany();
            $numberOfCompanyLike = $likeCompany->numberOfCompanyLike();
            $numberOfCompanyDislike = $dislikeCompany->numberOfCompanyDislike();
        }
    }
} else if (isset($_POST['favoriteComp'])) {
    require_once '../models/database.php';
    require_once '../models/favoriteCompany.php';
    session_start();

    if (isset($_SESSION['id'])) {
        if (preg_match($regexId, $_SESSION['id'])) {
            $professionnalUsers = new particularUsers();
            $professionnalUsers->id = htmlspecialchars($_SESSION['id']);
        }
    }

    $favoriteCompany = new favoriteCompany();
    $favoriteCompany->id_al2jt_user = htmlspecialchars($_SESSION['id']);
    $favoriteCompany->id_al2jt_company = htmlspecialchars($_POST['favoriteComp']);
    $checkFavoriteCompany = $favoriteCompany->checkFavoriteCompany();
    if ($checkFavoriteCompany->number == 0) {
        echo json_encode($favoriteCompany->addFavoriteToCompany());
        $numberOfCompanyFavorite = $favoriteCompany->numberOfCompanyFavorite();
    }
} else {

    $company = new company();
    $production = new production();
    $likeCompany = new likeCompany();
    $dislikeCompany = new dislikeCompany();
    $favoriteCompany = new favoriteCompany();
    $numberOfCompanyLike = $likeCompany->numberOfCompanyLike();
    $numberOfCompanyDislike = $dislikeCompany->numberOfCompanyDislike();
    $numberOfCompanyFavorite = $favoriteCompany->numberOfCompanyFavorite();

    if (!empty($_GET['id'])) {
        $company->id = htmlspecialchars($_GET['id']);
        $getCompanyInformation = $company->getCompanyInformation();
        $checkProductionNumber = $company->checkProductionNumber();
        $likeCompany->id_al2jt_company = htmlspecialchars($_GET['id']);
        $likeCompany->id_al2jt_user = htmlspecialchars($_SESSION['id']);
        $checkLikeCompany = $likeCompany->checkLikeCompany();
        
        $dislikeCompany->id_al2jt_user = $likeCompany->id_al2jt_user;
        $dislikeCompany->id_al2jt_company = $likeCompany->id_al2jt_company;
        $checkDislikeCompany = $dislikeCompany->checkDislikeCompany();
        
        $favoriteCompany->id_al2jt_user = $likeCompany->id_al2jt_user;
        $favoriteCompany->id_al2jt_company = $likeCompany->id_al2jt_company;
        $checkFavoriteCompany = $favoriteCompany->checkFavoriteCompany();
    }
    $numberOfCompanyLike = $likeCompany->numberOfCompanyLike();
    $numberOfCompanyDislike = $dislikeCompany->numberOfCompanyDislike();
    $numberOfCompanyFavorite = $favoriteCompany->numberOfCompanyFavorite();
}