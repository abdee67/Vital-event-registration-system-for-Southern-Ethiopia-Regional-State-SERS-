<?php
require '../connect.php';
if (isset($_POST['updateuser'])) {
    $UserName = $_GET['UserN'];
    
    $fullname = $_POST['fullname'];
    $fname = $_POST['fname']; // This variable is not used in the update query
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    
    // Initialize an array to store error messages
    $errors = array();
    
    // Validate fullname
    if (empty($fullname)) {
        $errors[] = "Full name cannot be empty";
    } elseif (!preg_match("/^[A-Za-z ]+$/", $fullname)) {
        $errors[] = "Invalid name format";
    }

    // Validate email
    if (empty($email)) {
        $errors[] = "Email field cannot be empty";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format";
    }

    // Validate phone
    if (empty($phone)) {
        $errors[] = "Phone number cannot be empty";
    } elseif (!preg_match("/^[0-9]{10}$/", $phone)) {
        $errors[] = "Invalid phone format! Phone number must be 10 digits.";
    }

    // Check if there are any errors
    if (empty($errors)) {
        // Update user information in the database
        $updatewuser = "UPDATE memberuser SET FullName='$fullname', email='$email', phone='$phone' WHERE name='$UserName'";
        $result = mysqli_query($con, $updatewuser);
        
        if ($result) {
            echo "<script>alert('Successfully Updated!');</script>";
            header('Location: view-zone-user.php');
            exit();
        } else {
            echo "Error updating record: " . mysqli_error($con);
        }
    } else {
        // Display error messages
        foreach ($errors as $error) {
            echo "<p class='w3-text-red'>$error</p>";
        }
    }
}
?>
