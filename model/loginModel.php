<?php

function checkPass($email, $password) {
    $db = getData();
    $req = $db->prepare('SELECT password FROM user WHERE email = :email');
    $req->bindValue(':email', $email, PDO::PARAM_STR);
    $req->execute();
    $rep = $req->fetch();
    return password_verify($password, $rep->password);
}

function insertToken($user_id, $token) {
    $db = getData();
    $req = $db->prepare('UPDATE user SET auth_token = :token WHERE id = :user_id');
    $req->bindValue(':token', $token, PDO::PARAM_STR);
    $req->bindValue(':user_id', $user_id, PDO::PARAM_INT);
    $req->execute();
}

function getIdByAuthToken($token) {
    $db = getData();
    $req = $db->prepare('SELECT id FROM user WHERE auth_token = :token');
    $req->bindValue(':token', $token, PDO::PARAM_STR);
    $req->execute();
    return $rep = $req->fetch();
}
