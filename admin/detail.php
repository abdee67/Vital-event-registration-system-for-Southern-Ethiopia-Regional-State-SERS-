
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
.profilpic{
    width: 180px;
    height: 230px;
    margin-left: 60px;
    margin-top: 23px;
    margin-bottom: 20px;

    border:5px solid;
    border-color: green;
    border-radius: 25px;
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
    <div class="right_col" role="main">
                <!-- top tiles -->
                <div class="row tile_count " style="border-bottom: 5px solid cadetblue;">
                    <div class="" style="margin-top: 20px;">
                    <span>
                            <h6 class="w3-center item-title w3-round w3-animate-zoom" style="font-size: 50px; color: black; padding: 10px; font-weight: bold;">
                                <i class="w3-padding w3-animate-fading"><b>USER DETAIL</b></i>
                            </h6>
                       </span>                     
                     </div>
                </div>
                <!--let begin here-->
                <div class="main-content" id="content-wrapper">
                    <div class="container-fluid">
                       <div class="row">
                           
                       </div>
                        <!--second row-->
                        <div class="row">
                            <div class="col-lg-12 clear-padding-xs">
                                <div class="dash-item fist-dash-item">
                                    <h3 class="item-title w3-text-blue"><i class="fa fa-user"></i><?php echo $_SESSION['LoginUsername']; ?>'s PROFILE</h3>
                                        <div class="profile_pic">
                                          <?php echo "<img src='../StaffPic/$UserImage' alt='Profile Image' class='profilpic'>"; ?>
                                        </div>
                                    <div class="inner-item dash-searc-form">
                                        <?php
                                            $user=$_SESSION['LoginUsername'];
                                            $RCode=$_SESSION['regioncode'];
                                           
                                            $selectuser="SELECT * FROM memberuser Where name='$user'";
                                            $reguderquery=mysqli_query($con,$selectuser);
                                            $reguserdet=mysqli_fetch_array($reguderquery);
                                            $name=$reguserdet['name'];
                                            $phone=$reguserdet['phone'];
                                            $email=$reguserdet['email'];
                                            $role=$reguserdet['role'];

                                            #Select station
                                            $selectstation="SELECT * FROM region WHERE num='$RCode'";
                                            $stationresult=mysqli_query($con,$selectstation);
                                            
                                            $reglist=mysqli_fetch_array($stationresult);
                                            $regname=$reglist['name'];
                                            
                                            
                                        ?>
                                       
                                        <div class="col-md-4 col-lg-6">
                                            <h4><b>Full Name</b>:&nbsp;&nbsp;&nbsp;<?php echo "  "." "." ". $reguserdet['FullName'] ;?></h4>
                                        </div>
                                        <div class="clearfix visible-sm"></div>
                                        <div class="col-md-4 col-lg-6">
                                            
                                            <h4><b>Phone</b>:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo "  "." "." ". $phone;?></h4>
                                        </div>
                                        <div class="clearfix visible-sm"></div>
                                        <div class="col-md-4 col-lg-6">
                                     
                                            <h4><b>Email</b>:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo " ". $email ;?></h4>
                                        </div>
                                        <div class="clearfix visible-sm"></div>
                                        <div class="col-md-4 col-lg-6">
                                        
                                            <h4><b>Role</b>:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $role ;?></h4>
                                        </div>
                                        <div class="col-md-4 col-lg-6">
                                        
                                            <h4><b>Station</b>:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $regname ;?></h4><br> <br>
                                        </div>
                                        <div class="clearfix visible-sm">
                                        </div>
                                        
                                    </div>
                                     <div class="col-sm-3 w3-blue w3-hover-red w3-center">

                                            <a href="index.php" class="submit-btn w3-center">Close</a>
                                     </div>
                                        <div class="clearfix"></div>
                                </div>

                            </div>
                           
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    <!--==============================USER DETAILS ENDS HERE===========================-->
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
