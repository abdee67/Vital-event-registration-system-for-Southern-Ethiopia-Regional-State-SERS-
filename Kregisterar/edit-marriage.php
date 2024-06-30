
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
                    <div class="col-md-4" style="margin-top: 10px;">
                    <span ><h2 class="w3-center" style="font-size: 30px; color: black;"><?php echo "<b>EDIT MARRIAGE</b>";?> </h2></span>
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
                                          $_SESSION['marriagenum']=$_GET['EditMarg'] ;
                                          $MarrNum= $_SESSION['marriagenum'];

                                          $selectmarriage="SELECT * FROM marriagevent WHERE marriagenum='$MarrNum'";
                                        	  $marriageresult=mysqli_query($con,$selectmarriage);
                                        	while ($marriagelist=mysqli_fetch_assoc($marriageresult)) {
                                            #WIFE
                                            $WBirthNum=$marriagelist['wbirthnum'];
                                            $WFName=$marriagelist['wfname'];
                                            $WMName=$marriagelist['wmname'];
                                            $WLName=$marriagelist['wlname'];
                                            $WSex=$marriagelist['wsex'];
                                            $WNationality=$marriagelist['wnationality'];
                                            $WReligion=$marriagelist['wreligion'];
                                            $WJob=$marriagelist['wjob'];
                                            #HUSBAND
                                            $HBirthNum=$marriagelist['hbirthnum'];
                                            $HFName=$marriagelist['hfname'];
                                            $HMName=$marriagelist['hmname'];
                                            $HLName=$marriagelist['hlname'];
                                            $HSex=$marriagelist['hsex'];
                                            $HNationality=$marriagelist['hnationality'];
                                            $HReligion=$marriagelist['hreligion'];
                                            $HJob=$marriagelist['hjob'];

                                            $WRFName01=$marriagelist['wreferencefname1'];
                                            $WRFName02=$marriagelist['wreferencefname2'];
                                            $HRFName01=$marriagelist['hreferencefname1'];
                                            $HRFName02=$marriagelist['hreferencefname2'];

                                            $Marriage_ID=$marriagelist['marriagenum'];

                                            
                                        }
                                        ?>
   <!--===================Marriage Event form begin here==============================-->
   <div class="container-fluid">
    <form action="update-marriage.php?MId=<?php echo $Marriage_ID ?>" method="POST" enctype="multipart/form-data">
        <div class="row">
            <!-- Column for wife information -->
            <div class="col-md-4">
            <i class="fa fa-female" style="font-size:36px;color: red;"></i> <label class="w3-text-black"><h3 class="w3-text-black"><b>Wife's Information</b></h3></label><i class="fa fa-female" style="font-size:36px;color: red;"></i>
                <br>
                <label class="w3-text-black">First Name</label>
                <input type="text" class="w3-input w3-hover-blue w3-text-black" name="wfname" required="" value="<?php echo $WFName; ?>">
                <?php 
                if(isset($_POST['updatemarriage']) && !preg_match("/^[A-Za-z]/", $WifeFName)){
                    echo "<p class='w3-text-red w3-center'>Invalid Format of Wife's First Name</p>";
                }
                ?>
                <label class="w3-text-black">Middle Name</label>
                <input type="text" class="w3-input w3-hover-blue w3-text-black" name="wmname" required="" value="<?php echo $WMName; ?>">
                <?php 
                if(isset($_POST['updatemarriage']) && !preg_match("/^[A-Za-z]/", $WifeMName)){
                    echo "<p class='w3-text-red w3-center'>Invalid Format of Wife's Middle Name</p>";
                }
                ?>
                <label class="w3-text-black">Last Name</label>
                <input type="text" class="w3-input w3-hover-blue w3-text-black" name="wlname" required="" value="<?php echo $WLName; ?>">
                <?php 
                if(isset($_POST['updatemarriage']) && !preg_match("/^[A-Za-z]/", $WifeLName)){
                    echo "<p class='w3-text-red w3-center'>Invalid Format of Wife's Last Name</p>";
                }
                ?>
                <label class="w3-text-black">Sex</label>
                <input type="text" name="wsex" class="w3-input w3-hover-blue w3-text-black" readonly="" value="<?php echo $WSex; ?>">
                <label class="w3-text-black">Nationality</label>
                <input type="text" class="w3-input w3-hover-blue w3-text-black" name="wnationality" required="" value="<?php echo $WNationality; ?>">
                <label class="w3-text-black">Religion</label>
                <input type="text" name="wreligion" class="w3-input w3-hover-blue w3-text-black" readonly="" value="<?php echo $WReligion; ?>">
                <label class="w3-text-black">Job</label>
                <input type="text" class="w3-input w3-hover-blue w3-text-black" name="wjob" required="" value="<?php echo $WJob; ?>">
            </div>
            <!-- Column for husband information -->
            <div class="col-md-4">
            <i class="fa fa-male" style="font-size:36px;color: blue;"></i> <label class="w3-text-black"><h3 class="w3-text-black"><b>Husband's Information</b></h3></label><i class="fa fa-male" style="font-size:36px;color: blue;"></i>
                <br>
                <label class="w3-text-black">First Name</label>
                <input type="text" class="w3-input w3-hover-blue w3-text-black" name="hfname" required="" value="<?php echo $HFName; ?>">
                <?php 
                if(isset($_POST['updatemarriage']) && !preg_match("/^[A-Za-z]/", $HusbandFName)){
                    echo "<p class='w3-text-red w3-center'>Invalid Format of Husband's First Name</p>";
                }
                ?>
                <label class="w3-text-black">Middle Name</label>
                <input type="text" class="w3-input w3-hover-blue w3-text-black" name="hmname" required="" value="<?php echo $HMName; ?>">
                <?php 
                if(isset($_POST['updatemarriage']) && !preg_match("/^[A-Za-z]/", $HusbandMName)){
                    echo "<p class='w3-text-red w3-center'>Invalid Format of Husband's Middle Name</p>";
                }
                ?>
                <label class="w3-text-black">Last Name</label>
                <input type="text" class="w3-input w3-hover-blue w3-text-black" name="hlname" required="" value="<?php echo $HLName; ?>">
                <?php 
                if(isset($_POST['updatemarriage']) && !preg_match("/^[A-Za-z]/", $HusbandLName)){
                    echo "<p class='w3-text-red w3-center'>Invalid Format of Husband's Last Name</p>";
                }
                ?>
                <label class="w3-text-black">Sex</label>
                <input type="text" name="hsex" class="w3-input w3-hover-blue w3-text-black" readonly="" value="<?php echo $HSex; ?>">
                <label class="w3-text-black">Nationality</label>
                <input type="text" class="w3-input w3-hover-blue w3-text-black" name="hnationality" required="" value="<?php echo $HNationality; ?>">
                <label class="w3-text-black">Religion</label>
                <input type="text" name="hreligion" class="w3-input w3-hover-blue w3-text-black" readonly="" value="<?php echo $HReligion; ?>">
                <label class="w3-text-black">Job</label>
                <input type="text" class="w3-input w3-hover-blue w3-text-black" name="hjob" required="" value="<?php echo $HJob; ?>">
            </div>
            <!-- Column for marriage information -->
            <div class="col-md-4">
            <i class="fa fa-users" style="font-size:36px;color: green;"></i> <label class="w3-text-black"><h3 class="w3-text-black"><b>Marriage Info</b></h3></label><i class="fa fa-users" style="font-size:36px;color: green;"></i>
                <br>
                <ol type="A">
                    <li><b>Wife's Reference Persons</b></li>
                    <label class="w3-text-black">Wife Reference 1 Full Name</label>
                    <input type="text" class="w3-input w3-hover-blue w3-text-black" name="wrfname1" value="<?php echo $WRFName01; ?>">
                    <label class="w3-text-black">Wife Reference 2 Full Name</label>
                    <input type="text" class="w3-input w3-hover-blue w3-text-black" name="wrfname2" value="<?php echo $WRFName02; ?>">
                    <li><b>Husband's Reference Persons</b></li>
                    <label class="w3-text-black">Husband Reference 1 Full Name</label>
                    <input type="text" class="w3-input w3-hover-blue w3-text-black" name="hrfname1" value="<?php echo $HRFName01; ?>">
                    <label class="w3-text-black">Husband Reference 2 Full Name</label>
                    <input type="text" class="w3-input w3-hover-blue w3-text-black" name="hrfname2" value="<?php echo $HRFName02; ?>">
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 text-center">
                <input type="submit" class="form-control btn btn-sm w3-blue" value="Update" name="updatemarriage">
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
