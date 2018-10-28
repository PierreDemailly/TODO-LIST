<div class="container">

  <div class="jumbotron my-2 py-2 rounded-0">
    <h1><?= htmlspecialchars($project->name) ?></h1>
    <p class="lead"><?= htmlspecialchars($project->description) ?></p>

    <hr>

    <form method="post">
      <input type="hidden" name="project-id" value="<?= $_GET['id'] ?>">
      <button type="submit" class="btn btn-danger" name="delete-project" aria-describedby="deleteHelp">Supprimer le projet</button>
      <small id="deleteHelp" class="form-text text-muted">Si vous supprimez votre projet, il sera toujours disponible dans <a href="<?= BASE_URL ?>binProject/">la corbeille</a>.</small>
    </form>

  </div>

  <h2>Listes:</h2>
  <a class="btn btn-info mb-2" href="#new-list">Nouvelle liste</a>

  <?php
  if (count($lists) > 0): // TODO MOVE IT IN THE CONTROLLER !
    foreach ($lists as $list):
      $tasks_name = explode('!dM_mc5d??d,c', $list->task_name);
      $tasks_done = explode('!dM_mc5d??d,c', $list->task_done);
      $width = (count(array_keys($tasks_done, 1)) / count($tasks_name)) * 100;
  ?>

  <div class="col-sm-6 col-md-4 col-lg-3 p-0">

    <div class="card">
      <div class="card-header"><?= $list->name ?></div>

      <div class="progress mx-2 my-1 rounded-0">
        <div class="progress-bar" role="progressbar" style="width: <?= $width ?>%" aria-valuenow="<?= $width ?>" aria-valuemin="0" aria-valuemax="100">
          progression: <?= $width ?>%
        </div>
      </div>

      <?php if(!empty($tasks_name[0])): ?>

      <ul class="list-group list-group-flush px-1 mb-1">

        <?php
        foreach($tasks_name as $key => $task_name):
          $class = ($tasks_done[$key] == 1) ? 'list-group-item-success' : 'list-group-item-warning';
        ?>

        <li class="list-group-item border-0 rounded-0 py-1 <?= $class ?>"><?= htmlspecialchars($task_name) ?></li>

        <?php endforeach; ?>

      </ul>

      <?php endif; ?>

      <a href="<?= BASE_URL ?>list/<?= $list->id ?>" class="card-link ml-1">Voir la liste</a>
    </div>

  </div>

  <?php
    endforeach;
  endif;
  ?>

  <form method="post" class="col-md-6 col-lg-4 p-0 mt-5" id="new-list">

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

    <p class="h2">Nouvelle liste</p>

    <div class="form-group">
        <label for="name">Nom de la liste</label>
        <input type="text" class="form-control" name="name" id="name" placeholder="My list" required/>
    </div>

    <button type="submit" class="btn btn-primary" name="add-list">Confirmer</button>

  </form>

</div>
