<?php

$formErrors = array();

if (isset($_POST['zipSearch'])) {
    require_once '../models/database.php';
    require_once '../models/city.php';
    require_once '../models/company.php';

    $city = new city();
    if (!empty($_POST['zipSearch'])) {
        echo json_encode($city->searchZipcode(htmlspecialchars($_POST['zipSearch'])));
    }
} else {
    $city = new city();
    
    if (!empty($_POST['zipSearch'])) {
            $zipSearch = htmlspecialchars($_POST['zipSearch']);
        } 
}
