<h1>Mon profil</h1>
<form method="post">
<?php if(isset($errors)) {
                foreach($errors as $error) { ?>
            <p class="error"><?= $error ?></p>
            <?php }
            } ?>
  <label>Pseudo:</label>
  <input type="text" name="user-pseudo" value="<?= $user->pseudo ?>">
  <label>Email:</label>
  <input type="email" name="user-email" value="<?= $user->email ?>">
  <label>Mot de passe:</label>
  <p>Pour des raisons de sécurité, il n'est pas possible de visualiser votre mot de passe.
    Si vous voulez changer votre mot de passe, rendez-vous <a href="">sur cette page</a>
  </p>
  <button type="submit" name="user-edit">Sauvegarder mes informations TODO:JQUERY POUR QUE CE SOIT DISABLE SAUF SI IL MODIFIE UN CHAMP</button>
</form>
