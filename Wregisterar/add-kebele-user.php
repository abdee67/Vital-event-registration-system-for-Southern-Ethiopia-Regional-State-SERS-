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
                <div class="row tile_count " style="border-bottom: 5px solid cadetblue; ">
                    <div style="margin-top: 5px;">
                    <span ><h2 class="w3-center" style="font-size: 30px; color: black;"><?php echo " "." ".'<b>'."ADD KEBELE USER ".'</b>';?> </h2></span>
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
                                	<!--=====================Add user backend begins here==============-->
                                	<?php 
						              if(isset($_POST['addUser'])){

						                  
						                    $fullname=$_POST['fullname'];
						                    $fname=$_POST['fname'];
						                    $email=$_POST['email'];
						                    $phone=$_POST['phone'];
						                    $password=md5($_POST['password']);
						                    $confirm=md5($_POST['confirmPassword']);
						                    $KebeleNum=$_POST['kebeles'];

						                    $_SESSION['fullname']=$fullname;
						                    $_SESSION['fname']=$fname;
						                    $image=$_FILES['image']['name'];
						                    $extension=strtolower(substr($image, strpos($image, '.')+1));
						                    $_SESSION['email']=$email;
						                    $_SESSION['phone']=$phone;
						                    $fname=$_SESSION['fname'];
						                    $flname=$_SESSION['lname'];
						                    $femail=$_SESSION['email'];
						                    $phone=$_SESSION['phone'];
						                   if(isset($_POST['addUser'])){
						                      if(!empty($fname)&&!empty($email)&&!empty($phone)&&!empty($password)&&$password==$confirm){
						                   
						                    $role=$_SESSION['role'];
						                                if($role=='Wver'){
						                                    $role='Kver';
						                                }
						                        if (preg_match("/^[A-Za-z]/",$fullname)) {
						                          if(preg_match("/^[A-Za-z]/",$fname)){
						                            if(preg_match("/^.+@.+\.com$/", $email)){
						                                if(preg_match("/^[0-9]{10}/", $phone)){
						                                    if($extension=='jpg'||$extension=='png'||$extension=='gif'||$extension=='jpeg')
						                                          {
						                                            $check="SELECT * from memberuser where name='$fname' and password='$password' ";
						                                            $count=mysqli_num_rows(mysqli_query($con,$check));
						                                            $check2="SELECT * from memberuser where kcode='$KebeleNum' AND zcode='$ZCode' AND wcode='$WCode' ";
						                                            $count2=mysqli_num_rows(mysqli_query($con,$check2));
						                                                if($count==1){
						                                                    echo "<script>";
						                                                        echo "alert('user is alrady registered')";
						                                                    echo "</script>";
						                                                    echo "<p class='w3-text-red w3-center'>Another user registered found with similar name</p>";
						                                                }
						                                                 else if ($count2>=1) {
						                                                    echo "<script>";
						                                                        echo "alert('no more kebele  with same code')";
						                                                    echo "</script>";
						                                                     echo "<p class='w3-text-red w3-center'>  Kebele with code <b>$KebeleNum </b>is assigned for other user !!</p>";
						                                                    }
						                                                else
						                                                {

						                                            $insert="INSERT INTO memberuser (name,email,phone,password,role,pic,rcode,zcode,wcode,kcode,FullName,firstlogin) VALUES('$fname','$email','$phone','$password','$role','$image','$regcode','$ZCode','$WCode','$KebeleNum','$fullname','0')";
						                                            if(mysqli_query($con,$insert)){
						                                                if(move_uploaded_file($_FILES['image']['tmp_name'],"../StaffPic/".$_FILES['image']['name'])){
						                                                    echo "<p class='w3-text-blue w3-center'> Successfully Assigned!</p>";
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
						                        echo "<p class='w3-text-red'>Invalid  username format</p>";
						                    }
						                }
						                else{
						                    echo "";
						                }
						                   
						                   $time=time();
						                   $date=date('Y M D @ H:i:s',$time);               
						                 
						                }

						            }

						        }

						     ?>
                              <!--=====================Add kebele user backends begim here=========-->
                              <div class="w3-container">
						            <form action="" method="POST" enctype="multipart/form-data">
						                <div class="w3-section">
						                    <div class="row">
						                        <div class="col-md-6">
						                        	<label class="w3-text-blue">Full Name</label>
	 											    <input style="color: black;" class="w3-input  w3-margin-bottom"  type="text" placeholder="Full Name Here.." name="fullname" id="fullname" onkeypress="return (event.charCode>64 && event.charCode<91) || (event.charCode>96 && event.charCode<123) || (event.charCode==32)" value="<?php if(isset($fullname)){echo $fullname;} ?>">
							                         <?php 
							                              
							                              if(isset($_POST['addUser'])&&empty($fullname)){

							                                 echo "<p class='w3-text-red'>Full name  cannot be empty</p>";
							                                }
							                                elseif(isset($_POST['addUser'])&&!preg_match("/^[A-Za-z]/",$fullname)){
							                                    echo "<p class='w3-text-red'>invalid fullname format!</p>";
							                                }
							                         ?>
							                        <label class="w3-text-blue">Username </label>
							                        <input style="color: black;" class="w3-input  w3-margin-bottom" type="text" placeholder="UserName Here.." name="fname"  onkeypress="return (event.charCode>64 && event.charCode<91) || (event.charCode>96 && event.charCode<123) " value="<?php if(isset($fname)){echo $fname;} ?>">
							                        <?php 
							                               
							                              if(isset($_POST['addUser'])&&empty($fname)){

							                                    echo "<p class='w3-text-red'>username  cannot be empty</p>";
							                                }
							                                elseif(isset($_POST['addUser'])&&!preg_match("/^[A-Za-z]/",$fname)){
							                                    echo "<p class='w3-text-red'>invalid username format!</p>";
							                                }
							                         ?>
							                         <label class="w3-text-blue">Email</label>
							                  
							                        <input style="color: black;" class="w3-input  w3-margin-bottom" type="email" placeholder="email here.." name="email" value="<?php if(isset($email)){echo $email;} ?>">
							                        <?php 
							                                if(isset($_POST['addUser'])&&empty($email)){
							                                    echo "<p class='w3-text-red'>email field cannot be empty</p>";
							                                }

							                                elseif(isset($_POST['addUser'])&&!preg_match("/^.+@.+\.com$/", $email)){
							                                    echo "<p class='w3-text-red'>invalid email format!</p>";
							                                }
							                         ?>
							                         <label class="w3-text-blue">Phone</label>
							                        <input style="color: black;" class="w3-input  w3-margin-bottom" type="text" pattern="\d*"  placeholder="phone Number here.." name="phone" onkeypress="return (event.charCode>=48) && (event.charCode<58)" value="<?php if(isset($phone)){echo $phone;} ?>" maxLength='10'>
							                        <?php 
							                                if(isset($_POST['addUser'])&&empty($phone)){
							                                    echo "<p class='w3-text-red'>Phone Number Cannot be empty</p>";
							                                }
							                         ?>

						                        	</div>
						                            <div class="col-md-6">
													    <label class="w3-text-blue">Password</label>
								                        <input style="color: black;" class="w3-input  w3-margin-bottom" type="password" placeholder="User Password Here.." name="password" value="<?php if(isset($jo)){echo $jo;} ?>">
								                        <?php 
								                                if(isset($_POST['addUser'])&&empty($password)){
								                                    echo "<p class='w3-text-red'>password cannot be empty</p>";
								                                }
								                         ?>
								                         <label class="w3-text-blue">Confirm Password</label>
								                        <input style="color: black;" class="w3-input  w3-margin-bottom" type="password" placeholder="confirm Password Here.." name="confirmPassword" value="<?php if(isset($jo)){echo $jo;} ?>">
								                        
								                        <?php 
								                                if(isset($_POST['addUser'])&&empty($confirm)){
								                                    echo "<p class='w3-text-red'>confirm password field must be filled</p>";
								                                }
								                                elseif(isset($_POST['addUser'])&&$password!=$confirm)
								                                {
								                                    echo "<p class='w3-text-red'>two passwords do not match!</p>";
								                                }
								                         ?>
								                         <label class="w3-text-blue">Assign Kebele</label>
								                        <select name="kebeles" class="w3-input w3-text-blue" >
								                             <?php 
								                                $query="SELECT * from kebele where woreda='$WCode' AND zone='$ZCode' ";
								                                $run=mysqli_query($con,$query);
								                                echo "<option class='w3-text-red w3-center'></option>";
								                                while($list=mysqli_fetch_array($run)){
								                                    ?>
								                                     <option alt='hello'><?php echo $list['num']; ?></option>
								                                    <?php
								                                }
								                              ?>
								                         </select>
								 
								                         <br>
								                         <input style="color: black;" class="w3-input  w3-margin-bottom" type="FILE" name="image" required="">                      	
						                        	</div>
						                        </div>

						                        <button class="w3-button w3-blue w3-btn-block w3-section w3-padding" name="addUser">Save</button>
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
    <!--==============================USER Addition ENDS HERE===========================-->
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
