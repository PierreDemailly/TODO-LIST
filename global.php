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

$db = getData();