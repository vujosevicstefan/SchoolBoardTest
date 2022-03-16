<?php

namespace Models;

include './Models/Board.php';

use Models\Board;

class Student
{
    // Properties
    public $id;
    public $name;
    public $schoolBoardId;
    public $schoolBoard;

    public function __construct($id, $name, $schoolBoardId, Models\Board $schoolBoard = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->schoolBoardId = $schoolBoardId;
        $this->schoolBoard = $schoolBoard;
    }

    // Methods
    function setId($id) {
        $this->id = $id;
    }
    function setName($name) {
        $this->name = $name;
    }
    function setSchoolBoardId($schoolBoardId) {
        $this->schoolBoardId = $schoolBoardId;
    }
    function setBoard($schoolBoard) {
        $this->schoolBoard = $schoolBoard;
    }

    function getId() {
        return $this->id;
    }
    function getName() {
        return $this->name;
    }
    function getSchoolBoardId() {
        return $this->schoolBoardId;
    }
    function getBoard() {
        return $this->schoolBoard;
    }
}
