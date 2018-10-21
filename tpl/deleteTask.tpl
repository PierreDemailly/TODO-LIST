<h1>Supprimer une tâche</h1>
<p>Vous êtes sur le point de supprimer la tâche <?= $task->name ?></p>
<form method="post">
  <input type="hidden" name="task-id" value="<?= $task->id ?>">
  <button type="submit" name="task-delete">Confimer</button>
  <a href="<?= BASE_URL ?>list/<?= $task->list_id ?>#<?= $task->id ?>">Annuler</a>
</form>
