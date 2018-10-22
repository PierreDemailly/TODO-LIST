<?php
function createProject($name, $desc, $dl, $user_id) {
    $db = getData();
    $req = $db->prepare('INSERT INTO project (name, description, deadline, user_id) VALUES (:name, :desc, :deadline, :user_id)');
    $req->execute([
        'name' => $name,
        'desc' => $desc,
        'deadline' => $dl,
        'user_id' => $user_id
    ]);
}

function getProjects() {
    $db = getData();
    $req = $db->query("SELECT project.id, project.name, COUNT(list.id) AS list_count
                      FROM project
                      LEFT JOIN list ON (list.project_id = project.id)
                      WHERE user_id = $_SESSION[id]
                      GROUP BY project.id DESC");
    return $projects = $req->fetchAll();
}
