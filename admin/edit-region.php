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
    <div class="right_col" role="main">
                <!-- top tiles -->
                <div class="row tile_count " style="border-bottom: 5px solid cadetblue; ">
                    <div class="" style="margin-top: 10px;">
                    <span>
                            <h6 class="w3-center item-title w3-round w3-animate-zoom" style="font-size: 50px; color: black; padding: 10px; font-weight: bold;">
                                <i class="w3-padding w3-animate-fading"><b>EDIT REGION</b></i>
                            </h6>
                       </span>                      
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
                      				       		  #GET CURRENT ZONE NUMBER
                                        	$_SESSION['num']=$_GET['rcode'];
                                        	$regNum=$_SESSION['regnum'];

                                        	$selectreg="SELECT * FROM region WHERE num='$regNum' ";
                                        	$regionresult=mysqli_query($con,$selectreg);
                                     
                                     		while ($regionlist=mysqli_fetch_assoc($regionresult)) {
                                     			           $rnum=$regionlist['num'];
                                     			           $rname=$regionlist['name'];
                                     
                                       			 }
                                             #SELECT REGION USER
                                             $selun="SELECT * FROM memberuser WHERE rcode='$regNum' AND role='Rver'";
                                             $userresult=mysqli_query($con,$selun);
                                             $userlist=mysqli_fetch_assoc($userresult);
                                             $fullname=$userlist['FullName'];

                                        	
                                        ?>
                



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
