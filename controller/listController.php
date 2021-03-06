<?php
require 'model/listModel.php';

if (!validateGetId())
    header('Location: ' . BASE_URL . 'home/');

if (isset($_POST['add-task'])) {
    $name = $_POST['name'];
    $deadline = [
        'date' => $_POST['deadline-date'],
        'time' => $_POST['deadline-time']
    ];
    $errors = [];

    $errors[] = (empty($name)) ? "Veuillez nommer votre tâche." : NULL;
    $errors[] = (strlen($name) < 3) ? "Le nom de votre tâche est trop court." : NULL;
    $errors[] = (strlen($name) > 100) ? "Le nom de votre tâche est trop long." : NULL;

    $errors[] = (empty($deadline['date']) OR empty($deadline['time'])) ? "Veuillez donner une date & heure valide." : NULL;

    $errors = getErrors($errors);

    if (empty($errors))
        createTask($name, $_POST['list_id'], "$deadline[date] $deadline[time]");
}

if(isset($_POST['task-done']))
    taskDone($_POST['task-id']);

if(isset($_POST['task-clear']))
    taskClear($_POST['task-id']);

$list = getListById();
$tasks = getTasksById();

$title = $list->name . ' - gestion de ma liste';

require 'tpl/header.tpl';
require 'tpl/list.tpl';
require 'tpl/footer.tpl';
