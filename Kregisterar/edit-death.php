
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
                <div class="row tile_count " style="border-bottom: 5px solid cadetblue;background-color: <?php if(isset($col)){echo $col;} ?>; ">
                    <div class="col-md-4" style="margin-top: 0px;">
                    <span ><h2 class="w3-center" style="font-size: 30px; color: black;"><?php echo "<b>EDIT DEATH</b>";?> </h2></span>
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
                                    <div class="inner-item dash-searc-form">
                                        <?php

                                            $_SESSION['deathnumber']=$_GET['DeathId'] ;

                                            $DeathID= $_SESSION['deathnumber'];
                                            $selectdeath="SELECT * FROM deathevent WHERE eventnumber='$DeathID'";
                                        	$deathresult=mysqli_query($con,$selectdeath);
                                        	while ($deathlist=mysqli_fetch_assoc($deathresult)) {

                                             
                                       		 $Birth_ID=$deathlist['birtheventnum'];
                                       		 $FirstName=$deathlist['fname'];
                                        	 $MiddleName=$deathlist['mname'];
                                        	 $LastName=$deathlist['lname'];
                                             $Sex=$deathlist['sex'];
                                        	 $Nationality=$deathlist['nationality'];
                                            
                                        	 $title=$deathlist['title'];
                                             $religion=$deathlist['religion'];
                                             $Dob=$deathlist['dob'];
                                             $job=$deathlist['job'];
                                             $Cause=$deathlist['cause'];
                                             $dateofDeath=$deathlist['dateofdeath'];

                                        }
                                        	
                                        	
                                        ?>
                        <!--============================EDIT DEATH BEGINS HERE=================-->
                        <!--==================DEATH FORM HERE==========================================-->
                        <div class="container-fluid">
    <form action="update-death.php?DthID=<?php echo $DeathID; ?>" method="POST" enctype="multipart/form-data">
        <div class="row">
            <!-- Column 1 -->
            <div class="col-md-6">
                <label class="w3-text-black">First Name</label>
                <input type="text" class="w3-input w3-hover-blue w3-text-black" placeholder="First Name here" required="" name="dthfname" value="<?php echo $FirstName; ?>">
                <?php 
                if(isset($_POST['submitdthevent']) && !preg_match("/^[A-Za-z]/",$FistNameD)){
                    echo "<p class='w3-text-red w3-center'>Invalid Format of Dead Person First Name</p>";
                }
                ?>
                <label class="w3-text-black">Middle Name</label>
                <input type="text" class="w3-input w3-hover-blue w3-text-black" placeholder="Middle Name here" name="dthmname" required="" value="<?php echo $MiddleName;?>">
                <?php 
                if(isset($_POST['submitdthevent']) && !preg_match("/^[A-Za-z]/",$MiddleNameD)){
                    echo "<p class='w3-text-red w3-center'>Invalid Format of Dead Person Middle Name</p>";
                }
                ?>
                <label class="w3-text-black">Last Name</label>
                <input type="text" class="w3-input w3-hover-blue w3-text-black" placeholder="Last Name here" name="dthlname" required="" value="<?php echo $LastName; ?>">
                <?php 
                if(isset($_POST['submitdthevent']) && !preg_match("/^[A-Za-z]/",$LastNameD)){
                    echo "<p class='w3-text-red w3-center'>Invalid Format of Dead Person Last Name</p>";
                }
                ?>
                <label class="w3-text-black">Sex</label>
                <input type="text" readonly="" class="w3-input w3-hover-blue w3-text-black" name="sex" value="<?php echo $Sex; ?>">
                <label class="w3-text-black">Nationality</label>
                <input type="text" class="w3-input w3-hover-blue w3-text-black" placeholder="Nationality" name="dthnationality" required="" value="<?php echo $Nationality; ?>">
                <?php 
                if(isset($_POST['submitdthevent']) && !preg_match("/^[A-Za-z]/",$NationalityD)){
                    echo "<p class='w3-text-red w3-center'>Invalid Format of Dead Person Nationality</p>";
                }
                ?>
                <label class="w3-text-black">Religion</label>
                <input type="text" class="w3-input w3-hover-blue w3-text-black" name="dthreligion" readonly="" value="<?php echo $religion; ?>">
                <br>
                <input type="submit" class="form-control btn btn-sm w3-blue" value="Save" name="updatedeath">
            </div>
            <!-- Column 2 -->
            <div class="col-md-6">
                <label class="w3-text-black">Title</label>
                <input type="text" class="w3-input w3-hover-blue w3-text-black" name="dthtitle" value="<?php echo $title; ?>" readonly="">
                <label class="w3-text-black">Birth Date</label>
                <input type="date" class="w3-input w3-hover-blue w3-text-black" placeholder="Birth date here" name="dthbirthdate" value="<?php echo $Dob; ?>" readonly="">
                <label class="w3-text-black">Job</label>
                <input type="text" class="w3-input w3-hover-blue w3-text-black" placeholder="Job here" name="dthjob" required="" value="<?php echo $job; ?>">
                <?php 
                if(isset($_POST['submitdthevent']) && !preg_match("/^[A-Za-z]/",$DthJob)){
                    echo "<p class='w3-text-red w3-center'>Invalid Format of Dead Person Job</p>";
                }
                ?>
                <label class="w3-text-black">Death Place</label>
                <input type="text" class="w3-input w3-hover-blue w3-text-black" placeholder="Death place" name="dthplace" value="<?php echo $KCode ?>" readonly="">
                <label class="w3-text-black">Cause of Death</label>
                <select class="w3-input w3-hover-blue w3-text-black" name="dthcause" required="">
                    <optgroup label="Emergency">
                        <option>Choose cause of death</option>
                        <option>Car Accident</option>
                        <option>Fire</option>
                        <option>Earthquake</option>
                        <option>Drought</option>
                        <option>Flooding</option>
                    </optgroup>
                    <optgroup label="Disease">
                        <option>Cancer</option>
                        <option>HIV</option>
                        <option>Mental illness</option>
                        <option>Malaria</option>
                        <option>Intestinal helminthiasis</option>
                        <option>Tuberculosis</option>
                        <option>Skin diseases</option>
                        <option>Meningitis</option>
                        <option>Measles</option>
                        <option>Pneumonia</option>
                        <option>Bronchitis</option>
                        <option>Diarrhea</option>
                        <option>Other...</option>
                    </optgroup>
                </select>
                <?php 
                if(isset($_POST['submitdthevent']) && $DthCause == "Choose cause of death"){
                    echo "<p class='w3-text-red w3-center'>Please choose a valid cause of death!</p>";
                }
                ?>
                <label class="w3-text-black">Death Date</label>
                <input type="date" class="w3-input w3-hover-blue w3-text-black" placeholder="Death date" name="dthdate" required="" value="<?php echo $dateofDeath; ?>" readonly="">
            </div>
        </div>
    </form>
</div>

                
            </div>
            
        </div>

                        <!--===========================EDIT DEATH ENDS HERE====================-->
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
