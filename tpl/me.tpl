<div class="container d-flex" style="min-height:calc(100vh - 56px)">

  <form method="post" class="col-sm-10 col-md-8 col-lg-6 col-xl-4 m-auto">

    <p class="h2">Mon profil</p>

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
      <input type="text" class="form-control" name="user-pseudo" id="pseudo" value="<?= $user->pseudo ?>">
    </div>

    <div class="form-group">
      <label for="email">Email</label>
      <input type="email" class="form-control" name="user-email" id="pseudo" value="<?= $user->email ?>">
    </div>

    <div class="form-group">
      <label>Mot de passe</label>
      <p>
        Pour des raisons de sécurité, il n'est pas possible de visualiser votre mot de passe.
        Si vous voulez changer votre mot de passe, rendez-vous <a href="">sur cette page</a>
      </p>
    </div>

    <button type="submit" class="btn btn-primary" name="submit">Sauvegarder mes informations TODO:JQUERY POUR QUE CE SOIT DISABLE SAUF SI IL MODIFIE UN CHAMP</button>

  </form>

</div>
