<?php

function countPseudo($pseudo) {
    $db = getData();
    $req = $db->prepare('SELECT id FROM user WHERE pseudo = :pseudo');
    $req->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
    $req->execute();
    return $rep = $req->rowCount();
}

function createUser($pseudo, $email, $password) {
    $db = getData();
    $req = $db->prepare('INSERT INTO user (email, pseudo, password) VALUES(:email, :pseudo, :password)');
    $req->bindValue(':email', $email, PDO::PARAM_STR);
    $req->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
    $req->bindValue(':password', password_hash($password, PASSWORD_DEFAULT));
    $req->execute();
}
