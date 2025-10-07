<?php

session_start();
require 'db_connect.php';
$posts = [];

if (!isset($_SESSION['loggedin'])) 
{
    header('location: login.html');
}

function sortPostsByIdDescending(&$posts) 
{
    $n = count($posts);
    for ($i = 0; $i < $n - 1; $i++) 
    {
        for ($j = 0; $j < $n - $i - 1; $j++) 
        {
            if ($posts[$j]['ID'] < $posts[$j + 1]['ID']) 
            {
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
    <link rel="stylesheet" type="text/css" href="preview.css">
    <script src="filterMonth.js" defer></script>
    <title>Preview</title>
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
                <li><a href="">Home</a></li>
                <li><a href="">About Me</a></li>
                <li><a href="">Portfolio</a></li>
                <li><a href="">Contact</a></li>
                <li><a href="">Blog</a></li>
                <li><a href="" class="">Logout</a></li>
            </ul>
        </nav>
    </header>

    <!-- Blog Header -->
    <section class="blog-header">
        <h1>Blog Preview</h1>
        <a href="viewBlog.php"><button class="preview-button post-button">Post</button></a>
        <a href="editpreview.php"><button class="preview-button edit-button">Edit</button></a>
        <button class="add-blog-button">Add Blog</button>
    </section>

    <!-- Main Section -->
    <main class="main-container">
        <?php
        require 'db_connect.php';

        //$sql = "SELECT * FROM blogs ORDER BY DateTime DESC";
        
        $posts = [];
        $availableMonths = [];
        $chosenMonth = $_GET['month'] ?? '';

        $result = $conn->query("SELECT * FROM blogs");

        if ($result && $result->num_rows > 0) 
        {
            while ($row = $result->fetch_assoc()) 
            {
                // Extract month-year key for dropdown
                $monthKey = date('Y-m', strtotime($row['DateTime']));
                $availableMonths[$monthKey] = true;

                // Filter if a month is selected
                if ($chosenMonth === '' || $monthKey === $chosenMonth) 
                {
                    $posts[] = $row;
                }
            }

            sortPostsByIdDescending($posts);
        }   

    ?>
        <form method="GET" class="monthChooser">
            <label for="month">Filter by month:</label>
            <select name="month" id="month">
                <option value="">All Posts</option>
                <?php
                foreach (array_keys($availableMonths) as $month) 
                {
                    $selected = ($chosenMonth === $month) ? 'selected' : '';
                    $readableMonth = date('F Y', strtotime($month . '-01'));
                    echo "<option value=\"$month\" $selected>$readableMonth</option>";
                }
                ?>
            </select>
        </form>

        <?php

        if ($result && $result->num_rows > 0) 
        {
            while ($row = $result->fetch_assoc()) 
            {
                $posts[] = $row;
            }
        
            
            sortPostsByIdDescending($posts);
        }
        if (count($posts) > 0) 
        {
            foreach ($posts as $post) 
            {
                echo "<section class='blog-post'>";
                echo "<h2 class='blog-title'>" . $post['Title'] . "</h2>";
                echo "<h3 class='blog-date'>" . $post['DateTime'] . " UTC " . "</h3>";
                echo "<p class='blog-content'>" . $post['Content'] . "</p>";
                echo "</section>";;
            }
        } 
        else 
        {
            echo "<p class='no-posts'>No posts yet.</p>";
        }
        ?>
    </main>
    
</div>
<!-- Footer Section -->
<footer>Copyright © 2025, All rights reserved</footer>


</body>
</html>