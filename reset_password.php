<?php
// Include necessary files and establish database connection
require_once 'connect.php'; // Assuming 'connect.php' contains database connection details

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the user's email address from the form
    $email = $_POST['email'];

    // Generate a unique token
    $token = bin2hex(random_bytes(32));

    // Store the token in the database against the user's email
    // You'll need a database table to store email and token pairs
    // Update the table with the token corresponding to the user's email
    // For example, you can create a table named 'password_resets' with columns 'email' and 'token'

    // Insert the token into the database
    $insertQuery = "INSERT INTO password_resets (email, token) VALUES ('$email', '$token')";
    if(mysqli_query($con, $insertQuery)) {
        // Send an email to the user with a link containing the token
        $reset_link = "http://localhost/Vital%20Event%20Registration%20System1/reset_password.php?token=$token";
        $subject = "Password Reset";
        $message = "Click the following link to reset your password: $reset_link";
        // Send the email using PHP's mail() function or a third-party library like PHPMailer

        // Redirect the user to a page informing them that an email has been sent
        header("Location: email_sent.php");
        exit;
    } else {
        // Handle database insertion error
        echo "Error: " . mysqli_error($con);
    }
}

// Handle GET request (Password Reset Form)
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['token'])) {
    // Get the token from the URL
    $token = $_GET['token'];

    // Retrieve the email associated with the token from the database
    $retrieveQuery = "SELECT email FROM password_resets WHERE token = '$token'";
    $result = mysqli_query($con, $retrieveQuery);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        $email = $row['email'];
        // Display the reset password form
        // You can include HTML and form elements here to allow the user to reset their password
        echo "<h2>Reset Password</h2>";
        echo "<form method='post' action='reset_password.php'>";
        echo "<input type='hidden' name='email' value='$email'>";
        echo "<label for='new_password'>New Password:</label>";
        echo "<input type='password' name='new_password' id='new_password' required>";
        echo "<button type='submit'>Reset Password</button>";
        echo "</form>";
    } else {
        echo "Invalid or expired token.";
    }
}

// Handle POST request (Password Reset Form Submission)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the new password from the form
    $new_password = $_POST['new_password'];
    $email = $_POST['email'];

    // Validate and update the password in the database
    $updateQuery = "UPDATE users SET password = '$new_password' WHERE email = '$email'";
    if(mysqli_query($con, $updateQuery)) {
        // Redirect the user to the login page with a success message
        header("Location: login.php?reset=success");
        exit;
    } else {
        // Handle database update error
        echo "Error: " . mysqli_error($con);
    }
}
?>
