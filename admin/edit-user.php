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
 //session_start();

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

    <!--==============================USER DETAIL BEGINS HERE==========================-->
    <div class="right_col" role="main"  style="background-color: <?php if(isset($col)){echo $col;} ?>;">
                <!-- top tiles -->
                <div class="row tile_count " style="border-bottom: 5px solid cadetblue; ">
                    <div class="" style="margin-top: 10px;">
                    <span>
                            <h6 class="w3-center item-title w3-round w3-animate-zoom" style="font-size: 50px; color: black; padding: 10px; font-weight: bold;">
                                <i class="w3-padding w3-animate-fading"><b>EDIT USER INFORMATION</b></i>
                            </h6>
                       </span>                      
                    </div>
                </div>
                <!--let begin here-->
                <?php
$errors = array();

if (isset($_GET['UId'])) {
    $username = $_GET['UId'];

    // Retrieve user details for pre-filling the form
    $selectuser = "SELECT * FROM memberuser WHERE name='$username'";
    $resultuser = mysqli_query($con, $selectuser);
    $userlist = mysqli_fetch_assoc($resultuser);

    $UserName = $userlist['name'];
    $FullName = $userlist['FullName'];
    $UserPhone = $userlist['phone'];
    $UserEmail = $userlist['email'];
    $UserRole = $userlist['role'];
}

if (isset($_POST['updateuser'])) {
    // Get form data
    $fullname = mysqli_real_escape_string($con, $_POST['fullname']);
    $fname = mysqli_real_escape_string($con, $_POST['fname']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);

    // Validate form inputs
    if (empty($fullname)) {
        $errors[] = "Full name cannot be empty";
    } elseif (!preg_match("/^[A-Za-z ]+$/", $fullname)) {
        $errors[] = "Invalid full name format";
    }

    if (empty($fname)) {
        $errors[] = "First name cannot be empty";
    } elseif (!preg_match("/^[A-Za-z ]+$/", $fname)) {
        $errors[] = "Invalid first name format";
    }

    if (empty($email)) {
        $errors[] = "Email field cannot be empty";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format";
    }

    if (empty($phone)) {
        $errors[] = "Phone number cannot be empty";
    } elseif (!preg_match("/^[0-9]{10}$/", $phone)) {
        $errors[] = "Invalid phone format! Phone number must be 10 digits.";
    }

    // Process form submission if no errors
    if (empty($errors)) {
        $updatequery = "UPDATE memberuser SET FullName ='$fullname', name='$fname', email ='$email', phone ='$phone' WHERE name='$UserName'";
        $result = mysqli_query($con, $updatequery);

        if ($result) {
            echo "<script>alert('Successfully Updated!'); window.location.href = 'view-user.php';</script>";
            exit();
        } else {
            echo "Error updating record: " . mysqli_error($con);
        }
    }
}
?>

<div class="main-content" id="content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 clear-padding-xs">
                <div class="dash-item fist-dash-item">
                    <div class="inner-item dash-searc-form">
                        <div class="w3-container">
                            <form action="" method="POST" enctype="multipart/form-data">
                                <div class="w3-section">
                                    <div class="row">
                                        <!-- FIRST COLUMN -->
                                        <div class="col-md-6">
                                            <label class="w3-text-black">Full Name</label>
                                            <input style="color: black;" class="w3-input w3-margin-bottom" type="text" placeholder="Full Name Here..." name="fullname" value="<?php echo htmlspecialchars($FullName); ?>">
                                            <?php if (isset($_POST['updateuser']) && empty($fullname)) : ?>
                                                <p class="w3-text-red">Full name cannot be empty</p>
                                            <?php elseif (isset($_POST['updateuser']) && !preg_match("/^[A-Za-z ]+$/", $fullname)) : ?>
                                                <p class="w3-text-red">Invalid name format!</p>
                                            <?php endif; ?>

                                            <label class="w3-text-black">User Name</label>
                                            <input style="color: black;" class="w3-input w3-margin-bottom" type="text" placeholder="User name here..." name="fname" value="<?php echo htmlspecialchars($UserName); ?>">
                                            <?php if (isset($_POST['updateuser']) && empty($fname)) : ?>
                                                <p class="w3-text-red">First name cannot be empty</p>
                                            <?php elseif (isset($_POST['updateuser']) && !preg_match("/^[A-Za-z ]+$/", $fname)) : ?>
                                                <p class="w3-text-red">Invalid name format!</p>
                                            <?php endif; ?>

                                            <label class="w3-text-black">Phone</label>
                                            <input style="color: black;" class="w3-input w3-margin-bottom" type="number" placeholder="Phone number here..." name="phone" value="<?php echo htmlspecialchars($UserPhone); ?>">
                                            <?php if (isset($_POST['updateuser']) && empty($phone)) : ?>
                                                <p class="w3-text-red">Phone number cannot be empty</p>
                                            <?php elseif (isset($_POST['updateuser']) && !preg_match("/^[0-9]{10}$/", $phone)) : ?>
                                                <p class="w3-text-red">Invalid phone format! Phone number must be 10 digits.</p>
                                            <?php endif; ?>
                                        </div>

                                        <!-- SECOND COLUMN -->
                                        <div class="col-md-6">
                                            <label class="w3-text-black">Email</label>
                                            <input style="color: black;" class="w3-input w3-margin-bottom" type="email" placeholder="Email here..." name="email" value="<?php echo htmlspecialchars($UserEmail); ?>">
                                            <?php if (isset($_POST['updateuser']) && empty($email)) : ?>
                                                <p class="w3-text-red">Email field cannot be empty</p>
                                            <?php elseif (isset($_POST['updateuser']) && !filter_var($email, FILTER_VALIDATE_EMAIL)) : ?>
                                                <p class="w3-text-red">Invalid email format!</p>
                                            <?php endif; ?>

                                            <label class="w3-text-black">Role</label>
                                            <input type="text" name="userrole" class="w3-input w3-margin-bottom" style="color: black;" readonly value="<?php echo htmlspecialchars($UserRole); ?>">
                                        </div>
                                        <!-- END SECOND COLUMN -->
                                    </div>
                                    <!-- END ROW -->

                                    <button class="w3-button w3-blue w3-btn-block w3-section w3-padding" name="updateuser">Update</button>
                                </div>
                                <!-- END w3-section -->
                            </form>
                        </div>
                        <!-- END w3-container -->
                    </div>
                    <!-- END inner-item dash-searc-form -->
                </div>
                <!-- END dash-item fist-dash-item -->
            </div>
            <!-- END col-lg-12 clear-padding-xs -->
        </div>
        <!-- END row -->
    </div>
    <!-- END container-fluid -->
</div>
<!-- END main-content -->


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
