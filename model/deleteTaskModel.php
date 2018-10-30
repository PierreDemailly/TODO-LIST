<?php

function existTaskId()
{
  $db = getData();
  $req = $db->prepare('SELECT id FROM task WHERE id = :task_id');
  $req->bindValue(':task_id', $_GET['id'], PDO::PARAM_INT);
  $req->execute();
  $rep = $req->rowCount();
  if ($rep > 0)
    return true;

  return false;
}

function validateGetId()
{
  if (empty($_GET['id']) || !ctype_digit($_GET['id']) || !existTaskId())
    return false;

  return true;
}

function getTask() {
  $db = getData();
  $req = $db->prepare('SELECT id, name, list_id FROM task WHERE id = :id');
  $req->bindValue(':id', $_GET['id'], PDO::PARAM_INT);
  $req->execute();
  return $rep = $req->fetch();
}

function deleteTask($id) {
  $db = getData();
  $req = $db->prepare('DELETE FROM task WHERE id = :id');
  $req->bindValue(':id', $id, PDO::PARAM_INT);
  $req->execute();
}
