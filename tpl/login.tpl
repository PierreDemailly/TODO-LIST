<div class="container d-flex" style="min-height:100vh">

  <form method="post" class="col-sm-10 col-md-8 col-lg-6 col-xl-4 m-auto">

    <p class="h2">Connexion</p>

    <?php
    if (isset($errors)):
      foreach ($errors as $error):
    ?>

    <div class="alert alert-warning alert-dismissible fade show" role="alert">
      <?= $error ?>
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>

    <?php
      endforeach;
    endif;
    ?>

    <div class="form-group">
      <label for="email">Adresse email</label>
      <input type="email" class="form-control" name="email" id="email" placeholder="Adresse email" required>
    </div>

    <div class="form-group">
      <label for="password">Mot de passe</label>
      <input type="password" class="form-control" name="password" id="passwrd" placeholder="Mot de passe" required>
    </div>

    <div class="form-group form-check">
      <input type="checkbox" class="form-check-input" name="stay-auth" id="stay-auth">
      <label class="form-check-label" for="stay-auth">Rester connecté</label>
    </div>

    <button type="submit" class="btn btn-primary align-bottom" name="submit">Se connecter</button>
    <a href="<?= BASE_URL ?>register/">Je n'ai pas encore de compte.</a>

  </form>

</div>
