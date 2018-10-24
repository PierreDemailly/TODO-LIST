<div class="container">
  <h2><?= $project->name ?></h2>
  <p><?= $project->description ?></p>
  <form method="post" id="add-form">
    <div class="row">
    <?php if(isset($errors)) {
                foreach($errors as $error) { ?>
            <p class="error"><?= $error ?></p>
            <?php }
            } ?>
        <div class="four columns">
            <label for="list-name">Nom de la liste</label>
            <input class="u-full-width" type="text" id="list-name" name="list-name" placeholder="My list" />
        </div>
    </div>
    <button class="button-primary" type="submit" name="add-list">Confirmer</button>
    <button class="button" type="button" id="form-cancel">Annuler</button>
</form>
<form method="post">
    <input type="hidden" name="project-id" value="<?= $_GET['id'] ?>">
<button type="submit" name="delete-project" class="bouton btn-delete mb0">Supprimer le projet</button>
<p>Si vous supprimez votre projet, il sera toujours disponible dans <a href="<?= BASE_URL ?>binProject/">la corbeille</a>.</p>
        </form>
  <h3>Listes:</h3>
<button class="button-primary" id="form-add">Ajouter une liste</button>
  <?php if (count($lists) > 0) { // TODO MOVE IT IN THE CONTROLLER !
        foreach ($lists as $list) {
        $tasks_name = explode(',', $list->task_name);
        $tasks_done = explode(',', $list->task_done);
        $width = (count(array_keys($tasks_done, 1)) / count($tasks_name)) * 100;
            ?>
    <div>
    <div class="four columns list-box">
        <progress value="<?= $width ?>" max="100"></progress>
    <p class="title clickable" data-id="<?= $list->id ?>" id="list-box"><?= $list->name ?></p>

    <?php
    if(!empty($tasks_name[0])) { ?>
    <ul>
    <?php foreach($tasks_name as $key => $task_name) { ?>
    <li  <?php if($tasks_done[$key] == 1){ ?>class="done"<?php } ?>><?= $task_name ?></li>
        <?php } ?>
    </ul>
    <?php } ?>
    <form method="post">
        <input type="hidden" name="list-id" value="<?= $list->id ?>">
        <button type="submit" name="delete-list" class="bouton btn-delete mb0">Supprimer la liste</button>
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
