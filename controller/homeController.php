<?php
require 'model/homeModel.php';

if(isset($_POST['add-project'])) {
    $name = $_POST['name'];
    $desc = $_POST['description'];
    $deadline = [
        'date' => $_POST['deadline-date'],
        'time' => $_POST['deadline-time']
    ];
    $category = $_POST['category'];
    $errors = [];

    $errors = (empty($name)
              OR empty($desc)
              OR empty($deadline['date'])
              OR empty($deadline['time'])) ? "Veuillez remplir tous les champs." : NULL;

    $errors = (strlen($name) > 50) ? "Le nom de votre projet est trop long." : NULL;

    $errors = (strlen($desc) > 255) ? "La description de votre projet est trop longue." : NULL;

    /* We save only the errors that are differents to NULL */
    $errors = getErrors($errors);

    if(empty($errors))
        createProject($name, $desc, "$deadline[date] $deadline[time]", $category);
}

$projects = getProjects();

$title = 'Mes projets';

require 'tpl/header.tpl';
require 'tpl/home.tpl';
require 'tpl/footer.tpl';
