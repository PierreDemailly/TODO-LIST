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
        $tasks = explode(',', $list->task_name);
            ?>
    <div>
    <div class="four columns list-box">
    <p class="title"><?= $list->name ?></p>

    <?php
    if(!empty($tasks)) { ?>
    <ul>
    <?php foreach($tasks as $task) { ?>
    <li><?= $task ?></li>
        <?php } ?>
    </ul>
    <?php } ?>
    <form method="post">
    <div class="row">
        <label for="list-name">Ajouter une tâche</label>
        <input class="u-full-width" type="text" id="list-name" name="task-name" placeholder="Ma tâche" />
        <input type="hidden" name="list_id" value="<?= $list->id ?>">
    </div>
    <button class="button-primary" type="submit" name="add-task">Confirmer</button>
</form>
</div>
    </div>
    <?php
}
} else { ?>
  <p>Il n'y a pas encore de liste</p>
  <?php
} ?>
</div>
