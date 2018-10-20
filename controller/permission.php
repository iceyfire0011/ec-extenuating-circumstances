<?php

include '../model/dataHandler.php';
include '../model/User.php';

if (isset($_POST)) {
    $user = $_POST["user"];
    $role = $_POST["role"];
//    echo $user ." , ".$role;
    header("location: setPermission.php?user=".$user."&role=".$role);
}