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

function getTask($id) {
  $db = getData();
  $req = $db->prepare('SELECT id, name, list_id FROM task WHERE id = :id');
  $req->bindValue(':id', $id, PDO::PARAM_INT);
  $req->execute();
  return $rep = $req->fetch();
}

function deleteTask($id) {
  $db = getData();
  $req = $db->prepare('DELETE FROM task WHERE id = :id');
  $req->bindValue(':id', $id, PDO::PARAM_INT);
  $req->execute();
}
