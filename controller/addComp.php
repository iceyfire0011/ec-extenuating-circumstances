<?php

include '../model/dataHandler.php';
if (isset($_GET)) {
    $did = $_GET["did"];
    $cname = $_GET["comp"];
    $cdetails = $_GET["cdetails"];
    $duedate = $_GET["duedate"];
    $finaldate = $_GET["finaldate"];
    $sql = "insert ignore into complain(cname,cdetails,duedate,finaldate,courseid) values "
            . "('" . $cname . "','".$cdetails."','".$duedate."','".$finaldate."','".$did."')";
//    echo $sql;
    insertInDatabase($sql);
    header("location:../view/pages/admin/addComplain.php?msg=1 &err=0");
} else {
        header("location:../view/pages/admin/addComplain.php");
}