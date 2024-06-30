<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Website</title>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        /* Custom styles */
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
    </style>
</head>
<body>

<div class="w3-bar w3-card w3-padding navbar">
    <a href="#" class="w3-bar-item w3-button"><i class="fa fa-home"></i> Home</a>
    <a href="#news" class="w3-bar-item w3-button"><i class="fa fa-clock"></i> News</a>
    <a href="#login" class="w3-bar-item w3-button" onclick="mymod();"><i class="fa fa-lock"></i> <?php if(isset($_SESSION['username'])){} else echo "Login"; ?></a>
    <a href="#about" class="w3-bar-item w3-button"><i class="fa fa-info-circle"></i> About</a>
    <a href="#contact" class="w3-bar-item w3-button"><i class="fa fa-phone"></i> Contact Us</a>
    <a href="#help" class="w3-bar-item w3-button"><i class="fa fa-question-circle"></i> Help & Support</a>
</div>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
