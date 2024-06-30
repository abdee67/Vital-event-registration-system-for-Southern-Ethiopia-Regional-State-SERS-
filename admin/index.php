
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
<link rel="stylesheet" href="../style.css">
	 	<link rel="stylesheet" href="bootstrap/css/bootstrap.css"> 
		<link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="font-awesome/css/font-awesome.css">
 <?Php
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
    <!-- top tiles -->
    <div class="row tile_count" style="border-bottom: 3px solid cadetblue;">
        <div class="w3-center" style="margin-top: 20px;">
            <span>
                <h6 class="w3-center item-title w3-round w3-animate-zoom" style="font-size: 50px; color: black; padding: 5px; font-weight: bold;">
                    <i class="w3-padding w3-animate-fading"><b>ADMIN PAGE</b></i>
                </h6>
            </span>
        </div>
    </div>
    <!-- Begin main content -->
    <div class="main-content" id="content-wrapper">
        <div class="container-fluid">
            <!-- Get the number of registered records -->
            <?php
                $regcode = "04";
                $selectbirth = "SELECT * FROM birthevent WHERE region='$regcode'";
                $birthresult = mysqli_query($con, $selectbirth);
                $countpop = ($birthresult) ? mysqli_num_rows($birthresult) : 0;

                $selectdeath = "SELECT * FROM deathevent WHERE rcode='$regcode'";
                $deathresult = mysqli_query($con, $selectdeath);
                $countdeath = ($deathresult) ? mysqli_num_rows($deathresult) : 0;

                $selectMarg = "SELECT * FROM marriagevent WHERE rcode='$regcode'";
                $marrgresult = mysqli_query($con, $selectMarg);
                $countMarr = ($marrgresult) ? mysqli_num_rows($marrgresult) : 0;

                $selectdivorce = "SELECT * FROM divorceevent WHERE rcode='$regcode'";
                $divorceresult = mysqli_query($con, $selectdivorce);
                $countdiv = ($divorceresult) ? mysqli_num_rows($divorceresult) : 0;

                $selectadopt = "SELECT * FROM adoptevent WHERE rcode='$regcode'";
                $adoptresult = mysqli_query($con, $selectadopt);
                $countadopt = ($adoptresult) ? mysqli_num_rows($adoptresult) : 0;
            ?>
            <!-- Begin counters -->
            <div id="fh5co-counter" class="fh5co-counters fh5co-light-grey">
                <div class="row animate-box">
                    <!-- Birth Panel -->
                    <div class="col-lg-4 col-md-6">
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
                    <!-- Marriage Panel -->
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
                    <!-- Death Panel -->
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
                    <!-- Divorce Panel -->
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
                    <!-- Adoption Panel -->
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
                    <!-- User Profile Panel -->
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
                    <!-- View Users Panel -->
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
                            <a href="view-user.php">
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
