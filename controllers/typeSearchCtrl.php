<?php

$formErrors = array();

$production = new production();
$category = new category();


if (isset($_GET['type'])) {
    $production->type = htmlspecialchars($_GET['type']);
     $category->type = htmlspecialchars($_GET['type']);
    $productionSearchByType = $production->searchProductionByType(htmlspecialchars($_GET['type']));
    $getCategoryFromType = $category->getCategoryFromType();
} 