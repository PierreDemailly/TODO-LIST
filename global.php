<?php
session_start();

function getData() {
    try {
        $db = new PDO('mysql:host=localhost;dbname=todolist', 'root', 'root', [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
        ]);
    } catch (PDOException $err) {
        die('Erreur MySQL: '. $err->getMessage());
    }
    return $db;
}

function isOnline() {
    return !empty($_SESSION['id']);
}

function routing($url) {
    $routes = [
        'login',
        'register',
        'home',
        'project'
    ];
    if(in_array($url, $routes))
        return 'controller/'.$url.'Controller.php';
    else
        return '404.html';
}

function getId($email) {
    $db = getData();
    $req = $db->query("SELECT id FROM user WHERE email = '$email'");
    $rep = $req->fetch();
    return $rep->id;
}

function countEmail($email) {
    $db = getData();
    $req = $db->query("SELECT id FROM user WHERE email = '$email'");
    return $rep = $req->rowCount();
}

function getErrors($error) {
    foreach($error as $err) {
        if($err !== NULL)
            $errors[] = $err;
    }
    if(isset($errors))
        return $errors;
}

const BASE_URL = "/TODOLIST/";
