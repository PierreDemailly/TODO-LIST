<?php
function createProject($name, $desc, $dl) {
    $db = getData();
    $req = $db->prepare('INSERT INTO project (name, description, deadline) VALUES (:name, :desc, :deadline)');
    $req->execute([
        'name' => $name,
        'desc' => $desc,
        'deadline' => $dl
    ]);
}

function getProjects() {
    $db = getData();
    $req = $db->query('SELECT project.id, project.name, COUNT(list.id) AS list_count
                      FROM project
                      LEFT JOIN list ON (list.project_id = project.id)
                      GROUP BY project.id DESC');
    return $projects = $req->fetchAll();
}
