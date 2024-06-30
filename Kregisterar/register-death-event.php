<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Death Event</title>
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
    </style>
</head>
<body class="nav-md">
    <?php
        include("inc/head.php");
        require '../connect.php';
    ?>
    <div class="container body">
        <div class="main_container">
            <?php include("inc/slide.php"); ?>
            <!-- top navigation -->
            <?php include("inc/navigation.php"); ?>

            <!-- USER DETAIL BEGINS HERE -->
            <div class="right_col" role="main">
                <!-- top tiles -->
                <div class="row tile_count" style="border-bottom: 3px solid cadetblue;">
                    <div style="margin-top: 5px;">
                       <span>
                            <h6 class="w3-center item-title w3-round w3-animate-zoom" style="font-size: 50px; color: black; padding: 10px; font-weight: bold;">
                                <i class="w3-padding w3-animate-fading">REGISTER DEATH EVENT</i>
                            </h6>
                        </span>      
                     </div>
                </div>

                <!-- Main content -->
                <div class="main-content" id="content-wrapper">
                    <div class="container-fluid">
                        <div class="row">
                            <!-- Search Form for Birth Event -->
                            <?php
                                $todaydate = date('Y');
                                $regdate = date('d-m-Y');
                                $currentMonth = date('F');

                                if (isset($_POST['search'])) {
                                    $birthid = $_POST['birthRegNum4dth'];
                                    if (!empty($birthid)) {
                                        $searchid = "SELECT * FROM birthevent WHERE eventnumber = '$birthid' AND status='Alive'";
                                        $result = mysqli_query($con, $searchid);
                                        if (mysqli_num_rows($result) > 0) {
                                            while ($row = mysqli_fetch_array($result)) {
                                                $_SESSION['birthId'] = $row['eventnumber'];
                                                $_SESSION['fname'] = $row['fname'];
                                                $_SESSION['mname'] = $row['mname'];
                                                $_SESSION['lname'] = $row['lname'];
                                                $_SESSION['sex'] = $row['sex'];
                                                $_SESSION['dob'] = $row['day'];
                                                $_SESSION['nationality'] = $row['nationality'];
                                                $_SESSION['birtheventnum'] = $row['eventnumber'];
                                            }
                                        } else {
                                            echo "<p class='w3-text-red'>No event with provided birth unique number!</p>";
                                        }
                                    } else {
                                        echo "<p class='w3-text-red w3-center'>Birth ID is empty</p>";
                                    }
                                }

                                if (isset($_POST['submitdthevent'])) {
                                    if (isset($_SESSION['birtheventnum'])) {
                                        $BirthNum = $_SESSION['birtheventnum'];
                                        $FistNameD = $_SESSION['fname'];
                                        $MiddleNameD = $_SESSION['mname'];
                                        $LastNameD = $_SESSION['lname'];
                                        $SexD = $_SESSION['sex'];
                                        $DobD = $_SESSION['dob'];
                                        $NationalityD = $_SESSION['nationality'];
                                    } else {
                                        $BirthNum = null;
                                        $FistNameD = $_POST['dthfname'];
                                        $MiddleNameD = $_POST['dthmname'];
                                        $LastNameD = $_POST['dthlname'];
                                        $SexD = $_POST['dthsex'];
                                        $DobD = $_POST['dthbirthdate'];
                                        $NationalityD = $_POST['dthnationality'];
                                    }

                                    $DthTitle = $_POST['dthtitle'];
                                    $DthReligion = $_POST['dthreligion'];
                                    $DthJob = $_POST['dthjob'];
                                    $DthPlace = $_POST['dthplace'];
                                    $DthCause = $_POST['dthcause'];
                                    $DthDate = $_POST['dthdate'];

                                    $plusDeath = "SELECT * FROM deathevent ORDER BY id DESC LIMIT 1";
                                    $queryRunDeath = mysqli_query($con, $plusDeath);
                                    $valuesDeath = mysqli_fetch_array($queryRunDeath);
                                    $lastIdDeath = $valuesDeath ? $valuesDeath['id'] : 0;
                                    $lastIdDeath += 1;
                                    $dateDeath = date('Y');
                                    $deatEventId = $regcode . $ZCode . $WCode . $KCode . $lastIdDeath . $dateDeath;

                                    if ($BirthNum !== null) {
                                        $checkdeath = "SELECT * FROM deathevent WHERE birtheventnum='$BirthNum'";
                                        $rundeath = mysqli_query($con, $checkdeath);
                                        if (mysqli_num_rows($rundeath) > 0) {
                                            echo "<script> alert('Event already registered !!!');</script>";
                                        } else {
                                            if (validateInput($SexD, $DthReligion, $DthCause, $DthTitle, $FistNameD, $MiddleNameD, $LastNameD)) {
                                                // Fetch date of birth from the birth event record
                                                $birthQuery = "SELECT day FROM birthevent WHERE eventnumber='$BirthNum'";
                                                $birthResult = mysqli_query($con, $birthQuery);
                                                if ($birthResult && mysqli_num_rows($birthResult) > 0) {
                                                    $birthRow = mysqli_fetch_assoc($birthResult);
                                                    $dob = $birthRow['day'];
                                                    
                                                    // Check if the date of death is greater than the date of birth
                                                    if (strtotime($DthDate) > strtotime($dob)) {
                                                        $deathquery = "INSERT INTO deathevent (birtheventnum, fname, mname, lname, sex, nationality, title, religion, dob, job, cause, dateofdeath, rcode, zcode, wcode, kcode, eventnumber, regyear, regmonth)
                                                                       VALUES ('$BirthNum', '$FistNameD', '$MiddleNameD', '$LastNameD', '$SexD', '$NationalityD', '$DthTitle', '$DthReligion', '$DobD', '$DthJob', '$DthCause', '$DthDate', '$regcode', '$ZCode', '$WCode', '$KCode', '$deatEventId', '$todaydate', '$currentMonth')";
                                                        
                                                        if (mysqli_query($con, $deathquery)) {
                                                            echo "<p style='color:green; text-align:center;'>Event is successfully registered!</p>";
                                                            $sqlupdate = "UPDATE birthevent SET status='Dead' WHERE eventnumber='$BirthNum'";
                                                            if (!mysqli_query($con, $sqlupdate)) {
                                                                echo "<p style='color:red; text-align:center;'>Error updating birth event status: " . mysqli_error($con) . "</p>";
                                                            }
                                                        } else {
                                                            echo "<p style='color:red; text-align:center;'>Error registering death event: " . mysqli_error($con) . "</p>";
                                                        }
                                                    } else {
                                                        echo "<script>alert('Date of death cannot be earlier than date of birth!');</script>";
                                                    }
                                                } else {
                                                    echo "<p style='color:red; text-align:center;'>Error fetching birth date: " . mysqli_error($con) . "</p>";
                                                }
                                            }
                                        }
                                    } else {
                                        $checkdeath = "SELECT * FROM deathevent WHERE fname='$FistNameD' AND mname='$MiddleNameD' AND lname='$LastNameD'";
                                        $rundeath = mysqli_query($con, $checkdeath);
                                        if (mysqli_num_rows($rundeath) > 0) {
                                            echo "<script> alert('Event already registered !!!');</script>";
                                        } else {
                                            if (validateInput($SexD, $DthReligion, $DthCause, $DthTitle, $FistNameD, $MiddleNameD, $LastNameD)) {
                                                // Fetch date of birth for validation if available
                                                $dob = $DobD; // Assume $DobD is provided for validation
                                                
                                                // Check if the date of death is greater than the date of birth
                                                if (strtotime($DthDate) > strtotime($dob)) {
                                                    $deathquery = "INSERT INTO deathevent (fname, mname, lname, sex, nationality, title, religion, dob, job, cause, dateofdeath, rcode, zcode, wcode, kcode, eventnumber, regyear, regmonth)
                                                                   VALUES ('$FistNameD', '$MiddleNameD', '$LastNameD', '$SexD', '$NationalityD', '$DthTitle', '$DthReligion', '$DobD', '$DthJob', '$DthCause', '$DthDate', '$regcode', '$ZCode', '$WCode', '$KCode', '$deatEventId', '$todaydate', '$currentMonth')";
                                                    
                                                    if (mysqli_query($con, $deathquery)) {
                                                        echo "<script>alert('Event is successfully registered!');</script>";
                                                    } else {
                                                        echo "<p style='color:red; text-align:center;'>Error registering death event: " . mysqli_error($con) . "</p>";
                                                    }
                                                } else {
                                                    echo "<script>alert('Date of death cannot be earlier than date of birth!');</script>";
                                                }
                                            }
                                        }
                                    }
                                    
                                }

                                function validateInput($SexD, $DthReligion, $DthCause, $DthTitle, $FistNameD, $MiddleNameD, $LastNameD) {
                                    if ($SexD != 'Choose Sex' && $DthReligion != 'Choose Religion' && $DthCause != 'Choose Cause of Death' && !empty($DthTitle) && !empty($FistNameD) && !empty($MiddleNameD) && !empty($LastNameD)) {
                                        return true;
                                    } else {
                                        echo "<script> alert('Some fields are still empty');</script>";
                                        return false;
                                    }
                                }
                            ?>

                            <!-- Form for Registering Death Event -->
                            <div class="col-md-12">
                                <div class="dash-item first-dash-item">
                                    <div class="inner-item">
                                        <form method="POST" action="">
                                            <!-- Searching a Birth Event -->
                                            <div class="w3-container w3-blue" id="searchBID">
                                                <h3 style="color: black; font-size: 22px; font-family:  'Times New Roman', Times, serif;">Search Birth Unique Number</h3>
                                                <hr>
                                                <div>
                                                    <div class="form-group">
                                                        <input type="text" name="birthRegNum4dth" class="w3-input w3-border w3-round w3-text-black" placeholder="Birth ID">
                                                    </div>
                                                    <div class="form-group">
                                                        <button type="submit" name="search" class="w3-btn w3-green w3-round-large w3-medium" style="font-family: 'Comic Sans MS';"><i class="fa fa-search"></i> Search</button>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- Death Event Registration -->
                                            <div class="w3-container w3-sand" id="deathDetails" style="margin-top: 20px;">
											<h3 style="color: black; font-size: 22px; font-family: 'Times New Roman', Times, serif;">Death Event Details</h3>
                                                <hr>

                                                <div class="form-group">
                                                    <label for="dthfname">First Name</label>
													<input type="text" name="dthfname" class="w3-input w3-hover-blue w3-border w3-round" placeholder="First Name" value="<?php echo isset($_SESSION['fname']) ? $_SESSION['fname'] : ''; ?>" onkeypress="return /[A-Za-z]/i.test(event.key)">
                                                 <?php 
                                                    if (isset($_POST['submitdthevent']) && !preg_match("/^[A-Za-z]+$/", $_POST['dthfname']) && !empty($_POST['dthfname'])) {
                                                    echo "<p style='text-align:center;color:red;'>First Name should only contain alphabetic characters</p>";
                                                         }
														 if (isset($_POST['submitdthevent']) && empty($_POST['dthfname']))
														 {
													   echo "<p style='text-align:center;color:red;'> Empty First Name</p>";
														}
                                                  ?>
                                                </div>

                                                <div class="form-group">
                                                    <label for="dthmname">Middle Name</label>
													<input type="text" name="dthmname" class="w3-input w3-hover-blue w3-border w3-round" placeholder="Middel Name" value="<?php echo isset($_SESSION['mname']) ? $_SESSION['mname'] : ''; ?>" onkeypress="return /[A-Za-z]/i.test(event.key)">
                                                   <?php 
                                                     if (isset($_POST['submitdthevent']) && !preg_match("/^[A-Za-z]+$/", $_POST['dthmname']) && !empty($_POST['dthmname'])) {
                                                     echo "<p style='text-align:center;color:red;'>Middel Name should only contain alphabetic characters</p>";
                                                         }
														 if (isset($_POST['submitdthevent']) && empty($_POST['dthmname']))
														 {
													   echo "<p style='text-align:center;color:red;'> Empty Middel Name</p>";
														}
                                                    ?>       
												 </div>

                                                <div class="form-group">
                                                    <label for="dthlname">Last Name</label>
													<input type="text" name="dthlname" class=" w3-input w3-hover-blue w3-border w3-round" placeholder="Last Name" value="<?php echo isset($_SESSION['lname']) ? $_SESSION['lname'] : ''; ?>" onkeypress="return /[A-Za-z]/i.test(event.key)">
                                                  <?php 
                                                     if (isset($_POST['submitdthevent']) && !preg_match("/^[A-Za-z]+$/", $_POST['dthlname']) && !empty($_POST['dthlname'])) {
                                                     echo "<p style='text-align:center;color:red;'>Last Name should only contain alphabetic characters</p>";
                                                         }
														 if (isset($_POST['submitdthevent']) && empty($_POST['dthlname']))
														 {
													   echo "<p style='text-align:center;color:red;'> Empty Last Name</p>";
														}
                                                   ?>                                             
											   </div>

                                                <div class="form-group">
                                                    <label for="dthsex">Sex</label>
                                                    <select name="dthsex" class="w3-select w3-hover-blue w3-border w3-round">
                                                        <option value="<?php echo isset($_SESSION['sex']) ? $_SESSION['sex'] : 'Choose Sex'; ?>"><?php echo isset($_SESSION['sex']) ? $_SESSION['sex'] : 'Choose Sex'; ?></option>
                                                        <option value="Male">Male</option>
                                                        <option value="Female">Female</option>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label for="dthbirthdate">Date of Birth</label>
                                                    <input type="date" name="dthbirthdate" class="w3-input w3-hover-blue w3-border w3-round" placeholder="Date of Birth" value="<?php echo isset($_SESSION['dob']) ? $_SESSION['dob'] : ''; ?>">
                                                </div>

                                                <div class="form-group">
                                                    <label for="dthnationality">Nationality</label>
                                                    <input type="text" name="dthnationality" class="w3-input w3-hover-blue w3-border w3-round" placeholder="Nationality" value="<?php echo isset($_SESSION['nationality']) ? $_SESSION['nationality'] : ''; ?>">
                                                </div>

                                                <div class="form-group">
                                                    <label for="dthtitle">Title</label>
				                                 <select class="w3-input w3-hover-blue w3-text-black" name="dthtitle">
				                                    <option>Choose title..</option>
				                                    <option>Mr.</option>
													<option>Mrs.</option>
				                                    <option>DR.</option>
				                                    <option>Prof.</option>
				                                    
				                                 </select>
				                                  <?php 
				                                     if(isset($_POST['submitdthevent']) && $DthTitle=="Choose title.."){
				                                        echo"<p class='w3-text-red w3-center'>Please choose a valid title!</p>";
				                                     }
				                                   ?>                          
												</div>

                                                <div class="form-group">
                                                    <label for="dthreligion">Religion</label>
                                                    <select name="dthreligion" class="w3-select w3-hover-blue w3-border w3-round">
                                                        <option value="Choose Religion">Choose Religion</option>
                                                        <option>Orthodox</option>
				                                        <option>Protestant</option>
				                                        <option>Catholic</option>
				                                        <option>Islam</option>
				                                        <option>Others</option>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label for="dthjob">Occupation</label>
                                                    <input type="text" name="dthjob" class="w3-input w3-hover-blue w3-border w3-round" placeholder="Occupation">
                                                </div>

                                                <div class="form-group">
                                                    <label for="dthplace">Place of Death</label>
													<input type="text" readonly="" class="w3-input w3-hover-blue w3-border w3-round" placeholder="Place of Death" name="dthplace" value="<?php echo $KCode ?>">

                                                </div>

                                                <div class="form-group">
                                                    <label for="dthcause">Cause of Death</label>
                                                  <select name="dthcause" class="w3-select w3-hover-blue w3-border w3-round">
                                                        <option value="Choose Cause of Death">Choose Cause of Death</option>
                                                    <optgroup label="Emergency">
				                                        <option>Choose cause of death</option>
				                                        <option>Car Accident</option>
				                                        <option>Fire</option>
				                                        <option>Earthquek</option>
				                                        <option>Drought</option>
				                                        <option>Flooding</option>

				                                     </optgroup>
				                                    <optgroup label="Disease">
				                                        <option>Cancer</option>
				                                        <option>HIV</option>
				                                        <option>Mental illnes</option>
				                                        <option>Malaria</option>
				                                        <option>Intestinal helminthiasis</option>
				                                        <option>Tuberculosis</option>
				                                        <option>Skin diseases</option>
				                                        <option>Meningitis</option>
				                                        <option>Measles</option>
				                                        <option>Pneumonia</option>
				                                        <option>Bronchitis</option>
				                                        <option>Diarrhea</option>
				                                        <option>Other</option>
				                                        
				                                    </optgroup>
                                                  </select>
                                                </div>

                                                <div class="form-group">
                                                    <label for="dthdate">Date of Death</label>
                                                    <input type="date" name="dthdate" class="w3-input w3-hover-blue w3-border w3-round" placeholder="Date of Death">
                                                </div>

                                                <div class="form-group">
                                                    <button type="submit" name="submitdthevent" class="w3-btn w3-blue w3-round-large w3-medium"><i class="fa fa-save"></i> Register</button>
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
            <!-- /USER DETAIL ENDS HERE -->
        </div>
    </div>
    <?php include("inc/footer.php"); ?>
</body>
</html>

    <!--==============================USER DETAILS ENDS HERE===========================-->
   <!-- Footer============================-->
    <div class=""></div>
        <!-- jQuery -->
        <script src="js/jquery.min.js"></script>
        <script src="js/jquery-1.9.1.min.js"></script>
        <!-- Bootstrap -->
        <script src="js/bootstrap.min.js"></script>
        <!-- Custom Theme Scripts -->
        <script src="js/custom.min.js"></script>
</body>

</html
