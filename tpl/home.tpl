<div class="container">
    <h2>Liste des projets en cours</h2>
    <p><a href="<?= BASE_URL ?>binProject/">Voir les projets supprimés</a></p>
<form method="post" id="add-form">
    <div class="row">
        <div class="four columns">
            <label for="project-name">Nom du projet</label>
            <input class="u-full-width" type="text" id="project-name" name="project-name" placeholder="My project" required/>
        </div>
        <div class="four columns">
            <label for="project-desc">Description du project</label>
            <input class="u-full-width" type="text" id="project-desc" name="project-desc" placeholder="A short description about your project" required/>
        </div>
        <div class="four columns">
            <label for="project-deadline">Date limite du projet</label>
            <input class="u-full-width" type="date" id="project-deadline" name="project-deadline-date" required/>
            <input class="u-full-width" type="time" name="project-deadline-time" required/>
        </div>
        <div class="four columns">
            <label for="project-category">Catégory du projet</label>
            <select name="project-category" id="project-category">
                <option value="html">HTML CSS</option>
                <option value="js">Javascript</option>
                <option value="php">PHP</option>
                <option value="others">Autres</option>
            </select>
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
    <div class="title"><?= htmlspecialchars($project->name) ?></div>
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
