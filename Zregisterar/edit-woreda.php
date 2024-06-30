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
                                <i class="w3-padding w3-animate-fading"><b> EDIT WOREDA STATIONS</b></i>
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
                                        	#GET ZONE AND WOREDA CODE TO IDENTIFY SPECIFIC KEBELE 
                                        	$ZCode=$_SESSION['zonecode'];
          
                      				       		  #GET CURRENT WOREDA NUMBER
                                        	$_SESSION['woredanum']=$_GET['WoId'];
                                        	$WorNum=$_SESSION['woredanum'];

                                        	$selectworeda="SELECT * FROM woreda WHERE num='$WorNum' ";
                                        	$woredaresult=mysqli_query($con,$selectworeda);
                                     
                                     		while ($woredalist=mysqli_fetch_assoc($woredaresult)) {
                                     			    	 $wnum=$woredalist['num'];
                                     			       $wname=$woredalist['name'];
                                     
                                       			 }
                                        	
                                        ?>
                  <div class="w3-container">
                <form action="update-woreda.php?WoId=<?php echo $wnum; ?>" method="POST">
                    <div class="w3-section">
                        <label class="w3-text-blue"> Number</label>
                        <input style="color: black;" class="w3-input  w3-margin-bottom" type="text" maxlength="2" name="wnumber" onkeypress="return (event.charCode>47 && event.charCode<58)" placeholder="Woreda Number" required="" value="<?php echo $wnum; ?>">

                        <label class="w3-text-blue"> Name</label>
                        <input style="color: black;" class="w3-input  w3-margin-bottom" type="text" placeholder="Woreda Name" required="" name="wname" onkeypress="return (event.charCode>64 && event.charCode<91) || (event.charCode>96 && event.charCode<123) || event.charCode==32 " value="<?php echo $wname; ?>">
                        <button class="w3-button  w3-blue w3-btn-block w3-section w3-padding" name="woreda">Update</button>
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
