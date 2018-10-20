<?php

include '../model/dataHandler.php';
include '../model/Department.php';
include '../model/Course.php';

if (isset($_POST)) {
    $dname = $_POST["dname"];
    $coursename=$_POST["coursename"];

    $sql = "select did from department where dname='" . $dname . "'";
    $result = showData($sql);
    $did=$result[0]["did"];

    $sql = "select coursename from course where coursename='" . $coursename . "' and did='".$did."'";
    $result = showData($sql);
    if ($result) {
        header("location:../view/pages/admin/addCourse.php?err=1");
    } else {
        $dept = new Department();
        $course= new Course();
        $dept->setDid($did);
        $course->setCourseName($coursename);
        header("location: addCourse.php?dept=" . $dept->getDid()."&course=".$course->getCourseName());
    }
} else {
    header("location:../view/pages/admin/addDepartment.php");
}