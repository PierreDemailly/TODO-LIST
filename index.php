<?php
require 'global.php';

if(empty($_GET['url']))
    header('Location: ' . BASE_URL . 'login/');

$url = $_GET['url'];

if(!isOnline() && $url !== 'login' && $url !== 'register' && $url !== 'install')
    header('Location: ' . BASE_URL . 'login/');

if(INSTALL == 0 && $url !== 'install')
    header('Location: ' . BASE_URL . 'install/');
else
    require routing($url);
