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
  if(in_array($url, $routes))
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

function checkUrl()
{
  $urls = preg_split("~[/]~", $_GET['url']);
  $urls = array_filter(preg_split("~[/]~", $_GET['url']), function($value) { return $value !== ''; });

  if(count($urls) > 1) { // URL is page/* instead page
      // die('dezzde');
      // header("Location: ".BASE_URL."{$url[-1]}");

      foreach($urls as $url) {
          if(!empty($url)) {
              $url_cutting[] = $url;
          }
      }
      if(isset($url_cutting)) {
          switch (count($url_cutting)) {
              case 1:
                  $location = $url_cutting[0];
                  break;
              case 2:
                  $location = "$url_cutting[0]/$url_cutting[1]";
                  break;
              case 3:
                  $location = "$url_cutting[0]/$url_cutting[1]";
                  break;
              case 4:
                  $location = "$url_cutting[0]/$url_cutting[1]/$url_cutting[2]/$url_cutting[3]";
                  break;
              default:
                  $location = "home";
                  break;
          }
          $_SESSION['url'] = time();
          header('Location: ' . BASE_URL.$location);
      }
  }
  // elseif($count($urls) > 0) {
  //     if(!empty($url[0]))
  //         header("Location: ".BASE_URL."{$url[0]}");
  //     else {
  //         header('Location: ' . BASE_URL . 'login');
  //     }
  // }
}
function getProjectsForNavbar() {
  $db = getData();
  $req = $db->prepare('SELECT id, name FROM project WHERE user_id = :id');
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