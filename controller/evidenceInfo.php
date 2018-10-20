<?php

session_start();
include '../model/dataHandler.php';
include '../model/Evidence.php';
if (isset($_POST)) {
    $scid = $_POST["scid"];
    $target_dir = "../evidence/";
    $ename = $_FILES['ename']['name'];
    $esize = $_FILES['ename']['name'];
    $up_file = basename($_FILES["ename"]["name"]);
    $etype = pathinfo($up_file, PATHINFO_EXTENSION);
    $sql = "select max(eid) as eid from evidence";
    $result = showData($sql);
    $eid = $result[0]["eid"] + 1;
//    print_r($_FILES);
//    echo $eid;
    $euptime = date('Y/m/d h:i:s', time());
    // echo $euptime;
    $target_file = $target_dir . $eid . "." . $etype;
    $evi = new Evidence();
    $evi->setEid($eid);
    $evi->setEname($ename);
    $evi->setEsize($esize);
    $evi->setEtype($etype);
    $evi->setEupdate($euptime);

    if ($evi->getEtype() == "jpg" || $evi->getEtype() == "jpeg" || $evi->getEtype() == "png" || $evi->getEtype() == "gif" || $evi->getEtype() == "pdf") {
        if ($evi->getEsize() < 50000000) {
            $sql = "insert into evidence(eid,ename,etype,eupdate,scid)"
                    . "values(" . $eid . ",'" . $ename . "','" . $etype . "','" . $euptime . "','" . $scid . "')";
            // echo $sql;
            insertInDatabase($sql);
            move_uploaded_file($_FILES["ename"]["tmp_name"], $target_file);
            header("location:../view/pages/student/myclaim.php");
        }
    } else {
		//    echo $scid;
		header("location:../view/pages/student/myclaim.php?err=1&msg=0");
    }
} else {
    header("location:../view/pages/student/myclaim.php");
}

