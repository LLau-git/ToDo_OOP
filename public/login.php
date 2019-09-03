<?php
session_start();
require_once("../private/config.php");
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $db = mysqli_connect(SERVER, USER, PW, DB);
    if (!$db) {
        echo "Error: Unable to connect to MySQL." . PHP_EOL;
        echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
        echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
        exit;
    }

    if (!isset($_POST["username"])) header("Location: index.html");
    $username = $_POST["username"];
    $password = $_POST["password"]; 

    $stmt = $db->prepare("SELECT id, username, pwhash FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    // set parameters and execute
    $stmt->execute();
    $res=$stmt->get_result();
    $db->close();
    //izņemam pirmo rindu
    $row=$res->fetch_assoc();

    if($res->num_rows < 1 && (!password_verify ($password , $row['pwhash']))) {
        header ("Location: index.html");
    } else {
        $_SESSION['username'] = $username;
        $_SESSION['pwhash'] = $row['pwhash'];
        header ("Location: todos.php");
    }
    
};

?>