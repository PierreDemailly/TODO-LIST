<div class="container">
  <h2><?= $project->name ?></h2>
  <p><?= $project->description ?></p>
  <form method="post" id="add-form">
    <div class="row">
        <div class="four columns">
            <label for="list-name">Nom de la liste</label>
            <input class="u-full-width" type="text" id="list-name" name="list-name" placeholder="My list" />
        </div>
    </div>
    <button class="button-primary" type="submit" name="add-list">Confirmer</button>
    <button class="button" type="button" id="form-cancel">Annuler</button>
</form>

<button class="button-primary m-top" id="form-add">Ajouter une liste</button>
  <h3>Listes:</h3>
  <?php if(count($lists) > 0) {
    foreach($lists as $list) { ?>
    <p><?= $list->name ?></p>
    <?php }
   } else {  ?>
  <p>Il n'y a pas encore de liste</p>
  <?php } ?>
</div>
