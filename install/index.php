<?php


  if(isset($_POST['submit-mysql'])) {
    $host = $_POST['mysql-host'];
    $dbname = $_POST['mysql-dbname'];
    $user = $_POST['mysql-user'];
    $pass = $_POST['mysql-password'];

    try {
      $db = new PDO("mysql:host=$host;", $user, $pass);
    } catch(PDOException $e) {
      $errors[] = 'Erreur mysql: ' . $e->getMessage() . '<br>Vérifiez vos identifiants MySQL.';
    }

    if(!isset($errors)) {
      header('Location:' . BASE_URL . 'install/?step=1');
      $_SESSION['mysql'] = [
        'host' => $host,
        'dbname' => $dbname,
        'user' => $user,
        'password' => $pass
      ];
    }

  }

  if(isset($_POST['submit-user'])) {
    $pseudo      = $_POST['pseudo'];
    $email       = strtolower($_POST['email']);
    $email_v     = strtolower($_POST['email-v']);
    $password    = $_POST['password'];
    $password_v  = $_POST['password-v'];
    $errors      = [];

    $errors[] = (empty($pseudo)
                OR empty($email)
                OR empty($email_v)
                OR empty($password)
                OR empty($password_v)) ? "Veuillez remplir tous les champs." : NULL;

    $errors[] = (strlen($pseudo) < 4) ? "Votre pseudo est trop court." : NULL;
    $errors[] = (strlen($pseudo > 26)) ? "Votre pseudo est trop long." : NULL;

    $errors[] = (!filter_var($email, FILTER_VALIDATE_EMAIL)) ? "Veuillez entrer une email valide." : NULL;
    $errors[] = ($email !== $email_v) ? "Veuillez entrer 2 email identique." : NULL;

    $errors[] = (strlen($password) < 6) ? "Votre mot de passe est trop court." : NULL;
    $errors[] = ($password !== $password_v) ? "Les mots de passe ne correspondent pas." : NULL;

    $errors = getErrors($errors);

    if(empty($errors)) {
      $db = new PDO('mysql:host='.$_SESSION['mysql']['host'].';', $_SESSION['mysql']['user'], $_SESSION['mysql']['password']);
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $db->exec('CREATE DATABASE IF NOT EXISTS '. $_SESSION['mysql']['dbname'] .'');
      $db->exec('USE '. $_SESSION['mysql']['dbname']);

      $req = file_get_contents("install/database.sql");
      $req = str_replace("\n", "", $req);
      $req = str_replace("\r", "", $req);
      $db->exec($req);
      $req = $db->prepare('INSERT INTO user (pseudo, email, password) VALUES (:pseudo, :email, :password)');
      $req->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
      $req->bindValue(':email', $email, PDO::PARAM_STR);
      $req->bindValue(':password', password_hash($password, PASSWORD_DEFAULT), PDO::PARAM_STR);
      $req->execute();

      $filename = 'config/config.php';
      $file = fopen($filename, 'r') or die("Fichier manquant"); # Lecture
      $file_content = file_get_contents($filename);
      $replace_content = str_replace('0', '1', $file_content);
      $replace_content = str_replace('CONFIG_MYSQL_HOST', $_SESSION['mysql']['host'], $replace_content);
      $replace_content = str_replace('CONFIG_MYSQL_DBNAME', $_SESSION['mysql']['host'], $replace_content);
      $replace_content = str_replace('CONFIG_MYSQL_USER', $_SESSION['mysql']['host'], $replace_content);
      $replace_content = str_replace('CONFIG_MYSQL_PASSWORD', $_SESSION['mysql']['host'], $replace_content);
      fclose($file);

      $file = fopen($filename, 'w+') or die("Fichier manquant"); # Ecriture
  fwrite($file, $replace_content);
  fclose($file);

      rmdir('install');
      header('Location: '. BASE_URL);
    }
  }

  $title = 'Installation';

  $_HAS_NAVBAR = false;
  require 'tpl/header.tpl';
?>
<div class="container d-flex" style="min-height:100vh">

<form method="post" class="col-sm-10 col-md-8 col-lg-6 col-xl-4 m-auto">

  <p class="h2">Installation</p>
  <p>Bienvenue, nous allons configurer MySQL & votre compte administrateur ensemble ;)</p>

  <?php
  if (isset($errors)):
    foreach ($errors as $error):
  ?>

  <div class="alert alert-warning alert-dismissible fade show" role="alert">
    <?= $error ?>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>

  <?php
    endforeach;
  endif;
  ?>

  <?php if(!isset($_GET['step'])): ?>

  <div class="form-group">
    <label for="host">Hôte MySQL</label>
    <input type="text" class="form-control" name="mysql-host" id="host" placeholder="localhost" required/>
  </div>

  <div class="form-group">
    <label for="dbname">Nom de la base de donnée MySQL</label>
    <input type="text" class="form-control" name="mysql-dbname" id="dbname" placeholder="dbname" required/>
    <small>Si la base de donnée n'existe pas, elle sera créée automatiquement.</small>
  </div>

  <div class="form-group">
    <label for="user">Utilisateur MySQL</label>
    <input type="text" class="form-control" name="mysql-user" id="user" placeholder="root" required/>
  </div>

  <div class="form-group">
    <label for="password">Mot de passe MySQL</label>
    <input type="text" class="form-control" name="mysql-password" id="password" placeholder="root" required/>
  </div>

  <button type="submit" class="btn btn-primary" name="submit-mysql">Confirmer</button>

  <?php elseif((int)$_GET['step'] === 1): ?>

  <p class="h3">Configuration compte administrateur</p>

  <div class="form-group">
    <label for="pseudo">Pseudo</label>
    <input type="text" class="form-control" name="pseudo" id="pseudo" placeholder="Votre pseudo" required/>
  </div>

  <div class="form-group">
    <label for="email">Email</label>
    <input type="text" class="form-control" name="email" id="email" placeholder="Votre adresse email" required/>
    <input type="email" class="form-control mt-1" name="email-v" placeholder="Vérification adresse email" required/>
  </div>

  <div class="form-group">
    <label for="password">Mot de passe</label>
    <input type="password" class="form-control" name="password" id="password" placeholder="Votre mot de passe" required/>
    <input type="password" class="form-control mt-1"name="password-v" placeholder="Vérification mot de passe" required/>
  </div>

  <button type="submit" class="btn btn-primary" name="submit-user">Confirmer</button>

  <?php endif; ?>

</form>

</div>
