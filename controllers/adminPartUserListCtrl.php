<?php

$particularUsers = new particularUsers();
$particularUsersList = $particularUsers->getPartUserList();
$countParticularUser = $particularUsers->countParticularUser();

if (!empty($_GET['id'])) {
    if (preg_match($regexId, $_GET['id'])) {
        $particularUsers->id = htmlspecialchars($_GET['id']);
        $deleteUser = $particularUsers->deleteUser();
        $particularUsersList = $particularUsers->getPartUserList();
    }
}

