<?php

include '../model/dataHandler.php';
if (isset($_GET)) {
    $deptName = $_GET["dept"];
    $sql = "insert into department(dname) values ('" . $deptName . "')";
    echo $sql;
    insertInDatabase($sql);
    header("location:../view/pages/admin/addDepartment.php?msg=1 &err=0");
} else {
        header("location:../view/pages/admin/addDepartment.php");
}