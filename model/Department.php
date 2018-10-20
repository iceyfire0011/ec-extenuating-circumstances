<?php

class Department {

    private $did;
    private $dname;

    function getDid() {
        return $this->did;
    }

    function getDname() {
        return $this->dname;
    }

    function setDid($did) {
        $this->did = $did;
    }

    function setDname($dname) {
        $this->dname = $dname;
    }

}
