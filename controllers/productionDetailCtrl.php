<?php

$production = new production();


if (isset($_GET['id'])) {
    $production->id = htmlspecialchars($_GET['id']);
    $getProductionInformation = $production->getOneProductionInformation();
}
