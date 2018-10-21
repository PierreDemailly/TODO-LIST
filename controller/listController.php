<?php
require 'model/listModel.php';

if (!validate($_GET['id'])) {
    header('Location: ' . BASE_URL . 'home/');
}

if (isset($_POST['add-task'])) {
    $name = htmlspecialchars($_POST['task-name']);
    $deadline = [
        'date' => htmlspecialchars($_POST['task-deadline-date']),
        'time' => htmlspecialchars($_POST['task-deadline-time'])
    ];

    $error[] = (empty($name)) ? "Vous devez nommer votre liste." : NULL;
    $error[] = (strlen($name) < 3) ? "Le nom de votre liste doit faire au moins 3 caractères" : NULL;
    $error[] = (strlen($name) > 100) ? "Le nom de votre liste doit faire maximum 100 caractères" : NULL;
    $error[] = (empty($deadline['date'])) ? "Vous devez donner une date" : NULL;
    $error[] = (empty($deadline['time'])) ? "Vous devez donner une heure" : NULL;

    $errors = getErrors($error);

    if (!isset($errors)) {
        createTask($name, $_POST['list_id'], "$deadline[date] $deadline[time]");
    }
}

if(isset($_POST['task-done'])) {
    taskDone($_POST['task-id']);
}

if(isset($_POST['task-clear'])) {
    taskClear($_POST['task-id']);
}

$list = getList($_GET['id']);
$tasks = getTasks($_GET['id']);

require 'tpl/header.tpl';
require 'tpl/list.tpl';
require 'tpl/footer.tpl';
