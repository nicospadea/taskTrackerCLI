<?php

class Task { 
    public $id;
    public $title;
    public $description;
    public $createdAt;
    public $updatedAt;

    public $completed;

    public function __construct($id, $title, $description, $createdAt, $updatedAt, $completed = false) {
        $this-> id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
        $this->completed = $completed;
    }

}