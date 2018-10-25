<?php
require 'model/meModel.php';

if(isset($_POST['user-edit'])) {
  $pseudo = $_POST['user-pseudo'];
  $email = strtolower($_POST['user-email']);
  $pseudo_count = countPseudo($pseudo);
  $email_count = countEmail($email);
  $errors = [];

  $errors[] = (empty($pseudo)
              OR empty($email)) ? "Veuillez remplir tous les champs." : NULL;

  $errors[] = (strlen($pseudo) < 4) ? "Votre pseudo est trop court." : NULL;
  $errors[] = (strlen($pseudo > 26)) ? "Votre pseudo est trop long." : NULL;
  $errors[] = ($pseudo_count > 1) ? "Ce pseudo est déjà utilisé." : NULL;

  $errors[] = (!filter_var($email, FILTER_VALIDATE_EMAIL)) ? "Veuillez entrer une email valide." : NULL;
  $errors[] = ($email_count > 1) ? "Cette email est déjà utilisée." : NULL;

  $errors = getErrors($errors);

  if(empty($errors))
    editUser($email, $pseudo);
}

$user = getUser();

$title = $user->pseudo . ' - mon profil';

require 'tpl/header.tpl';
require 'tpl/me.tpl';
require 'tpl/footer.tpl';
