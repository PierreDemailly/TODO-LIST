<?php
function getList($list_id)
{
  $db = getData();
  $req = $db->query("SELECT id, name FROM list WHERE id = '$list_id'");
  $rep = $req->fetch();
  return $rep;
}

function getTasks($list_id)
{
  $db = getData();
  $req = $db->query("SELECT id, name, DATE_FORMAT(deadline, '%m/%d/%Y %H:%i') as deadline, done FROM task WHERE list_id = '$list_id'");
  return $rep = $req->fetchAll();
}

function createTask($task_name, $list_id, $deadline)
{
  $db = getData();
  $req = $db->prepare('INSERT INTO task (name, list_id, deadline) VALUES (:name, :list_id, :deadline)');
  $req->execute([
    ':name' => $task_name,
    ':list_id' => $list_id,
    ':deadline' => $deadline
  ]);
}

function existId($list_id)
{
  $db = getData();
  $req = $db->query("SELECT id FROM list WHERE id = '$list_id'");
  $rep = $req->rowCount();
  if ($rep > 0)
    return true;
  else
    return false;
}

function validate($id)
{
  if (empty($id) || !ctype_digit($id) || !existId($id))
    return false;
  return true;
}

function taskDone($task_id) {
  $db = getData();
  $req = $db->prepare('UPDATE task SET done = 1 WHERE id = :id');
  $req->execute([
    'id' => $task_id
  ]);
}
