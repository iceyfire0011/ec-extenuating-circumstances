<?php

include '../model/dataHandler.php';
if (isset($_GET)) {
    $user = $_GET["user"];
    $role = $_GET["role"];
//        echo $user ." , ".$role;

    $sql = "update usercheck set ucatagori='" . $role . "' where uname='" . $user . "'";
    
    update($sql);
    header("location:../view/pages/admin/mngPermission.php?msg=1 &err=0");
} else {
        header("location:../view/pages/admin/mngPermission.php");
}