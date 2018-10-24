<?php
require 'model/listModel.php';

if (!validate($_GET['id'])) {
    header('Location: ' . BASE_URL . 'home/');
}

if (isset($_POST['add-task'])) {
    $name = $_POST['task-name'];
    $deadline = [
        'date' => $_POST['task-deadline-date'],
        'time' => $_POST['task-deadline-time']
    ];
    $errors = [];

    $errors[] = (empty($name)) ? "Vous devez nommer votre liste." : NULL;
    $errors[] = (strlen($name) < 3) ? "Le nom de votre liste doit faire au moins 3 caractères" : NULL;
    $errors[] = (strlen($name) > 100) ? "Le nom de votre liste doit faire maximum 100 caractères" : NULL;
    $errors[] = (empty($deadline['date'])) ? "Vous devez donner une date" : NULL;
    $errors[] = (empty($deadline['time'])) ? "Vous devez donner une heure" : NULL;

    $errors = getErrors($errors);

    if (empty($errors)) {
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

$title = $list->name . ' - gestion de ma liste';

require 'tpl/header.tpl';
require 'tpl/list.tpl';
require 'tpl/footer.tpl';
