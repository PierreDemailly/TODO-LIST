<?php
function getProject($project_id)
{
    $db = getData();
    $req = $db->query("SELECT name, description, deadline FROM project WHERE id = '$project_id'");
    $req = $db->prepare('SELECT name, description, deadline FROM project WHERE id = :project_id');
    $req->bindValue(':project_id', $project_id, PDO::PARAM_INT);
    $req->execute();
    return $rep = $req->fetch();
}

function getLists($project_id)
{
    $db = getData();
    $req = $db->prepare('SELECT list.id as id, list.name as name, GROUP_CONCAT(task.name ORDER BY task.deadline) as task_name, GROUP_CONCAT(task.done ORDER BY task.deadline) as task_done FROM list LEFT JOIN task ON task.list_id = list.id WHERE project_id = :project_id GROUP BY list.id');
    $req->bindValue(':project_id', $project_id, PDO::PARAM_INT);
    $req->execute();
    return $rep = $req->fetchAll();
}

function deleteList($list_id)
{
  $db = getData();
  $req = $db->prepare('DELETE FROM list WHERE id = :id');
  $req->bindValue(':id', $list_id, PDO::PARAM_INT);
  $req->execute();
}

function existId($project_id)
{
    $db = getData();
    $req = $db->prepare('SELECT id FROM project WHERE id = :project_id');
    $req->bindValue(':project_id', $project_id, PDO::PARAM_INT);
    $req->execute();
    $rep = $req->rowCount();
    if ($rep > 0) {
        return true;
    } else {
        return false;
    }
}

function createList($list_name, $project_id)
{
    $db = getData();
    $req = $db->prepare('INSERT INTO list (name, project_id) VALUES (:name, :project_id)');
    $req->bindValue(':name', $list_name, PDO::PARAM_STR);
    $req->bindValue(':project_id', $project_id, PDO::PARAM_STR);
    $req->execute();
}

function validate($id)
{
    if (empty($id) || !ctype_digit($id) || !existId($id)) {
        return false;
    }

    return true;
}
