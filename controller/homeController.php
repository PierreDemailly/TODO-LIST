<?php
require 'model/homeModel.php';

if(isset($_POST['add-project'])) {
    $name = $_POST['project-name'];
    $desc = $_POST['project-desc'];
    $deadline = [
        'date' => $_POST['project-deadline-date'],
        'time' => $_POST['project-deadline-time']
    ];
    $category = $_POST['project-category'];
    $errors = [];

    $errors = (empty($name)
              OR empty($desc)
              OR empty($deadline['date'])
              OR empty($deadline['time'])) ? "Veuillez remplir tous les champs." : NULL;

    $errors = (strlen($name) > 50) ? "Le nom de votre projet est trop long." : NULL;

    $errors = (strlen($desc) > 255) ? "La description de votre projet est trop longue." : NULL;

    $errors = getErrors($errors);

    if(empty($errors)) {
        createProject($name, $desc, "$deadline[date] $deadline[time]", $_SESSION['id'], $category);
    }
}

$projects = getProjects();

$title = 'Mes projets';

require 'tpl/header.tpl';
require 'tpl/home.tpl';
require 'tpl/footer.tpl';
