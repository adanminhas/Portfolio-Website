<?php

session_start();
require 'db_connect.php';

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM `users` WHERE Email ='$username' AND password='$password'";
$result = $conn->query($sql);
if ($result->num_rows == 1) {
    $_SESSION['loggedin'] = true;
    echo 'Congratulations! You are logged in!';
    header('Location: addEntry.php');
    exit;
} else {
    echo 'Invalid username or password!';
    echo '<br><a href="login.html">Try again</a>';
    echo '<br><a href="index.html">Back to home</a>';
}


?>

