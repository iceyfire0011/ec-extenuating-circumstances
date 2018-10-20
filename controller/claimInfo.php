<?php

session_start();
include '../model/dataHandler.php';
include '../model/Complain.php';
include '../model/Claim.php';

if (isset($_POST)) {
    $cname = $_POST["cname"];
    $scname = $_POST["scname"];
    $scdetails = $_POST["scdetails"];
    $submissiontime = date('Y/m/d h:i:s', time());
    $replyabledate = date('Y-m-d H:i:s', strtotime('+14 day', strtotime($submissiontime)));

    $uname = $_SESSION["username"];
    $sql = "select sid from usercheck,student where usercheck.uid=student.uid and uname='" . $uname . "'";
    $result = showData($sql);
    $sid = $result[0]["sid"];

//    print_r($result);

    $comp = new Complain();
    $claim = new Claim();

    $comp->setCid($cname );
    $claim->setSctitles($scname);
    $claim->setScdetails($scdetails);
    $claim->setSubmissiontime($submissiontime);
    $claim->setReplyabledate($replyabledate);
    header("location: addClaim.php?sid=" . $sid . "&cid=" . $comp->getCid() . "&sctitle=" . $claim->getSctitles()
            . "&scdetails=" . $claim->getScdetails() . "&submissiontime=" . $claim->getSubmissiontime()
            . "&replyabledate=" . $claim->getReplyabledate());
} else {
    header("location:../view/pages/student/claiming.php");
}

