<?php
function getProject($project_id) {
  $db  = getData();
  $req = $db->query("SELECT name, description, deadline FROM project WHERE id = '$project_id'");
  $rep = $req->fetch();
  return $rep;
}

function getLists($project_id) {
  $db  = getData();
  $req = $db->query("SELECT name FROM list WHERE project_id = '$project_id'");
  $rep = $req->fetchAll();
  return $rep;
}

function existId($project_id) {
  $db  = getData();
  $req = $db->query("SELECT id FROM project WHERE id = '$project_id'");
  $rep = $req->rowCount();
  if($rep > 0)
    return true;
  else
    return false;
}

function createList($list_name, $project_id) {
  $db = getData();
  $req = $db->prepare('INSERT INTO list (name, project_id) VALUES (:name, :project_id)');
  $req->execute([
    ':name' => $list_name,
    ':project_id' => $project_id
  ]);
}
