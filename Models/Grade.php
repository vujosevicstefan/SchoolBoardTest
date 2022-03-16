<?php

namespace Models;

class Grade
{
    // Properties
    public $id;
    public $studentId;
    public $grade;

    public function __construct($id, $studentId, $grade)
    {
        $this->id = $id;
        $this->studentId = $studentId;
        $this->grade = $grade;
    }

    // Methods
    function setId($id) {
        $this->id = $id;
    }
    function studentId($studentId) {
        $this->studentId = $studentId;
    }
    function setGrade($grade) {
        $this->grade = $grade;
    }

    function getId() {
        return $this->id;
    }
    function getStudentId() {
        return $this->studentId;
    }
    function getGrade() {
        return $this->grade;
    }
}
