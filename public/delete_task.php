<?php

require_once("../private/config.php");
$db = mysqli_connect(SERVER, USER, PW, DB);

$statement = $db->prepare("DELETE FROM tasks WHERE id = ?");
$statement->bind_param("s", $_POST['task_id']);
$statement->execute();
$db->close();
header('location:todos.php');

?>