<?php

class Complain {

    private $cid;
    private $cName;
    private $cDetails;
    private $dueDate;
    private $finalDate;

    function getCid() {
        return $this->cid;
    }

    function getCName() {
        return $this->cName;
    }

    function getCDetails() {
        return $this->cDetails;
    }

    function getDueDate() {
        return $this->dueDate;
    }

    function getFinalDate() {
        return $this->finalDate;
    }

    function setCid($cid) {
        $this->cid = $cid;
    }

    function setCName($cName) {
        $this->cName = $cName;
    }

    function setCDetails($cDetails) {
        $this->cDetails = $cDetails;
    }

    function setDueDate($dueDate) {
        $this->dueDate = $dueDate;
    }

    function setFinalDate($finalDate) {
        $this->finalDate = $finalDate;
    }

}
