<div class="container">

  <h1>Liste des projets supprimés</h1>
  <p><a href="<?= BASE_URL ?>home/">Voir les projets en cours</a></p>

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

</div>
