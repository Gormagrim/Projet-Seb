<?php

$production = new production();


if (!empty($_GET['id'])) {
    $production->id = htmlspecialchars($_GET['id']);
    $getProductionInformation = $production->getOneProductionInformation();
}
