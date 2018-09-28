<?php

function getProjects() {
    $db = getData();
    $req = $db->query('SELECT project.id, project.name, COUNT(list.id) AS list_count
                      FROM project 
                      LEFT JOIN list ON (list.project_id = project.id)
                      GROUP BY project.id DESC');
    return $projects = $req->fetchAll();
}
