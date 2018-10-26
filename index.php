<?php
require 'global.php';

if(empty($_GET['url']))
    header('Location: ' . BASE_URL . 'login/');

$url = $_GET['url'];

if(!isOnline() && $url !== 'login' && $url !== 'register')
    header('Location: ' . BASE_URL . 'login/');

require routing($url);
