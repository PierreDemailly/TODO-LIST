<?php
require 'model/projectModel.php';

if (!validate($_GET['id'])) {
    header('Location: ' . BASE_URL . 'home/');
}

if (isset($_POST['add-list'])) {
    $name = htmlspecialchars($_POST['list-name']);

    $error[] = (empty($name)) ? "Vous devez nommer votre liste." : null;
    $error[] = (strlen($name) < 3) ? "Le nom de votre liste doit faire au moins 3 caractères" : null;
    $error[] = (strlen($name) > 100) ? "Le nom de votre liste doit faire maximum 100 caractères" : null;

    $errors = getErrors($error);

    if (!isset($errors)) {
        createList($name, $_GET['id']);
    }
}

$project = getProject($_GET['id']);
$lists = getLists($_GET['id']);

require 'tpl/header.tpl';
require 'tpl/project.tpl';
require 'tpl/footer.tpl';
