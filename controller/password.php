<?php

include '../model/dataHandler.php';
include '../model/User.php';

if (isset($_POST)) {
    $user = $_POST["user"];
    $chngedpass = $_POST["chngedpass"];
//    echo $user ." , ".$chngedpass;
        $sql = "update usercheck set password='" . $chngedpass . "' where uname='" . $user . "'";
//        echo $sql;
    update($sql);
    header("location:../view/pages/admin/chngpass.php?msg=1 &err=0");

}