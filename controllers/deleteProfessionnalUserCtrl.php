<?php

$professionnalUsers = new particularUsers();

if (!empty($_SESSION['id'])) {
    if (preg_match($regexId, $_SESSION['id'])) {
        $professionnalUsers->id = htmlspecialchars($_SESSION['id']);
        if (!empty($_POST['deleteProUser'])) {
            if ($professionnalUsers->deleteUser()) {
                session_destroy();
                header('location: ../index.php');
                if(!empty($professionnalUsers->presentationPhoto)){
                    unlink($professionnalUsers->presentationPhoto);
                }
            }
        }
    }
} 

