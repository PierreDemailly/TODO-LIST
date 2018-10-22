<?php
require 'model/homeModel.php';

if(isset($_POST['add-project'])) {
    $pj_name = htmlspecialchars($_POST['project-name']);
    $pj_desc = htmlspecialchars($_POST['project-desc']);
    $pj_deadline = [
        'date' => htmlspecialchars($_POST['project-deadline-date']),
        'time' => htmlspecialchars($_POST['project-deadline-time'])
    ];

    if(empty($pj_name))
        $error[] = "Vous devez nommer votre projet.";
    if(strlen($pj_name) > 100)
        $error[] = "Le nom de votre projet ne doit pas dépasser 100 caractères.";

    if(empty($pj_desc))
        $pj_desc = "Aucune description.";
    if(strlen($pj_desc) > 255)
        $error[] = "La description de votre projet ne doit pas dépasser 255 caractères.";

    if(empty($pj_deadline['date']))
        $error[] = "Vous devez choisir une date.";
    if(empty($pj_deadline['time']))
        $error[] = "Vous devez choisir une heure.";

    if(!isset($error)) {
        createProject($pj_name, $pj_desc, "$pj_deadline[date] $pj_deadline[time]", $_SESSION['id']);
    }
}

$projects = getProjects();

require 'tpl/header.tpl';
require 'tpl/home.tpl';
require 'tpl/footer.tpl';
