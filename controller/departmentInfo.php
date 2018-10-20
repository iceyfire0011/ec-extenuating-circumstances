<?php

include '../model/dataHandler.php';
include '../model/Department.php';

if (isset($_POST)) {
    $dname = $_POST["dname"];
    $dname = strtolower($dname);
    $sql = "select dname from department where dname='" . $dname . "'";
    $result = showData($sql);
//    print_r($result);
    if ($result) {
        header("location:../view/pages/admin/addDepartment.php?err=1");
    } else {
        $dept = new Department();
        $dept->setDname($dname);
        $deptName = $dept->getDname();
        header("location: addDept.php?dept=" . $deptName);
    }
} else {
    header("location:../view/pages/admin/addDepartment.php");
}