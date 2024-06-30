<style type="text/css">
    
.dash-item {
    margin-top: 0px;
    background: #fff;
}
.dash-item .item-title{
    font-weight: 700;
    margin: 0;
    border-bottom: 1px solid #eee;
    padding: 15px 30px;
}
.dash-item .item-title i {
    margin-right: 10px;
}
.dash-item .inner-item {
    padding: 30px;
}
.dash-item .inner-item  img{
    max-width: 40px;
    border-radius: 50%;
}
.dash-item .inner-item  .title {
    font-weight: 600;
    font-size: 13px;
}

.first-dash-item {
    margin-top: 0px;
}

</style>
 <?Php

       include("inc/head.php"); 
        require '../connect.php';

      ?>
      
   <body class="nav-md" >
    <div class="container body" >
        <div class="main_container">
     <?php include("inc/slide.php");

      ?>
            <!-- top navigation -->
    <?Php include("inc/navigation.php"); ?>

    <div class="right_col" role="main" style="background-color: <?php if(isset($col)){ echo $col; } ?>;">
    <!-- Top Tiles -->
    <div class="row tile_count" style="border-bottom: 5px solid cadetblue;">
        <div class="" style="margin-top: 10px;">
            <span>
                <h6 class="w3-center item-title w3-round w3-animate-zoom" style="font-size: 50px; color: black; padding: 10px; font-weight: bold;">
                    <i class="w3-padding w3-animate-fading"><b>EDIT ZONE USER INFORMATION</b></i>
                </h6>
            </span>                      
        </div>
    </div>

    <!-- Main Content -->
    <?php
// Initialize an array to store error messages
$errors = array();
$fullname = '';
$email = '';
$phone = '';

if (isset($_POST['updateuser'])) {
    $UserName = $_GET['UseN'];
    
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    
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
            echo "<script>alert('Successfully Updated!'); window.location.href = 'view-zone-user.php';</script>";
            exit();
        } else {
            echo "Error updating record: " . mysqli_error($con);
        }
    }
}


// Get current region and zone number
$ZUserName = $_SESSION['username'];
$regcode = $_SESSION['rcodetosend'];
$_SESSION['username'] = $_GET['UseN'];

$selectuser = "SELECT * FROM memberuser WHERE name='$ZUserName' AND role='Zver'";
$Usresult = mysqli_query($con, $selectuser);
while ($userlist = mysqli_fetch_assoc($Usresult)) {
    $fullname = $fullname ?: $userlist['FullName'];
    $username = $userlist['name'];
    $email = $email ?: $userlist['email'];
    $phone = $phone ?: $userlist['phone'];
    $_SESSION['zoneNumber'] = $userlist['zcode'];
    $zoneNum = $_SESSION['zoneNumber'];
}

// Retrieve zone assigned for the user
$selectzone = "SELECT * FROM zone WHERE num='$zoneNum'";
$zoneresult = mysqli_query($con, $selectzone);
$zonelist = mysqli_fetch_assoc($zoneresult);
$ZoneName = $zonelist['name'];

// Retrieve region name
$selectRegion = "SELECT * FROM region WHERE num='$regcode'";
$regionresult = mysqli_query($con, $selectRegion);
$region = mysqli_fetch_assoc($regionresult);
$regName = $region['name'];
?>

<div class="main-content" id="content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 clear-padding-xs">
                <div class="dash-item first-dash-item">
                    <div class="inner-item dash-search-form">
                        <div class="w3-container">
                            <form action="" method="POST" enctype="multipart/form-data">
                                <div class="w3-section">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <!-- Full Name Field -->
                                            <label class="w3-text-black">Full Name</label>
                                            <input style="color: black;" class="w3-input w3-margin-bottom" type="text" placeholder="Full Name" name="fullname" onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || event.charCode == 32" value="<?php echo htmlspecialchars($fullname); ?>">
                                            <?php
                                            if (in_array("Full name cannot be empty", $errors)) {
                                                echo "<p class='w3-text-red'>Full name cannot be empty</p>";
                                            } elseif (in_array("Invalid name format", $errors)) {
                                                echo "<p class='w3-text-red'>Invalid name format</p>";
                                            }
                                            ?>

                                            <!-- UserName Field -->
                                            <label class="w3-text-black">UserName</label>
                                            <input style="color: black;" class="w3-input w3-margin-bottom" type="text" placeholder="UserName" name="UseN" readonly onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)" value="<?php echo htmlspecialchars($username); ?>">

                                            <!-- Email Field -->
                                            <label class="w3-text-black">Email</label>
                                            <input style="color: black;" class="w3-input w3-margin-bottom" type="email" placeholder="Email" name="email" value="<?php echo htmlspecialchars($email); ?>">
                                            <?php
                                            if (in_array("Email field cannot be empty", $errors)) {
                                                echo "<p class='w3-text-red'>Email field cannot be empty</p>";
                                            } elseif (in_array("Invalid email format", $errors)) {
                                                echo "<p class='w3-text-red'>Invalid email format</p>";
                                            }
                                            ?>

                                            <!-- Phone Field -->
                                            <label class="w3-text-black">Phone</label>
                                            <input style="color: black;" class="w3-input w3-margin-bottom" type="number" placeholder="Phone Number" name="phone" onkeypress="return (event.charCode > 47 && event.charCode < 58)" value="<?php echo htmlspecialchars($phone); ?>" maxlength="10">
                                            <?php
                                            if (in_array("Phone number cannot be empty", $errors)) {
                                                echo "<p class='w3-text-red'>Phone number cannot be empty</p>";
                                            } elseif (in_array("Invalid phone format! Phone number must be 10 digits.", $errors)) {
                                                echo "<p class='w3-text-red'>Invalid phone format! Phone number must be 10 digits.</p>";
                                            }
                                            ?>
                                        </div>
                                        <div class="col-md-6">
                                            <!-- Region Field -->
                                            <label class="w3-text-black">Region</label>
                                            <input type="text" name="regionName" readonly class="w3-input w3-margin-bottom" style="color: black;" value="<?php echo htmlspecialchars($regName); ?>">

                                            <!-- Zone Field -->
                                            <label class="w3-text-black">Zone</label>
                                            <input type="text" name="zonename" readonly onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || event.charCode == 32" class="w3-input w3-margin-bottom" style="color: black;" value="<?php echo htmlspecialchars($ZoneName); ?>">
                                        </div>
                                    </div>
                                    <button class="w3-button w3-blue w3-btn-block w3-section w3-padding" name="updateuser">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


    <!--==============================EDIT BIRTH  ENDS HERE===========================-->
    <!-- Footer============================-->

    <div class=""></div>
        <?Php include("inc/footer.php"); ?>
        <!-- jQuery -->
        <script src="js/jquery.min.js"></script>
        <script src="js/jquery-1.9.1.min.js"></script>
        <!-- Bootstrap -->
        <script src="js/bootstrap.min.js"></script>
        <!-- Custom Theme Scripts -->
        <script src="js/custom.min.js"></script>
</body>

</html
