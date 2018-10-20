<?php
include '../model/dataHandler.php';
if (isset($_GET)) {
    $deptId = $_GET["dept"];
    $courseName = $_GET["course"];
    $sql = "insert into course(coursename,did) values ('".$courseName."','" . $deptId . "')";
//    echo $sql;
    insertInDatabase($sql);
    header("location:../view/pages/admin/addCourse.php?msg=1 &err=0");
} else {
        header("location:../view/pages/admin/addCourse.php");
}