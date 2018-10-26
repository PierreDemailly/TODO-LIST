<?php
function getListById()
{
    $db = getData();
    $req = $db->prepare('SELECT id, name FROM list WHERE id = :list_id');
    $req->bindValue(':list_id', $_GET['id'], PDO::PARAM_INT);
    $req->execute();
    return $rep = $req->fetch();
}

function getTasksById()
{
    $db = getData();
    $req = $db->prepare('SELECT id, name, DATE_FORMAT(deadline, "%m/%d/%Y %H:%i") as deadline, done FROM task WHERE list_id = :list_id ORDER BY task.deadline');
    $req->bindValue(':list_id', $_GET['id'], PDO::PARAM_INT);
    $req->execute();
    return $rep = $req->fetchAll();
}

function createTask($task_name, $list_id, $deadline)
{
    $db = getData();
    $req = $db->prepare('INSERT INTO task (name, list_id, deadline) VALUES (:name, :list_id, :deadline)');
    $req->bindValue(':name', $task_name, PDO::PARAM_STR);
    $req->bindValue(':list_id', $list_id, PDO::PARAM_INT);
    $req->bindValue(':deadline', $deadline, PDO::PARAM_STR);
    $req->execute();
}

function existListId()
{
    $db = getData();
    $req = $db->prepare('SELECT id FROM list WHERE id = :list_id');
    $req->bindValue(':list_id', $_GET['id'], PDO::PARAM_INT);
    $req->execute();
    $rep = $req->rowCount();
    if ($rep > 0)
        return true;

    return false;

}

function validateGetId()
{
    if (empty($_GET['id']) || !ctype_digit($_GET['id']) || !existListId())
        return false;

    return true;
}

function taskDone($task_id)
{
    $db = getData();
    $req = $db->prepare('UPDATE task SET done = 1 WHERE id = :id');
    $req->bindValue(':id', $task_id, PDO::PARAM_INT);
    $req->execute();
}

function taskClear($task_id)
{
    $db = getData();
    $req = $db->prepare('UPDATE task SET done = 0 WHERE id = :id');
    $req->bindValue(':id', $task_id, PDO::PARAM_INT);
    $req->execute();
}
