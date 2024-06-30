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
                                <i class="w3-padding w3-animate-fading"><b>EDIT ZONE STATIONS</b></i>
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
                                        	$_SESSION['zonenum']=$_GET['ZoneNum'];
                                        	$zoneNum=$_SESSION['zonenum'];

                                        	$selectzone="SELECT * FROM zone WHERE num='$zoneNum' ";
                                        	$zoneresult=mysqli_query($con,$selectzone);
                                     
                                     		while ($zonelist=mysqli_fetch_assoc($zoneresult)) {
                                     			           $znum=$zonelist['num'];
                                     			           $wname=$zonelist['name'];
                                     
                                       			 }
                                        	
                                        ?>
             <div class="w3-container">
                <form action="update-zone.php?ZonNum=<?php echo $znum;?>" method="POST">
                    <div class="w3-section">
                        <label class="w3-text-blue">Number</label>
                        <input style="color: black;" class="w3-input  w3-margin-bottom" type="number" name="znumber" placeholder="Zone Number" required="" value="<?php echo $znum;?>">
                        
                        <label class="w3-text-blue">Name</label>
                        <input style="color: black;" class="w3-input  w3-margin-bottom" type="text" placeholder="Zone Name" required="" name="zname" value="<?php echo $wname; ?>">
                        <button class="w3-button w3-blue w3-btn-block w3-section w3-padding" name="zone">Update</button>
                    </div>
                </form>
                <!--===================ZONE UPDATE START HERE=================-->
                <?php
                    if (isset($_POST['zone'])) {

                        echo $zoneName=$_POST['zname'];
                       echo   $znumber=$_POST['znumber'];
                    }
                ?>
                <?php 
                     if(isset($_POST['zone']))
                     {
                        echo "<script>";
                                echo "addZone();";
                        echo "</script>";
                         $zoneName=$_POST['zname'];
                         $znumber=$_POST['znumber'];
                         if(!empty($zoneName)&&!preg_match("/^[A-Za-z]/",$zoneName)){
                            echo "<p class='w3-text-red'>Invalid Zone Name Format!</p>";
                         }
                         else
                         {
                            $check="SELECT * FROM zone where name='$zoneName'|| num='$znumber' ";
                            $count=mysqli_num_rows(mysqli_query($con,$check));
                            if($count==1){
                                echo "<p class='w3-text-red'>Another zone is already registered with zone name <b>$zoneName</b> OR zone number <b>$znumber</b> is already registered with another zone!</p>";
                            }
                            else
                            {
                                $query="INSERT INTO zone (num,name)VALUES('$znumber','$zoneName')";
                            if(mysqli_query($con,$query)){
                                echo "<p class='w3-text-blue w3-center'>Zone $zoneName successfuly  Added with code $znumber<p>";
                            }
                            else
                                echo "something went wrong";
                            }
                            
                                
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
