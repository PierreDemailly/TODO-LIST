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

  <h3>Listes:</h3>
<button class="button-primary" id="form-add">Ajouter une liste</button>
  <?php if (count($lists) > 0) {
        foreach ($lists as $list) {
        $tasks_name = explode(',', $list->task_name);
            ?>
    <div>
    <div class="four columns list-box clickable" data-id="<?= $list->id ?>">
    <p class="title"><?= $list->name ?></p>

    <?php
    if(!empty($tasks_name)) { ?>
    <ul>
    <?php foreach($tasks_name as $task_name) { ?>
    <li><?= $task_name ?></li>
        <?php } ?>
    </ul>
    <?php } ?>

</div>
    </div>
    <?php
}
} else { ?>
  <p>Il n'y a pas encore de liste</p>
  <?php
} ?>
</div>
