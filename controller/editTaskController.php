<?php
require 'model/editTaskModel.php';

if (!validate($_GET['id'])) {
    header('Location: ' . BASE_URL . 'home/');
}

if (isset($_POST['task-edit'])) {
  $id = $_POST['task-id'];
  $name = $_POST['task-name'];
  $date = $_POST['task-date'];
  $time = $_POST['task-time'];
  $list = $_POST['task-list'];
  $errors = [];

  $errors[] = (empty($name)) ? "Vous devez nommer votre liste." : NULL;
  $errors[] = (strlen($name) < 3) ? "Le nom de votre liste doit faire au moins 3 caractères" : NULL;
  $errors[] = (strlen($name) > 100) ? "Le nom de votre liste doit faire maximum 100 caractères" : NULL;

  $errors[] = (empty($date)) ? "Vous devez donner une date" : NULL;
  $errors[] = (empty($time)) ? "Vous devez donner une heure" : NULL;

  $errors = getErrors($errors);

  if(empty($errors))
    editTask($task_id, $task_name, "$task_date $task_time", $task_list);
}

$task = getTask($_GET['id']);
$deadline = explode(' ', $task->deadline);
$lists = getLists($task->project_id);

$title = 'Modifier la tâche '. $task->task_name;

require 'tpl/header.tpl';
require 'tpl/editTask.tpl';
require 'tpl/footer.tpl';
