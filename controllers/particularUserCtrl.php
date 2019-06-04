<?php

require_once 'regex.php';

 $particularUsers = new particularUsers();
 
if (!empty($_SESSION['id'])) {
    if (preg_match($regexId, $_SESSION['id'])) {
        $particularUsers->id = htmlspecialchars($_SESSION['id']);
        $particularUserInfo = $particularUsers->getUserInformation();
    }
}
