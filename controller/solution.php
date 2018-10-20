<?php

include '../model/dataHandler.php';
include '../config/PHPMailer-master/PHPMailerAutoload.php';

if ($_POST) {
    $scid = $_POST["scid"];
    $solution = $_POST["solution"];
    $fid = $_POST["fid"];
    $solvedate = date('Y/m/d h:i:s', time());
    $sql = "insert into solution(solvedate,solution,scid,fid) "
            . "values('" . $solvedate . "','" . $solution . "','" . $scid . "','" . $fid . "')";
//    echo $sql;
    insertInDatabase($sql);

    $sql = "select email,fullname from facultycoord,usercheck where facultycoord.uid=usercheck.uid and fid='" . $fid . "'";
    $result = showData($sql);
//    print_r($result);
    
    $mail = new PHPMailer;

    $mail->From = $result[0]["email"];
    $mail->FromName = $result[0]["fullname"];

    $sql = "select sctitle,email,fullname from student,usercheck,subjectcomplain "
            . "where student.sid=subjectcomplain.sid and "
            . "student.uid=usercheck.uid and "
            . "scid='" . $scid . "'";
    $result = showData($sql);
//    print_r($result);

    $sctitle=$result[0]["sctitle"];
    $mail->addAddress($result[0]["email"], $result[0]["fullname"]);

    $mail->isHTML(true);

    $mail->Subject = "Reply of".$sctitle;
    $mail->Body = "<i>" . $solution . "</i>.<br>";
    $mail->AltBody = "This is the plain text version of the email content";

    if (!$mail->send()) {
        echo "Mailer Error: " . $mail->ErrorInfo;
    } else {
//        echo "Message has been sent successfully";
    }
    header("location: ../view/pages/coordinator/claims.php");
}