<!doctype html>
<html class="no-js" lang="">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Todolist: <?= $title ?></title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="manifest" href="<?= BASE_URL ?>site.webmanifest">
  <link rel="apple-touch-icon" href="<?= BASE_URL ?>favicon.png">
  <link rel="shortcut icon" type="image/png" href="<?= BASE_URL ?>favicon.png"/>

  <link rel="stylesheet" href="<?= BASE_URL ?>css/normalize.css">
  <link rel="stylesheet" href="<?= BASE_URL ?>css/skeleton.css">
  <link rel="stylesheet" href="<?= BASE_URL ?>css/main.css">

  <link href="https://fonts.googleapis.com/css?family=Roboto+Mono" rel="stylesheet">
</head>

<body>
  <!--[if lte IE 9]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->
<?php if($_HAS_NAVBAR) { ?>
  <ul class="navbar">
  <li><a href="">Accueil</a></li>
  <li>
    <?php if(!empty($navbar_projects)) { ?>
      <a href="<?= BASE_URL ?>home/">Mes projets</a>
      <ul>
        <?php foreach($navbar_projects as $navbar_project) { ?>
          <li><a href="<?= BASE_URL ?>project/<?= $navbar_project->id ?>"><?= htmlspecialchars($navbar_project->name) ?></a>
          <?php
          $np_tasks = getNavbarProjectLists($navbar_project->id);
          if(!empty($np_tasks)) { ?>
          <ul> <?php
            foreach($np_tasks as $np_task) {
            ?>
            <li><a href="<?= BASE_URL ?>list/<?= $np_task->id ?>"><?= htmlspecialchars($np_task->name) ?></a></li>
          <?php } ?>
          </ul>
            <?php } ?>
        </li>
        <?php } ?>
      </ul>
    <?php } else { ?>
      <a href="<?= BASE_URL ?>home/">Mes projets</a>
    <?php } ?>
  </li>
  <li>
    <a href="<?= BASE_URL ?>me"><?= getUsername() ?></a>
    <ul>
      <li> <a href="<?= BASE_URL ?>me">Mon profil</a></li>
      <li> <a href="<?= BASE_URL ?>logout">Déconnexion</a></li>
    </ul>
  </li>
</ul>
<?php } ?>
