<?php
require '../config/PHPMailer-master/PHPMailerAutoload.php';
include '../model/dataHandler.php';
if (isset($_GET)) {
    $sid = $_GET["sid"];
    $cid = $_GET["cid"];
    $sctitle = $_GET["sctitle"];
    $scdetails = $_GET["scdetails"];
    $submissiontime = $_GET["submissiontime"];
    $replyabledate = $_GET["replyabledate"];
    $sql = "insert ignore into subjectcomplain(sctitle,scdetails,submissiontime,replyabledate,sid,cid) values "
            . "('" . $sctitle . "','" . $scdetails . "','" . $submissiontime . "','" . $replyabledate . "','" . $sid . "','" . $cid . "')";
//  echo $cid;
    insertInDatabase($sql);

    $sql = "select email,fullname from student,usercheck where student.uid=usercheck.uid and sid='" . $sid . "'";
    $result = showData($sql);
//  print_r($result);

    $mail = new PHPMailer;

    $mail->From = $result[0]["email"];
    $mail->FromName = $result[0]["fullname"];

    $sql = "select email,fullname from student,usercheck,department,facultycoord "
            . "where student.did=department.did and "
            . "department.fid=facultycoord.fid and "
            . "facultycoord.uid=usercheck.uid and "
            . "sid='" . $sid . "'";
    $result = showData($sql);
   // print_r($result);

    $mail->addAddress($result[0]["email"], $result[0]["fullname"]);

    $mail->isHTML(true);

    $mail->Subject = $sctitle;
    $mail->Body = "<i>" . $scdetails . "</i>.<br> You need to solve it within" . $replyabledate;
    $mail->AltBody = "This is the plain text version of the email content";

    if (!$mail->send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    } else {
 //       echo "Message has been sent successfully";
    }
    header("location:../view/pages/student/claiming.php?msg=1 &err=0& clid=$cid ");
} else {
    header("location:../view/pages/student/claiming.php");
}