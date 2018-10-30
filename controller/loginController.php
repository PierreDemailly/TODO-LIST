<?php
require 'model/loginModel.php';

$_HAS_NAVBAR = false;

if(isset($_SESSION['id']))
    header('Location: ' . BASE_URL . 'home/');
elseif(isset($_COOKIE['auth-token'])) {
    $_SESSION['id'] = getIdByAuthToken($_COOKIE['auth-token'])->id;
    header('Location: ' . BASE_URL . 'home/');
}

if(isset($_POST['submit'])) {
    $email = strtolower($_POST['email']);
    $password = $_POST['password'];
    $errors = [];

    $errors[] = (empty($email)
                OR empty($password)) ? "Veuillez remplir tous les champs." : NULL;

    $errors[] = (countEmail($email) < 1) ? "Cette email n'est associée à aucune compte." : NULL;

    /* We save only the errors that are differents to NULL */
    $errors = getErrors($errors);

    if(empty($errors)) {
        if(checkPass($email, $password)) {
            if($_POST['stay-auth'] && !$_COOKIE['auth-token']) {
                $token = bin2hex(random_bytes(90));
                setcookie('auth-token', $token, time() + 60 * 60 * 24 * 365, '/', 'localhost', false, true);
                insertToken(getId($email), $token);
            } elseif($_COOKIE['auth-token'])
                unset($_COOKIE['auth-token']);

            $_SESSION['id'] = getId($email);
            header('Location: ' . BASE_URL . 'home/');
        }
        $errors[] = "Mot de passe incorrect.";
    }
}

$title = "Connexion";

require 'tpl/header.tpl';
require 'tpl/login.tpl';
require 'tpl/footer.tpl';
