<?php

require_once 'TaskManager.php';

class CLI {
    public static function run($argv) { 
        $taskManager = new TaskManager(); 
        if (count($argv) < 2) {
            self::showHelp();
            return;
        }

        switch ($argv[1]) {
            case 'add':
                if (isset($argv[2], $argv[3])) {
                    $taskManager->addTask($argv[2], $argv[3]);
                }
                else {
                    echo "Usage: php taskTracker.php add <title> <description>";
                }
                break;

            case "delete": 
                if (isset($argv[2])) {
                    $taskManager->deleteTask($argv[2]);
                }
                else {
                    echo "Usage: php taskTracker.php delete <id>";
                }
                break;
            case "list": 
                $taskManager-> listTasks();
                break;

            case "complete": 
                if (isset($argv[2])) {
                    $taskManager-> completeTask($argv[2]);
                }
                else { 
                    echo "Usage: php taskTracker.php complete <id>";
                }
                break;
            default: 
                self::showHelp();
        }
    }
    private static function showHelp() {
        echo "Usage:\n";
        echo "php taskTracker.php add <title> <description> - Add a new task";
        echo "Usage: php taskTracker.php delete <id> - Delete a task";
        echo "Usage: php taskTracker.php complete <id> - Complete a task";
        echo "Usage: php taskTracker.php list - List all tasks";
    }
}
