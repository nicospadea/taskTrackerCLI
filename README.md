# taskTrackerCLI

This task manager CLI tool allows users to manage tasks via the command line. It enables the following functionalities:
- Add tasks with a title and description.\
- List all tasks with their current status (Completed or Pending).\
- Mark tasks as completed.\
- Delete tasks by their ID.\
- Tasks are stored in a JSON file and persist between runs. The tool provides a simple and efficient way to track tasks using basic commands.\

## Usage:
php taskTracker.php add <title> <description> - Add a new task \
php taskTracker.php delete <id> - Delete a task \
php taskTracker.php complete <id> - Complete a task \
php taskTracker.php list - List all tasks \


