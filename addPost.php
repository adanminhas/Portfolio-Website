<?php

session_start();
require 'db_connect.php';

date_default_timezone_set('UTC');
$Title = $_POST['title'];
$Content = $_POST['content'];
$datetime = date("Y:m:d h:i:sa");

if (isset($_POST["preview"])) 
{
    $_SESSION['post'] = ['title' => $Title,'content' => $Content];
    

    $sql = "INSERT INTO blogs (Title, Content, DateTime) VALUES ('$Title', '$Content', '$datetime')";
    if ($conn->query($sql) === TRUE) 
    {
        header("Location: preview.php"); 
        exit;
    }
    else
    {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
else {
    $sql = "INSERT INTO blogs (Title, Content, DateTime) VALUES ('$Title', '$Content', '$datetime')";

    if ($conn->query($sql) === TRUE) 
    {
        header("Location: viewBlog.php");
        exit;
    } 
    else
    {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>