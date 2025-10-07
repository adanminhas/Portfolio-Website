<!DOCTYPE html>
<html lang="en">   
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" type="text/css" href="add_blog.css">
    <title>Blog</title>
    <script src="clear.js" defer></script>
</head>
<body>

<div class="wrapper"></div>
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
    <section class="blog-header">
        <h1>Blog</h1>
        <a href="addEntry.php" class="add-blog-button">Add Blog</a>

    </section>
    <br>
    <!-- Main Section -->
    <main class="main-container">
        <form method="POST" action="addPost.php">
            <fieldset>
                <legend>Add Blog</legend>
                <section class="form-group">
                    <label for="blog-title">Title</label>
                    <input type="text" id="blog-title" name="title" placeholder="Enter blog title" >
                </section>
    
                <section class="form-group">
                    <label for="blog-content">Enter your text here</label>
                    <textarea id="blog-content" name="content" rows="6" placeholder="Write your blog content..." ></textarea>
                </section>
    
                <section class="form-actions">
                    <input type="submit" value="Post" class="button">
                    <input type="submit" value="Preview" name="preview" class="button">
                    <input type="reset" value="Clear" class="button">
                </section>
            </fieldset>
        </form>
    </main>
    
</div>
    <!-- Footer Section -->
    <footer>Copyright © 2025,  All rights reserved</footer>

</body>
</html>