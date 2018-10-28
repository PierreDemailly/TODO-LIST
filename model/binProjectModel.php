<?php
function getProjects() {
    $db = getData();
    $req = $db->prepare('SELECT project.id, project.name, description, COUNT(list.id) AS list_count
                      FROM project
                      LEFT JOIN list ON (list.project_id = project.id)
                      WHERE user_id = :session_id AND deleted = 1
                      GROUP BY project.id DESC');
    $req->bindValue(':session_id', $_SESSION['id'], PDO::PARAM_INT);
    $req->execute();
    return $rep = $req->fetchAll();
}
