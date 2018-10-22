<?php

function existId($task_id)
{
  $db = getData();
  $req = $db->query("SELECT id FROM task WHERE id = '$task_id'");
  $rep = $req->rowCount();
  if ($rep > 0) {
    return true;
  } else {
    return false;
  }

}

function validate($id)
{
  if (empty($id) || !ctype_digit($id) || !existId($id)) {
    return false;
  }

  return true;
}

function getTask($id)
{
  $db = getData();
  $req = $db->query("SELECT task.id as id, task.name as task_name, deadline, list_id, list.name as list_name, list.project_id as project_id FROM task INNER JOIN list ON list.id = task.list_id WHERE task.id = $id");
  return $rep = $req->fetch();
}

function getLists($project_id) {
  $db = getData();
  $req = $db->query("SELECT id, name FROM list WHERE project_id = $project_id");
  return $rep = $req->fetchAll();
}

function editTask($id, $name, $date, $list) {
  $db = getData();
  $req = $db->prepare('UPDATE task SET name = :name, deadline = :deadline, list_id = :list WHERE id = :id');
  $req->execute([
    'name' => $name,
    'deadline' => $date,
    'list' => $list,
    'id' => $id
  ]);
}
