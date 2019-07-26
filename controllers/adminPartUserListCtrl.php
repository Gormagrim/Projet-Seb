<?php

$particularUsers = new particularUsers();
$particularUsersList = $particularUsers->getPartUserList();
$countParticularUser = $particularUsers->countParticularUser();

if (!empty($_GET['id'])) {
    if (preg_match($regexId, $_GET['id'])) {
        $particularUsers->id = htmlspecialchars($_GET['id']);
        $activeUser = $particularUsers->activeUser();
        $particularUsersList = $particularUsers->getPartUserList();
    }
}
if (isset($_GET['idDesactive'])) {
    if (preg_match($regexId, $_GET['idDesactive'])) {
        $particularUsers->id = htmlspecialchars($_GET['idDesactive']);
        $deleteUser = $particularUsers->deleteUser();
        $particularUsersList = $particularUsers->getPartUserList();
    }
}


