<?php

include '../../../model/dataHandler.php';

if ($_GET) {
    $scid = $_GET["scid"];

    $sql = "update subjectcomplain set status='denied' where scid='" . $scid."'";
    update($sql);

    header("location: claims.php");
}