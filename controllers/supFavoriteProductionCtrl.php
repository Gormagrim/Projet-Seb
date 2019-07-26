<?php

$favoriteProduction = new favoriteProduction();
$production = new production();

if (!empty($_GET['id'])) {
        $favoriteProduction->id_al2jt_production = htmlspecialchars($_GET['id']);
        $favoriteProduction->id_al2jt_user = htmlspecialchars($_SESSION['id']);
        $production->id = htmlspecialchars($_GET['id']);
        $seeProduction = $production->getOneProductionInformation();
        if (!empty($_POST['delete'])) {
            if ($deleteFavoriteProduction = $favoriteProduction->deleteFavoriteProduction()) {
                header('location: ../userFavorites.php');
            }
        }

} 