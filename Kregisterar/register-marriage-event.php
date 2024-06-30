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
.profilpic{
    width: 180px;
    height: 200px;
    margin-left: 60px;
    margin-top: 20px;
    margin-bottom: 20px;

    border:5px solid;
    border-color: blue;
    border-radius: 25px;
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

    <!--==============================USER DETAIL BEGINS HERE==========================-->
    <div class="right_col" role="main">
                <!-- top tiles -->
                <div class="row tile_count " style="border-bottom: 3px solid cadetblue; ">
                    <div style="margin-top: 5px;">
					<span>
                            <h6 class="w3-center item-title w3-round w3-animate-zoom" style="font-size: 50px; color: black; padding: 10px; font-weight: bold;">
                                <i class="w3-padding w3-animate-fading">REGISTER MARRIAGE EVENT</i>
                            </h6>
                        </span>                    
                    </div>
                </div>
                <!--let begin here-->
                <div class="main-content" id="content-wrapper">
                    <div class="container-fluid">
                       <div class="row">
                           
                       </div>
                        <!--second row-->
                        <div class="row">
                            <div class="col-lg-12 clear-padding-xs">
                                <div class="dash-item fist-dash-item">
                                	<!--============Marriage back end begin here==============-->
                                 <?php
					                      $todayDate=date("d-m-Y");
					                      $year=date('Y');
					                      $currentMonth=date('F');

											?>
					                 <?php

					                 if (isset($_POST['submitmevent'])) {
					                 		#==========================================
					                 		#      Get Wife information from the form #
					                 		#========================================
					                        
					                        $WifeRegNumber=$_POST['wbirthregnum'];
					                        $WifeFName=$_POST['wfname'];
					                        $WifeMName=$_POST['wmname'];
					                        $WifeLName=$_POST['wlname'];
					                        $WifeSex=$_POST['wsex'];
					                        $WifeAge=$_POST['wifeage'];
					                        $WifeNationality=$_POST['wnationality'];
					                        $WifeReligion=$_POST['wreligion'];
					                        $WifeJob=$_POST['wjob'];
					                        $WifePhoto=$_FILES['wphoto']['name'];

					                        $extension=strtolower(substr($WifePhoto, strpos($WifePhoto, '.')+1));

					                        #======================================
					                        #		Get Husband informatin from form
					                        #=====================================
					                        $HusbandRegNumber=$_POST['hbirthregnum'];
					                        $HusbandFName=$_POST['hfname'];
					                        $HusbandMName=$_POST['hmname'];
					                        $HusbandLName=$_POST['hlname'];
					                        $HusbandSex=$_POST['hsex'];
					                        $HusbandAge=$_POST['husbandage'];
					                        $HusbandNationality=$_POST['hnationality'];
					                        $HusbandReligion=$_POST['hreligion'];
					                        $HusbandJob=$_POST['hjob'];
					                        $Husbandphoto=$_FILES['hphoto']['name']; 
					                        $extension=strtolower(substr($Husbandphoto, strpos($Husbandphoto, '.')+1));

					                        $WifeReference1=$_POST['wrfname1'] ;
					                        $WifeReference2=$_POST['wrfname2'];
					                        $HusbandReference1=$_POST['hrfname1'];
					                        $HusbandReference2=$_POST['hrfname2'];

					                        $MarriageDate=$_POST['mday'];
					                        #
					                        #Session
					                        $_SESSION['wbirtnum']=$WifeRegNumber;
					                        $_SESSION['wfname']=$WifeFName;
					                        $_SESSION['wmname']=$WifeMName;
					                        $_SESSION['wlname']=$WifeLName;
					                        $_SESSION['wsex']=$WifeSex;
					                        $_SESSION['wnationality']=$WifeNationality;
					                        $_SESSION['wjob']=$WifeJob;
					                        $_SESSION['wphoto']=$WifePhoto;
					                        #Husband session
					                        $_SESSION['hbirtnum']=$HusbandRegNumber;
					                        $_SESSION['hfname']=$HusbandFName;
					                        $_SESSION['hmname']=$HusbandMName;
					                        $_SESSION['hlname']=$HusbandLName;
					                        $_SESSION['hsex']=$HusbandSex;
					                        $_SESSION['hnationality']=$HusbandNationality;
					                        $_SESSION['hjob']=$HusbandJob;
					                        $_SESSION['hphoto']=$Husbandphoto;
					                        #================
					                        #
					                        #================
					                        $WifeBirthRegNum=$_SESSION['wbirtnum'];
					                        $WifeFName=$_SESSION['wfname'];
					                        $WifeMName=$_SESSION['wmname'];
					                        $WifeLName=$_SESSION['wlname'];
					                        $WifeSex=$_SESSION['wsex'];
					                        $WifeNationality=$_SESSION['wnationality'];
					                        $WifeJob=$_SESSION['wjob'];
					                        $WifePhoto=$_SESSION['wphoto'];

					                        #===========================
					                        $HusbandBirthRegNum=$_SESSION['hbirtnum'];
					                        $HusbandFName=$_SESSION['hfname'];
					                        $HusbandMName=$_SESSION['hmname'];
					                        $HusbandLName=$_SESSION['hlname'];
					                        $HusbandSex=$_SESSION['hsex'];
					                        $HusbandNationality=$_SESSION['hnationality'];
					                        $HusbandJob=$_SESSION['hjob'];
					                        $Husbandphoto=$_SESSION['hphoto'];

					                        #==================GENERATING MARRIAGE REGISTRATION NUMBER==========
					                        
                                            $plusMarriage = "SELECT * FROM marriagevent ORDER BY id DESC LIMIT 1";
                                            $queryRunMarriage = mysqli_query($con, $plusMarriage);
                                            $valuesMarriage = mysqli_fetch_array($queryRunMarriage);
                                            $lastIdMariage = $valuesMarriage ? $valuesMarriage['id'] : 0;
                                            $lastIdMariage += 1;
                                            $dateMarriage = date('Y');
                                            $marriageID = $regcode . $ZCode . $WCode . $KCode . $lastIdMariage . $dateMarriage;
					                        #===Convert Age of couples to integer
					                         $WifeAg=(int)$WifeAge;
					                         $HusbAge=(int)$HusbandAge;
					                        #===========
					                        #Restrict Duplicate Registration
                                            $checkwife = "SELECT * FROM marriagevent WHERE (wbirthnum='$WifeBirthRegNum') AND ((wfname='$WifeFName') AND (wmname='$WifeMName') AND (wlname='$WifeLName'))";
                                            $checkhusband = "SELECT * FROM marriagevent WHERE (hbirthnum='$HusbandBirthRegNum') AND (hfname='$HusbandFName' AND hmname='$HusbandMName' AND hlname='$HusbandLName')";
                                            
                                            $runwifedup = mysqli_query($con, $checkwife);
                                            $runhusbanddup = mysqli_query($con, $checkhusband);
                                            
                                            if ($runwifedup || $runhusbanddup) {
                                                $countwife = mysqli_num_rows($runwifedup);
                                                $counthusband = mysqli_num_rows($runhusbanddup);
                                            
                                                if ($countwife > 0) {
                                                    echo "<script>alert('The wife is married to another person. No two marriages are allowed!');</script>";
                                                    echo "<p class='w3-text-red' style='text-align:center;'><b>The wife is married to another person. No two marriages are allowed!</b></p>";
                                                } elseif ($counthusband > 0) {
                                                    echo "<script>alert('The husband is married to another person. No two marriages are allowed!');</script>";
                                                    echo "<p class='w3-text-red' style='text-align:center;'><b>The husband is married to another person. No two marriages are allowed!</b></p>";
                                                } elseif (isset($_POST['submitmevent']) && $WifeAg <= 18 && !empty($WifeAge)) {
                                                    echo "<script>alert('No marriage allowed for wife because her age is less than 18');</script>";
                                                    echo "<p class='w3-text-red' style='text-align:center;'>No marriage allowed for wife because her age is less than 18</p>";
                                                } elseif (isset($_POST['submitmevent']) && $HusbAge <= 18 && !empty($HusbandAge)) {
                                                    echo "<script>alert('No marriage allowed for husband because his age is less than 18');</script>";
                                                    echo "<p class='w3-text-red' style='text-align:center;'>No marriage allowed for husband because his age is less than 18</p>";
                                                } else {
                                                    // Check if either individual is marked as dead in the birth event records
                                                    $checkWifeStatus = "SELECT status FROM birthevent WHERE eventnumber='$WifeBirthRegNum'";
                                                    $checkHusbandStatus = "SELECT status FROM birthevent WHERE eventnumber='$HusbandBirthRegNum'";
                                                    
                                                    $runWifeStatus = mysqli_query($con, $checkWifeStatus);
                                                    $runHusbandStatus = mysqli_query($con, $checkHusbandStatus);
                                                    
                                                    $wifeStatus = null;
                                                    $husbandStatus = null;
                                                    
                                                    if ($runWifeStatus && mysqli_num_rows($runWifeStatus) > 0) {
                                                        $wifeStatus = mysqli_fetch_assoc($runWifeStatus)['status'];
                                                    }
                                                    
                                                    if ($runHusbandStatus && mysqli_num_rows($runHusbandStatus) > 0) {
                                                        $husbandStatus = mysqli_fetch_assoc($runHusbandStatus)['status'];
                                                    }
                                                    if ($wifeStatus == 'Dead') {
                                                        echo "<script>alert('Marriage not allowed: Wife is registered as deceased');</script>";
                                                        echo "<p class='w3-text-red' style='text-align:center;'>Marriage not allowed: Wife is registered as deceased</p>";
                                                    } elseif ($husbandStatus == 'Dead') {
                                                        echo "<script>alert('Marriage not allowed: Husband is registered as deceased');</script>";
                                                        echo "<p class='w3-text-red' style='text-align:center;'>Marriage not allowed: Husband is registered as deceased</p>";
                                                    } else {
                                                        if (($WifeSex != 'Choose Sex') && $WifeReligion != 'Choose Religion here...' && ($HusbandSex != 'Choose Sex..') && ($HusbandReligion != 'Choose Religion here...') && ($HusbAge >= 18) && ($WifeAg >= 18) && !empty($WifeFName) && !empty($WifeMName) && !empty($WifeLName) && !empty($HusbandFName) && !empty($HusbandMName) && !empty($HusbandLName) && !empty($WifeJob) && !empty($HusbandJob) && !empty($WifePhoto) && !empty($Husbandphoto)) {
                                                            $regmarriage = "INSERT INTO marriagevent (wbirthnum, wfname, wmname, wlname, wsex, wnationality, wreligion, wjob, wphoto, hbirthnum, hfname, hmname, hlname, hsex, hnationality, hreligion, hjob, hphoto, wreferencefname1, wreferencefname2, hreferencefname1, hreferencefname2, marriageday, rcode, zcode, wcode, kcode, marriagenum, status, regyear, regmonth) VALUES ('$WifeBirthRegNum', '$WifeFName', '$WifeMName', '$WifeLName', '$WifeSex', '$WifeNationality', '$WifeReligion', '$WifeJob', '$WifePhoto', '$HusbandBirthRegNum', '$HusbandFName', '$HusbandMName', '$HusbandLName', '$HusbandSex', '$HusbandNationality', '$HusbandReligion', '$HusbandJob', '$Husbandphoto', '$WifeReference1', '$WifeReference2', '$HusbandReference1', '$HusbandReference2', '$todayDate', '$regcode', '$ZCode', '$WCode', '$KCode', '$marriageID', 'Married', '$year', '$currentMonth')";
                                            
                                                            if (mysqli_query($con, $regmarriage)) {
                                                                if (move_uploaded_file($_FILES['wphoto']['tmp_name'], "../StaffPic/" . $_FILES['wphoto']['name']) && move_uploaded_file($_FILES['hphoto']['tmp_name'], "../StaffPic/" . $_FILES['hphoto']['name'])) {
                                                                    echo "<p class='w3-text-green' style='text-align:center;'><b>Event Registered Successfully</b><p>";
                                                                    echo "<p class='w3-text-green' style='text-align:center;'><i class='fa fa-heart'></i> <i class='fa fa-heart'></i><b>Love, Laughter, and Happily ever after !!</b><i class='fa fa-heart'> </i><i class='fa fa-heart'></i><p>";
                                            
                                                                    $updateWife = "UPDATE birthevent SET maritialStatus='Married', marriageid='$marriageID' WHERE eventnumber='$WifeBirthRegNum'";
                                                                    $updateHusband = "UPDATE birthevent SET maritialStatus='Married', marriageid='$marriageID' WHERE eventnumber='$HusbandBirthRegNum'";
                                            
                                                                    if (!mysqli_query($con, $updateWife)) {
                                                                        echo "<p class='w3-text-red' style='text-align:center;'>Error updating wife's marital status: " . mysqli_error($con) . "</p>";
                                                                    }
                                                                    if (!mysqli_query($con, $updateHusband)) {
                                                                        echo "<p class='w3-text-red' style='text-align:center;'>Error updating husband's marital status: " . mysqli_error($con) . "</p>";
                                                                    }
                                                                } else {
                                                                    echo "File upload failed.";
                                                                }
                                                            } else {
                                                                echo "Error registering marriage event: " . mysqli_error($con);
                                                            }
                                                        } else {
                                                            echo "Some Error Happened" . mysqli_error($con);
                                                        }
                                                    }
                                                }
                                            }
                                        }

					                  ?>
                                	<!--============Marriage Back end ends here===============-->
                          <div class="container-fluid">
    <form action="" meth<form method="POST" enctype="multipart/form-data">
    <div class="container">
        <div class="row justify-content-center">
            <!-- Column for wife information -->
            <div class="col-md-4">
                <i class="fa fa-female" style="font-size:36px;color: red;"></i>
                <label class="w3-text-black"><h2 style="font-size: 40px;"><b>Wife's Info</b></h2></label>
                <i class="fa fa-female" style="font-size:36px;color: red;"></i>
                
                <input type="text" class="w3-input w3-hover-blue w3-text-black" name="wbirthregnum" placeholder="Wife's Birth Registration Number" value="<?php if(isset($WifeBirthRegNum)) echo $WifeBirthRegNum; ?>">
                
                <label class="w3-text-black">First Name</label>
                <input type="text" class="w3-input w3-hover-blue w3-text-black" placeholder="First Name Here" name="wfname" onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)" value="<?php if(isset($WifeFName)) echo $WifeFName; ?>">
                <?php 
                    if(isset($_POST['submitmevent']) && !preg_match("/^[A-Za-z]/", $WifeFName) && !empty($WifeFName)){
                        echo "<p class='w3-text-red w3-center'>Invalid Format of Wife's First Name</p>";
                    }
                    if(isset($_POST['submitmevent']) && empty($WifeFName)){
                        echo "<p class='w3-text-red w3-center'>Empty Wife's First Name</p>";
                    }
                ?>
                
                <label class="w3-text-black">Middle Name</label>
                <input type="text" class="w3-input w3-hover-blue w3-text-black" placeholder="Middle Name Here" name="wmname" onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)" value="<?php if(isset($WifeMName)) echo $WifeMName; ?>">
                <?php 
                    if(isset($_POST['submitmevent']) && !preg_match("/^[A-Za-z]/", $WifeMName) && !empty($WifeMName)){
                        echo "<p class='w3-text-red w3-center'>Invalid Format of Wife's Middle Name</p>";
                    }
                    if(isset($_POST['submitmevent']) && empty($WifeMName)){
                        echo "<p class='w3-text-red w3-center'>Empty Wife's Middle Name</p>";
                    }
                ?>
                
                <label class="w3-text-black">Last Name</label>
                <input type="text" class="w3-input w3-hover-blue w3-text-black" placeholder="Last Name Here" name="wlname" onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)" value="<?php if(isset($WifeLName)) echo $WifeLName; ?>">
                <?php 
                    if(isset($_POST['submitmevent']) && !preg_match("/^[A-Za-z]/", $WifeLName) && !empty($WifeLName)){
                        echo "<p class='w3-text-red w3-center'>Invalid Format of Wife's Last Name</p>";
                    }
                    if(isset($_POST['submitmevent']) && empty($WifeLName)){
                        echo "<p class='w3-text-red w3-center'>Empty Wife's Last Name</p>";
                    }
                ?>
                
                <label class="w3-text-black">Sex</label>
                <select class="w3-input w3-hover-blue w3-text-black" name="wsex" required="">
                    <option>Choose Sex</option>
                    <option>Female</option>
                </select>
                <?php 
                    if(isset($_POST['submitmevent']) && $WifeSex == "Choose Sex" && !empty($WifeSex)){
                        echo "<p class='w3-text-red w3-center'>Please choose a valid sex!</p>";
                    }
                ?>
                
                <label class="w3-text-black">Age</label>
                <input type="text" name="wifeage" class="w3-input w3-hover-blue w3-text-black" placeholder="Age Here" maxlength="2" onkeypress="return (event.charCode > 47 && event.charCode < 58)">
                <?php
                    if (isset($_POST['submitmevent']) && empty($WifeAge)) {
                        echo "<p class='w3-text-red w3-center'>Empty Age, please fill it</p>";
                    }
                ?>
                
                <label class="w3-text-black">Nationality</label>
                <select class="w3-input w3-hover-blue w3-text-black" name="wnationality">
                    <option>Ethiopian</option>
                    <option>Eritrean</option>
                    <option>Kenyan</option>
                    <option>Sudanese</option>
                    <option>Somali</option>
                    <option>Egyptian</option>
                    <option>Others</option>
                </select>
                
                <label class="w3-text-black">Religion</label>
                <select class="w3-input w3-hover-blue w3-text-black" name="wreligion" required="">
                    <option>Choose Religion</option>
                    <option>Orthodox</option>
                    <option>Protestant</option>
                    <option>Catholic</option>
                    <option>Islam</option>
                    <option>Others</option>
                </select>
                <?php 
                    if(isset($_POST['submitmevent']) && $WifeReligion == "Choose Religion" && !empty($WifeReligion)){
                        echo "<p class='w3-text-red w3-center'>Please choose a valid Religion!</p>";
                    }
                    if(isset($_POST['submitmevent']) && empty($WifeReligion)){
                        echo "<p class='w3-text-red w3-center'>Empty Religion, choose one!</p>";
                    }
                ?>
                
                <label class="w3-text-black">Job</label>
                <input type="text" class="w3-input w3-hover-blue w3-text-black" placeholder="Job Here" name="wjob" onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)" value="<?php if(isset($WifeJob)) echo $WifeJob; ?>">
                <?php
                    if (isset($_POST['submitmevent']) && empty($WifeJob)) {
                        echo "<p class='w3-text-red w3-center'>Fill Wife's Job!</p>";
                    }
                ?>
                
                <label class="w3-text-black">Photo</label>
                <input type="file" class="w3-input w3-hover-blue w3-text-black" placeholder="Choose Photo" name="wphoto">
                <?php
                    if (isset($_POST['submitmevent']) && empty($WifePhoto)) {
                        echo "<p class='w3-text-red w3-center'>Choose Wife's Photo!</p>";
                    }
                ?>
            </div>
            
            <!-- Column for husband information -->
            <div class="col-md-4">
                <i class="fa fa-male" style="font-size:36px;color: red;"></i>
                <label class="w3-text-black"><h2 style="font-size: 30px;"><b>Husband's Info</b></h2></label>
                <i class="fa fa-male" style="font-size:36px;color: red;"></i>
                
                <input type="text" class="w3-input w3-hover-blue w3-text-black" name="hbirthregnum" placeholder="Husband's Birth Registration Number" value="<?php if(isset($HusbandBirthRegNum)) echo $HusbandBirthRegNum; ?>">
                
                <label class="w3-text-black">First Name</label>
                <input type="text" class="w3-input w3-hover-blue w3-text-black" placeholder="First Name Here" name="hfname" onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)" value="<?php if(isset($HusbandFName)) echo $HusbandFName; ?>">
                <?php 
                    if(isset($_POST['submitmevent']) && !preg_match("/^[A-Za-z]/", $HusbandFName) && !empty($HusbandFName)){
                        echo "<p class='w3-text-red w3-center'>Invalid Format of Husband's First Name!</p>";
                    }
                    if (isset($_POST['submitmevent']) && empty($HusbandFName)) {
                        echo "<p class='w3-text-red w3-center'>Empty Husband's First Name!</p>";
                    }
                ?>
                
                <label class="w3-text-black">Middle Name</label>
                <input type="text" class="w3-input w3-hover-blue w3-text-black" placeholder="Middle Name Here" name="hmname" onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)" value="<?php if(isset($HusbandMName)) echo $HusbandMName; ?>">
                <?php 
                    if(isset($_POST['submitmevent']) && !preg_match("/^[A-Za-z]/", $HusbandMName) && !empty($HusbandMName)){
                        echo "<p class='w3-text-red w3-center'>Invalid Format of Husband's Middle Name!</p>";
                    }
                    if (isset($_POST['submitmevent']) && empty($HusbandMName)) {
                        echo "<p class='w3-text-red w3-center'>Empty Husband's Middle Name!</p>";
                    }
                ?>
                
                <label class="w3-text-black">Last Name</label>
                <input type="text" class="w3-input w3-hover-blue w3-text-black" placeholder="Last Name Here" name="hlname" onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)" value="<?php if(isset($HusbandLName)) echo $HusbandLName; ?>">
                <?php 
                    if(isset($_POST['submitmevent']) && !preg_match("/^[A-Za-z]/", $HusbandLName) && !empty($HusbandLName)){
                        echo "<p class='w3-text-red w3-center'>Invalid Format of Husband's Last Name!</p>";
                    }
                    if (isset($_POST['submitmevent']) && empty($HusbandLName)) {
                        echo "<p class='w3-text-red w3-center'>Empty Husband's Last Name!</p>";
                    }
                ?>
                
                <label class="w3-text-black">Sex</label>
                <select class="w3-input w3-hover-blue w3-text-black" name="hsex" required="">
                    <option>Choose Sex</option>
                    <option>Male</option>
                </select>
                <?php 
                    if(isset($_POST['submitmevent']) && $HusbandSex == "Choose Sex" && !empty($HusbandSex)){
                        echo "<p class='w3-text-red w3-center'>Please choose a valid sex!</p>";
                    }
                ?>
                
                <label class="w3-text-black">Age</label>
                <input type="text" name="husbandage" class="w3-input w3-hover-blue w3-text-black" placeholder="Age Here" maxlength="2" onkeypress="return (event.charCode > 47 && event.charCode < 58)">
                <?php
                    if (isset($_POST['submitmevent']) && empty($HusbandAge)) {
                        echo "<p class='w3-text-red w3-center'>Empty Age!</p>";
                    }
                ?>
                
                <label class="w3-text-black">Nationality</label>
                <select class="w3-input w3-hover-blue w3-text-black" name="hnationality">
                    <option>Ethiopian</option>
                    <option>Eritrean</option>
                    <option>Kenyan</option>
                    <option>Sudanese</option>
                    <option>Somali</option>
                    <option>Egyptian</option>
                    <option>Others</option>
                </select>
                
                <label class="w3-text-black">Religion</label>
                <select class="w3-input w3-hover-blue w3-text-black" name="hreligion" required="">
                    <option>Choose Religion</option>
                    <option>Orthodox</option>
                    <option>Protestant</option>
                    <option>Catholic</option>
                    <option>Islam</option>
                    <option>Others</option>
                </select>
                <?php 
                    if(isset($_POST['submitmevent']) && $HusbandReligion == "Choose Religion" && !empty($HusbandReligion)){
                        echo "<p class='w3-text-red w3-center'>Please choose a valid Religion!</p>";
                    }
                    if(isset($_POST['submitmevent']) && empty($HusbandReligion)){
                        echo "<p class='w3-text-red w3-center'>Empty Religion, choose one!</p>";
                    }
                ?>
                
                <label class="w3-text-black">Job</label>
                <input type="text" class="w3-input w3-hover-blue w3-text-black" placeholder="Job Here" name="hjob" onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)" value="<?php if(isset($HusbandJob)) echo $HusbandJob; ?>">
                <?php
                    if (isset($_POST['submitmevent']) && empty($HusbandJob)) {
                        echo "<p class='w3-text-red w3-center'>Empty Husband's Job!</p>";
                    }
                ?>
                
                <label class="w3-text-black">Photo</label>
                <input type="file" class="w3-input w3-hover-blue w3-text-black" placeholder="Choose Photo" name="hphoto">
                <?php
                    if (isset($_POST['submitmevent']) && empty($HusbandPhoto)) {
                        echo "<p class='w3-text-red w3-center'>Choose Husband's Photo!</p>";
                    }
                ?>
            </div>

            <!-- Column for marriage event -->
            <div class="col-md-4">
                <i class="fa fa-heartbeat" style="font-size:36px;color: red;"></i>
                <label class="w3-text-black"><h2 style="font-size: 30px;"><b>Marriage Info</b></h2></label>
                <i class="fa fa-heartbeat" style="font-size:36px;color: red;"></i>
                
                <ol type="A">
                    <li>Wife's Reference Person</li>
                    <label class="w3-text-black">First Reference person</label>
                    <input type="text" class="w3-input w3-hover-blue w3-text-black" placeholder="1. Full Name Here" name="wrfname1" onkeypress="return (event.charCode>64 && event.charCode<91) || (event.charCode>96 && event.charCode<123)">
                    <label class="w3-text-black">Second Reference person</label>
                    <input type="text" class="w3-input w3-hover-blue w3-text-black" placeholder="2. Full Name Here" name="wrfname2" onkeypress="return (event.charCode>64 && event.charCode<91) || (event.charCode>96 && event.charCode<123)">
                    
                    <li>Husband's Reference Person</li>
                    <label class="w3-text-black">First Reference person</label>
                    <input type="text" class="w3-input w3-hover-blue w3-text-black" placeholder="1. Full Name Here" name="hrfname1" onkeypress="return (event.charCode>64 && event.charCode<91) || (event.charCode>96 && event.charCode<123)">
                    <label class="w3-text-black">Second Reference person</label>
                    <input type="text" class="w3-input w3-hover-blue w3-text-black" placeholder="2. Full Name Here" name="hrfname2" onkeypress="return (event.charCode>64 && event.charCode<91) || (event.charCode>96 && event.charCode<123)">
                </ol>
                
                <label class="w3-text-black">Reg Date</label>
                <input type="text" class="w3-input w3-hover-blue w3-text-black" placeholder="Date of Marriage" name="mday" value="<?php echo $todayDate; ?>" readonly>
            </div>

            <div class="col-md-4">
                <input type="submit" class="form-control btn btn-sm w3-blue" value="Save" name="submitmevent">
            </div>
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
    <!--==============================USER DETAILS ENDS HERE===========================-->
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
