<?php
require 'model/listModel.php';

if(!validate($_GET['id']))
  header('Location: '.BASE_URL.'home/');

$list = getList($_GET['id']);

require 'tpl/header.tpl';
require 'tpl/list.tpl';
require 'tpl/footer.tpl';
