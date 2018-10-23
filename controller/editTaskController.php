<?php
require 'model/editTaskModel.php';

if (!validate($_GET['id'])) {
    header('Location: ' . BASE_URL . 'home/');
}

if (isset($_POST['task-edit'])) {
  $task_id = $_POST['task-id'];
  $task_name = $_POST['task-name'];
  $task_date = $_POST['task-date'];
  $task_time = $_POST['task-time'];
  $task_list = $_POST['task-list'];

  editTask($task_id, $task_name, "$task_date $task_time", $task_list);
}

$task = getTask($_GET['id']);
$deadline = explode(' ', $task->deadline);
$lists = getLists($task->project_id);

$title = 'Modifier la tâche '. $task->task_name;

require 'tpl/header.tpl';
require 'tpl/editTask.tpl';
require 'tpl/footer.tpl';
