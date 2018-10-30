<?php
require 'model/registerModel.php';

$_HAS_NAVBAR = false;

if(isset($_SESSION['id']))
    header('Location: ' . BASE_URL . 'home/');

if(isset($_POST['submit'])) {
    $pseudo      = $_POST['pseudo'];
    $email       = strtolower($_POST['email']);
    $email_v     = strtolower($_POST['email-v']);
    $password    = $_POST['password'];
    $password_v  = $_POST['password-v'];
    $email_count  = countEmail($email);
    $pseudo_count = countPseudo($pseudo);
    $errors      = [];

    $errors[] = (empty($pseudo)
                OR empty($email)
                OR empty($email_v)
                OR empty($password)
                OR empty($password_v)) ? "Veuillez remplir tous les champs." : NULL;

    $errors[] = (strlen($pseudo) < 4) ? "Votre pseudo est trop court." : NULL;
    $errors[] = (strlen($pseudo > 26)) ? "Votre pseudo est trop long." : NULL;
    $errors[] = ($pseudo_count > 1) ? "Ce pseudo est déjà utilisé." : NULL;

    $errors[] = (!filter_var($email, FILTER_VALIDATE_EMAIL)) ? "Veuillez entrer une email valide." : NULL;
    $errors[] = ($email_count > 1) ? "Cette email est déjà utilisée." : NULL;
    $errors[] = ($email !== $email_v) ? "Veuillez entrer 2 email identique." : NULL;

    $errors[] = (strlen($password) < 6) ? "Votre mot de passe est trop court." : NULL;
    $errors[] = ($password !== $password_v) ? "Les mots de passe ne correspondent pas." : NULL;

    $errors = getErrors($errors);

    if(empty($errors)) {
        createUser($pseudo, $email, $password);
        $_SESSION['id'] = getId($email);
        header('Location: ' . BASE_URL . 'home/');
    }
}

$title = "Inscription";

require 'tpl/header.tpl';
require 'tpl/register.tpl';
require 'tpl/footer.tpl';
