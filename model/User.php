<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User
 *
 * @author emrul
 */
class User {

    //put your code here
    private $uname;
    private $pass;
    private $email;
    private $attempts;
    private $timestamps;
    private $catagory;

    public function getUname() {
        return $this->uname;
    }

    public function getPass() {
        return $this->pass;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getAttempts() {
        return $this->attempts;
    }

    public function getTimestamps() {
        return $this->timestamps;
    }


    public function getCatagory() {
        return $this->catagory;
    }

    public function setUname($uname) {
        $this->uname = $uname;
    }

    public function setPass($pass) {
        $this->pass = $pass;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setAttempts($attempts) {
        $this->attempts = $attempts;
    }

    public function setTimestamps($timestamps) {
        $this->timestamps = $timestamps;
    }

    public function setCatagory($catagory) {
        $this->catagory = $catagory;
    }

}
