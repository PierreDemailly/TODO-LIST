<?php
require 'model/deleteTaskModel.php';

if(!validateGetId())
  header('Location: ' . BASE_URL . 'home/');


  if(isset($_POST['task-delete'])) {
    deleteTask($_POST['task-id']);
    header('Location: ' . BASE_URL . 'list/' . $task->list_id);
  }

$task = getTask();

$title = 'Supprimer la tâche ' . $task->name;

require 'tpl/header.tpl';
require 'tpl/deleteTask.tpl';
require 'tpl/footer.tpl';
