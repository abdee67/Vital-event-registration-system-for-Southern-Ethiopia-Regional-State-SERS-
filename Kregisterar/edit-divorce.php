
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
                    <span ><h2 class="w3-center" style="font-size: 30px; color: black;"><?php echo "<b>EDIT DIVORCE</b>";?> </h2></span>
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
                                        $_SESSION['divorcenum']=$_GET['DivID'] ;
                                        $DivorceID= $_SESSION['divorcenum'];

                                        $selectdivorce="SELECT * FROM divorceevent WHERE dveventnum='$DivorceID'";
                                        $divorceresult=mysqli_query($con,$selectdivorce);
                                        
                                        while ($divorcelist=mysqli_fetch_assoc($divorceresult)) {
                                            #WIFE INFORMATION
                                            $WifeFNameDv=$divorcelist['wfnamedv'];
                                            $WifeMNameDv=$divorcelist['wmnamedv'];
                                            $WifeLNameDv=$divorcelist['wlnamedv'];
                                            $WifeNationDv=$divorcelist['wnationalitydv'];
                                            $WifeReligionDv=$divorcelist['wreligiondv'];
                                            $WifeJob=$divorcelist['wjobdv'];


                                            #HUSBAND INFORMATION
                                            $HusbandFNameDv=$divorcelist['hfnamedv'];
                                            $HusbandMNameDv=$divorcelist['hmnamedv'];
                                            $HusbandLNameDv=$divorcelist['hlnamedv'];
                                            $HusbandNationDv=$divorcelist['hnationalitydv'];
                                            $HusbandReligionDv=$divorcelist['hreligiondv'];
                                            $HusbandJob=$divorcelist['hjobdv'];

                                            $DvPlace=$divorcelist['placedv'];
                                            $ChildNum=$divorcelist['childnum'];
                                            $ReasonDv=$divorcelist['reasondv'];
                                            $CourtName=$divorcelist['courtnamedv'];
                                            $Datedv=$divorcelist['daydv'];

                                            $DvNum=$divorcelist['dveventnum'];
                                            $Marrg=$divorcelist['marriagenum'];

                                        }
                                        ?>
                <div class="container-fluid">
    <form action="update-divorce.php?UpdateIdDV=<?php echo $DvNum; ?>" method="POST" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-4">
                <i class="fa fa-female" style="font-size:36px;color: red;"></i> <label class="w3-text-black"><h3 class="w3-text-black"><b>Wife's Info</b></h3></label><i class="fa fa-female" style="font-size:36px;color: red;"></i>
                <br>
                <label class="w3-text-black">First Name</label>
                <input type="text" class="w3-input w3-hover-blue w3-text-black" name="wdvfname" required="" value="<?php echo $WifeFNameDv; ?>">
                <?php 
                    if(isset($_POST['updatedivorce']) && !preg_match("/^[A-Za-z]/",$WifeDvFName)){
                        echo"<p class='w3-text-red w3-center'>Invalid Format of first name !!</p>";
                    }
                ?>
                <label class="w3-text-black">Middle Name</label>
                <input type="text" class="w3-input w3-hover-blue w3-text-black" name="wdvmname" required="" value="<?php echo $WifeMNameDv; ?>">
                <?php 
                    if(isset($_POST['updatedivorce']) && !preg_match("/^[A-Za-z]/",$WifeDvMName)){
                        echo"<p class='w3-text-red w3-center'>Invalid Format of middle name !!</p>";
                    }
                ?>
                <label class="w3-text-black">Last Name</label>
                <input type="text" class="w3-input w3-hover-blue w3-text-black" name="wdvlname" required="" value="<?php echo $WifeLNameDv; ?>">
                <?php 
                    if(isset($_POST['updatedivorce']) && !preg_match("/^[A-Za-z]/",$WifeDvLName)){
                        echo"<p class='w3-text-red w3-center'>Invalid Format of Last name !!</p>";
                    }
                ?>
                <label class="w3-text-black">Nationality</label>
                <input type="text" class="w3-input w3-hover-blue w3-text-black" name="wdvnationality" required="" value="<?php echo $WifeNationDv; ?>">
                <?php 
                    if(isset($_POST['updatedivorce']) && !preg_match("/^[A-Za-z]/",$WifeDvJob)){
                        echo"<p class='w3-text-red w3-center'>Invalid Format of Job!!</p>";
                    }
                ?>
                <label class="w3-text-black">Religion</label>
                <select class="w3-input w3-hover-blue w3-text-black" name="wdvreligion">
                    <option>Choose Religion here...</option>
                    <option>Orthodox</option>
                    <option>Protestant</option>
                    <option>Catholic</option>
                    <option>Islam</option>
                    <option>Others</option>
                </select>
                <?php 
                    if(isset($_POST['updatedivorce']) && $WifeDvReligion=="Choose Religion here..."){
                        echo"<p class='w3-text-red w3-center'>Please choose a Religion !!</p>";
                    }
                ?>
                <label class="w3-text-black">Job</label>
                <input type="text" class="w3-input w3-hover-blue w3-text-black" name="wdvjob" required="" value="<?php echo $WifeJob; ?>">
                <?php 
                    if(isset($_POST['updatedivorce']) && !preg_match("/^[A-Za-z]/",$WifeDvJob)){
                        echo"<p class='w3-text-red w3-center'>Invalid Format of Job!!</p>";
                    }
                ?>
            </div>
            <!--Column 2-->
            <div class="col-md-4">
                <i class="fa fa-male" style="font-size:36px;color: red;"></i> <label class="w3-text-black"><h3 class="w3-text-black"><b>Husband's Info</b></h3></label><i class="fa fa-male" style="font-size:36px;color: red;"></i>
                <br>                              
                <label class="w3-text-black">First Name</label>
                <input type="text" class="w3-input w3-hover-blue w3-text-black" name="hdvfname" required="" value="<?php echo $HusbandFNameDv; ?>">
                <?php 
                    if(isset($_POST['updatedivorce']) && !preg_match("/^[A-Za-z]/",$HusbandDvFName)){
                        echo"<p class='w3-text-red w3-center'>Invalid Format of Husband first name !!</p>";
                    }
                ?>
                <label class="w3-text-black">Middle Name</label>
                <input type="text" class="w3-input w3-hover-blue w3-text-black" name="hdvmname" required="" value="<?php echo $HusbandMNameDv; ?>">
                <?php 
                    if(isset($_POST['updatedivorce']) && !preg_match("/^[A-Za-z]/",$HusbandDvMName)){
                        echo"<p class='w3-text-red w3-center'>Invalid Format of Husband middle name!!</p>";
                    }
                ?>
                <label class="w3-text-black">Last Name</label>
                <input type="text" class="w3-input w3-hover-blue w3-text-black" name="hdvlname" required="" value="<?php echo $HusbandLNameDv; ?>">
                <?php 
                    if(isset($_POST['updatedivorce']) && !preg_match("/^[A-Za-z]/",$HusbandDVLName)){
                        echo"<p class='w3-text-red w3-center'>Invalid Format of Husband last name!!</p>";
                    }
                ?>
                <label class="w3-text-black">Nationality</label>
                <input type="text" class="w3-input w3-hover-blue w3-text-black" name="hdvnationality" required="" value="<?php echo $HusbandNationDv; ?>">
                <?php 
                    if(isset($_POST['updatedivorce']) && !preg_match("/^[A-Za-z]/",$HusbandDvNationality)){
                        echo"<p class='w3-text-red w3-center'>Invalid Format of nationality !!</p>";
                    }
                ?>
                <label class="w3-text-black">Religion</label>
                <select class="w3-input w3-hover-blue w3-text-black" name="hdvreligion" required="">
                    <option>Choose Religion here...</option>
                    <option>Orthodox</option>
                    <option>Protestant</option>
                    <option>Catholic</option>
                    <option>Islam</option>
                    <option>Others</option>
                </select>
                <?php 
                    if(isset($_POST['updatedivorce']) && $HusbandDvReligion=="Choose Religion here..."){
                        echo"<p class='w3-text-red w3-center'>Please choose Religion !!</p>";
                    }
                ?>
                <label class="w3-text-black">Job</label>
                <input type="text" class="w3-input w3-hover-blue w3-text-black" name="hdvjob" required="" value="<?php echo $HusbandJob; ?>">
                <?php 
                    if(isset($_POST['updatedivorce']) && !preg_match("/^[A-Za-z]/",$HusbandDvJob)){
                        echo"<p class='w3-text-red w3-center'>Invalid Format of Job!!</p>";
                    }
                ?>
                <br>
                <button class="form-control w3-dark-grey btn btn-sm w3-hover-blue" name="updatedivorce"> <i class="fa fa-check-square-o"></i> &nbsp; &nbsp; Update</button>
            </div>
            <!--Column 3 begin-->
            <div class="col-md-4">
                <i class="fa fa-heartbeat" style="font-size:36px;color: red;"></i><label class="w3-text-black"><h3 class="w3-text-black"><b>Divorce Info</b></h3></label><i class="fa fa-heartbeat" style="font-size:36px;color: red;"></i>
                <br>
                <label class="w3-text-black">Kebele</label>
                <input type="text" class="w3-input w3-hover-blue w3-text-black" name="dvplace" required="" value="<?php echo $KCode; ?>"> 
                <?php 
                    if(isset($_POST['updatedivorce']) && !preg_match("/^[A-Za-z]/",$DivorcePlace)){
                        echo"<p class='w3-text-red w3-center'>Invalid Format of place !!</p>";
                    }
                ?>
                <label class="w3-text-black">Number of Children</label>
                <input type="number" class="w3-input w3-hover-blue w3-text-black" name="dvchildnum" required="" min="0" value="<?php echo $ChildNum; ?>">  
               
                <label class="w3-text-black">Divorce reason</label>
                <input type="text" class="w3-input w3-hover-blue w3-text-black" name="dvreason" required="" value="<?php echo $ReasonDv; ?>">
                <?php 
                    if(isset($_POST['updatedivorce']) && !preg_match("/^[A-Za-z]/",$DivorceReason)){
                        echo"<p class='w3-text-red w3-center'>Invalid Format of reason !!</p>";
                    }
                ?>
                <label class="w3-text-black">Divorce Place</label>
                <input type="text" class="w3-input w3-hover-blue w3-text-black" name="dvcourtname" required="" value="<?php echo $CourtName; ?>">
                <?php 
                    if(isset($_POST['updatedivorce']) && !preg_match("/^[A-Za-z]/",$DivorceCourtName)){
                        echo"<p class='w3-text-red w3-center'>Invalid Format of court name!!</p>";
                    }
                ?>
                <span><label class="w3-text-black">Divorce Date</label></span>
                <input type="date" class="w3-input w3-hover-blue w3-text-black" name="dvdate" readonly="" value="<?php echo $Datedv ?>">
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
