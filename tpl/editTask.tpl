<div class="container d-flex" style="min-height:calc(100vh - 56px)">

  <form method="post" class="col-sm-10 col-md-8 col-lg-6 col-xl-4 m-auto">

    <p class="h2">Modifier une tâche</p>

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

    <input type="hidden" name="id" value="<?= $task->id ?>">

    <div class="form-group">
      <label>Nom:</label>
      <input type="text" class="form-control" name="name" value="<?= htmlspecialchars($task->task_name) ?>">
    </div>

    <div class="form-group">
      <label>Deadline:</label>
      <input type="date" class="form-control" name="date" value="<?= $deadline[0] ?>">
      <input type="time" class="form-control mt-1" name="time" value="<?= $deadline[1] ?>">
    </div>

    <div class="form-group">
      <label>Liste:</label>
      <select name="task-list" class="form-control">

        <?php foreach($lists as $list) { ?>

          <option value="<?= $list->id ?>" <?php if($list->name === $task->list_name) { ?>selected="selected"<?php }?>><?= htmlspecialchars($list->name) ?></option>

        <?php } ?>

      </select>
    </div>

    <button type="submit" class="btn btn-primary" name="edit">Confimer</button>
    <a href="<?= BASE_URL ?>list/<?= $task->list_id ?>#<?= $task->id ?>">Retour</a>

  </form>

</div>
