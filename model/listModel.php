function createTask($task_name, $list_id)
{
  $db = getData();
  $req = $db->prepare('INSERT INTO task (name, list_id) VALUES (:name, :list_id)');
  $req->execute([
    ':name' => $task_name,
    ':list_id' => $list_id
  ]);
}
