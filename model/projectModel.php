<?php
function getProject($project_id)
{
  $db = getData();
  $req = $db->query("SELECT name, description, deadline FROM project WHERE id = '$project_id'");
  $rep = $req->fetch();
  return $rep;
}

function getLists($project_id)
{
  $db = getData();
  $req = $db->query("SELECT list.id as id, list.name as name, GROUP_CONCAT(task.name) as task_name FROM list LEFT JOIN task ON task.list_id = list.id WHERE project_id = '$project_id' GROUP BY list.id");
  $rep = $req->fetchAll();
  return $rep;
}

function existId($project_id)
{
  $db = getData();
  $req = $db->query("SELECT id FROM project WHERE id = '$project_id'");
  $rep = $req->rowCount();
  if ($rep > 0)
    return true;
  else
    return false;
}

function createList($list_name, $project_id)
{
  $db = getData();
  $req = $db->prepare('INSERT INTO list (name, project_id) VALUES (:name, :project_id)');
  $req->execute([
    ':name' => $list_name,
    ':project_id' => $project_id
  ]);
}

function createTask($task_name, $list_id)
{
  $db = getData();
  $req = $db->prepare('INSERT INTO task (name, list_id) VALUES (:name, :list_id)');
  $req->execute([
    ':name' => $task_name,
    ':list_id' => $list_id
  ]);
}
