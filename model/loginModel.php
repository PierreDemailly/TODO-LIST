<?php

function checkPass($email, $password) {
    $db = getData();
    $req = $db->prepare('SELECT password FROM user WHERE email = :email');
    $req->bindValue(':email', $email, PDO::PARAM_STR);
    $req->execute();
    $rep = $req->fetch();
    return password_verify($password, $rep->password);
}
