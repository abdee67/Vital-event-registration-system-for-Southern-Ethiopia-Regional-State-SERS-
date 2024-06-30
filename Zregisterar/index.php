
<style type="text/css">
    
.dash-item {
    margin-top: 30px;
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
       include("inc/head.php"); 
        require '../connect.php';

      ?>
      
      <body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <?php 
            include("inc/slide.php");
            include("inc/navigation.php"); 
            ?>

            <div class="right_col" role="main">
                <div class="row tile_count" style="border-bottom: 3px solid cadetblue;">
                    <div class="w3-center" style="margin-top: 20px;">
                        <span>
                            <h6 class="w3-center item-title w3-round w3-animate-zoom" style="font-size: 50px; color: black; padding: 10px; font-weight: bold;">
                                <i class="w3-padding w3-animate-fading"><?php echo "<b>$zonename ZONE</b>"; ?></i>
                            </h6>
                        </span>
                    </div>
                </div>

                <div class="main-content" id="content-wrapper">
                    <div class="container-fluid">
                        <?php
                        $selectUser = "SELECT * FROM memberuser WHERE name='$LoggedInName' AND password='$LoggedInPassword'";
                        $SelectResult = mysqli_query($con, $selectUser);
                        $userList = mysqli_fetch_assoc($SelectResult);
                        $FirstLogin = $userList['firstlogin'];
                        if ($FirstLogin == '0') {
                            echo "<script> 
                            var ConfirmCheck = confirm('Please Change Your Password. Otherwise, you take responsibility for any illegal actions.');
                            if (ConfirmCheck == true) {
                                document.getElementById('password-modal').style.display = 'block';
                            }
                            </script>";
                        }
                        ?>

                        <?php
                        $selectbirth = "SELECT * FROM birthevent WHERE zone='$ZCode'";
                        $birthresult = mysqli_query($con, $selectbirth);
                        $countpop = mysqli_num_rows($birthresult);

                        $selectdeath = "SELECT * FROM deathevent WHERE zcode='$ZCode'";
                        $deathresult = mysqli_query($con, $selectdeath);
                        $countdeath = mysqli_num_rows($deathresult);

                        $selectMarg = "SELECT * FROM marriagevent WHERE zcode='$ZCode'";
                        $marrgresult = mysqli_query($con, $selectMarg);
                        $countMarr = mysqli_num_rows($marrgresult);

                        $selectdivorce = "SELECT * FROM divorceevent WHERE zcode='$ZCode'";
                        $divorceresult = mysqli_query($con, $selectdivorce);
                        $countdiv = mysqli_num_rows($divorceresult);

                        $selectadopt = "SELECT * FROM adoptevent WHERE zcode='$ZCode'";
                        $adoptresult = mysqli_query($con, $selectadopt);
                        $countadopt = mysqli_num_rows($adoptresult);
                        ?>

                        <div id="fh5co-counter" class="fh5co-counters fh5co-light-grey">
                            <div class="row animate-box">
                                <div class="row animate-box">
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
                                            <a href="view-birth.php">
                                                <div class="panel-footer">
                                                    <span class="pull-left">View Details</span>
                                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 col-md-6">
                                        <div class="panel w3-green w3-text-black">
                                            <div class="panel-heading">
                                                <div class="row">
                                                    <div class="col-xs-4">
                                                        <i class="fa fa-heart fa-5x"></i>
                                                    </div>
                                                    <div class="col-xs-9 text-right">
                                                        <div class="huge"><?php echo $countMarr; ?></div>
                                                        <div>Marriage</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="view-marriage.php">
                                                <div class="panel-footer">
                                                    <span class="pull-left">View Details</span>
                                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>

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
                                            <a href="view-death.php">
                                                <div class="panel-footer">
                                                    <span class="pull-left">View Details</span>
                                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>

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
                                            <a href="view-divorce.php">
                                                <div class="panel-footer">
                                                    <span class="pull-left">View Details</span>
                                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>

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
                                            <a href="view-adoption.php">
                                                <div class="panel-footer">
                                                    <span class="pull-left">View Details</span>
                                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>

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

                                    <div class="col-lg-4 col-md-6">
                                        <div class="panel w3-purple w3-text-black">
                                            <div class="panel-heading">
                                                <div class="row">
                                                    <div class="col-xs-4">
                                                        <i class="fa fa-eye fa-5x"></i>
                                                    </div>
                                                    <div class="col-xs-9 text-right">
                                                        <div class="huge">View</div>
                                                        <div>Users</div>
                                                    </div>
                                                </div>
                                            </div>
                                            <a href="view-woreda-user.php">
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
            </div>
        </div>
    </div>


    <!--==============================USER DETAILS ENDS HERE===========================-->


    <!-- Footer============================-->

    <?php
 include("inc/footer.php");
?>
        
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
