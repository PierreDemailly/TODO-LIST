<?php

function existId($task_id)
{
  $db = getData();
  $req = $db->prepare('SELECT id FROM task WHERE id = :task_id');
  $req->bindValue(':task_id', $task_id, PDO::PARAM_INT);
  $req->execute();
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
  $req = $db->prepare('SELECT task.id as id, task.name as task_name, deadline, list_id, list.name as list_name, list.project_id as project_id FROM task INNER JOIN list ON list.id = task.list_id WHERE task.id = :id');
  $req->bindValue(':id', $id, PDO::PARAM_INT);
  $req->execute();
  return $rep = $req->fetch();
}

function getLists($project_id) {
  $db = getData();
  $req = $db->prepare('SELECT id, name FROM list WHERE project_id = :project_id');
  $req->bindValue(':project_id', $project_id, PDO::PARAM_INT);
  $req->execute();
  return $rep = $req->fetchAll();
}

function editTask($id, $name, $date, $list_id) {
  $db = getData();
  $req = $db->prepare('UPDATE task SET name = :name, deadline = :deadline, list_id = :list_id WHERE id = :id');
  $req->bindValue(':name', $name, PDO::PARAM_STR);
  $req->bindValue(':deadline', $date, PDO::PARAM_STR);
  $req->bindValue(':list_id', $list_id, PDO::PARAM_INT);
  $req->bindValue(':id', $id, PDO::PARAM_INT);
  $req->execute();
}
