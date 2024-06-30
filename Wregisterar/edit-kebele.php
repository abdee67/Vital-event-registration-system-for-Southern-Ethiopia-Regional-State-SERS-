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

    <!--=============================EDiT KEbele==========================-->
    <div class="right_col" role="main"  style="background-color: <?php if(isset($col)){echo $col;} ?>;">
                <!-- top tiles -->
                <div class="row tile_count " style="border-bottom: 5px solid cadetblue; ">
                    <div class="" style="margin-top: 10px;">
                    <span ><h2 class="w3-center" style="font-size: 30px; color: black;"><?php echo "<b> EDIT KEBELE USER</b>";?> </h2></span>
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

                      						#GET CURRENT KEBELE NUMBER
                                        	$_SESSION['kebelnum']=$_GET['kebID'];
                                        	$KebNum=$_SESSION['kebelnum'];

                                        	$selectkebele="SELECT * FROM Kebele WHERE num='$KebNum' ";
                                        	$kebeleresult=mysqli_query($con,$selectkebele);
                                     
                                     		while ($kebelelist=mysqli_fetch_assoc($kebeleresult)) {
                                     				 $knum=$kebelelist['num'];
                                     			     $kname=$kebelelist['name'];
                                     
                                       			 }
                                        	
                                        ?>
        	   			  <div class="w3-container">
            	 			   <form action="update-kebele.php?KebId=<?php echo $knum;?>" method="POST">
                 	  			 <div class="w3-section">

                      			  <input style="color: black;" class="w3-input w3-border w3-margin-bottom" type="text" name="knumber" maxlength="2" placeholder="Kebele Number" onkeypress="return (event.charCode>47 && event.charCode<58)" required="" value="<?php echo $knum; ?>">
                        
                        		 <input style="color: black;" class="w3-input w3-border w3-margin-bottom" type="text" placeholder="Kebele Name" required="" name="kname" value="<?php echo $kname; ?>">
                      		
                      		 	  <button class="w3-button w3-blue w3-btn-block w3-section w3-padding" name="kebele">Update</button>
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
