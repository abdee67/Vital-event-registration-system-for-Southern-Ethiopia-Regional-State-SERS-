<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>News page</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        /* Custom styles */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }
        .navbar {
            background-color: blue;
            color: white;
        }
        .navbar a {
            color: white;
            transition: color 0.3s ease;
        }
        .navbar a:hover {
            color: lightblue; /* Change to desired hover color */
        }
        .news-container {
            max-width: 1600px;
            margin: 50px auto;
            background: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            border-radius: 10px;
        }
        .news-title {
            font-family: 'Algerian', serif;
            text-align: center;
            font-size: 2em;
            margin-bottom: 20px;
            color: #4CAF50;
        }
        .news-content {
            font-size: 1.1em;
            line-height: 1.6;
        }
        .news-time {
            text-align: right;
            color: #999;
            font-style: italic;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<div class="w3-bar w3-card w3-padding navbar">
    <a href="index.php" class="w3-bar-item w3-button"><i class="fa fa-home"></i> Home</a>
    <a href="index.php#news" class="w3-bar-item w3-button"><i class="fa fa-clock"></i> News</a>
    <a href="index.php#login" class="w3-bar-item w3-button" onclick="mymod();"><i class="fa fa-lock"></i> <?php if(isset($_SESSION['username'])){} else echo "Login"; ?></a>
    <a href="index.php#about" class="w3-bar-item w3-button"><i class="fa fa-info-circle"></i> About</a>
    <a href="index.php#contact" class="w3-bar-item w3-button"><i class="fa fa-phone"></i> Contact Us</a>
    <a href="index.php#help" class="w3-bar-item w3-button"><i class="fa fa-question-circle"></i> Help & Support</a>
</div>

<!-- News Container -->
<div class="w3-center w3-hover-opacity news-container">
    <?php
    require 'connect.php';
    if (isset($_GET['newsId'])) {
        $newsId = $_GET['newsId'];
        $query = "SELECT * FROM news WHERE id='$newsId'";
        if ($run = mysqli_query($con, $query)) {
            $info = mysqli_fetch_assoc($run);
            $id = $info['id'];
            $content = $info['content'];
            $title = $info['title'];
            $image = $info['image'];

            echo "<p class='news-title'>$title</p>";
            echo "<div class='news-content'>$content</div>";
            echo "<p class='news-time'>{$info['postedtime']}</p>";
        } else {
            echo "Oops, something went wrong.";
        }
    }
    ?>
</div>
<!-- Footer -->
<footer>
    <?php
    require("footer.php");
    ?>
</footer>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
<script>
    $(document).ready(function() {
        // Check for anchor in URL and scroll to it
        var hash = window.location.hash;
        if (hash) {
            var target = $(hash);
            if (target.length) {
                $('html, body').animate({
                    scrollTop: target.offset().top
                }, 1000);
                target.show(); // Ensure the target section is visible
            }
        }
    });
</script>
</body>
</html>
