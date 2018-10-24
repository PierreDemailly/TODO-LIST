<?php

function getUser() {
  $db = getData();
  $req = $db->prepare('SELECT pseudo, email FROM user WHERE id = :session_id');
  $req->bindValue(':session_id', $_SESSION['id'], PDO::PARAM_INT);
  $req->execute();
  return $rep = $req->fetch();
}

function editUser($email, $pseudo) {
  $db = getData();
  $req = $db->prepare('UPDATE user SET email = :email, pseudo = :pseudo WHERE id = :id');
  $req->bindValue(':email', $email, PDO::PARAM_STR);
  $req->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
  $req->bindValue(':id', $_SESSION['id'], PDO::PARAM_STR);
  $req->execute();
}

function countPseudo($pseudo) {
  $db = getData();
  $req = $db->prepare('SELECT id FROM user WHERE pseudo = :pseudo');
  $req->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
  $req->execute();
  return $rep = $req->rowCount();
}
