<?php
if(isset($_SESSION['id'])){
$particularUsers = new particularUsers();
$particularUsers->id = $_SESSION['id'];
$particularUserInfo = $particularUsers->getUserInformation();
}