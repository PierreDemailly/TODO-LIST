<?php
require 'model/projectModel.php';

if (!validateGetId())
    header('Location: ' . BASE_URL . 'home/');

if(isset($_POST['delete-project']))
    deleteProject($_POST['project-id']);

if (isset($_POST['add-list'])) {
    $name = $_POST['list-name'];
    $errors = [];

    $errors[] = (empty($name)) ? "Veuillez donner un nom à votre liste." : NULL;
    $errors[] = (strlen($name) < 3) ? "Le nom de votre liste est trop court." : NULL;
    $errors[] = (strlen($name) > 100) ? "Le nom de votre liste est trop long." : NULL;

    $errors = getErrors($errors);

    if (empty($errors))
        createList($name);
}

if( isset($_POST['delete-list']))
    deleteList($_POST['list-id']);

$project = getProjectById();
$lists = getListsById();

$title = $project->name;

require 'tpl/header.tpl';
require 'tpl/project.tpl';
require 'tpl/footer.tpl';
