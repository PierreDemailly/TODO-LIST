<?php

function checkPass($email, $password) {
    $db = getData();
    $req = $db->query("SELECT password FROM user WHERE email = '$email'");
    $rep = $req->fetch();
    return password_verify($password, $rep->password);
}
