<div class="container">
    <h2>Liste des projets supprimés</h2>
    <p><a href="<?= BASE_URL ?>home/">Voir les projets en cours</a></p>
    <div class="row">
<?php foreach($projects as $project): ?>
<div class="three columns box clickable" data-id="<?= $project->id ?>" id="project-box">
    <div class="title"><?= $project->name ?></div>
    <div class="row task center big m-top"><?= $project->list_count ?></div>
    <?php if($project->list_count > 1) { ?>
    <div class="row task center imp">listes</div>
    <?php } else { ?>
    <div class="row task center imp">liste</div>
    <?php } ?>
    </div>
<?php endforeach; ?>
    </div>
</div>
