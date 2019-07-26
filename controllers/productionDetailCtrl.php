<?php

if (isset($_POST['placeLike'])) {
    require_once '../models/database.php';
    require_once '../models/likeProduction.php';
    require_once '../models/dislikeProduction.php';
    session_start();

    if (isset($_SESSION['id'])) {
        if (preg_match($regexId, $_SESSION['id'])) {
            $professionnalUsers = new particularUsers();
            $professionnalUsers->id = htmlspecialchars($_SESSION['id']);
        }
    }

    $likeProduction = new likeProduction();
    $likeProduction->id_al2jt_user = htmlspecialchars($_SESSION['id']);
    $likeProduction->id_al2jt_production = htmlspecialchars($_POST['placeLike']);
    $checkLikeProduction = $likeProduction->checkLikeProduction();
    if ($checkLikeProduction->number == 0) {
        if (json_encode($likeProduction->addLikeToProduction())) {
            $dislikeProduction = new dislikeProduction();
            $checkDislikeProduction = $dislikeProduction->checkDislikeProduction();
            $dislikeProduction->id_al2jt_user = $likeProduction->id_al2jt_user;
            $dislikeProduction->id_al2jt_production = $likeProduction->id_al2jt_production;
            $dislikeProduction->deleteDislikeProduction();
        }
    }
} else if (isset($_POST['placeDislike'])) {
    require_once '../models/database.php';
    require_once '../models/dislikeProduction.php';
    require_once '../models/likeProduction.php';
    session_start();

    if (isset($_SESSION['id'])) {
        if (preg_match($regexId, $_SESSION['id'])) {
            $professionnalUsers = new particularUsers();
            $professionnalUsers->id = htmlspecialchars($_SESSION['id']);
        }
    }

    $dislikeProduction = new dislikeProduction();
    $dislikeProduction->id_al2jt_user = htmlspecialchars($_SESSION['id']);
    $dislikeProduction->id_al2jt_production = htmlspecialchars($_POST['placeDislike']);
    $checkDislikeProduction = $dislikeProduction->checkDislikeProduction();
    if ($checkDislikeProduction->number == 0) {
        if (json_encode($dislikeProduction->addDislikeToProduction())) {
            $likeProduction = new likeProduction();
            $likeProduction->id_al2jt_user = $dislikeProduction->id_al2jt_user;
            $likeProduction->id_al2jt_production = $dislikeProduction->id_al2jt_production;
            $checkLikeProduction = $likeProduction->checkLikeProduction();
            $likeProduction->deleteLikeProduction();
        }
    }
} else if (isset($_POST['placeFavorite'])) {
    require_once '../models/database.php';
    require_once '../models/favoriteProduction.php';
    session_start();

    if (isset($_SESSION['id'])) {
        if (preg_match($regexId, $_SESSION['id'])) {
            $professionnalUsers = new particularUsers();
            $professionnalUsers->id = htmlspecialchars($_SESSION['id']);
        }
    }

    $favoriteProduction = new favoriteProduction();
    $favoriteProduction->id_al2jt_user = htmlspecialchars($_SESSION['id']);
    $favoriteProduction->id_al2jt_production = htmlspecialchars($_POST['placeFavorite']);
    $checkFavoriteProduction = $favoriteProduction->checkFavoriteProduction();
    if ($checkFavoriteProduction->number == 0) {
        echo json_encode($favoriteProduction->addProductionToFavorite());
    }
} else {
    if (!empty($_SESSION['id'])) {
        if (preg_match($regexId, $_SESSION['id'])) {
            $professionnalUsers = new particularUsers();
            $professionnalUsers->id = htmlspecialchars($_SESSION['id']);
        }
    }
    $production = new production();
    $likeProduction = new likeProduction();
    $dislikeProduction = new dislikeProduction();
    $favoriteProduction = new favoriteProduction();
    $professionnalUsers = new particularUsers();
    $professionnalUsers->id = htmlspecialchars($_SESSION['id']);
    $professionnalUserInfo = $professionnalUsers->getProfessionnalInformation();
    if (isset($_GET['id'])) {
        $production->id = htmlspecialchars($_GET['id']);
        $likeProduction->id_al2jt_production = htmlspecialchars($_GET['id']);
        $likeProduction->id_al2jt_user = htmlspecialchars($_SESSION['id']);
        $getProductionInformation = $production->getOneProductionInformation();
        $checkLikeProduction = $likeProduction->checkLikeProduction();

        $dislikeProduction->id_al2jt_user = $likeProduction->id_al2jt_user;
        $dislikeProduction->id_al2jt_production = $likeProduction->id_al2jt_production;
        $checkDislikeProduction = $dislikeProduction->checkDislikeProduction();

        $favoriteProduction->id_al2jt_user = $likeProduction->id_al2jt_user;
        $favoriteProduction->id_al2jt_production = $likeProduction->id_al2jt_production;
        $checkFavoriteProduction = $favoriteProduction->checkFavoriteProduction();
    }

    $numberOfLike = $likeProduction->numberOfLike();
    $numberOfDislike = $dislikeProduction->numberOfDislike();
    $numberOfFavorite = $favoriteProduction->numberOfFavorite();
}

