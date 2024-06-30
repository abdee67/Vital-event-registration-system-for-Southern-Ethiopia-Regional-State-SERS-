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
    <div class="right_col" role="main" style="background-color: <?php echo isset($col) ? $col : ''; ?>;">
    <!-- top tiles -->
    <div class="row tile_count" style="border-bottom: 5px solid cadetblue;">
        <div style="margin-top: 10px;">
            <span>
                <h6 class="w3-center item-title w3-round w3-animate-zoom" style="font-size: 50px; color: black; padding: 10px; font-weight: bold;">
                    <i class="w3-padding w3-animate-fading"><b> EDIT USER INFORMATION</b></i>
                </h6>
            </span>
        </div>
    </div>
    <!-- let begin here -->
    <div class="main-content" id="content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 clear-padding-xs">
                    <div class="dash-item fist-dash-item">
                        <div class="inner-item dash-searc-form">
                            <?php
                            // Get zone information
                            $ZCode = $_SESSION['zonecode'];
                            $selectzone = "SELECT * FROM zone WHERE num='$ZCode'";
                            $zoneres = mysqli_query($con, $selectzone);
                            $zonelist = mysqli_fetch_assoc($zoneres);
                            $zonName = $zonelist['name'];

                            // Get current user information
                            $_SESSION['username'] = $_GET['UserID'];
                            $WUserName = $_SESSION['username'];

                            $selectuser = "SELECT * FROM memberuser WHERE name='$WUserName' ";
                            $Usresult = mysqli_query($con, $selectuser);
                            $userlist = mysqli_fetch_assoc($Usresult);

                            $fullname = $userlist['FullName'];
                            $uname = $userlist['name'];
                            $email = $userlist['email'];
                            $phone = $userlist['phone'];
                            $worcode = $userlist['wcode'];

                            // Retrieve woreda name
                            $selectworeda = "SELECT * FROM woreda WHERE num ='$worcode' AND zone='$ZCode' ";
                            $woredaresult = mysqli_query($con, $selectworeda);
                            $woredalist = mysqli_fetch_assoc($woredaresult);
                            $woredaN = $woredalist['name'];
                            ?>
                            <div class="w3-container">
                                <form action="" method="POST" enctype="multipart/form-data">
                                    <div class="w3-section">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label class="w3-text-black">Full Name</label>
                                                <input style="color: black;" class="w3-input w3-margin-bottom" type="text" placeholder="Full Name" name="fullname" onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || event.charCode == 32" required="" value="<?php echo isset($fullname) ? htmlspecialchars($fullname) : ''; ?>">
                                               
                                                <label class="w3-text-black">User Name</label>
                                                <input style="color: black;" class="w3-input w3-margin-bottom" type="text" placeholder="UserName" name="fname" onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)" value="<?php echo htmlspecialchars($uname); ?>" readonly="">

                                                <label class="w3-text-black">Email</label>
                                                <input style="color: black;" class="w3-input w3-margin-bottom" type="email" placeholder="email" name="email" value="<?php echo htmlspecialchars($email); ?>">
                                               
                                                
                                                <label class="w3-text-black">Phone</label>
                                                <input style="color: black;" class="w3-input w3-margin-bottom" type="text" placeholder="Phone Number" name="phone" onkeypress="return (event.charCode > 47 && event.charCode < 58)" value="<?php echo htmlspecialchars($phone); ?>">
                                                <?php
                                                if (isset($_POST['updateuser']) && empty($phone)) {
                                                    echo "<p class='w3-text-red'>Phone Number Cannot be empty</p>";
                                                }
                                                ?>
                                            </div>
                                            <div class="col-md-6">
                                                <label class="w3-text-black">Zone</label>
                                                <input type="text" name="zonename" style="color: black;" class="w3-input w3-margin-bottom" value="<?php echo $ZCode . '/' . $zonName; ?>" readonly="">

                                                <label class="w3-text-black">Woreda</label>
                                                <input type="text" name="woredaname" style="color: black;" class="w3-input w3-margin-bottom" value="<?php echo $woredaN; ?>" readonly="">
                                            </div>
                                        </div>
                                        <button class="w3-button w3-blue w3-btn-block w3-section w3-padding" name="updateuser">Update</button>
                                    </div>
                                </form>
                            </div>
                            <?php
                            if (isset($_POST['updateuser'])) {
                                $fullname = $_POST['fullname'];
                                $fname = $_POST['fname'];
                                $email = $_POST['email'];
                                $phone = $_POST['phone'];

                                if (!empty($fullname) && !empty($email) && !empty($phone)) {
                                    if (preg_match("/^[A-Za-z ]*$/", $fullname)) {
                                        if (preg_match("/^.+@.+\.com$/", $email)) {
                                            if (preg_match("/^[0-9]{10}$/", $phone)) {
                                                $updatewuser = "UPDATE memberuser SET FullName='$fullname',email='$email',phone='$phone' WHERE name='$WUserName'";
                                                $result = mysqli_query($con, $updatewuser);
                                                if ($result) {
                                                    echo "<script>alert('Successfully Updated !!!!!!');</script>";
                                                } else {
                                                    echo "<p class='w3-text-red'>Error in updating. Please try again.</p>";
                                                }
                                            } else {
                                                echo "<p class='w3-text-red'>Invalid phone format! Phone number must be 10 digits.</p>";
                                            }
                                        } else {
                                            echo "<p class='w3-text-red'>Invalid Email format</p>";
                                        }
                                    } else {
                                        echo "<p class='w3-text-red'>Invalid name format</p>";
                                    }
                                } else {
                                    echo "<p class='w3-text-red'>Fill all fields</p>";
                                }
                            }
                            ?>
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
