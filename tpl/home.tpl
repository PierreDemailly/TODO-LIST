<div class="container">
    <h2>Liste des projets</h2>
<form method="post" id="add-form">
    <div class="row">
        <div class="four columns">
            <label for="project-name">Nom du projet</label>
            <input class="u-full-width" type="text" id="project-name" name="project-name" placeholder="My project" />
        </div>
        <div class="four columns">
            <label for="project-desc">Description du project</label>
            <input class="u-full-width" type="text" id="project-desc" name="project-desc" placeholder="A short description about your project" />
        </div>
        <div class="four columns">
            <label for="project-deadline">Date limite du projet</label>
            <input class="u-full-width" type="date" id="project-deadline" name="project-deadline-date" />
            <input class="u-full-width" type="time" name="project-deadline-time" />
        </div>
    </div>
    <button class="button-primary" type="submit" name="add-project">Confirmer</button>
    <button class="button" type="button" id="form-cancel">Annuler</button>
</form>
<?php if(isset($error)) {
    foreach($error as $err) { ?>
        <p class="error"><?= $err ?></p>
    <?php }
} ?>
<button class="button-primary m-top" id="form-add">Nouveau projet</button>
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
