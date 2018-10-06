<?php

function countPseudo($pseudo) {
    $db = getData();
    $req = $db->query("SELECT id FROM user WHERE pseudo = '$pseudo'");
    return $rep = $req->rowCount();
}

function createUser($pseudo, $email, $password) {
    $db = getData();
    $req = $db->prepare('INSERT INTO user (email, pseudo, password) VALUES(:email, :pseudo, :password)');
    $req->execute([
        ':email'    => $email,
        ':pseudo'   => $pseudo,
        ':password' => password_hash($password, PASSWORD_DEFAULT)
    ]);
}
