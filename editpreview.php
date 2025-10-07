<?php
session_start();
require 'db_connect.php';

$sql = "DELETE FROM blogs WHERE ID = (SELECT MAX(ID) FROM blogs)";
$conn->query($sql);


$title = $_SESSION['post']['title'];
$content = $_SESSION['post']['content'];


header("Location: addEntryPreview.php?Title=$title&Content=$content");
exit;
?>