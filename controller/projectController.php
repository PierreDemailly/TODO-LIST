<?php
require 'model/projectModel.php';

if (!validate($_GET['id'])) {
    header('Location: ' . BASE_URL . 'home/');
}

if(isset($_POST['delete-project'])) {
    deleteProject($_POST['project-id']);
}

if (isset($_POST['add-list'])) {
    $name = $_POST['list-name'];
    $errors = [];

    $errors[] = (empty($name)) ? "Vous devez nommer votre liste." : NULL;
    $errors[] = (strlen($name) < 3) ? "Le nom de votre liste doit faire au moins 3 caractères" : NULL;
    $errors[] = (strlen($name) > 100) ? "Le nom de votre liste doit faire maximum 100 caractères" : NULL;

    $errors = getErrors($errors);

    if (empty($errors)) {
        createList($name, $_GET['id']);
    }
}

if( isset($_POST['delete-list']))
    deleteList($_POST['list-id']);

$project = getProject($_GET['id']);
$lists = getLists($_GET['id']);

$title = $project->name;

require 'tpl/header.tpl';
require 'tpl/project.tpl';
require 'tpl/footer.tpl';
