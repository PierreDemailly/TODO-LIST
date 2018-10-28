<div class="container">

  <h1><?= htmlspecialchars($list->name) ?></h1>
  <a class="btn btn-info" href="#new-task">Nouvelle tâche</a>

  <div class="row mt-2 p-3">

    <?php if(count($tasks > 0)): ?>

    <div class="card col-md-5 p-0">

      <div class="card-header">Tâches en cours</div>

      <ul class="list-group list-group-flush">

        <?php
        foreach($tasks as $task):
          if($task->done == 1):
        ?>

        <li class="list-group-item border-0 rounded-0  list-group-item-warning mt-1">
          <div class="row">
            <div class="col-6">
              - <?= $task->name ?>
            </div>
            <div class="col-6">
              <form method="post">

                <input type="hidden" name="task-id" value="<?= $task->id?>">

                <?php if($task->done == 1): ?>

                <button type="submit" class="nobtn" name="task-clear"><i class="icon clear"></i></button>

                <?php else: ?>

                <button type="submit" class="nobtn"name="task-done"><i class="icon validate"></i></button>

                <?php endif; ?>

                <a href="<?= BASE_URL ?>editTask/<?= $task->id ?>"><i class="icon edit"></i></a>
                <a href="<?= BASE_URL ?>deleteTask/<?= $task->id ?>"><i class="icon trash"></i></a>

              </form>
            </div>
          </div>

          <div>Deadline: <span><?= $task->deadline ?></span></div>
        </li>

      <?php
        endif;
      endforeach;
      ?>

      </ul>

    </div>

    <?php endif; ?>

    <?php if(count($tasks > 0)): ?>

    <div class="card col-md-5 p-0 mt-3 mt-md-0 ml-md-3">

      <div class="card-header">Tâches terminées</div>

      <ul class="list-group list-group-flush">

        <?php
        foreach($tasks as $task):
          if($task->done == 0):
        ?>

        <li class="list-group-item border-0 rounded-0  list-group-item-success mt-1">
          <div class="row">
            <div class="col-6">
              - <?= $task->name ?>
            </div>
            <div class="col-6">
              <form method="post">

                <input type="hidden" name="task-id" value="<?= $task->id?>">

                <?php if($task->done == 1): ?>

                <button type="submit" class="nobtn" name="task-clear"><i class="icon clear"></i></button>

                <?php else: ?>

                <button type="submit" class="nobtn" name="task-done"><i class="icon validate"></i></button>

                <?php endif; ?>

                <a href="<?= BASE_URL ?>editTask/<?= $task->id ?>"><i class="icon edit"></i></a>
                <a href="<?= BASE_URL ?>deleteTask/<?= $task->id ?>"><i class="icon trash"></i></a>

              </form>
            </div>
          </div>

          <div>Deadline: <span><?= $task->deadline ?></span></div>
        </li>

      <?php
        endif;
      endforeach;
      ?>

      </ul>

    </div>

    <?php endif; ?>

  </div>
  <form method="post" class="col-md-6 p-0 mt-5" id="new-task">

    <p class="h2">Nouvelle tâche</p>

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

    <input type="hidden" name="id" value="<?= $list->id ?>">

    <div class="form-group">
      <label for="name">Nom de la tâche</label>
      <input type="text" class="form-control" name="name" id="name" placeholder="My task" required/>
    </div>
    <div class="form-group">

      <label for="deadline">Date limite de la tâche</label>
      <input type="date" class="form-control" name="task-deadline-date" id="deadline" value="<?= date("Y-m-d", strtotime('tomorrow')) ?>" required/>
      <input type="time" class="form-control mt-1" name="task-deadline-time" value="12:00"  required/>
    </div>

    <button type="submit" class="btn btn-primary" name="add-task">Confirmer</button>

  </form>

</div>
