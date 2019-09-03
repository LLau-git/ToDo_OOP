<?php

function getDB() {
    session_start();
    require_once("../private/config.php");
    $db = mysqli_connect(SERVER, USER, PW, DB);
    if (!$db) {
    echo "smthn wrong";
} else {
    echo "all good";
    echo "<div>Hello, " . $_SESSION['username'] . "!</div>";
$sql = "SELECT id FROM users WHERE username = '$_SESSION[username]' AND pwhash = '$_SESSION[pwhash]'";
$res = $db->query($sql);

$mydata = $res->fetch_all(MYSQLI_ASSOC);
foreach ($mydata as $key => $row) {
$_SESSION['uid'] = $row['id'];

}
}
};
?>