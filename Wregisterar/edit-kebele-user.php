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
                    <span ><h2 class="w3-center" style="font-size: 30px; color: black;"><?php echo "<b> EDIT USER INFORMATION</b>";?> </h2></span>
                    </div>
                </div>
                <!--let begin here-->
                <div class="main-content" id="content-wrapper">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12 clear-padding-xs">
                                <div class="dash-item fist-dash-item">
                                    <div class="inner-item dash-searc-form">
                                        <?php
                                        	#GET ZONE AND WOREDA CODE TO IDENTIFY SPECIFIC KEBELE 
                                           	$ZCode=$_SESSION['zonecode'];
                      					  	    	  $WCode=$_SESSION['woredacode'];
                                            
                                          if (isset($_GET['KUser'])) {

                                            $_SESSION['username']=$_GET['KUser'];
                                            $username= $_SESSION['username'];

                                            $selectuser="SELECT * FROM memberuser WHERE name='$username' AND zcode='$ZCode' AND wcode='$WCode' ";
                                            $resultuser=mysqli_query($con,$selectuser);
                                            
                                            while ($userlist=mysqli_fetch_assoc($resultuser)) {

                                                  $fullName=$userlist['FullName'];
                                                  $email=$userlist['email'];
                                                  $phone=$userlist['phone'];
                                                  $role=$userlist['role'];
                                                  $Zcode=$userlist['zcode'];
                                                  $wcode=$userlist['wcode'];
                                                  $kcode=$userlist['kcode'];
                                            }
                                            $selkname="SELECT * FROM kebele WHERE num='$kcode' AND woreda='$wcode' AND zone='$Zcode'";
                                            $kresult=mysqli_query($con,$selkname);
                                            $keblist=mysqli_fetch_array($kresult);
                                             $kebName=$keblist['name'];

                                            $selwname="SELECT * FROM woreda WHERE num='$wcode' AND zone='$Zcode'";
                                            $wresult=mysqli_query($con,$selwname);
                                            $worlist=mysqli_fetch_array($wresult);
                                             $worName=$worlist['name'];

                                            $selzname="SELECT * FROM zone WHERE num='$Zcode';";
                                            $zresult=mysqli_query($con,$selzname);
                                            $zonlist=mysqli_fetch_array($zresult);
                                             $zonName=$zonlist['name'];

                                          }
                                        	
                                        ?>
            <div class="w3-container">
                <form action="update-user.php?UserId=<?php echo $username; ?>" method="POST" enctype="multipart/form-data">
                    <div class="w3-section">
                      
                      <div class="row">
                        <!--========FIRST COLUMN=========================-->
                        <div class="col-md-6">
                            <label class="w3-text-blue">Full Name</label>
                            <input style="color: black;" class="w3-input  w3-margin-bottom" type="text" placeholder="Full Name Here..." name="fullname" onkeypress="return (event.charCode>64 && event.charCode<91) || (event.charCode>96 && event.charCode<123) || event.charCode==32 " value="<?php echo $fullName; ?>">
                            <?php 
                                    if(isset($_POST['updateuser'])&&empty($fullname)){

                                        echo "<p class='w3-text-red'>Full name  cannot be empty</p>";
                                    }
                                    elseif(isset($_POST['updateuser'])&&!preg_match("/^[A-Za-z]/",$fullname)){
                                        echo "<p class='w3-text-red'>invalid name format!</p>";
                                    }
                             ?>
                            <label class="w3-text-blue">UserName</label> 
                           <input style="color: black;" class="w3-input  w3-margin-bottom" type="text" placeholder="User name here..." name="fname" readonly="" onkeypress="return (event.charCode>64 && event.charCode<91) || (event.charCode>96 && event.charCode<123)" value="<?php echo $username; ?>">
                            <?php 
                                    if(isset($_POST['updateuser'])&&empty($fname)){

                                        echo "<p class='w3-text-red'>Frist name  cannot be empty</p>";
                                    }
                                    elseif(isset($_POST['updateuser'])&&!preg_match("/^[A-Za-z]/",$fname)){
                                        echo "<p class='w3-text-red'>invalid name format!</p>";
                                    }
                             ?>
                            <label class="w3-text-blue">Email</label>
                            <input style="color: black;" class="w3-input  w3-margin-bottom" type="email" placeholder="email here..." name="email" value="<?php echo $email; ?>">
                            <?php 
                                    if(isset($_POST['updateuser'])&&empty($email)){
                                        echo "<p class='w3-text-red'>email field cannot be empty</p>";
                                    }

                                    elseif(isset($_POST['updateuser'])&&!preg_match("/^.+@.+\.com$/", $email)){
                                        echo "<p class='w3-text-red'>invalid email format!</p>";
                                    }
                             ?>
                             <label class="w3-text-blue">Phone</label>
                            <input style="color: black;" class="w3-input  w3-margin-bottom" type="Number" placeholder="phone number here..." name="phone" value="<?php echo $phone; ?>">
                            <?php 
                                    if(isset($_POST['updateuser'])&&empty($phone)){
                                        echo "<p class='w3-text-red'>Phone Number Cannot be empty</p>";
                                    }
                                    elseif(isset($_POST['updateuser'])&&!preg_match("/^[0-9]{10}/", $phone)){
                                        echo "<p class='w3-text-red'>Invalid phone format!</p>";
                                    }
                             ?>
                        </div>
                        <!--SECOND COLUMN=====================-->
                        <div class="col-md-6">

                            <label class="w3-text-blue">Zone</label>
                            <input type="text" name="zonename" class="w3-input  w3-margin-bottom"  style="color: black;" readonly="" value="<?php echo $zonName ?>">
                     
                             <label class="w3-text-blue">Woreda</label>
                              <input type="text" name="woredaname" class="w3-input  w3-margin-bottom"  style="color: black;" readonly="" value="<?php echo $worName ?>">
                              <label class="w3-text-blue">Assigned Kebele</label>
                              <select name="kebeles" class="w3-input w3-text-blue" >
								                             <?php 
								                                $query="SELECT * from kebele where woreda='$WCode' AND zone='$ZCode' ";
								                                $run=mysqli_query($con,$query);
								                                echo "<option class='w3-text-red w3-center'></option>";
								                                while($list=mysqli_fetch_array($run)){
								                                    ?>
								                                     <option alt='hello'><?php echo $list['num']; ?></option>
								                                    <?php
								                                }
								                              ?>
								                         </select>
                                                         <br>
                              <input type="text" name="assignedkeb" class="w3-input  w3-margin-bottom"  style="color: black;" readonly="" value="<?php echo $kebName ?>">
                             <br>
                        </div>
                        <!--=========COLUMN ENDS HERE======================-->
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
