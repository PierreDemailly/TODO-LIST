<!doctype html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title></title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="manifest" href="<?= BASE_URL ?>site.webmanifest">
  <link rel="apple-touch-icon" href="<?= BASE_URL ?>icon.png">
  <!-- Place favicon.ico in the root directory -->

  <link rel="stylesheet" href="<?= BASE_URL ?>css/normalize.css">
  <link rel="stylesheet" href="<?= BASE_URL ?>css/skeleton.css">
  <link rel="stylesheet" href="<?= BASE_URL ?>css/main.css">
</head>

<body>
  <!--[if lte IE 9]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->
<?php if($_HAS_NAVBAR) { ?>
<ul class="navbar">
  <li><a href="">Accueil</a></li>
  <li>
    Mes projets
    <ul>
      <li>projet 1</li>
    </ul>
  </li>
</ul>
<?php } ?>
