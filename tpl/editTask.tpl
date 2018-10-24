<h1>Modifier une tâche</h1>
<form method="post">
<?php if(isset($errors)) {
                foreach($errors as $error) { ?>
            <p class="error"><?= $error ?></p>
            <?php }
            } ?>
  <input type="hidden" name="task-id" value="<?= $task->id ?>">
  <label>Nom:</label>
  <input type="text" name="task-name" value="<?= $task->task_name ?>">
  <label>Deadline:</label>
  <input type="date" name="task-date" value="<?= $deadline[0] ?>">
  <input type="time" name="task-time" value="<?= $deadline[1] ?>">
  <label>Liste:</label>
  <select name="task-list">
    <?php foreach($lists as $list) { ?>
      <option value="<?= $list->id ?>" <?php if($list->name === $task->list_name) { ?>selected="selected"<?php }?>><?= $list->name ?></option>
    <?php } ?>
  </select>
  <button type="submit" name="task-edit">Confimer</button>
</form>
<p><a href="<?= BASE_URL ?>list/<?= $task->list_id ?>#<?= $task->id ?>">Retour</a></p>
