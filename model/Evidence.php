<?php

class Evidence{
    private $eid;
    private $ename;
    private $etype;
    private $eupdate;
    private $esize;

    function getEid() {
        return $this->eid;
    }

    function getEname() {
        return $this->ename;
    }

    function getEtype() {
        return $this->etype;
    }

    function getEupdate() {
        return $this->eupdate;
    }

    function setEid($eid) {
        $this->eid = $eid;
    }

    function setEname($ename) {
        $this->ename = $ename;
    }

    function setEtype($etype) {
        $this->etype = $etype;
    }

    function setEupdate($eupdate) {
        $this->eupdate = $eupdate;
    }
    
    function getEsize() {
        return $this->esize;
    }

    function setEsize($esize) {
        $this->esize = $esize;
    }

    
}