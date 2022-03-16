<?php

namespace Models;

class Board
{
    // Properties
    public $id;
    public $name;

    public function __construct($id, $name)
    {
        $this->id = $id;
        $this->name = $name;
    }

    // Methods
    function setId($id) {
        $this->id = $id;
    }
    function setName($name) {
        $this->name = $name;
    }

    function getId() {
        return $this->id;
    }
    function getName() {
        return $this->name;
    }
}
