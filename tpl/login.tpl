<div class="container">
    <div class="row center">
        <form method="post" class="four columns m-auto">
            <p class="heading">Connexion</p>
            <?php if(isset($errors)) {
                foreach($errors as $error) { ?>
            <p class="error"><?= $error ?></p>
            <?php } 
            } ?>
            <div class="row">
            <label for="email">Email</label>
            <input type="text" name="email" id="email" placeholder="Votre adresse email" />
            </div>
            <div class="row">
            <label for="password">Mot de passe</label>
            <input type="password" name="password" id="password" placeholder="Votre mot de passe" />
            </div>
            <button class="button-primary" type="submit" name="submit">Confirmer</button>
        </form>
    </div>
    <hr>
    <div class="row center">
        <a class="button" href="./register">Ou inscris toi, c'est gratuit.</a>
    </div>
</div>