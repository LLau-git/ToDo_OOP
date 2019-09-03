<?php
session_start();
require_once("../private/config.php");
$db = mysqli_connect(SERVER, USER, PW, DB);

$row_id = mysqli_real_escape_string($db, $_REQUEST['task_id']);
$task_val = mysqli_real_escape_string($db, $_REQUEST['edit_task']);


$statement = $db->prepare("UPDATE tasks SET task = ? WHERE id = ?");
$statement->bind_param("ss", $task_val, $row_id);
$statement->execute();
$db->close();
header('location:todos.php');

?>