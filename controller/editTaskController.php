<?php
require 'model/editTaskModel.php';

if (!validate($_GET['id']))
    header('Location: ' . BASE_URL . 'home/');

if (isset($_POST['task-edit'])) {
  $id = $_POST['task-id'];
  $name = $_POST['task-name'];
  $date = $_POST['task-date'];
  $time = $_POST['task-time'];
  $list = $_POST['task-list'];
  $errors = [];

  $errors[] = (empty($name)) ? "Veuillez nommer votre tâche." : NULL;
  $errors[] = (strlen($name) < 3) ? "Le nom de votre tâche est trop court." : NULL;
  $errors[] = (strlen($name) > 100) ? "Le nom de votre liste est trop long." : NULL;

  $errors[] = (empty($date) OR empty($time)) ? "Veuillez donner une date & heure valide." : NULL;

  $errors = getErrors($errors);

  if(empty($errors))
    editTask($task_id, $task_name, "$task_date $task_time", $task_list);
}

$task = getTask($_GET['id']);
$deadline = explode(' ', $task->deadline);
$lists = getLists($task->project_id);

$title = 'Modifier la tâche ' . $task->task_name;

require 'tpl/header.tpl';
require 'tpl/editTask.tpl';
require 'tpl/footer.tpl';
