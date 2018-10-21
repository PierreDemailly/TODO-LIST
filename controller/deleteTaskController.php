<?php
require 'model/deleteTaskModel.php';

if(!validate($_GET['id']))
  header('Location: '.BASE_URL.'home/');

$task = getTask($_GET['id']);

if(isset($_POST['task-delete'])) {
  deleteTask($_POST['task-id']);
  header('Location: '.BASE_URL.'list/'.$task->list_id);
}

require 'tpl/header.tpl';
require 'tpl/deleteTask.tpl';
require 'tpl/footer.tpl';
