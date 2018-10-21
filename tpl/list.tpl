<div class="container">
  <h2><?= $list->name ?></h2>
  <div class="six columns list-box">
  <form method="post">
  <?php if(isset($errors)) {
    foreach($errors as $err) { ?>
        <p class="error"><?= $err ?></p>
    <?php }
} ?>
      <label for="list-name">Ajouter une tâche</label>
      <input class="u-full-width" type="text" id="list-name" name="task-name" placeholder="Ma tâche" />
      <input type="hidden" name="list_id" value="<?= $list->id ?>">
      <input class="u-full-width" type="date" value="<?= date("Y-m-d", strtotime('tomorrow')) ?>" id="task-deadline" name="task-deadline-date" />
      <input class="u-full-width" type="time" value="12:00" name="task-deadline-time" />
      <button class="button-primary" type="submit" name="add-task">Confirmer</button>
    </form>
    <?php if(count($tasks > 0)) { ?>
      <ul>
    <?php foreach($tasks as $task) { ?>

      <li <?php if($task->done == 1){ ?>class="done"<?php } ?> id="<?= $task->id ?>"><?= $task->name ?>

       <form method="post" action="#<?= $task->id ?>" class="inline-form">
         <input type="hidden" name="task-id" value="<?= $task->id?>">
         <?php if($task->done == 1) { ?>
          <button type="submit" name="task-clear" class="nobtn"><i class="icon clear"></i></button>
          <?php } else { ?>
            <button type="submit" name="task-done" class="nobtn"><i class="icon validate"></i></button>
         <?php } ?>
        </form>
        <i class="icon edit"></i>
        <a href="<?= BASE_URL ?>deleteTask/<?= $task->id ?>"><i class="icon trash"></i></a>
    <p >Deadline: <span><?= $task->deadline ?></span></p>
    </li>
    <?php } ?>
    </ul>
    <?php } ?>
  </div>
</div>
