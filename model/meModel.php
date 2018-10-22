<?php

function getUser() {
  $db = getData();
  $req = $db->query("SELECT pseudo, email FROM user WHERE id = $_SESSION[id]");
  return $rep = $req->fetch();
}

function editUser($email, $pseudo) {
  $db = getData();
  $req = $db->prepare('UPDATE user SET email = :email, pseudo = :pseudo WHERE id = :id');
  $req->execute([
    'email' => $email,
    'pseudo' => $pseudo,
    'id' => $_SESSION['id']
  ]);
}
