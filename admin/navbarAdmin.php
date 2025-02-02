<?php
include_once '../models/database.php';
include_once '../models/particularUsers.php';
include_once '../controllers/navbarSecondaryCtrl.php';
?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, user-scalable=no" />
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        <link rel="stylesheet" href="../assets/css/style.css" />
        <link rel="stylesheet" href="../assets/css/admin.css" />
        <link href="https://fonts.googleapis.com/css?family=Crete+Round" rel="stylesheet" />
        <title>izi.travaux.com/admin</title>
    </head>
    <body>
        <nav class="navbar fixed-top navbar-expand-lg navbar-light navbarSecondary">
            <a href="/admin/adminUser.php" class="navbar-left">izi<span class="green">.</span>travaux<span class="green">.</span>com<span class="green">/Admin</span></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/adminPartUserList.php">Liste des Particuliers</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/adminProUserList.php">Liste des Pro</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/admin/adminProductionList.php">Liste des Chantiers</a>
                    </li>
                    <li class="nav-item">
                        <button type="button" class="btn btn-outline-warning" id="deconnexionBtn" onclick="javascript:location.href = '/controllers/deconnectionCtrl.php'">Déconnexion</button>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="container-fluid">
