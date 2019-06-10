<?php

$particularUsers = new particularUsers();

if (!empty($_SESSION['id'])) {
    if (preg_match($regexId, $_SESSION['id'])) {
        $particularUsers->id = htmlspecialchars($_SESSION['id']);
        if (!empty($_POST['delete'])) {
            if ($deleteUser = $particularUsers->deleteUser()) {
                session_destroy();
                header('location: ../index.php');
            }
        }
    }
} 
