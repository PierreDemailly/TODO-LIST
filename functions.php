<?php
function getData() {
  try {
      $db = new PDO('mysql:host=localhost;dbname=todolist', 'root', 'root', [
          PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
          PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
      ]);
  } catch (PDOException $err) {
      die('Erreur MySQL: ' . $err->getMessage());
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
      'project',
      'list',
      'deleteTask',
      'editTask',
      'me',
      'binProject',
      'logout'
  ];
  if($url === 'install')
      return 'install/index.php';
  elseif(in_array($url, $routes))
      return 'controller/' . $url . 'Controller.php';
  else
      return '404.html';
}

function getId($email) {
  $db = getData();
  $req = $db->prepare('SELECT id FROM user WHERE email = :email');
  $req->bindValue(':email', $email, PDO::PARAM_STR);
  $req->execute();
  $rep = $req->fetch();
  return $rep->id;
}

function countEmail($email) {
  $db = getData();
  $req = $db->prepare('SELECT id FROM user WHERE email = :email');
  $req->bindValue(':email', $email, PDO::PARAM_STR);
  $req->execute();
  return $rep = $req->rowCount();
}

function getErrors($errors) {
  foreach($errors as $err) {
      if($err !== NULL)
          $errs[] = $err;
  }
  return (isset($errs)) ? $errs : NULL;
}

function getProjectsForNavbar() {
  $db = getData();
  $req = $db->prepare('SELECT id, name FROM project WHERE user_id = :id AND deleted = 0');
  $req->bindValue(':id', $_SESSION['id'], PDO::PARAM_INT);
  $req->execute();
  return $rep = $req->fetchAll();
}
function getNavbarProjectLists($id) {
  $db = getData();
  $req = $db->prepare('SELECT id, name FROM list WHERE project_id = :id');
  $req->bindValue(':id', $id, PDO::PARAM_INT);
  $req->execute();
  return $rep = $req->fetchAll();
}
function getUsername() {
  $db = getData();
  $req = $db->prepare('SELECT pseudo FROM user WHERE id = :id');
  $req->bindValue(':id', $_SESSION['id'], PDO::PARAM_INT);
  $req->execute();
  return $rep = $req->fetch()->pseudo;
}
