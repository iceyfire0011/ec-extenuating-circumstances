<?php

class Claim {

    private $scid;
    private $sctitles;
    private $scdetails;
    private $submissiontime;
    private $replyabledate;
    
    function getScid() {
        return $this->scid;
    }

    function setScid($scid) {
        $this->scid = $scid;
    }

        function getSctitles() {
        return $this->sctitles;
    }

    function getScdetails() {
        return $this->scdetails;
    }

    function getSubmissiontime() {
        return $this->submissiontime;
    }

    function getReplyabledate() {
        return $this->replyabledate;
    }

    function setSctitles($sctitles) {
        $this->sctitles = $sctitles;
    }

    function setScdetails($scdetails) {
        $this->scdetails = $scdetails;
    }

    function setSubmissiontime($submissiontime) {
        $this->submissiontime = $submissiontime;
    }

    function setReplyabledate($replyabledate) {
        $this->replyabledate = $replyabledate;
    }


}
