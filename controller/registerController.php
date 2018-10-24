<?php
require 'model/registerModel.php';

if(isset($_SESSION['id']))
    header('Location: '.BASE_URL.'home/');

if(isset($_POST['submit'])) {
    $pseudo      = $_POST['user-pseudo'];
    $email       = $_POST['user-email'];
    $email_v     = $_POST['user-email-v'];
    $password    = $_POST['user-password'];
    $password_v  = $_POST['user-password-v'];
    $email_count  = countEmail($email);
    $pseudo_count = countPseudo($pseudo);
    $errors      = [];

    $errors[] = (empty($pseudo)
                OR empty($email)
                OR empty($email_v)
                OR empty($password)
                OR empty($password_v)) ? "Merci de remplir tous les champs" : NULL;
    $errors[] = (strlen($pseudo) < 4) ? "Votre pseudo doit faire au moins 3 caractères" : NULL;
    $errors[] = (strlen($pseudo > 26)) ? "Votre pseudo ne doit pas dépasser 26 caractères" : NULL;
    $errors[] = ($pseudo_count > 1) ? "Ce pseudo est déjà utilisé" : NULL;
    $errors[] = (!filter_var($email, FILTER_VALIDATE_EMAIL)) ? "Adresse email non valide." : NULL;
    $errors[] = ($email_count > 1) ? "Cette adresse email est déjà utilisée" : NULL;
    $errors[] = ($email !== $email_v) ? "Les adresses email ne correspondent pas" : NULL;
    $errors[] = (strlen($password) < 6) ? "Votre mot de passe doit faire au moins 6 caractères" : NULL;
    $errors[] = ($password !== $password_v) ? "Les mots de passe ne correspondent pas" : NULL;

    $errors = getErrors($errors);

    if(empty($errors)) {
        createUser($pseudo, $email, $password);
        $_SESSION['id'] = getId($email);
        header('Location: '.BASE_URL.'home/');
    }
}

$title = "Inscription";

require 'tpl/header.tpl';
require 'tpl/register.tpl';
require 'tpl/footer.tpl';
