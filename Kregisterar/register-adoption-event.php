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
                                <i class="w3-padding w3-animate-fading"><b> ADOPTION('GUUDIFACHA') REGISTRATION</b></i>
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
					               <!--=============================Adoption BackEnd Begins here================-->
					               <!---==============Search Child information using birth registration number====-->
								<form  action="" method="POST" enctype="multipart/form-data">
                                           <div class=" w3-container w3-blue" id="searchAdoptID">
                                                <h3 style="color: black; font-size: 22px; font-family:  'Times New Roman', Times, serif;">Search Marriage Unique Number</h3>
                                                <hr>
                                                <div>
                                                    <div class="form-group">
                                                        <input type="text" name="birthRegNum4Adopt" class="w3-input w3-border w3-round w3-text-black" placeholder="Birth ID">
                                                    </div>
                                                    <div class="form-group">
                                                        <button type="submit" name="search4Adotp" class="w3-btn w3-green w3-round-large w3-medium" style="font-family: 'Times New Roman', Times, serif';"><i class="fa fa-search"></i> Search</button>
                                                    </div>
                                                </div>
                                            </div>
                                </form>
                                	<?php
                                		 $year=date('Y');
                                         $regDate=date('d-m-Y');
                                         $currentMonth=date('F');
                     					   #=======================BackEnd for search child to be adopted
				                    if (isset($_POST['search4Adotp']))
				                       {

				                        
				                        $birthid4adopt=$_POST['birthRegNum4Adopt'];
				                        $searchid="SELECT * FROM birthevent WHERE eventnumber ='$birthid4adopt'  AND status='Alive'";
				                        if (!empty($birthid4adopt)) {
				                           $result=mysqli_query($con,$searchid);
				                        $checkbirth=mysqli_num_rows($result);
				                        if ($checkbirth==0) {
				                            echo "<p class='w3-text-red'>No event with provided birth unique number!!s</p>";
				                            
				                        }
				                        while ($row=mysqli_fetch_array($result)) {
				                            
				                            $_SESSION['birthId']=$row['eventnumber'];
				                            $_SESSION['fname']=$row['fname'];
				                            $_SESSION['mname']=$row['mname'];
				                            $_SESSION['lname']=$row['lname'];
				                            $_SESSION['sex']=$row['sex'];
				                            $_SESSION['dob']=$row['day'];
				                            $_SESSION['age']=$row['age'];
				                            $_SESSION['nationality']=$row['nationality'];
				                            $_SESSION['birtheventnum']=$row['eventnumber'];


				                            $BirthNum=$_SESSION['birtheventnum'];
				                            $FistNameAdopt=$_SESSION['fname'];
				                            $MiddleNameAdopt=$_SESSION['mname'];
				                            $LastNameAdopt=$_SESSION['lname'];
				                            $SexAdopt=$_SESSION['sex'];
				                            $DobAdopt=$_SESSION['dob'];
				                            $ChildAge=$_SESSION['age'];
				                            $NationalityAdopt=$_SESSION['nationality'];

				                        }
				                            
				                        }
				                        
				                        }
				                        #=======================BackEnd for search child to be adopted=============-->

				                        if (isset($_POST['submitadoptionevent'])) {
				                            
				                            #======value from search==================-->
				                            if (isset($_POST['search4Adotp'])) {
					                       		$BirthNum=$_SESSION['birtheventnum'];
					                            $FistNameAdopt=$_SESSION['fname'];
					                            $MiddleNameAdopt=$_SESSION['mname'];
					                            $LastNameAdopt=$_SESSION['lname'];
					                            $SexAdopt=$_SESSION['sex'];
					                            $DobAdopt=$_SESSION['dob'];
					                            $ChildAge=$_SESSION['age'];
					                            $NationalityAdopt=$_SESSION['nationality'];
				                            }
				                            if (!isset($_POST['search4Adotp'])) {
				                            	//$BirthNum=$_POST['birthRegNum4Adopt'];
					                            $FistNameAdopt=$_POST['adoptchfname'];
					                            $MiddleNameAdopt=$_POST['adoptchmname'];
					                            $LastNameAdopt=$_POST['adoptchlname'];
					                            $SexAdopt=$_POST['adoptchsex'];
					                            $DobAdopt=$_POST['adobtchdob'];
					                            $ChildAge=$_POST['childage'];
					                            $NationalityAdopt=$_POST['adoptchildnationality'];
				                            		
				                            	}

				                            # retriving value from form here
				                           
				                            $AdoptChildFName=$_POST['adoptchfname'];
				                            $AdoptChildMName=$_POST['adoptchmname'];
				                            $AdoptChildLName=$_POST['adoptchlname'];
				                            $AdoptChildAge=$_POST['childage'];
				                            $AdoptChildDob=$_POST['adobtchdob'];
				                           
				                            $AdoptChildSex=$_POST['adoptchsex'];
				                            $AdoptChildMotherName=$_POST['adoptchmothername'];
				                            $AdoptChildPhoto=$_FILES['adoptchphoto']['name'];

				                            $AdoptChildNewFName=$_POST['adoptchnewfname'];
				                            $AdoptChildNewMName=$_POST['adoptchnewmname'];
				                            $AdoptChildNewLName=$_POST['adoptchenewlname'];
				                            $AdoptChildNewParentFName=$_POST['adoptchnewpersonfname'];
				                           
				                            $AdoptChildNewParentResidance=$_POST['adoptchnewresidanceplace'];
				                            $AdoptChildPersonPhone=$_POST['adoptchnewpersonphone'];
				                            $AdoptChildNewParentPhoto=$_FILES['adoptchpersonphoto']['name'];

				                            $AdoptChildCourtName=$_POST['adoptcourtname'];
				                            $AttorneyFullName=$_POST['adoptattorneyfname'];
				                            $AttorneyPhone=$_POST['adoptattorneyphone'];

				                            #STORE ON THE SESSION
				                            $_SESSION['adoptchfname']=$AdoptChildFName;
				                            $_SESSION['adoptchmname']=$AdoptChildLName;
				                            
				                            $_SESSION['adoptchmothername']=$AdoptChildMotherName;
				                            $_SESSION['adoptchphoto']=$AdoptChildPhoto;

				                            $_SESSION['adoptchnewfname']=$AdoptChildNewFName;
				                            $_SESSION['adoptchnewmname']=$AdoptChildNewMName;
				                            $_SESSION['adoptchenewlname']=$AdoptChildNewLName;
				                            $_SESSION['adoptchnewpersonfname']=$AdoptChildNewParentFName;
				                           
				                            $_SESSION['adoptchnewresidanceplace']=$AdoptChildNewParentResidance;
				                            $_SESSION['adoptchpersonphoto']=$AdoptChildNewParentPhoto;

				                            $_SESSION['adoptcourtname']=$AdoptChildCourtName;
				                            $_SESSION['adoptattorneyfname']=$AttorneyFullName;
				                            #======================================================
				                            //$BirthRegNum4Adopt=$_SESSION['birthregnum4adopt'];
				                            $AdoptChildFName=$_SESSION['adoptchfname'];
				                            $AdoptChildLName=$_SESSION['adoptchmname'];
				                          //  $AdoptChildBirthPlace=$_SESSION['adoptchbirthplace'];
				                            $AdoptChildMotherName=$_SESSION['adoptchmothername'];
				                            $AdoptChildPhoto=$_SESSION['adoptchphoto'];
				                            #======================================================
				                            $AdoptChildNewFName=$_SESSION['adoptchnewfname'];
				                            $AdoptChildNewMName=$_SESSION['adoptchnewmname'];
				                            $AdoptChildNewLName=$_SESSION['adoptchenewlname'];
				                            $AdoptChildNewParentFName=$_SESSION['adoptchnewpersonfname'];
				                           // $AdoptChildNewParentMName=$_SESSION['adoptchnewpersonmname'];
				                          //  $AdoptChildNewParentLName=$_SESSION['adoptchnewpersonlname'];
				                            $AdoptChildNewParentResidance=$_SESSION['adoptchnewresidanceplace'];
				                            $AdoptChildNewParentPhoto=$_SESSION['adoptchpersonphoto'];
				                            #============================================================
				                            $AdoptChildCourtName=$_SESSION['adoptcourtname'];
				                            $AttorneyFullName=$_SESSION['adoptattorneyfname'];

				                            #===============start adoption regstration===================
				                            #===============generating adoption unique number============
				                            $plusadopt="SELECT * FROM adoptevent WHERE 1 ORDER BY id DESC";
				                            $queryRunAdopt=mysqli_query($con,$plusadopt);
				                            $valuesAdopt=mysqli_fetch_array($queryRunAdopt);
											if (!empty($valuesAdopt)) {
												// The array is not empty, proceed with retrieving the last ID
												$lastIdAdopt = $valuesAdopt['id'] ?? 0; // Using null coalescing operator to handle undefined index
												$lastIdAdopt = $lastIdAdopt + 1;
											} else {
												// The array is empty or undefined
												// Handle this case accordingly, such as setting a default value for $lastIdDivorce or displaying an error message
												$lastIdAdopt = 0; // Set a default value or handle it based on your requirements
												echo "Warning: The 'valuesDivorce' array is null or undefined.";
											}
											
				                            $dateAdopt=time();
				                            $dateAdopt=date('Y');
				                            $adptionID=$regcode.$ZCode.$WCode.$KCode.$lastIdAdopt.$dateAdopt;

				                            #Restrict Duplicate Registration
				                            $restdup="SELECT * FROM adoptevent WHERE (newfname='$AdoptChildNewFName' AND newmname='$AdoptChildNewMName' AND newlname='$AdoptChildNewLName') OR (fnameadopt='$FistNameAdopt' AND mnameadopt='$MiddleNameAdopt' AND lnameadopt='$LastNameAdopt')";
				                            if ($runadopt=mysqli_query($con,$restdup)) {
				                                $countadopt=mysqli_num_rows($runadopt);
				                                if ($countadopt>0) {
				                                   echo "<script>alert('Event is Already Registered !!');</script>";
				                                }
				                                $Age=(int)$AdoptChildAge;
				                            /*    if ($Age>18) {
				                                	echo "Adoption Not Possible";
				                                }*/
				                                if(($Age<=18)&&($countadopt==0)) {
				                                		#register if the user have birth registretion
				                                	 if (isset($_POST['search4Adotp'])) 
				                                	   {
				                                        $regadopt="INSERT INTO adoptevent(childbirthnum, fnameadopt, mnameadopt, lnameadopt, dobadopt, nationlityadopt, sexadopt, motherfname, adoptphoto, newfname, newmname, newlname, currparentfname, currparentplace, currparentphone, currparentphoto, courtname, attorneyfname, attorneyphone, rcode, zcode, wcode, kcode, adoptnum,regyear,regday,regmonth)
														 VALUES ('$BirthNum','$FistNameAdopt','$MiddleNameAdopt','$LastNameAdopt','$DobAdopt','$NationalityAdopt','$SexAdopt','$AdoptChildMotherName','$AdoptChildPhoto','$AdoptChildNewFName','$AdoptChildNewMName','$AdoptChildNewLName','$AdoptChildNewParentFName','$AdoptChildNewParentResidance','$AdoptChildPersonPhone','$AdoptChildNewParentPhoto','$AdoptChildCourtName','$AttorneyFullName','$AttorneyPhone','$regcode','$ZCode','$WCode','$KCode','$adptionID','$year','$regDate','$currentMonth')";
				                                        if (mysqli_query($con, $regadopt)) {
				                                          
				                                            echo "<p style='color:blue;'>Successfully Registered</p>";
				                                        }
				                                        else{
				                                            echo "Something Happened !!".mysqli_error($con);
				                                        }				                                		
				                                		  
				                                		}
				                                		#the is registration of adoptin if not have birth number
				                                		elseif (!isset($_POST['search4Adotp'])) {
				                                			
				                                        $regadopt="INSERT INTO adoptevent(fnameadopt, mnameadopt, lnameadopt, dobadopt, nationlityadopt, sexadopt, motherfname, adoptphoto, newfname, newmname, newlname, currparentfname, currparentplace, currparentphone, currparentphoto, courtname, attorneyfname, attorneyphone, rcode, zcode, wcode, kcode, adoptnum,regyear,regday,regmonth) VALUES ('$FistNameAdopt','$MiddleNameAdopt','$LastNameAdopt','$DobAdopt','$NationalityAdopt','$SexAdopt','$AdoptChildMotherName','$AdoptChildPhoto','$AdoptChildNewFName','$AdoptChildNewMName','$AdoptChildNewLName','$AdoptChildNewParentFName','$AdoptChildNewParentResidance','$AdoptChildPersonPhone','$AdoptChildNewParentPhoto','$AdoptChildCourtName','$AttorneyFullName','$AttorneyPhone','$regcode','$ZCode','$WCode','$KCode','$adptionID','$year','$regDate','$currentMonth')";
				                                        if (mysqli_query($con, $regadopt)) {
				                                          
				                                            echo "<p style='color:green; text-align:center'>Successfully Registered</p>";
				                                        }
				                                        else{
				                                            echo "Something Happened !!".mysqli_error($con);
				                                        }				                                		}

				                                     }
				                                    elseif(($Age>18)&& ($countadopt==0)){
				                                    	echo "<script>alert('Adoption Not Possible for Person with age greater than 18');</script>";
				                                    }
				                                    elseif (($Age<=18)&& ($countadopt!=0)) {
				                                    	echo "<script>alert('No two Adoption Possible);</script>";
				                                    }
				                            }
				                        }
				                    ?>
                                	<!---============================Adoption BackEnd Ends Here===================-->
                                  <div class="container-fluid">
				                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST" enctype="multipart/form-data">
				                        <div class="row">
				                            <!--column 1-->
				                            <div class="col-md-4">
											<i class="fa fa-child" style="font-size:36px;color: blue;"></i> <label class="w3-text-black"><h3 class="w3-text-black"><b>Child's Information</b></h3></label><i class="fa fa-child" style="font-size:36px;color: blue;"></i>
				                                <br>
				                                <label class="w3-text-black">First Name</label>
				                                <input type="text" class="w3-input w3-hover-blue w3-text-black" placeholder="Fill Child's First Name Here" name="adoptchfname" onkeypress="return (event.charCode>64 && event.charCode<91) || (event.charCode>96 && event.charCode<123) || event.charCode==32 " required="" value="<?php if(isset($FistNameAdopt))echo $FistNameAdopt; ?>">
				                                 <?php 
				                                    if(isset($_POST['submitadoptionevent']) && !preg_match("/^[A-Za-z]/",$AdoptChildFName)){
				                                        echo"<p class='w3-text-red w3-center'>Invalid Format of adopt child first name!!</p>";
				                                    }
				                                 ?>
				                                 <label class="w3-text-black">Middle Name</label>
				                                <input type="text" class="w3-input w3-hover-blue w3-text-black" placeholder="Fill child's Middle name here" name="adoptchmname" onkeypress="return (event.charCode>64 && event.charCode<91) || (event.charCode>96 && event.charCode<123) || event.charCode==32 "required="" value="<?php if(isset($MiddleNameAdopt))echo $MiddleNameAdopt; ?>" >
				                                <?php 
				                                    if(isset($_POST['submitadoptionevent']) && !preg_match("/^[A-Za-z]/",$AdoptChildMName)){
				                                        echo"<p class='w3-text-red w3-center'>Invalid Format of adopt child middle name!!</p>";
				                                    }
				                                 ?>
				                                 <label class="w3-text-black">Last Name</label>
				                                 <input type="text" class="w3-input w3-hover-blue w3-text-black" placeholder="Fill child's Last name here" name="adoptchlname" onkeypress="return (event.charCode>64 && event.charCode<91) || (event.charCode>96 && event.charCode<123) || event.charCode==32 "required="" value="<?php if(isset($LastNameAdopt))echo $LastNameAdopt; ?>">
				                                 <?php 
				                                    if(isset($_POST['submitadoptionevent']) && !preg_match("/^[A-Za-z]/",$AdoptChildLName)){
				                                        echo"<p class='w3-text-red w3-center'>Invalid Format of adopt child last name!!</p>";
				                                    }
				                                 ?>
				                                 <label class="w3-text-black">Birth Date</label>
				                                
				                                <input type="date" class="w3-input w3-hover-blue w3-text-black" placeholder="Fill child's date of birth" name="adobtchdob" required="" value="<?php if(isset($DobAdopt))echo $DobAdopt; ?>" max="<?php echo date('Y-m-d'); ?>">

				                                <label class="w3-text-black">Age</label>
				                                <input type="text" name="childage" maxlength="2" onkeypress="return (event.charCode>47 && event.charCode<58)"  class="w3-input w3-hover-blue w3-text-black" value="<?php if(isset($ChildAge)) echo $ChildAge; ?>">

				                                <label class="w3-text-black">Nationality</label>
				                                <select class="w3-input w3-hover-blue w3-text-black" name="adoptchildnationality" >
                                                    <option>Ethiopian</option>
                                                    <option>Eritrean</option>
                                                    <option>Kenyan</option>
                                                    <option>Sudanese</option>
                                                    <option>Somali</option>
                                                    <option>Egyption</option>
                                                    <option>Others</option>
                                               </select>
				                               <label class="w3-text-black">Sex</label>
				            
				                               <select class="w3-input w3-hover-blue w3-text-black" name="adoptchsex" required="">
				                                    <!--<option>Choose Child Sex..</option>-->
				                                    <option>Male</option>
				                                    <option>Female</option>
				                                    <option>Others</option>
				                                    
				                                </select>
				                                <label class="w3-text-black">Mother FullName</label>
				                                <input type="text" class="w3-input w3-hover-blue w3-text-black" placeholder="Child’s Mother Full Name" name="adoptchmothername" onkeypress="return (event.charCode>64 && event.charCode<91) || (event.charCode>96 && event.charCode<123) || event.charCode==32 "required="" value="<?php if(isset($AdoptChildMotherName))echo $AdoptChildMotherName; ?>">
				                                <?php 
				                                    if(isset($_POST['submitadoptionevent']) && !preg_match("/^[A-Za-z]/",$AdoptChildMotherName)){
				                                        echo"<p class='w3-text-red w3-center'>Invalid Format of adopt child mother name!!</p>";
				                                    }
				                                 ?>
				                                 <label class="w3-text-black">Photo</label>
				                                <input type="file" class="w3-input w3-hover-blue w3-text-black" placeholder="Choose child photo" name="adoptchphoto">
				                            </div>
				                            <!--column 2 after adoption-->
				                            <div class="col-md-4">
											<i class="fa fa-users" style="font-size:36px;color: green;"></i> <label class="w3-text-black"><h3 class="w3-text-black"><b>After Adoption</b></h3></label><i class="fa fa-users" style="font-size:36px;color: green;"></i>
				                                <label class="w3-text-black">New First Name</label>
				                                <input type="text" class="w3-input w3-hover-blue w3-text-black" placeholder="Child’s New First Name" name="adoptchnewfname" onkeypress="return (event.charCode>64 && event.charCode<91) || (event.charCode>96 && event.charCode<123) || event.charCode==32 " required="" value="<?php if(isset($AdoptChildNewFName))echo $AdoptChildNewFName; ?>">
				                                <?php 
				                                    if(isset($_POST['submitadoptionevent']) && !preg_match("/^[A-Za-z]/",$AdoptChildNewFName)){
				                                        echo"<p class='w3-text-red w3-center'>Invalid Format of adopt child new first name!!</p>";
				                                    }
				                                 ?>
				                                <label class="w3-text-black">New Middle Name</label>
				                                <input type="text" class="w3-input w3-hover-blue w3-text-black" placeholder="Child’s New Middle Name" name="adoptchnewmname" onkeypress="return (event.charCode>64 && event.charCode<91) || (event.charCode>96 && event.charCode<123) || event.charCode==32 " required="" value="<?php if(isset($AdoptChildNewMName))echo $AdoptChildNewMName; ?>">
				                                <?php 
				                                    if(isset($_POST['submitadoptionevent']) && !preg_match("/^[A-Za-z]/",$AdoptChildNewMName)){
				                                        echo"<p class='w3-text-red w3-center'>Invalid Format of adopt child new middle name!!</p>";
				                                    }
				                                 ?>
				                                 <label class="w3-text-black">New Last Name</label>
				                                <input type="text" class="w3-input w3-hover-blue w3-text-black" placeholder="Child’s New Last Name" name="adoptchenewlname" onkeypress="return (event.charCode>64 && event.charCode<91) || (event.charCode>96 && event.charCode<123) || event.charCode==32 " required="" value="<?php if(isset($AdoptChildNewLName))echo $AdoptChildNewLName; ?>">
				                                <?php 
				                                    if(isset($_POST['submitadoptionevent']) && !preg_match("/^[A-Za-z]/",$AdoptChildNewLName)){
				                                        echo"<p class='w3-text-red w3-center'>Invalid Format of adopt child new last name!!</p>";
				                                    }
				                                 ?>

                                                <i class="fa fa-user" style="font-size:36px;color: orange;"></i> <label class="w3-text-black"><h3 class="w3-text-black"><b>Current Parent </b></h3></label><i class="fa fa-user" style="font-size:36px;color: orange;"></i>
				                                <br>
				                                <label class="w3-text-black">Full Name</label>
				                                <input type="text" class="w3-input w3-hover-blue w3-text-black" placeholder="Current Parent  Full Name" name="adoptchnewpersonfname" onkeypress="return (event.charCode>64 && event.charCode<91) || (event.charCode>96 && event.charCode<123) || event.charCode==32 "required="" value="<?php if(isset($AdoptChildNewParentFName))echo $AdoptChildNewParentFName; ?>">
				                                <?php 
				                                    if(isset($_POST['submitadoptionevent']) && !preg_match("/^[A-Za-z]/",$AdoptChildNewParentFName)){
				                                        echo"<p class='w3-text-red w3-center'>Invalid Format of adopt child new parent first name!!</p>";
				                                    }
				                                 ?>
				                                 <label class="w3-text-black">Residance Place</label>
				                                <input type="text" class="w3-input w3-hover-blue w3-text-black" placeholder="Current Person Residance place" name="adoptchnewresidanceplace" onkeypress="return (event.charCode>64 && event.charCode<91) || (event.charCode>96 && event.charCode<123) || event.charCode==32 " required="" value="<?php if(isset($AdoptChildNewParentResidance))echo $AdoptChildNewParentResidance; ?>">
				                                <?php 
				                                    if(isset($_POST['submitadoptionevent']) && !preg_match("/^[A-Za-z]/",$AdoptChildNewParentResidance)){
				                                        echo"<p class='w3-text-red w3-center'>Invalid Format of adopt child new parent residance place!!</p>";
				                                    }
				                                 ?>
				                                 <label class="w3-text-black">Phone </label>
				                                <input type="tel" class="w3-input w3-hover-blue w3-text-black" placeholder="09-" name="adoptchnewpersonphone" maxlength="10" onkeypress="return (event.charCode>47 && event.charCode<58)" required="">
				                                 <?php 
				                                    if(isset($_POST['submitadoptionevent']) && !preg_match("/^[0-9]/",$AdoptChildPersonPhone)){
				                                        echo"<p class='w3-text-red w3-center'>Invalid Format of phone number !!</p>";
				                                    }
				                                 ?>
				                                 <label class="w3-text-black">Photo</label>
				                                <input type="file" class="w3-input w3-hover-blue w3-text-black" placeholder="current parent photo" required="" name="adoptchpersonphoto">
				                            </div>
				                            <div class="col-md-4">
											<i class="fa fa-balance-scale" style="font-size:36px;color: purple;"></i> <label class="w3-text-black"><h3 class="w3-text-black"><b>Legal Information</b></h3></label><i class="fa fa-balance-scale" style="font-size:36px;color: purple;"></i>
				                                <label class="w3-text-black">Place</label>

				                                <input type="text" class="w3-input w3-hover-blue w3-text-black" placeholder="Court Name" name="adoptcourtname" onkeypress="return (event.charCode>64 && event.charCode<91) || (event.charCode>96 && event.charCode<123) || event.charCode==32 " required="" value="<?php if(isset($AdoptChildCourtName))echo $AdoptChildCourtName; ?>">
				                                <?php 
				                                    if(isset($_POST['submitadoptionevent']) && !preg_match("/^[A-Za-z]/",$AdoptChildCourtName)){
				                                        echo"<p class='w3-text-red w3-center'>Invalid Format of court name!!</p>";
				                                    }
				                                 ?>
				                                 <label class="w3-text-black">Attorney's FullName</label>
				                                <input type="text" class="w3-input w3-hover-blue w3-text-black" placeholder="Attorney's Full Name" name="adoptattorneyfname" onkeypress="return (event.charCode>64 && event.charCode<91) || (event.charCode>96 && event.charCode<123) || event.charCode==32 " required="" value="<?php if(isset($AttorneyFullName))echo $AttorneyFullName; ?>">
				                                <?php 
				                                    if(isset($_POST['submitadoptionevent']) && !preg_match("/^[A-Za-z]/",$AttorneyFullName)){
				                                        echo"<p class='w3-text-red w3-center'>Invalid Format of Attorney Name !!</p>";
				                                    }
				                                 ?>
				                                <label class="w3-text-black">Attorney's Phone</label>
				                                <input type="tel" class="w3-input w3-hover-blue w3-text-black" placeholder="09-" onkeypress="return (event.charCode>47&& event.charCode<58)" name="adoptattorneyphone" maxlength="10" required="">
				                                <?php 
				                                    if(isset($_POST['submitadoptionevent']) && !preg_match("/^[0-9]/",$AttorneyPhone)){
				                                        echo"<p class='w3-text-red w3-center'>Invalid Format of phone number !!</p>";
				                                    }
				                                 ?>
				                                
				                            </div>
				                            
				                        </div>
				                        <div class="row">
				                            <div class="col-md-3">
				                               
				                            </div>
				                            <div class="col-md-4">
				                                <br>
												<input type="submit" class="form-control w3-blue w3-round-large" value="Save" name="submitadoptionevent">
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
    <!--==============================Adoption registration S ENDS HERE===========================-->
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
