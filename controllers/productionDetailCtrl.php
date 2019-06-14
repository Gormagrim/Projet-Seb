<?php

$professionnalUsers = new particularUsers();
$company = new company();
$production = new production();
$photo = new photo();

if (!empty($_GET['id'])) {
    $production->id = htmlspecialchars($_GET['id']);
    $getProductionInformation = $production->getOneProductionInformation();
}
