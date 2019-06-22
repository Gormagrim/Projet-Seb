<?php

$particularUsers = new particularUsers();
$production = new production();
$countParticularUsers = $particularUsers->countParticularUser();
$countProfessionnalUser = $particularUsers->countProfessionnalUser();
$getNumberOfProduction = $production->getNumberOfProduction();

