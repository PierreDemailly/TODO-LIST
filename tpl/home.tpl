<div class="container">

  <h1>Liste des projets en cours</h1>
  <p>
    <a href="<?= BASE_URL ?>binProject/">Voir les projets supprimés</a><br>
    <a href="#new-project">Nouveau projet</a>
  </p>

  <div class="row">

  <?php foreach($projects as $project): ?>
  
    <div class="col-sm-6 col-md-4 col-lg-2">

      <div class="card">

        <div class="card-header"><?= htmlspecialchars($project->name) ?></div>

        <div class="card-body">
          <p class="card-text"><?= htmlspecialchars($project->description) ?></p>
          <a href="<?= BASE_URL ?>project/<?= $project->id ?>" class="card-link">Voir le projet</a>
        </div>

        <div class="card-footer">
          <?= $project->list_count ?>

          <?php if($project->list_count > 1): ?>

          listes
          <?php else: ?>

          liste
          <?php endif;?>

        </div>

      </div>

    </div>

  <?php endforeach; ?>

  </div>

  <form method="post" class="mt-5">

    <p class="h2">Nouveau projet</p>

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

    <div class="row" id="new-project">

      <div class="col-md-6 col-lg-3">

        <div class="form-group">
          <label for="name">Nom du projet</label>
          <input type="text" class="form-control" name="name" id="name" placeholder="Nom du projet" required>
        </div>

      </div>

      <div class="col-md-6 col-lg-3">

        <div class="form-group">
          <label for="description">Description</label>
          <input type="text" class="form-control" name="description" id="description" placeholder="Description du projet" required>
        </div>

      </div>

      <div class="col-md-6 col-lg-3">

        <div class="form-group">
          <label for="deadline">Date limite du projet</label>
          <input type="date" class="form-control" name="project-deadline-date" id="deadline" required/>
          <input type="time" class="form-control mt-1" name="project-deadline-time" required/>
        </div>

      </div>

      <div class="col-md-6 col-lg-3">

        <div class="form-group">
          <label for="category">Catégory du projet</label>
          <select class="form-control" name="project-category" id="category">
            <option value="html">HTML CSS</option>
            <option value="js">Javascript</option>
            <option value="php">PHP</option>
            <option value="others">Autres</option>
          </select>
        </div>

      </div>

    </div>

    <button type="submit" class="btn btn-primary" name="submit">Confirmer</button>

  </form>

</div>
