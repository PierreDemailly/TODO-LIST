<!doctype html>
<html class="no-js" lang="fr" dir="ltr">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Todolist: <?= $title ?></title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="manifest" href="<?= BASE_URL ?>site.webmanifest">
  <link rel="apple-touch-icon" href="<?= BASE_URL ?>favicon.png">
  <link rel="shortcut icon" type="image/png" href="<?= BASE_URL ?>favicon.png"/>

  <link rel="stylesheet" href="<?= BASE_URL ?>css/main.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Roboto+Mono" rel="stylesheet">
</head>

<body>
  <!--[if lte IE 9]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->

  <?php
  if($_HAS_NAVBAR):
  ?>

  <nav class="navbar navbar-expand-lg navbar-light bg-light">

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNavDropdown">

      <ul class="navbar-nav">

        <li class="nav-item">
          <a class="nav-link" href="<?= BASE_URL ?>home/">Accueil</a>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Projets en cours
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">

            <?php
            if(!empty($navbar_projects)):
              foreach($navbar_projects as $navbar_project):
            ?>

            <a class="dropdown-item" href="<?= BASE_URL ?>project/<?= $navbar_project->id ?>"><?= htmlspecialchars($navbar_project->name) ?></a>

            <?php
              endforeach;
            else:
            ?>

            <a class="dropdown-item">Aucuns projets en cours</a>

            <?php
            endif;
            ?>

          </div>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

          <?= getUsername() ?>

          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="<?= BASE_URL ?>me">Mon profil</a>
            <a class="dropdown-item" href="<?= BASE_URL ?>logout">Déconnexion</a>
          </div>
        </li>

      </ul>

    </div>

  </nav>

  <?php
  endif;
  ?>
