<?php

session_start();
require 'db_connect.php';

echo('Login check page<br>');

if (isset($_SESSION['loggedin'])) 
{
    echo 'You are already logged in';
    echo 'Redirecting in 3 seconds...';
    header('Location: addEntry.php');
    exit;
}
else {
    echo $_SESSION['loggedin'];
    header('location: login.html');
}


?>

