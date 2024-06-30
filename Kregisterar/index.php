
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
.birth{
    font-size: 80px;
    color: black;
    font-weight: bold;
}
.death{
    font-size: 80px;
    color: black;
    font-weight: bold;
}
.marriage{
    font-size: 80px;
    color: black;
    font-weight: bold;
}
.divorce{
    font-size: 80px;
    color: black;
    font-weight: bold;
}
.adopt{
    font-size: 80px;
    color: black;
    font-weight: bold;
}

</style>
 <?Php
 //session_start();

       include("inc/head.php"); 
        require '../connect.php';

      ?>
      
   <body class="nav-md">
    <div class="container body" >
        <div class="main_container">
     <?php include("inc/slide.php");

      ?>
            <!-- top navigation -->
    <?Php include("inc/navigation.php"); ?>

    <!--==============================USER DETAIL BEGINS HERE==========================-->
   <div class="right_col" role="main">
    <!-- Top tiles -->
    <div class="row tile_count" style="border-bottom: 3px solid cadetblue;">
        <div class="w3-center" style="margin-top: 20px;">
            <span>
                <h6 class="w3-center item-title w3-round w3-animate-zoom" style="font-size: 50px; color: black; padding: 5px; font-weight: bold;">
                    <i class="w3-padding w3-animate-fading"><?php echo "<b>$kname PAGE</b>"; ?></i>
                </h6>
            </span>
        </div>
    </div>

    <!-- Main content begins here -->
    <div class="main-content" id="content-wrapper">
        <div class="container-fluid">
            <?php
                // Retrieve user information to check if they need to change their first password
                $selectUser = "SELECT * FROM memberuser WHERE name='$LoggedInName' AND password='$LoggedInPassword'";
                $SelectResult = mysqli_query($con, $selectUser);
                $userList = mysqli_fetch_assoc($SelectResult);
                $FirstLogin = $userList['firstlogin'];

                if ($FirstLogin == '0') {
                    echo "<script>
                        var ConfirmCheck = confirm('Please Change Your Password. Otherwise You take responsibility for any illegal Actions.');
                        if (ConfirmCheck == true) {
                            document.getElementById('password-modal').style.display = 'block';
                        }
                    </script>";
                }
                // Checking first page change ends here
            ?>

            <!-- Get the number of registered records -->
            <?php
                // Select birth events
                $selectbirth = "SELECT * FROM birthevent WHERE kebele='$KCode' AND woreda='$WCode' AND zone='$ZCode'";
                $birthresult = mysqli_query($con, $selectbirth);
                if ($birthresult) {
                    $countpop = mysqli_num_rows($birthresult);
                }

                // Select death events
                $selectdeath = "SELECT * FROM deathevent WHERE kcode='$KCode' AND wcode='$WCode' AND zcode='$ZCode'";
                $deathresult = mysqli_query($con, $selectdeath);
                if ($deathresult) {
                    $countdeath = mysqli_num_rows($deathresult);
                }

                // Select marriage events
                $selectMarg = "SELECT * FROM marriagevent WHERE wcode='$WCode' AND zcode='$ZCode'";
                $marrgresult = mysqli_query($con, $selectMarg);
                if ($marrgresult) {
                    $countMarr = mysqli_num_rows($marrgresult);
                }

                // Select divorce events
                $selectdivorce = "SELECT * FROM divorceevent WHERE kcode='$KCode' AND wcode='$WCode' AND zcode='$ZCode'";
                $divorceresult = mysqli_query($con, $selectdivorce);
                if ($divorceresult) {
                    $countdiv = mysqli_num_rows($divorceresult);
                }

                // Select adoption events
                $selectadopt = "SELECT * FROM adoptevent WHERE kcode='$KCode' AND wcode='$WCode' AND zcode='$ZCode'";
                $adoptresult = mysqli_query($con, $selectadopt);
                if ($adoptresult) {
                    $countadopt = mysqli_num_rows($adoptresult);
                }
            ?>

            <!-- Counters section -->
            <div id="fh5co-counter" class="fh5co-counters fh5co-light-grey">
                <div class="row animate-box">

                    <!-- Birth events counter -->
                    <div class="col-lg-4 col-md-12">
                        <div class="panel w3-cyan">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-4">
                                        <i class="fa fa-birthday-cake fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $countpop; ?></div>
                                        <div>Birth</div>
                                    </div>
                                </div>
                            </div>
                            <a href="register-birth-event.php">
                                <div class="panel-footer">
                                    <span class="pull-left">ADD BIRTH EVENT</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <!-- Marriage events counter -->
                    <div class="col-lg-4 col-md-6">
                        <div class="panel w3-green w3-text-black">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-4">
                                        <i class=" fa fa-heart fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $countMarr; ?></div>
                                        <div>Marriage</div>
                                    </div>
                                </div>
                            </div>
                            <a href="register-marriage-event.php">
                                <div class="panel-footer">
                                    <span class="pull-left">ADD MARRIAGE EVENT</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <!-- Death events counter -->
                    <div class="col-lg-4 col-md-6">
                        <div class="panel w3-orange w3-text-black">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-4">
                                        <i class="fa fa-bed fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $countdeath; ?></div>
                                        <div>Death</div>
                                    </div>
                                </div>
                            </div>
                            <a href="register-death-event.php">
                                <div class="panel-footer">
                                    <span class="pull-left">ADD DEATH EVENT</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <!-- Divorce events counter -->
                    <div class="col-lg-4 col-md-6">
                        <div class="panel w3-red w3-text-black">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-4">
                                        <i class="fa fa-ban fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $countdiv; ?></div>
                                        <div>Divorce</div>
                                    </div>
                                </div>
                            </div>
                            <a href="register-divorce-event.php">
                                <div class="panel-footer">
                                    <span class="pull-left">ADD DIVORCE EVENT</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <!-- Adoption events counter -->
                    <div class="col-lg-4 col-md-6">
                        <div class="panel w3-pink w3-text-black">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-4">
                                        <i class="fa fa-child fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?php echo $countadopt; ?></div>
                                        <div>Adoption</div>
                                    </div>
                                </div>
                            </div>
                            <a href="register-adoption-event.php">
                                <div class="panel-footer">
                                    <span class="pull-left">ADD ADOPTION EVENT</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <!-- User profile -->
                    <div class="col-lg-4 col-md-6">
                        <div class="panel w3-indigo w3-text-black">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-4">
                                        <i class="fa fa-user fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">User</div>
                                        <div>Profile</div>
                                    </div>
                                </div>
                            </div>
                            <a href="detail.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

    <!--==============================USER DETAILS ENDS HERE===========================-->


    <!-- Footer============================-->

        <?Php include("inc/footer.php"); ?>
        
            <!--=====-->
            <script src="js/jquery.min.js"></script>
            <script src="js/jquery-1.9.1.min.js"></script>
              <!-- Bootstrap -->
           <script src="js/bootstrap.min.js"></script>
           <!-- Custom Theme Scripts -->
            <script src="js/custom.min.js"></script>
            <!---======-->

            
            <!-- jQuery Easing -->
            <script src="js1/jquery.easing.1.3.js"></script>
            <!-- Bootstrap -->
         
            <!-- Waypoints -->
            <script src="js1/jquery.waypoints.min.js"></script>
            <!-- Flexslider -->
            <script src="js1/jquery.flexslider-min.js"></script>
            <!-- Carousel -->
            <script src="js1/owl.carousel.min.js"></script>
            <!-- Magnific Popup -->
            <script src="js1/jquery.magnific-popup.min.js"></script>
            <script src="js1/magnific-popup-options.js"></script>
            <!-- Counters -->
            <script src="js1/jquery.countTo.js"></script>
            <!-- Main -->
            <script src="js1/main.js"></script>

</body>

</html
