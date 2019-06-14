<?php

$production = new production();
$seeProduction = $production->getOneProductionInformation();

if (!empty($_GET['id'])) {
        $production->id = htmlspecialchars($_GET['id']);
        if (!empty($_POST['delete'])) {
            if ($deleteProduction = $production->deleteProduction()) {
                header('location: ../professionnal/professionnalProduction.php');
            }
        }

} 

