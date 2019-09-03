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
    //TODO field validation from https://www.php.net/book.filter
    $username = $_POST["username"];

    //nav oblig., ja nav ievadīts tad akceptējam tuksu lauku.
    $lastname = "";
    if (isset($_POST["lastname"])) $lastname = $_POST["lastname"];
    
    //nav oblig., ja nav ievadīts tad akceptējam tuksu lauku.
    $email = "";
    if(isset($_POST["email"])) $email = $_POST["email"];
 
    // if (isset($_POST['password'])) {
        if ($_POST["password"] === $_POST["password2"] ) {
            //ja match tad db ģenerejam passowrd hash vertību
            $pwhash = password_hash($_POST["password"], PASSWORD_DEFAULT);
            $_SESSION['pwhash'] = $pwhash;
        } else {
            header("Location: register.php");
            echo "Sorry, password did not match!";
            //exit otherwise went trougt todo.php upload
            exit();
    }; 
    
    // var_dump($row);
    // if (password_verify ($password , $row['pwhash'])){
    //     echo "You are logged in!"; //sessija vaļā
    //     $_SESSION['id'] = $row['id'];
    //     $_SESSION['username'] = $username;
    // }
    
    // echo $username." is logged in! <hr>";

    $stmt = $db->prepare("INSERT INTO users (username, lastname, email, pwhash) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $username, $lastname, $email, $pwhash);
    // set parameters and execute
    $stmt->execute();
    $db->close();
    header("Location: index.html");
}

?>
