<?php

session_start();
include '../model/dataHandler.php';
if (isset($_POST)) {
    $scid = $_POST["scid"];
    $scdetails = $_POST["scdetails"];

    $sql = "update subjectcomplain set scdetails='" . $scdetails . "' where scid='" . $scid."'";
	update($sql);
//   echo $sql;
    header("location:../view/pages/student/myclaim.php");
}