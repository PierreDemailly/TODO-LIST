<?php
require 'global.php';

if(!isset($_SESSION['url']) OR $_SESSION['url'] === false) {
    checkUrl();
} else {
    $_SESSION['url'] = false;
}

if(empty($_GET['url']))
    header('Location: '.BASE_URL.'login/');

$url = $_GET['url'];

if(!isOnline() && $url !== 'login' && $url !== 'register') {
    header('Location: '.BASE_URL.'login/');
}
var_dump($url);
// var_dump($_GET['id']);
require routing($url);
