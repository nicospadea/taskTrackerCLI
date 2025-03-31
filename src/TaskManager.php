<?php

require_once('Task.php');
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
        if (empty($this->tasks)) {
            echo "There are no tasks yet.\n";
            return;
        }
    
        echo "ID  | TITLE               | STATUS\n";
        echo "----------------------------------\n";
    
        foreach ($this->tasks as $task) {
            $status = $task['completed'] ? '✔ Completed' : '✗ Pending';
            printf("%-3d | %-20s | %s\n", $task['id'], $task['title'], $status);
        }
    }
    
    public function completeTask($id) { 
        foreach ($this->tasks as &$task) {
            if ($task['id'] == $id) {
                $task['completed'] = true;
                $task['completed_at'] = time(); // Guardamos la fecha de completado
                $this->saveTasks();
                echo "Task $id marked as completed.\n";
                return;
            }
        }
    
        echo "Task not found.\n";
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