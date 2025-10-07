<?php

session_start();
require 'db_connect.php';
$posts = [];

if (!isset($_SESSION['loggedin'])) 
{
    header('location: login.html');
}

function sortPostsByIdDescending(&$posts) {
    $n = count($posts);
    for ($i = 0; $i < $n - 1; $i++) {
        for ($j = 0; $j < $n - $i - 1; $j++) {
            if ($posts[$j]['ID'] < $posts[$j + 1]['ID']) {
                $temp = $posts[$j];
                $posts[$j] = $posts[$j + 1];
                $posts[$j + 1] = $temp;
            }
        }
    }
}


?>
<!DOCTYPE html>
<html lang="en">   
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" type="text/css" href="viewBlog.css">
    <title>Blog</title>
</head>
<body>

<div class="wrapper">
    <!-- Header Section -->
    <header class="header-container">
        <div class="logo">
            <img src="logo.svg" alt="My Logo">
        </div>
        <nav class="nav-container">
            <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="about.html">About Me</a></li>
                <li><a href="portfolio.html">Portfolio</a></li>
                <li><a href="about.html#contact">Contact</a></li>
                <li><a href="viewBlog.php">Blog</a></li>
                <li><a href="logout.php" class="logout-link">Logout</a></li>
            </ul>
        </nav>
    </header>

    <!-- Blog Header -->
    <section class="blog-header">
        <h1>Blog</h1>
        <button class="add-blog-button" onclick="location.href='addEntry.php'">Add Blog</button>
    </section>

    <!-- Main Section -->
    <main class="main-container">
        <?php
        require 'db_connect.php';

        //$sql = "SELECT * FROM blogs ORDER BY DateTime DESC";
        
        $result = $conn->query("SELECT * FROM blogs");
        $posts = [];


        if ($result && $result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $posts[] = $row;
            }
        
            // Sort posts (newest first by ID)
            sortPostsByIdDescending($posts);
        }
        if (count($posts) > 0) {
            foreach ($posts as $post) {
                echo "<section class='blog-post'>";
                echo "<h2 class='blog-title'>" . $post['Title'] . "</h2>";
                echo "<h3 class='blog-date'>" . $post['DateTime'] . " UTC " . "</h3>";
                echo "<p class='blog-content'>" . $post['Content'] . "</p>";
                echo "</section>";;
            }
        } else {
            echo "<p class='no-posts'>No posts yet.</p>";
        }
        ?>
    </main>
    <!-- Footer Section -->
    <footer>Copyright © 2025, All rights reserved</footer>
</div>



</body>
</html>
