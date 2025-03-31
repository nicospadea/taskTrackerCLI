<?php

class TaskManager { 
    private $file = __DIR__ . '/../tasks.json';
    private $tasks = [];

    public function __construct() {
        if (file_exists($this->file)) { 
            $this ->tasks = json_decode(file_get_contents($this->file), true) ?? [];
        }
    }

    public function addTask($title, $description) { 
        $id = count($this-> tasks) +1;
        $createdAt = time();
        $updatedAt = time();
        $task = new Task($id, $title, $description, $createdAt, $updatedAt);
        $this-> tasks[] = (array) $task;
        $this-> saveTasks();
        echo "Task added: $title\n";
    }

    public function listTasks() { 
        if (empty($this-> tasks)) {
            echo "There are no tasks yet.";
        }
        foreach ($this->tasks as $task) {
            echo $task["title"] ."". $task["description"];
        }
        return;
    }

    public function completeTask($id) { 
        $index = array_search($id, $this->tasks);
        if ($index !== false) {
            $this-> tasks[$index][5] = true;
            $this-> tasks[$index][4] = time();

        }
        else { 
            echo "Task not found.";
        }
        return;      
    }

    public function deleteTask($id) {
        $this->tasks = array_values(array_filter($this->tasks, fn($task) => $task['id'] != $id));
        $this->saveTasks();
        echo "Deleted task id $id.\n";
    }

    private function saveTasks() {
        file_put_contents($this->file, json_encode($this->tasks, JSON_PRETTY_PRINT));
    }
}