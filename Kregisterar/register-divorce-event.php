    <style type="text/css">
        .dash-item {
            margin-top: 0px;
            background: #fff;
        }
        .dash-item .item-title {
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
        .dash-item .inner-item img {
            max-width: 40px;
            border-radius: 50%;
        }
        .dash-item .inner-item .title {
            font-weight: 600;
            font-size: 13px;
        }
        .first-dash-item {
            margin-top: 0px;
        }
        .profilpic {
            width: 180px;
            height: 200px;
            margin-left: 60px;
            margin-top: 20px;
            margin-bottom: 20px;
            border: 5px solid;
            border-color: blue;
            border-radius: 25px;
        }
        .w3-input, .w3-select {
            margin-bottom: 15px;
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
                <div class="row tile_count " style="border-bottom: 3px solid cadetblue; ">
                    <div style="margin-top: 5px;">
                    <span>
                            <h6 class="w3-center item-title w3-round w3-animate-zoom" style="font-size: 50px; color: black; padding: 10px; font-weight: bold;">
                                <i class="w3-padding w3-animate-fading">REGISTER DIVORCE EVENT</i>
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
                                            <!--====search marriage========================-->
                                <form  action="" method="POST" enctype="multipart/form-data">
                                   
                                    <div class=" w3-container w3-blue" id="searchBID">
                                                <h3 style="color: black; font-size: 22px; font-family:  'Times New Roman', Times, serif;">Search Marriage Unique Number</h3>
                                                <hr>
                                                <div>
                                                    <div class="form-group">
                                                        <input type="text" name="marriageuniquenum4dv" class="w3-input w3-border w3-round w3-text-black" placeholder="Marriage ID">
                                                    </div>
                                                    <div class="form-group">
                                                        <button type="submit" name="searchmarriage" class="w3-btn w3-green w3-round-large w3-medium" style="font-family: 'Times New Roman', Times, serif';"><i class="fa fa-search"></i> Search</button>
                                                    </div>
                                                </div>
                                            </div>
                                </form>
                                <!--Divorce back end begin====================================
                                    ==========-->

                                    <?php
if (isset($_POST['searchmarriage'])) {
    echo "<script>";
    echo "divorceReg()";
    echo "</script>";
    $marriageReg = $_POST['marriageuniquenum4dv'];
    $searchM2Dv = "SELECT * FROM marriagevent WHERE marriagenum=$marriageReg and status='Married'";
    if (!empty($marriageReg)) {
        $result = mysqli_query($con, $searchM2Dv);
        $checkMarriage = mysqli_num_rows($result);
        if ($checkMarriage == 0) {
            echo "<p style='color:red; text-align:center; '>No Record exist </p>";
        } 
        while ($row = mysqli_fetch_array($result)) {
            $_SESSION['wfname'] = $row['wfname'];
            $_SESSION['wmname'] = $row['wmname'];
            $_SESSION['wlname'] = $row['wlname'];
            $_SESSION['wnationality'] = $row['wnationality'];
            $_SESSION['wjob'] = $row['wjob'];
            $_SESSION['hfname'] = $row['hfname'];
            $_SESSION['hmname'] = $row['hmname'];
            $_SESSION['hlname'] = $row['hlname'];
            $_SESSION['hnationality'] = $row['hnationality'];
            $_SESSION['hjob'] = $row['hjob'];
            $_SESSION['$marriageid'] = $row['marriagenum'];
            
         #======================================

            $WifeFNameDV = $_SESSION['wfname'];
            $WifeMNameDV = $_SESSION['wmname'];
            $WifeLNameDV = $_SESSION['wlname'];
            $WifeNationalityDV = $_SESSION['wnationality'];
            $WifeJobDV = $_SESSION['wjob'];
            $HusbandFNameDV = $_SESSION['hfname'];
            $HusbandMNameDV = $_SESSION['hmname'];
            $HusbandLNameDV = $_SESSION['hlname'];
            $HusbandNationalityDv = $_SESSION['hnationality'];
            $HusbandJobDV = $_SESSION['hjob'];
            $MarriageRegNum = $_SESSION['$marriageid'];
        }
    }
}
if (isset($_POST['submitdvevent'])) {
    echo "<script>";
    echo "divorceReg()";
    echo "</script>";
    $todaydate = date('Y');
    $regyear = date('d-m-Y');
    $currentMonth = date('F');
  #===============Form search=========================

    $MarriageRegNum = $_SESSION['$marriageid'];
    $WifeFNameDV = $_SESSION['wfname'];
    $WifeMNameDV = $_SESSION['wmname'];
    $WifeLNameDV = $_SESSION['wlname'];
    $WifeNationalityDV = $_SESSION['wnationality'];
    $WifeJobDV = $_SESSION['wjob'];

    $HusbandFNameDV = $_SESSION['hfname'];
    $HusbandMNameDV = $_SESSION['hmname'];
    $HusbandLNameDV = $_SESSION['hlname'];
    $HusbandNationalityDv = $_SESSION['hnationality'];
    $HusbandJobDV = $_SESSION['hjob'];

    #=======================================

    $WifeDvFName = $_POST['wdvfname'];
    $WifeDvMName = $_POST['wdvmname'];
    $WifeDvLName = $_POST['wdvlname'];
    $WifeDvNationality = $_POST['wdvnationality'];
    $WifeDvReligion = $_POST['wdvreligion'];
    $WifeDvJob = $_POST['wdvjob'];
    $WifeDvPhoto = $_FILES['wdvphoto']['name'];

   #HUSBAND divorce information

    $HusbandDvFName = $_POST['hdvfname'];
    $HusbandDvMName = $_POST['hdvmname'];
    $HusbandDVLName = $_POST['hdvlname'];
    $HusbandDvNationality = $_POST['hdvnationality'];
    $HusbandDvReligion = $_POST['hdvreligion'];
    $HusbandDvJob = $_POST['hdvjob'];
    $HusbandDvPhoto = $_FILES['hdvphoto']['name'];

       # get divorce information from form

    $DivorceDate = $_POST['dvdate'];
    $DivorcePlace = $_POST['dvplace'];
    $DivorceChildNum = $_POST['dvchildnum'];
    $DivorceReason = $_POST['dvreason'];
    $DivorceCourtName = $_POST['dvcourtname'];

     #Store values on session

    $_SESSION['wdvfname'] = $WifeDvFName;
    $_SESSION['wdvmname'] = $WifeDvMName;
    $_SESSION['wdvlname'] = $WifeDvLName;
    $_SESSION['wdvnationality'] = $WifeDvNationality;
    $_SESSION['wdvjob'] = $WifeDvJob;
    $_SESSION['wdvphoto'] = $WifeDvPhoto;
    $_SESSION['hdvfname'] = $HusbandDvFName;
    $_SESSION['hdvmname'] = $HusbandDvMName;
    $_SESSION['hdvlname'] = $HusbandDVLName;
    $_SESSION['hdvnationality'] = $HusbandDvNationality;
    $_SESSION['hdvjob'] = $HusbandDvJob;
    $_SESSION['hdvphoto'] = $HusbandDvPhoto;
     #========================================
     #================================
    $WifeDvFName = $_SESSION['wdvfname'];
    $WifeDvMName = $_SESSION['wdvmname'];
    $WifeDvLName = $_SESSION['wdvlname'];
    $WifeDvNationality = $_SESSION['wdvnationality'];
    $WifeDvPhoto = $_SESSION['wdvphoto'];
    $WifeDvJob = $_SESSION['wdvjob'];
      #============================

    $HusbandDvFName = $_SESSION['hdvfname'];
    $HusbandDvMName = $_SESSION['hdvmname'];
    $HusbandDVLName = $_SESSION['hdvlname'];
    $HusbandDvNationality = $_SESSION['hdvnationality'];
    $HusbandDvJob = $_SESSION['hdvjob'];
    $HusbandDvPhoto = $_SESSION['hdvphoto'];
#======================================
 #===========Generate Divorce Id==============
    $plusDivorce = "SELECT * from divorceevent  where 1 ORDER BY id DESC";
    $queryRunDivorce = mysqli_query($con, $plusDivorce);
    $valuesDivorce = mysqli_fetch_array($queryRunDivorce);
    if (!empty($valuesDivorce)) {
        $lastIdDivorce = $valuesDivorce['id'] ?? 0;
        $lastIdDivorce = $lastIdDivorce + 1;
    } else {
        $lastIdDivorce = 0;
    }
    $dateDivorce = time();
    $dateDivorce = date('Y');
    $divorceEventId = $regcode . $ZCode . $WCode . $KCode . $lastIdDivorce . $dateDivorce;
    if (!isset($_POST['searchmarriage'])) {
       
        $selectDiv = "SELECT * FROM divorceevent WHERE wfnamedv='$WifeDvFName' AND wmnamedv='$WifeDvMName' AND wlnamedv='$WifeDvLName' AND hfnamedv='$HusbandDvFName' AND hmnamedv='$HusbandDvMName' AND hlnamedv='$HusbandDVLName' ";
       
        $divRes = mysqli_query($con, $selectDiv);
       
        $countdivorce = mysqli_num_rows($divRes);
        if ($countdivorce > 0) {
            echo "<p class='w3-text-red' style='text-align:center;'>Event Already Registered !!</p>";

        } elseif (!empty($WifeDvFName) && !empty($WifeDvMName) && !empty($WifeDvLName) && !empty($HusbandDvFName) && !empty($HusbandDvMName) && !empty($HusbandDVLName)) {
           
           $registerdivorce = "INSERT INTO divorceevent(wfnamedv, wmnamedv, wlnamedv, wnationalitydv, wreligiondv, wjobdv, wphotodv, hfnamedv, hmnamedv, hlnamedv, hnationalitydv, hreligiondv, hjobdv, hphotodv, placedv, childnum, reasondv, courtnamedv, daydv, rcode, zcode, wcode, kcode, dveventnum ,marriagenum,status, regyear,regmonth)
            
             VALUES ('$WifeDvFName','$WifeDvMName','$WifeDvLName','$WifeDvNationality','$WifeDvReligion','$WifeDvJob','$WifeDvPhoto','$HusbandDvFName','$HusbandDvMName','$HusbandDVLName','$HusbandDvNationality','$HusbandDvReligion','$HusbandDvJob','$HusbandDvPhoto','$DivorcePlace','$DivorceChildNum','$DivorceReason','$DivorceCourtName','$DivorceDate','$regcode','$ZCode','$WCode','$KCode','$divorceEventId','$MarriageRegNum','divorced','$regyear','$currentMonth')";
           
           if (mysqli_query($con, $registerdivorce)) {
                echo "<script>alert('Event Registered Successfully !!');</script>";
                $updatemarriage = "UPDATE marriagevent SET status='Divorced' WHERE marriagenum='$MarriageRegNum'";
                $marriageresult = mysqli_query($con, $updatemarriage);

                // Update birth event status to Divorced
                $updateBirth = "UPDATE birthevent SET maritialstatus='Divorced' WHERE marriageid='$MarriageRegNum'";
                $birthResult = mysqli_query($con, $updateBirth);

                if ($marriageresult && $birthResult) {
                    // Both updates were successful
                }
                
            }
        }
    } elseif (isset($_POST['searchmarriage'])) {
        $checkdivorce = "SELECT * from divorceevent  WHERE marriagenum='$MarriageRegNum'";
        if ($rundivorce = mysqli_query($con, $checkdivorce)) {
            $divorcecount = mysqli_num_rows($rundivorce);
            if ($divorcecount > 0) {
                echo "<p class='w3-text-red' style='text-align:center;'>Event Already Registered !!</p>";
            } else {
                if ($WifeDvReligion != 'Choose Religion here...' && $HusbandDvReligion != 'Choose Religion here...') {
                    $registerdivorce = "INSERT INTO divorceevent(wfnamedv, wmnamedv, wlnamedv, wnationalitydv, wreligiondv, wjobdv, wphotodv, hfnamedv, hmnamedv, hlnamedv, hnationalitydv, hreligiondv, hjobdv, hphotodv, placedv, childnum, reasondv, courtnamedv, daydv, rcode, zcode, wcode, kcode, dveventnum, marriagenum,status regyear,regmonth) 
                    
                    VALUES ('$WifeFNameDV','$WifeMNameDV','$WifeLNameDV','$WifeNationalityDV','$WifeDvReligion','$WifeDvJob','$WifeDvPhoto','$HusbandFNameDV','$HusbandMNameDV','$HusbandLNameDV','$HusbandNationalityDv','$HusbandDvReligion','$HusbandDvJob','$HusbandDvPhoto','$DivorcePlace','$DivorceChildNum','$DivorceReason','$DivorceCourtName','$DivorceDate','$regcode','$ZCode','$WCode','$KCode','$divorceEventId','$MarriageRegNum','divorced','$regyear','$currentMonth' )";
                    if (mysqli_query($con, $registerdivorce)) {
                        echo "<script>alert('Event Registered Successfully !!');</script>";
                        $updatemarriage = "UPDATE marriagevent SET status='Divorced' WHERE marriagenum='$MarriageRegNum'";
                        $marriageresult = mysqli_query($con, $updatemarriage);

                        // Update birth event status to Divorced
                        $updateBirth = "UPDATE birthevent SET mairtialstatus='Divorced' WHERE marriagenum='$MarriageRegNum'";
                        $birthResult = mysqli_query($con, $updateBirth);

                        if ($marriageresult && $birthResult) {
                            // Both updates were successful
                        }
                    } else {
                        echo "Some Error Happened" . mysqli_error($con);
                    }
                } else if ($WifeDvReligion == 'Choose Religion here...') {
                    echo "<script>alert(Select valid Wife Religion);</script>";
                } elseif ($HusbandDvReligion != 'Choose Religion here...') {
                    echo "<script>alert('Select valid Husband Religion !!');</script>";
                }
            }
        }
    }
}
?>

                    <!--Divorce back end end here====================================
                    ==========-->
  
   

                <!-- Main content -->
                <div class="main-content" id="content-wrapper">
                    <div class="container-fluid">
                        <div class="row">
                            <!-- Form for Registering Divorce Event -->
                            <div class="col-md-12">
                                <div class="dash-item first-dash-item">
                                    <div class="inner-item">
                                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" enctype="multipart/form-data">
                                            <?php
                                                $todayDate = date("d-m-Y");
                                            ?>

                                            <!-- Wife's Info -->
                                            <div class="col-md-4">
                                                <i class="fa fa-female" style="font-size:36px;color: red;"></i> 
                                                <label class="w3-text-black">
                                                    <h3 class="w3-text-black" style="font-size: 30px;"><b>Wife's Info</b></h3>
                                                </label>
                                                <i class="fa fa-female" style="font-size:36px;color: red;"></i>
                                                <br>
                                                <label class="w3-text-black">First Name</label>
                                                <input type="text" class="w3-input w3-text-black w3-hover-blue" placeholder="Enter Wife's First Name Here" name="wdvfname" required=""  onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)" value="<?php if(isset($WifeFNameDV)) echo $WifeFNameDV; ?>">
                                                
                                                <label class="w3-text-black">Middle Name</label>
                                                <input type="text" class="w3-input w3-text-black w3-hover-blue" placeholder="Enter Wife's Middel Name Here" name="wdvmname" required=""  onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)" value="<?php if(isset($WifeMNameDV)) echo $WifeMNameDV; ?>">

                                                <label class="w3-text-black">Last Name</label>
                                                <input type="text" class="w3-input w3-text-black w3-hover-blue" placeholder="Enter Wife's Last Name Here" name="wdvlname" required=""  onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)"  value="<?php if(isset($WifeLNameDV)) echo $WifeLNameDV; ?>">

                                                <label class="w3-text-black">Nationality</label>
                                                <select name="wdvnationality" class="w3-input w3-text-black w3-hover-blue" >
                                                    <option>Ethiopian</option>
                                                    <option>Eritrean</option>
                                                    <option>Kenyan</option>
                                                    <option>Sudanese</option>
                                                    <option>Somali</option>
                                                    <option>Egyption</option>
                                                    <option>Others</option>
                                                </select>
                                                
                                                <label class="w3-text-black">Religion</label>
                                                <select class="w3-input w3-hover-blue w3-text-black" name="wdvreligion" required="">
                                                    <option>Choose Religion here...</option>
                                                    <option>Orthodox</option>
                                                    <option>Protestant</option>
                                                    <option>Catholic</option>
                                                    <option>Islam</option>
                                                    <option>Others</option>
                                                </select>
                                                <?php 
                                                    if(isset($_POST['submitdvevent']) && $WifeDvReligion=="Choose Religion here..."){
                                                        echo"<p class='w3-text-red w3-center'>Please choose a Religion !!</p>";
                                                    }
                                                ?>
                                                
                                                <label class="w3-text-black">Job</label>
                                                <input type="text" class="w3-input w3-text-black w3-hover-blue" placeholder="Fill Wife's Job Here" name="wdvjob" required=""  onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)" value="<?php if(isset($WifeDvJob)) echo $WifeDvJob; ?>">

                                               <?php 
                                                    if(isset($_POST['submitdvevent']) && !preg_match("/^[A-Za-z]/",$WifeDvJob)){
                                                        echo"<p class='w3-text-red w3-center'>Invalid Format of  Job!!</p>";
                                                    }
                                                ?>
                                                
                                                <label class="w3-text-black">Photo</label>
                                                <input type="file" class="w3-input w3-hover-blue w3-text-black" placeholder="Choose Wife's Photo Here" name="wdvphoto" required="">
                                            </div>

                                            <!-- Husband's Info -->
                                            <div class="col-md-4">
                                                <i class="fa fa-male" style="font-size:36px;color: red;"></i> 
                                                <label class="w3-text-black">
                                                    <h3 class="w3-text-black" style="font-size: 30px;"><b>Husband's Info</b></h3>
                                                </label>
                                                <i class="fa fa-male" style="font-size:36px;color: red;"></i>
                                                <br>
                                                <label class="w3-text-black">First Name</label>
                                                <input type="text" class="w3-input w3-hover-blue w3-text-black" placeholder="Fill Husband's First Name Here" name="hdvfname" onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)" required="" value="<?php if(isset($HusbandFNameDV)) echo $HusbandFNameDV; ?>">
                                                
                                                <label class="w3-text-black">Middle Name</label>
                                                <input type="text" class="w3-input w3-hover-blue w3-text-black" placeholder="Fill Husband's Middle Name Here" onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)" name="hdvmname" required="" value="<?php if(isset($HusbandMNameDV)) echo $HusbandMNameDV; ?>">
                                                
                                                <label class="w3-text-black">Last Name</label>
                                                <input type="text" class="w3-input w3-hover-blue w3-text-black" placeholder="Fill Husband's Last Name Here" onkeypress="return (event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123)" name="hdvlname" required="" value="<?php if(isset($HusbandLNameDV)) echo $HusbandLNameDV; ?>">
                                                
                                                <label class="w3-text-black">Nationality</label>
                                                <select class="w3-input w3-hover-blue w3-text-black" name="hdvnationality">
                                                    <option>Ethiopian</option>
                                                    <option>Eritrean</option>
                                                    <option>Kenyan</option>
                                                    <option>Sudanese</option>
                                                    <option>Somali</option>
                                                    <option>Egyption</option>
                                                    <option>Others</option>
                                                </select>
                                                
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
                                                    if(isset($_POST['submitdvevent']) && $HusbandDvReligion=="Choose Religion here..."){
                                                        echo"<p class='w3-text-red w3-center'>Please choose Religion !!</p>";
                                                    }
                                                ?>
                                                
                                                <label class="w3-text-blAck">Job</label>
                                                <input type="text" class="w3-input w3-hover-blue w3-text-black" placeholder="Fill Husband's Job Here" name="hdvjob" required="" value="<?php if(isset($HusbandDvJob)) echo $HusbandDvJob; ?>">
                                                <?php 
                                                    if(isset($_POST['submitdvevent']) && !preg_match("/^[A-Za-z]/",$HusbandDvJob)){
                                                        echo"<p class='w3-text-red w3-center'>Invalid Format of Job!!</p>";
                                                    }
                                                ?>
                                                
                                                <label class="w3-text-black">Photo</label>
                                                <input type="file" class="w3-input w3-hover-blue w3-text-black" placeholder="Choose Husband's photo " name="hdvphoto" required="">
                                                <button class="form-control btn btn-sm w3-blue" name="submitdvevent"> <i class="fa fa-check-square-o"></i> &nbsp; &nbsp; Save</button><br><br><br>

                                            </div>
                                            

                                            <!-- Divorce Info -->
                                            <div class="col-md-4">
                                                <i class="fa fa-heartbeat" style="font-size:36px;color: red;"></i>
                                                <label class="w3-text-black">
                                                    <h3 class="w3-text-black" style="font-size: 30px;"><b>Divorce Info</b></h3>
                                                </label>
                                                <i class="fa fa-heartbeat" style="font-size:36px;color: red;"></i>
                                                <br>
                                                <label class="w3-text-black">Kebele</label>
                                                <input type="text" class="w3-input w3-hover-blue w3-text-black" placeholder="divorce place Here" name="dvplace" readonly="" value="<?php echo $KCode; ?>"> 
                                                
                                                <label class="w3-text-black">Number of Child</label>
                                                <input type="text" maxlength="1" onkeypress="return event.charCode > 47 && event.charCode < 58" class="w3-input w3-hover-blue w3-text-black" placeholder="Number of Child they have!!" name="dvchildnum" required="" min="0"> 
                                                
                                                <label class="w3-text-black">Divorce Reason</label> 
                                                <input type="text" class="w3-input w3-hover-blue w3-text-black" placeholder="Divorce reason Here" name="dvreason" required="" value="<?php if(isset($DivorceReason)) echo $DivorceReason; ?>">
                                                <?php 
                                                    if(isset($_POST['submitdvevent']) && !preg_match("/^[A-Za-z]/",$DivorceReason)){
                                                        echo"<p class='w3-text-red w3-center'>Invalid Format of reason !!</p>";
                                                    }
                                                ?>
                                                
                                                <label class="w3-text-black">Divorce Place</label>
                                                <input type="text" class="w3-input w3-hover-blue w3-text-black" placeholder="Court Name Here" name="dvcourtname" required="" value="<?php if(isset($DivorceCourtName)) echo $DivorceCourtName; ?>">
                                                <?php 
                                                    if(isset($_POST['submitdvevent']) && !preg_match("/^[A-Za-z]/",$DivorceCourtName)){
                                                        echo"<p class='w3-text-red w3-center'>Invalid Format of court name!!</p>";
                                                    }
                                                ?>
                                                
                                                <label class="w3-text-black">Reg Date</label>
                                                <input type="text" value="<?php echo $todayDate;?>" readonly="" class="w3-input w3-hover-blue w3-text-black" placeholder="divorce date here" name="dvdate">
                                                
                                                <br>
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
                    </div>         
                </div>
            </div>
        </div>
    </div> 
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
        <script>
        document.getElementById("death-reg-nav").style.display = "block";
    </script>
</body>

</html
