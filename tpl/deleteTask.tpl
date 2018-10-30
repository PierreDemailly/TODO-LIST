<div class="container d-flex" style="min-height:calc(100vh - 56px)">

<form method="post" class="col-sm-10 col-md-8 col-lg-6 col-xl-4 m-auto">

  <p class="h2">Supprimer une tâche</p>
  <p class="alert alert-danger">Vous êtes sur le point de supprimer la tâche <span class="font-weight-bold"><?= htmlspecialchars($task->name) ?></span></p>

  <input type="hidden" name="task-id" value="<?= $task->id ?>">

  <button type="submit" class="btn btn-danger" name="task-delete">Confimer</button>
  <a href="<?= BASE_URL ?>list/<?= $task->list_id ?>#<?= $task->id ?>">Annuler</a>

</form>
