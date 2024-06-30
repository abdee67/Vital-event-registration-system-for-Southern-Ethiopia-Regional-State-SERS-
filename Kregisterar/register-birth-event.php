
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

    <!--==============================BIRTH REGISTRATION BEGINS HERE==========================-->
    <div class="right_col" role="main">
                <!-- top tiles -->
                <div class="row tile_count " style="border-bottom: 3px solid cadetblue; ">
                    <div style="margin-top: 5px;">
                       <span>
                            <h6 class="w3-center item-title w3-round w3-animate-zoom" style="font-size: 50px; color: black; padding: 10px; font-weight: bold;">
                                <i class="w3-padding w3-animate-fading"><b> BIRTH EVENT REGISTRATION</b></i>
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
                                    <!--===========Register Birth Event Backends begin here===========-->
                                    <!--=======                                                       -->
                                    <!--==============================================================-->
                                 <?php
                                     $currentMonth=date('F');
                                     $todayDate=date('Y');
                                     $regdate=date('d-m-Y');

                                    if (isset($_POST['submitbevent'])) 

                                     {   
                                        #GET BIRTH INFORMATION FROM THE FORM BELOW

                                         //from column 1
                                         $ChildFNAme=$_POST['childfname'];
                                         $ChildMName=$_POST['childmname'];
                                         $ChildLName=$_POST['childlname'];
                                         $ChildMother=$_POST['motherfname'];
                                         //from column 2
                                         $ChildSex=$_POST['chsex'];
                                         $ChildNationality=$_POST['chnationality'];
                                         $ChildDob=$_POST['chdob'];
                                    
                                         //from column 3
                                        $ChildBirthPlace=$_POST['chbplace'];
                                        $ChildWeight=$_POST['chweight'];
                                      
                                        $RegType=$_POST['chregtype'];

                                        $ChildBloodType=$_POST['chbloodtype'];

                                        #STORE RETRIVED BIRTH INFORAMTION ON THE SESSION

                                        $_SESSION['childfname']=$ChildFNAme; 
                                        $_SESSION['childmname']=$ChildMName;
                                        $_SESSION['childlname']=$ChildLName;
                                        $_SESSION['motherfname']=$ChildMother;
                                        $_SESSION['chnationality']=$ChildNationality;
                                        $_SESSION['chbplace']=$ChildBirthPlace;
                                        $_SESSION['chweight']=$ChildWeight;              
                                                            
                                        $ChildFNAme=$_SESSION['childfname']; 
                                        $ChildMName=$_SESSION['childmname'];
                                        $ChildLName=$_SESSION['childlname'];
                                        $ChildMother=$_SESSION['motherfname'];
                                        $ChildNationality=$_SESSION['chnationality'];
                                        $ChildBirthPlace=$_SESSION['chbplace'];
                                        $ChildWeight=$_SESSION['chweight'];


                                        #GENERATING BIRTH REGISTRATION UNIQUE NUMBE
                                        $plus = "SELECT * FROM birthevent ORDER BY id DESC LIMIT 1";
                                        $queryRun = mysqli_query($con, $plus);
                                        $values = mysqli_fetch_array($queryRun);
                                        $lastId = $values ? $values['id'] : 0;
                                        $lastId += 1;
                                        $date = date('Y');
                                        $eventId = $regcode . $ZCode . $WCode . $KCode . $lastId . $date;
    
                                        #CALCULATING THE AGE OF REGISTERED PERSON
                                        $dateOfBirth=new DateTime($ChildDob);
                                        $interval=$dateOfBirth->diff(new DateTime());
                                        $age=$interval->y;

                                        #RESTRICTING DUPLICATE REGISTRATION
                                        $check="SELECT * FROM birthevent WHERE (fname='$ChildFNAme' AND lname='$ChildLName')AND (mname='$ChildMName') ";
                                        if($run=mysqli_query($con,$check)){
                                           $count=mysqli_num_rows($run);
                                            if($count>0)
                                                echo "<script>alert('event is already registered!');</script>";
                                            else
                                                {   #BEGIN INSERTION/REGISTRATION
                                                    if($ChildSex!='select sex..' && $ChildWeight<=5 && $RegType!='select registration type..' && $ChildBloodType!='Select Blood type here..' && !empty($ChildFNAme) && !empty($ChildMName) && !empty($ChildLName) && !empty($ChildMother) && !empty($ChildDob) && !empty($ChildWeight))
                                                        {

                                                            $queryInsert="INSERT INTO birthevent( fname, mname, lname, momName, day, sex, nationality, weight, blood, region, zone, woreda, kebele, eventnumber,status,regtype,regyear,regdate,maritialStatus,regmonth,age) VALUES('$ChildFNAme','$ChildMName','$ChildLName','$ChildMother','$ChildDob','$ChildSex','$ChildNationality','$ChildWeight','$ChildBloodType','$regcode','$ZCode','$WCode','$KCode','$eventId','Alive','$RegType','$todayDate','$regdate','UnMarried','$currentMonth','$age') ";
                                                            if(mysqli_query($con,$queryInsert)){
                                                                echo "<p style='color:green; text-align:center'>Successfully Registered</p>";
                                                            }
                                                        }
                                                    else{

                                                        if($ChildSex=='select sex..'){
                                                                echo "<script>alert('select valid child sex');</script>";
                                                        }


                                                        else if($ChildWeight>5){
                                                                echo "<script>alert('child weight must less than 5 kg');</script>";
                                                        }
                                                        else if($RegType=='select registration type..'){
                                                                echo "<script>alert('select valid registration type');</script>";
                                                        }
                                                        else if($ChildBloodType=='Select Blood type here..'){
                                                                echo "<script>alert('select valid blood type');</script>";
                                                        }
                                                    }
                                                        
                                                    }
                                                }
                                        }
                                    
                                 ?>
                                    <!--==========Register Birth Event Backends end her================-->
                                    <div class="dash-item first-dash-item">
    <div class="inner-item">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="row">
                <!-- First column -->
                <div class="form-group">
                    <!-- Child's First Name -->
                    <label class="w3-text-black">First Name</label>
                    <input type="text" class="w3-input w3-hover-blue w3-text-black w3-round w3-border" placeholder="Enter first name here" name="childfname" onkeypress="return (event.charCode>64 && event.charCode<91) || (event.charCode>96 && event.charCode<123)" value="<?php if(isset($ChildFNAme))echo $ChildFNAme; ?>">
                    <?php 
                    if(isset($_POST['submitbevent']) && empty($ChildFNAme)){
                        echo "<p style='color:red;text-align:center;'>Empty First name, please fill it </p>";
                    }
                    if(isset($_POST['submitbevent']) && !preg_match("/^[A-Za-z]/", $ChildFNAme) && !empty($ChildFNAme)){
                        echo"<p class='w3-text-red w3-center'>Invalid format of child first name</p>";
                    }
                    ?>

                    <!-- Child's Middle Name -->
                    <label class="w3-text-black">Middle Name</label>
                    <input type="text" class="w3-input w3-hover-blue w3-text-black w3-round w3-border" placeholder="Enter middle name here" name="childmname" onkeypress="return (event.charCode>64 && event.charCode<91) || (event.charCode>96 && event.charCode<123)" value="<?php if(isset($ChildMName))echo $ChildMName; ?>">
                    <?php 
                    if(isset($_POST['submitbevent']) && !preg_match("/^[A-Za-z]/", $ChildMName) && !empty($ChildMName)){
                        echo"<p class='w3-text-red w3-center'>Invalid format of child middle name</p>";
                    }
                    if (isset($_POST['submitbevent']) && empty($ChildMName)) {
                        echo"<p class='w3-text-red w3-center'>Empty middle name, please fill it</p>";
                    }
                    ?>

                    <!-- Child's Last Name -->
                    <label class="w3-text-black">Last Name</label>
                    <input type="text" class="w3-input w3-hover-blue w3-text-black w3-round w3-border" placeholder="Enter last name here" name="childlname" onkeypress="return (event.charCode>64 && event.charCode<91) || (event.charCode>96 && event.charCode<123)" value="<?php if(isset($ChildLName))echo $ChildLName; ?>">
                    <?php 
                    if(isset($_POST['submitbevent']) && !preg_match("/^[A-Za-z]/", $ChildLName) && !empty($ChildLName)){
                        echo"<p class='w3-text-red w3-center'>Invalid format of child last name</p>";
                    }
                    elseif (isset($_POST['submitbevent']) && empty($ChildLName)) {
                        echo"<p class='w3-text-red w3-center'>Empty last name, please fill it</p>";
                    }
                    ?>

                    <!-- Child's Sex -->
                    <label class="w3-text-black">Sex</label>
                    <select class="w3-input w3-hover-blue w3-text-black w3-round w3-border" name="chsex">
                        <option>select sex..</option>
                        <option>Male</option>
                        <option>Female</option>
                    </select>
                    <?php 
                    if(isset($_POST['submitbevent']) && $ChildSex=="select sex.."){
                        echo"<p class='w3-text-red w3-center'>Please choose a valid sex of child!</p>";
                    }
                    ?>

                    <!-- Mother's Full Name -->
                    <label class="w3-text-black">Mother Full Name</label>
                    <input type="text" class="w3-input w3-hover-blue w3-text-black w3-round w3-border" placeholder="Mother Full Name" name="motherfname" onkeypress="return (event.charCode>64 && event.charCode<91) || (event.charCode>96 && event.charCode<123) || (event.charCode==32)" value="<?php if(isset($ChildMother))echo $ChildMother; ?>">
                    <?php 
                    if(isset($_POST['submitbevent']) && !preg_match("/^[A-Za-z]/", $ChildMother) && !empty($ChildMother)){
                        echo"<p class='w3-text-red w3-center'>Invalid format of child mother name</p>";
                    }
                    if (isset($_POST['submitbevent']) && empty($ChildMother)) {
                        echo"<p class='w3-text-red w3-center'>Empty mother name, please fill it</p>";
                    }
                    ?>
                </div>

                <!-- Second column -->
                <div class="form-group">
                    <!-- Nationality -->
                    <label class="w3-text-black">Nationality</label>
                    <select class="w3-input w3-hover-blue w3-text-black w3-round w3-border" name="chnationality">
                        <option>Ethiopian</option>
                        <option>Eritrean</option>
                        <option>Kenyan</option>
                        <option>Sudanese</option>
                        <option>Somali</option>
                        <option>Egyptian</option>
                        <option>Others</option>
                    </select>
                    <br>

                    <!-- Birth Date -->
                    <label class="w3-text-black">Birth Date</label>
                    <input type="date" class="w3-input w3-hover-blue w3-text-black w3-round w3-border" placeholder="Date of birth" id="date" name="chdob" max="<?php echo date('Y-m-d'); ?>">
                    <?php
                    if (isset($_POST['submitbevent']) && empty($ChildDob)) {
                        echo "<p style='color:red; text-align:center;'>Fill birth date</p>";
                    }
                    ?>
                    <br>

                    <!-- Kebele -->
                    <label class="w3-text-black">Kebele</label>
                    <input readonly="" type="text" class="w3-input w3-hover-blue w3-text-black w3-round w3-border" placeholder="Place of birth" name="chbplace" required="" value="<?php if(isset($KCode))echo $KCode; ?> kebele">
                </div>

                <!-- Third column -->
                <div class="form-group">
                    <!-- Child's Weight -->
                    <label class="w3-text-black">Weight</label>
                    <input type="text" class="w3-input w3-hover-blue w3-text-black w3-round w3-border" maxlength="1" onkeypress="return event.charCode>48 && event.charCode<58" placeholder="Weight of a child" name="chweight">
                    <?php
                    if (isset($_POST['submitbevent']) && empty($ChildWeight)) {
                        echo "<p style='color:red;text-align:center;'>Fill the weight of child</p>";
                    }
                    ?>

                    <!-- Registration Type -->
                    <label class="w3-text-black">Registration Type</label>
                    <select class="w3-input w3-hover-blue w3-text-black w3-round w3-border" name="chregtype" required="">
                        <option>select registration type..</option>
                        <option>Passive</option>
                        <option>Active</option>
                        <option>Other</option>
                    </select>
                    <?php 
                    if(isset($_POST['submitbevent']) && $RegType=="select registration type.."){
                        echo"<p class='w3-text-red w3-center'>Please choose a valid type of registration!</p>";
                    }
                    ?>

                    <!-- Blood Type -->
                    <label class="w3-text-black">Blood Type</label>
                    <select class="w3-input w3-hover-blue w3-text-black w3-round w3-border" name="chbloodtype" required="">
                        <option>Select blood type here..</option>
                        <option>A</option>
                        <option>B</option>
                        <option>AB</option>
                        <option>O</option>
                        <option>Unknown</option>
                    </select>
                    <?php 
                    if(isset($_POST['submitbevent']) && $ChildBloodType=="Select blood type here.."){
                        echo"<p class='w3-text-red w3-center'>Please choose a valid type of blood!</p>";
                    }
                    ?>

                    <!-- Registration Date -->
                    <label class="w3-text-black">Reg Date</label>
                    <input type="text" class="w3-input w3-hover-blue w3-text-black w3-round w3-border" placeholder="Date of registration" name="dthdate" value="<?php echo $regdate;?>" readonly="">
                </div>
            </div>

            <div class="row">
                <!-- Submit button container -->
                <div class="form-group"></div>
                <div class="form-group">
                    <br>
                    <input type="submit" class="form-control btn btn-sm w3-blue" value="Save" name="submitbevent">
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
