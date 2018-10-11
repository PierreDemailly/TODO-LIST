<?php
require 'global.php';

if(!isset($_GET['url']))
    header('Location: '.BASE_URL.'login/');

$url = $_GET['url'];

if(!isOnline() && $url !== 'login' && $url !== 'register') {
    header('Location: '.BASE_URL.'login/');
}
var_dump($url);
require routing($url);
