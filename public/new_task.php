<?php
    session_start();
    require_once("../private/config.php");
    if($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_POST['task'])) {

     $db = mysqli_connect(SERVER, USER, PW, DB);

    if (!$db) {
        echo "Error: Unable to connect to MySQL." . PHP_EOL;
        echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
        echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
        exit;
    }
    
    $_SESSION['username'] = $username;
    $_SESSION['pwhash'] = $row['pwhash'];
    
    $newtask = mysqli_real_escape_string($db, $_POST['task']);
    $userid = mysqli_real_escape_string($db, $_SESSION['uid']);

    $stmt = $db->prepare ("INSERT INTO tasks (task, uid) VALUES (?, ?)");
    $stmt -> bind_param("ss", $newtask, $userid);
        
    $stmt->execute();
    $db->close();
        
    header("location: todos.php");
    }

    ?>
