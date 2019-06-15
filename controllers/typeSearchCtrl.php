<?php

$formErrors = array();

$production = new production();
$company = new company();
$category = new category();

if (isset($_GET['type'])) {
        $production->type = htmlspecialchars($_GET['type']);
        $getCategoryFromType = $category->getCategoryFromType();
        $productionSearchByType = $production->searchProductionByType(htmlspecialchars($_GET['type']));
} 