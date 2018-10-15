
<form method="post">
    <div class="row">
        <label for="list-name">Ajouter une tâche</label>
        <input class="u-full-width" type="text" id="list-name" name="task-name" placeholder="Ma tâche" />
        <input type="hidden" name="list_id" value="<?= $list->id ?>">
        <input class="u-full-width" type="date" value="<?= date("Y-m-d", strtotime('tomorrow')) ?>" id="project-deadline" name="project-deadline-date" />
        <input class="u-full-width" type="time" value="12:00" name="project-deadline-time" />
    </div>
    <button class="button-primary" type="submit" name="add-task">Confirmer</button>
</form>
<i class="icon validate"></i><i class="icon edit"></i><i class="icon trash"></i>
