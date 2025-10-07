<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ec24527";

// Creates connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Checks connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
   }
else {
    // echo"Connected successfully";
    // echo "<br>";
}

?>

