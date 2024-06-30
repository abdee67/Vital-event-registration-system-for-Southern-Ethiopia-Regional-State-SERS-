
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
                    <div class="col-md-4" style="margin-top: 10px;">
                    <span ><h2 class="w3-center" style="font-size: 30px; color: black;"><?php echo "<b>EDIT BIRTH</b>";?> </h2></span>
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

                                            $_SESSION['birthnumber']=$_GET['GetId'] ;

                                            $BirthID= $_SESSION['birthnumber'];
                                            $selectbirth="SELECT * FROM birthevent WHERE eventnumber='$BirthID'";
                                        	$birthresult=mysqli_query($con,$selectbirth);
                                        	while ($birthlist=mysqli_fetch_assoc($birthresult)) {
                                        
                                       		 $Birth_ID=$birthlist['eventnumber'];
                                       		 $FirstName=$birthlist['fname'];
                                        	 $MiddleName=$birthlist['mname'];
                                        	 $LastName=$birthlist['lname'];
                                        	 $MoName=$birthlist['momName'];
                                             $Dob=$birthlist['day'];
                                        	 $Sex=$birthlist['sex'];
                                        	 $Nationality=$birthlist['nationality'];
                                        	 $Weight=$birthlist['weight'];
                                        	 $Blood=$birthlist['blood'];
                                        	 $Regtype=$birthlist['regtype'];
                                        }
                                        	
                                        	
                                        ?>
               <div class="container-fluid">
    <form action="updatebirth.php?ID=<?php echo $Birth_ID ?>" method="POST" enctype="multipart/form-data">
        <div class="row">
            <!-- First column -->
            <div class="col-md-6">
                <label class="w3-text-black">First Name</label>
                <input type="text" class="w3-input w3-hover-blue w3-text-black" placeholder="Enter first name here" name="childfname" required="" value="<?php echo $FirstName; ?>">
                <?php 
                if(isset($_POST['updaterecord']) && !preg_match("/^[A-Za-z]/", $ChildFNAme)){
                    echo"<p class='w3-text-red w3-center'>Invalid Format of Child First Name</p>";
                }
                ?>
                
                <label class="w3-text-black">Middle Name</label>
                <input type="text" class="w3-input w3-hover-blue w3-text-black" placeholder="Enter middle name here" name="childmname" required="" value="<?php echo $MiddleName; ?>">
                <?php 
                if(isset($_POST['updaterecord']) && !preg_match("/^[A-Za-z]/", $ChildMName)){
                    echo"<p class='w3-text-red w3-center'>Invalid Format of Child Middle Name</p>";
                }
                ?>
                
                <label class="w3-text-black">Last Name</label>
                <input type="text" class="w3-input w3-hover-blue w3-text-black" placeholder="Enter last name here" name="childlname" required="" value="<?php echo $LastName; ?>">
                <?php 
                if(isset($_POST['updaterecord']) && !preg_match("/^[A-Za-z]/", $ChildLName)){
                    echo"<p class='w3-text-red w3-center'>Invalid Format of Child Last Name</p>";
                }
                ?>
                
                <label class="w3-text-black">Sex</label>
                <input type="text" readonly class="w3-input w3-hover-blue w3-text-black" name="sex" value="<?php echo $Sex; ?>">
                
                <label class="w3-text-black">Nationality</label>
                <input type="text" class="w3-input w3-hover-blue w3-text-black" placeholder="Nationality" name="chnationality" required="" value="<?php echo $Nationality; ?>">
                
                <input type="submit" class="form-control btn btn-sm w3-blue" value="Update" name="updaterecord">
            </div>
            
            <!-- Second column -->
            <div class="col-md-6">
                <label class="w3-text-black">Mother Name</label>
                <input type="text" class="w3-input w3-hover-blue w3-text-black" placeholder="Mother Full Name" name="motherfname" required="" value="<?php echo $MoName; ?>">
                <?php 
                if(isset($_POST['updaterecord']) && !preg_match("/^[A-Za-z]/", $ChildMother)){
                    echo"<p class='w3-text-red w3-center'>Invalid Format of Child Mother Name</p>";
                }
                ?>
                
                <label class="w3-text-black">Kebele</label>
                <input readonly type="text" class="w3-input w3-hover-blue w3-text-black" placeholder="Place of birth" name="chbplace" required="" value="<?php if(isset($KCode))echo $KCode; ?>">
                
                <label class="w3-text-black">Weight</label>
                <input type="number" readonly class="w3-input w3-hover-blue w3-text-black" placeholder="Weight of a child" name="chweight" required="" value="<?php echo $Weight; ?>">
                
                <label class="w3-text-black">Reg Type</label>
                <input type="text" readonly class="w3-input w3-hover-blue w3-text-black" name="chregtype" value="<?php echo $Regtype; ?>">
                
                <label class="w3-text-black">Blood Type</label>
                <input type="text" readonly class="w3-input w3-hover-blue w3-text-black" value="<?php echo $Blood; ?>">
                
                <label class="w3-text-black">Date of Birth</label>
                <input type="text" readonly class="w3-input w3-hover-blue w3-text-black" name="chdob" value="<?php echo $Dob; ?>">
            </div>
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
