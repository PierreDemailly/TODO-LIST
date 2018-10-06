<?php

function countEmail($email) {
    $db = getData();
    $req = $db->query("SELECT * FROM user WHERE email = '$email'");
    return $rep = $req->rowCount();
}

function checkPass($email, $password) {
    $db = getData();
    $req = $db->query("SELECT password FROM user WHERE email = '$email'");
    $rep = $req->fetch();
    return password_verify($password, $rep->password);
}

function getId($email) {
    $db = getData();
    $req = $db->query("SELECT id FROM user WHERE email = '$email'");
    $rep = $req->fetch();
    return $rep->id;
}

function getErrors($error) {
    foreach($error as $err) {
        if($err !== NULL)
            $errors[] = $err;
    }
    if(isset($errors))
        return $errors;
}