<?php
require 'model/registerModel.php';

if(isset($_POST['submit'])) {
    $pseudo      = htmlspecialchars($_POST['pseudo']);
    $email       = htmlspecialchars($_POST['email']);
    $email_v     = htmlspecialchars($_POST['email-v']);
    $password    = htmlspecialchars($_POST['password']);
    $password_v  = htmlspecialchars($_POST['password-v']);
    $emailCount  = countEmail($email);
    $pseudoCount = countPseudo($pseudo);

    $error[] = (empty($email) OR
                empty($email_v) OR
                empty($password) OR
                empty($password_v)) ? "Merci de remplir tous les champs" : NULL;
    $error[] = (strlen($pseudo) < 4) ? "Votre pseudo doit faire au moins 3 caractères" : NULL;
    $error[] = (strlen($pseudo > 26)) ? "Votre pseudo ne doit pas dépasser 26 caractères" : NULL;
    $error[] = ($pseudoCount > 1) ? "Ce pseudo est déjà utilisé" : NULL;
    $error[] = (!filter_var($email, FILTER_VALIDATE_EMAIL)) ? "Adresse email non valide." : NULL;
    $error[] = ($emailCount > 1) ? "Cette adresse email est déjà utilisée" : NULL;
    $error[] = ($email !== $email_v) ? "Les adresses email ne correspondent pas" : NULL;
    $error[] = (strlen($password) < 6) ? "Votre mot de passe doit faire au moins 6 caractères" : NULL;
    $error[] = ($password !== $password_v) ? "Les mots de passe ne correspondent pas" : NULL;

    $errors = getErrors($error);

    if(!isset($errors)) {
        createUser($pseudo, $email, $password);
        $_SESSION['id'] = getId($email);
        header('Location: '.BASE_URL.'home/');
    }
}

require 'tpl/header.tpl';
require 'tpl/register.tpl';
require 'tpl/footer.tpl';
