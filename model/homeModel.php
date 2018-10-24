<?php
function createProject($name, $desc, $dl, $user_id, $category) {
    $db = getData();
    $req = $db->prepare('INSERT INTO project (name, description, deadline, user_id, category) VALUES (:name, :desc, :deadline, :user_id, :category)');
    $req->bindValue(':name', $name, PDO::PARAM_STR);
    $req->bindValue(':desc', $desc, PDO::PARAM_STR);
    $req->bindValue(':deadline', $dl, PDO::PARAM_STR);
    $req->bindValue(':user_id', $user_id, PDO::PARAM_INT);
    $req->bindValue(':category', $category, PDO::PARAM_STR);
    $req->execute();
}

function getProjects() {
    $db = getData();
    $req = $db->prepare('SELECT project.id, project.name, COUNT(list.id) AS list_count
                      FROM project
                      LEFT JOIN list ON (list.project_id = project.id)
                      WHERE user_id = :session_id
                      GROUP BY project.id DESC');
    $req->bindValue(':session_id', $_SESSION['id'], PDO::PARAM_INT);
    $req->execute();
    return $rep = $req->fetchAll();
}
