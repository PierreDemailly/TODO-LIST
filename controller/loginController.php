<?php
require 'model/loginModel.php';

$_HAS_NAVBAR = false;

if(isset($_SESSION['id']))
    header('Location: ' . BASE_URL . 'home/');

if(isset($_POST['submit'])) {
    $email = strtolower($_POST['email']);
    $password = $_POST['password'];
    $errors = [];

    $errors[] = (empty($email)
                OR empty($password)) ? "Merci de remplir tous les champs" : NULL;

    $errors[] = (countEmail($email) < 1) ? "Cette adresse email n'est pas enregistrée." : NULL;

    $errors = getErrors($error);

    if(empty($errors)) {
        if(checkPass($email, $password)) {
            $_SESSION['id'] = getId($email);
            header('Location: ' . BASE_URL . 'home/');
        } else {
            $errors[] = "Mot de passe incorrect.";
        }
    }
}

$title = "Connexion";

require 'tpl/header.tpl';
require 'tpl/login.tpl';
require 'tpl/footer.tpl';
