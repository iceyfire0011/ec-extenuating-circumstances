<?php

include '../model/dataHandler.php';
include '../model/Complain.php';
include '../model/Course.php';

if (isset($_POST)) {
    $dname = $_POST["dname"];
    $cname = $_POST["cname"];
    $cdetails = $_POST["cdetails"];
    $duedate = $_POST["duedate"];
    $finaldate = $_POST["finaldate"];
    $dname = strtolower($dname);
    $cname = strtolower($cname);
    $cdetails = strtolower($cdetails);
    $duedate = date("Y-m-d", strtotime($duedate));
    $finaldate = date("Y-m-d", strtotime($finaldate));
    $sql = "select courseid from course where coursename='" . $dname . "'";
    $result = showData($sql);
    $did = $result[0]["courseid"];

//    echo $did;
//    print_r($result);
//    echo $dname." , ".$cname." , ".$cdetails." , ".$duedate." , ".$finaldate." , ";
    if ($dname == null || $cname == null || $cdetails == null || $duedate == "" || $finaldate == "") {
        header("location:../view/pages/admin/addComplain.php?err=1");
    } else {
        $sql = "select cname from complain where cname='" . $cname . "' and courseid='" . $did . "'";
        $result = showData($sql);
//        print_r($result);

        if ($result) {
            header("location:../view/pages/admin/addComplain.php?msg=0&err=1");
        } else {
            $comp = new Complain();
            $course = new Course();
            $course->setCourseId($did);
            $comp->setCName($cname);
            $comp->setCDetails($cdetails);
            $comp->setDueDate($duedate);
            $comp->setFinalDate($finaldate);

            header("location: addComp.php?did=" . $course->getCourseId() . "&comp=" . $comp->getCName() .
                    "&cdetails=" . $comp->getCDetails() . "&duedate=" . $comp->getDueDate() . "&finaldate=" . $comp->getFinalDate());
        }
    }
} else {
    header("location:../view/pages/admin/addComplain.php");
}