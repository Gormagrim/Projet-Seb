<?php

if (isset($_POST['placeLike'])) {
    require_once '../models/database.php';
    require_once '../models/likeProduction.php';
    session_start();

    if (!empty($_SESSION['id'])) {
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
        echo json_encode($likeProduction->addLikeToProduction());
    }
} else {
    if (!empty($_SESSION['id'])) {
        if (preg_match($regexId, $_SESSION['id'])) {
            $professionnalUsers = new particularUsers();
            $professionnalUsers->id = htmlspecialchars($_SESSION['id']);
        }
    }
    $production = new production();
    if (isset($_GET['id'])) {
        $production->id = htmlspecialchars($_GET['id']);
        $getProductionInformation = $production->getOneProductionInformation();
    }
    $likeProduction = new likeProduction();
    $checkLikeProduction = $likeProduction->checkLikeProduction();
}

