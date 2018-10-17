<?php
require 'model/loginModel.php';

if(isset($_SESSION['id']))
    header('Location: '.BASE_URL.'home/');

if(isset($_POST['submit'])) {
    $email = htmlspecialchars($_POST['email']);
    $password = $_POST['password'];

    $error[] = (empty($email)) ? "Merci de donner votre adresse email." : NULL;
    $error[] = (empty($password)) ? "Merci de donner votre mot de passe." : NULL;
    $error[] = (!filter_var($email, FILTER_VALIDATE_EMAIL)) ? "Adresse email non valide." : NULL;
    $error[] = (countEmail($email) < 1) ? "Cette adresse email n'est pas enregistrée." : NULL;

    $errors = getErrors($error);

    if(!isset($errors)) {
        $checkLogin = checkPass($email, $password);
        if($checkLogin) {
            $_SESSION['id'] = getId($email);
            header('Location: '.BASE_URL.'home/');
        } else {
            $error[] = "Mot de passe incorrect.";
        }
    }
}


require 'tpl/header.tpl';
require 'tpl/login.tpl';
require 'tpl/footer.tpl';
