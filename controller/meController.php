<?php
require 'model/meModel.php';

if(isset($_POST['user-edit'])) {
  $pseudo = $_POST['user-pseudo'];
  $email = $_POST['user-email'];

  // FAIRE LES VERIFS LA JAI LA FLEMME

  editUser($email, $pseudo);
}

$user = getUser();

require 'tpl/header.tpl';
require 'tpl/me.tpl';
require 'tpl/footer.tpl';
