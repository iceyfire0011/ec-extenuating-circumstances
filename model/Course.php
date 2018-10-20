<?php
class Course{
    private $courseId;
    private $courseName;
    function getCourseId() {
        return $this->courseId;
    }

    function getCourseName() {
        return $this->courseName;
    }

    function setCourseId($courseId) {
        $this->courseId = $courseId;
    }

    function setCourseName($courseName) {
        $this->courseName = $courseName;
    }


}