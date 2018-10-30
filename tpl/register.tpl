<div class="container d-flex" style="min-height:100vh">

  <form method="post" class="col-sm-10 col-md-8 col-lg-6 col-xl-4 m-auto">

    <p class="h2">Inscription</p>

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
      <label for="pseudo">Pseudo</label>
      <input type="text" class="form-control" name="pseudo" id="pseudo" placeholder="Votre pseudo" required/>
    </div>

    <div class="form-group">
      <label for="email">Email</label>
      <input type="text" class="form-control" name="email" id="email" placeholder="Votre adresse email" required/>
      <input type="email" class="form-control mt-1" name="email-v" placeholder="Vérification adresse email" required/>
    </div>

    <div class="form-group">
      <label for="password">Mot de passe</label>
      <input type="password" class="form-control" name="password" id="password" placeholder="Votre mot de passe" required/>
      <input type="password" class="form-control mt-1"name="password-v" placeholder="Vérification mot de passe" required/>
    </div>

    <button type="submit" class="btn btn-primary" name="submit">Confirmer</button>
    <a class="button" href="<?= BASE_URL?>login">J'ai déjà un compte.</a>

  </form>

</div>
