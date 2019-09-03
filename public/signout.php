<?php
session_start();
unset($_SESSION['username']);
unset($_SESSION['pwhash']);
unset($_SESSION['uid']);
header("Location: index.html");
?>