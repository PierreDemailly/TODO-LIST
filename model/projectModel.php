<?php
function getProjectById()
{
    $db = getData();
    $req = $db->prepare('SELECT name, description, deadline FROM project WHERE id = :project_id');
    $req->bindValue(':project_id', $_GET['id'], PDO::PARAM_INT);
    $req->execute();
    return $rep = $req->fetch();
}

function getListsById()
{
    $db = getData();
    /* Group concat take all tasks and concatenate dem in one string */
    $req = $db->prepare('SELECT list.id as id, list.name as name, GROUP_CONCAT(task.name ORDER BY task.deadline SEPARATOR \'!dM_mc5d??d,c\') as task_name, GROUP_CONCAT(task.done ORDER BY task.deadline SEPARATOR \'!dM_mc5d??d,c\') as task_done FROM list LEFT JOIN task ON task.list_id = list.id WHERE project_id = :project_id GROUP BY list.id');
    $req->bindValue(':project_id', $_GET['id'], PDO::PARAM_INT);
    $req->execute();
    return $rep = $req->fetchAll();
}


function existProjectId()
{
    $db = getData();
    $req = $db->prepare('SELECT id FROM project WHERE id = :project_id');
    $req->bindValue(':project_id', $_GET['id'], PDO::PARAM_INT);
    $req->execute();
    $rep = $req->rowCount();
    if ($rep > 0)
        return true;

    return false;
}

function createList($list_name)
{
    $db = getData();
    $req = $db->prepare('INSERT INTO list (name, project_id) VALUES (:name, :project_id)');
    $req->bindValue(':name', $list_name, PDO::PARAM_STR);
    $req->bindValue(':project_id', $_GET['id'], PDO::PARAM_STR);
    $req->execute();
}

function validateGetId()
{
    if (empty($_GET['id']) || !ctype_digit($_GET['id']) || !existProjectId())
        return false;

    return true;
}

function deleteProject($id)
{
    $db = getData();
    $req = $db->prepare('UPDATE project SET deleted = 1 WHERE id = :id');
    $req->bindValue(':id', $id, PDO::PARAM_INT);
    $req->execute();
}
