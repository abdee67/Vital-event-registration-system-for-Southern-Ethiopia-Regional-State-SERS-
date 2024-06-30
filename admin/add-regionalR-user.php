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
    height: 230px;
    margin-left: 60px;
    margin-top: 23px;
    margin-bottom: 20px;

    border:5px solid;
    border-color: green;
    border-radius: 25px;
   }

</style>
<script type="text/javascript">
         function validateFName(){
            var fullname = document.getElementById("fullname").value;
            
            if(fullname.length == 0){
                produceprompt("empty field","fullnameP","red");   
                return false;
            }
            if(!username.match(/^[A-Za-z]*\s{0}[A-Za-z]*$/)){
                produceprompt("invalid input","fullnameP","red"); 
                return false;
            }
            produceprompt("valid","fullnameP","green");   
            return true;
        }
</script>

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
                <div class="row tile_count " style="border-bottom: 3px solid cadetblue;">
                    <div class="" style="margin-top: 20px;">
                    <span>
                            <h6 class="w3-center item-title w3-round w3-animate-zoom" style="font-size: 50px; color: black; padding: 10px; font-weight: bold;">
                                <i class="w3-padding w3-animate-fading"><b>ADD REGIONAL USER</b></i>
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
                                    
         <!---==================Begin adding user back end =================-->
           <?php 
                if(isset($_POST['adduser'])){
               
                $fullname=$_POST['fullname'];
                $fname=$_POST['fname'];
                $email=$_POST['email'];
                $phone=$_POST['phone'];
                $password=md5($_POST['password']);
                $confirm=md5($_POST['confirmPassword']);
                $image=$_FILES['image']['name'];
                $extension=strtolower(substr($image, strpos($image, '.')+1));
                if(isset($_POST['adduser']) ){
                    if(!empty($fullname) && !empty($fname)&&!empty($email)&&!empty($phone)&&!empty($password)&& !empty($image)&&$password==$confirm){
                    
                    if($_SESSION['role']=='admin'){
                        $role="Rver";
                    }
                    if (preg_match("/^[A-Za-z]/",$fullname)) { 
                       if(preg_match("/^[A-Za-z]/",$fname)){
                            if(preg_match("/^.+@.+\.com$/", $email)){
                                if(preg_match("/^[0-9]{10}/", $phone)){
                                    if($extension=='jpg'||$extension=='png'||$extension=='gif'||$extension=='jpeg'){
                                                $check="SELECT * from memberuser where name='$fname' and password='$password' ";
                                                $count=mysqli_num_rows(mysqli_query($con,$check));
                                                if($count==1){
                                                    echo "<script>";
                                                        echo "alert('user is already registered')";
                                                    echo "</script>";
                                                    echo "<p class='w3-text-red w3-center'>Another user registered found with similar information</p>";
                                                }
                                                else
                                                {

                                            $insert="INSERT INTO memberuser (name,email,phone,password,role,pic,rcode,FullName,firstlogin) VALUES('$fname','$email','$phone','$password','$role','$image','$RCode','$fullname','0')";
                                            if(mysqli_query($con,$insert)){
                                                if(move_uploaded_file($_FILES['image']['tmp_name'],"../StaffPic/".$_FILES['image']['name'])){
                                                    echo "<p style='color:green;text-align:center;'>User Registered Successfully";
                                                }
                                                else
                                                    echo "not done";
                                            }
                                            else
                                                echo "not well done";
                                                }
                                        }else
                                        {
                                            echo "<p class='w3-text-red'>Invalid image format</p>";
                                        }  

                                }
                                else
                                {
                                     echo "<p class='w3-text-red'>Invalid Phone number format</p>";

                                }

                            }
                            else{
                                echo "<p class='w3-text-red'>Invalid email format</p>";
                            }
                    }
                    else
                    {
                        echo "";
                    }
                }
                else{
                    echo "<p class='w3-text-red'>Invalid name format</p>";
                }


                   $time=time();
                   $date=date('Y M D @ H:i:s',$time);               
                   //register($fname,$lname,$email,$phone,$password);
                }

            }

        }

     ?>
         <!--===================End of Back end of adding user==============-->
     <div class="w3-container">
            <form action="" method="POST" enctype="multipart/form-data" >
                 <div class="w3-section">
                    <div class="row">
                        <div class="col-md-5">
                            <label class="w3-text-bblue">Full Name</label>
                            <input style="color: black;" class="w3-input  w3-margin-bottom" type="text" placeholder="Full Name here.." name="fullname" id="fullname"  onkeypress="return (event.charCode>64 && event.charCode<91) || (event.charCode>96 && event.charCode<123) || event.charCode==32 "value="<?php if(isset($fullname)){echo $fullname;} ?>">
                            <p id="fullnameP"></p>

                                <?php 
                                        if(isset($_POST['adduser'])&&empty($fname)){

                                            echo "<p class='w3-text-red'>Full name  must be provided</p>";
                                        }
                                        elseif(isset($_POST['adduser'])&&!preg_match("/^[A-Za-z]/",$fname)){
                                            echo "<p class='w3-text-red'>invalid Full Name format!</p>";
                                        }
                                 ?>
                                <label class="w3-text-blue">Username</label>
                                <input style="color: black;" class="w3-input  w3-margin-bottom" type="text" placeholder="Username here.." name="fname"  onkeypress="return (event.charCode>64 && event.charCode<91) || (event.charCode>96 && event.charCode<123) " id="fname" value="<?php if(isset($fname)){echo $fname;} ?>">
                                <?php 
                                        if(isset($_POST['adduser'])&&empty($fname)){

                                            echo "<p class='w3-text-red'>Username  must be provided</p>";
                                        }
                                        elseif(isset($_POST['adduser'])&&!preg_match("/^[A-Za-z]/",$fname)){
                                            echo "<p class='w3-text-red'>invalid Username format!</p>";
                                        }
                                 ?>
                                 <label class="w3-text-blue">Email</label>
                                <input style="color: black;" class="w3-input  w3-margin-bottom" type="email" placeholder="email here.." name="email" value="<?php if(isset($Semail)){echo $Semail;} ?>">
                                <?php 
                                        if(isset($_POST['adduser'])&& empty($email)){
                                            echo "<p class='w3-text-red'>Empty Email provide it </p>";
                                        }

                                        elseif(isset($_POST['adduser'])&&!preg_match("/^.+@.+\.com$/", $email)){
                                            echo "<p class='w3-text-red'>invalid email format!</p>";
                                        }
                                 ?>
                                 <label class="w3-text-blue">Phone</label>
                                <input style="color: black;" class="w3-input  w3-margin-bottom" type="tel" placeholder="phone Number here.." name="phone" id="phone"  onkeypress="return (event.charCode>47&& event.charCode<58) " value="<?php if(isset($Sphone)){echo $Sphone;} ?>" maxLength='10'>
                                <?php 
                                        if(isset($_POST['adduser'])&&empty($phone)){
                                            echo "<p class='w3-text-red'>Phone Number Cannot be empty</p>";
                                        }
                                 ?>             

                         </div>
                         <div class="col-md-5">

                            <label class="w3-text-blue">Password</label>
                            <input style="color: black;" class="w3-input  w3-margin-bottom" type="password" placeholder="User Password here.." name="password" id="password" value="<?php if(isset($jo)){echo $jo;} ?>">
                                <?php 
                                        if(isset($_POST['adduser'])&&empty($password)){
                                            echo "<p class='w3-text-red'>password cannot be empty</p>";
                                        }
                                 ?>
                                <label class="w3-text-blue">Confirm Password</label>
                                <input style="color: black;" class="w3-input  w3-margin-bottom" type="password" placeholder="confirm Password here.." name="confirmPassword" id="confirmPassword" value="<?php if(isset($jo)){echo $jo;} ?>">
                                
                                <?php 
                                        if(isset($_POST['adduser'])&&empty($confirm)){
                                            echo "<p class='w3-text-red'>confirm password field must be filled</p>";
                                        }
                                        else if(isset($_POST['adduser'])&&$password!=$confirm)
                                        {
                                            echo "<p class='w3-text-red'>two passwords do not match!</p>";
                                           
                                        }
                                 ?>
                                 <label class="w3-text-blue">Photo</label>
                                 <input type="file" name="image" class="w3-input">    

                         </div>

                        </div> 
                        <button class="w3-button w3-blue w3-btn-block w3-section w3-padding" name="adduser">Save</button>
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
