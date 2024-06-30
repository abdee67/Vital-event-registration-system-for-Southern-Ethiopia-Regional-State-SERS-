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

    <!--==============================Edit Adoption BEGINS HERE==========================-->
    <div class="right_col" role="main"  style="background-color: <?php if(isset($col)){echo $col;} ?>;">
                <!-- top tiles -->
                <div class="row tile_count " style="border-bottom: 5px solid cadetblue; ">
                    <div class="col-md-4" style="margin-top: 10px;">
                    <span ><h2 class="w3-center" style="font-size: 30px; color: black;"><?php echo "<b>EDIT ADOPTION</b>";?> </h2></span>
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
                                        $_SESSION['adoptnumber']=$_GET['AdoptID'] ;
                                        $AdoptID= $_SESSION['adoptnumber'];
                                        $selectadopt="SELECT * FROM adoptevent WHERE adoptnum='$AdoptID'";
                                        $adoptresult=mysqli_query($con,$selectadopt);
                                        	
                                        while ($adoptlist=mysqli_fetch_assoc($adoptresult)) {
                                          
                                       		 $Birth_ID=$adoptlist['childbirthnum'];
                                       		 $FirstName=$adoptlist['fnameadopt'];
                                        	 $MiddleName=$adoptlist['mnameadopt'];
                                        	 $LastName=$adoptlist['lnameadopt'];
                                        	
                                           $Dob=$adoptlist['dobadopt'];
                                        	 $Sex=$adoptlist['sexadopt'];
                                        	 $Nationality=$adoptlist['nationlityadopt'];
                                           $Mother=$adoptlist['motherfname'];

                                           $NewFName=$adoptlist['newfname'];
                                           $NewMName=$adoptlist['newmname'];
                                           $NewLName=$adoptlist['newlname'];

                                          $AdotpPerson=$adoptlist['currparentfname'];
                                          $AdoptPersonPlace=$adoptlist['currparentplace'];
                                          $AdoptPersonPhone=$adoptlist['currparentphone'];

                                          $Court=$adoptlist['courtname'];
                                          $Attorney=$adoptlist['attorneyfname'];
                                          $AttorneyPhone=$adoptlist['attorneyphone'];
                                        }
                                     ?>
                  <div class="container-fluid">
    <form action="update-adoption.php?AdopID=<?php echo $AdoptID ?>" method="POST" enctype="multipart/form-data">
        <div class="row">
            <!-- Column 1 -->
            <div class="col-md-4">
            <i class="fa fa-child" style="font-size:36px;color: blue;"></i> <label class="w3-text-black"><h3 class="w3-text-black"><b>Child's Information</b></h3></label><i class="fa fa-child" style="font-size:36px;color: blue;"></i>

                <label class="w3-text-black">First Name</label>
                <input type="text" class="w3-input w3-hover-blue w3-text-black" name="adoptchfname" required="" onkeypress="return (event.charCode>64 && event.charCode<91) || (event.charCode>96 && event.charCode<123) || event.charCode==32" value="<?php echo $FirstName; ?>">
                <?php 
                if(isset($_POST['updateadopt']) && !preg_match("/^[A-Za-z]/",$AdoptChildFName)){
                    echo"<p class='w3-text-red w3-center'>Invalid Format of adopt child first name!!</p>";
                }
                ?>
                
                <label class="w3-text-black">Middle Name</label>
                <input type="text" class="w3-input w3-hover-blue w3-text-black" name="adoptchmname" required="" onkeypress="return (event.charCode>64 && event.charCode<91) || (event.charCode>96 && event.charCode<123) || event.charCode==32" value="<?php echo $MiddleName; ?>">
                <?php 
                if(isset($_POST['updateadopt']) && !preg_match("/^[A-Za-z]/",$AdoptChildMName)){
                    echo"<p class='w3-text-red w3-center'>Invalid Format of adopt child middle name!!</p>";
                }
                ?>
                
                <label class="w3-text-black">Last Name</label>
                <input type="text" class="w3-input w3-hover-blue w3-text-black" name="adoptchlname" required="" onkeypress="return (event.charCode>64 && event.charCode<91) || (event.charCode>96 && event.charCode<123) || event.charCode==32" value="<?php echo $LastName; ?>">
                <?php 
                if(isset($_POST['updateadopt']) && !preg_match("/^[A-Za-z]/",$AdoptChildLName)){
                    echo"<p class='w3-text-red w3-center'>Invalid Format of adopt child last name!!</p>";
                }
                ?>
                
                <label class="w3-text-black">Birth Date</label>
                <input type="date" class="w3-input w3-hover-blue w3-text-black" name="adobtchdob" value="<?php echo $Dob; ?>" readonly max="<?php echo date('Y-m-d'); ?>">
                
                <label class="w3-text-black">Nationality</label>
                <input type="text" class="w3-input w3-hover-blue w3-text-black" name="adoptchildnationality" required="" value="<?php echo $Nationality; ?>">
                <?php 
                if(isset($_POST['updateadopt']) && !preg_match("/^[A-Za-z]/",$NationalityAdopt)){
                    echo"<p class='w3-text-red w3-center'>Invalid Format of adopt child nationality !!</p>";
                }
                ?>
                
                <label class="w3-text-black">Sex</label>
                <input type="text" name="adoptchsex" class="w3-input w3-hover-blue w3-text-black" readonly value="<?php echo $Sex; ?>">
            </div>
            
            <!-- Column 2 -->
            <div class="col-md-4">
            <i class="fa fa-users" style="font-size:36px;color: blue;"></i> <label class="w3-text-black"><h3 class="w3-text-black"><b>After Adoption</b></h3></label><i class="fa fa-users" style="font-size:36px;color: blue;"></i>
                
                <label class="w3-text-black">New First Name</label>
                <input type="text" class="w3-input w3-hover-blue w3-text-black" name="adoptchnewfname" required="" onkeypress="return (event.charCode>64 && event.charCode<91) || (event.charCode>96 && event.charCode<123) || event.charCode==32" value="<?php echo $NewFName; ?>">
                <?php 
                if(isset($_POST['updateadopt']) && !preg_match("/^[A-Za-z]/",$AdoptChildNewFName)){
                    echo"<p class='w3-text-red w3-center'>Invalid Format of adopt child new first name!!</p>";
                }
                ?>
                
                <label class="w3-text-black">New Middle Name</label>
                <input type="text" class="w3-input w3-hover-blue w3-text-black" name="adoptchnewmname" required="" onkeypress="return (event.charCode>64 && event.charCode<91) || (event.charCode>96 && event.charCode<123) || event.charCode==32" value="<?php echo $NewMName; ?>">
                <?php 
                if(isset($_POST['updateadopt']) && !preg_match("/^[A-Za-z]/",$AdoptChildNewMName)){
                    echo"<p class='w3-text-red w3-center'>Invalid Format of adopt child new middle name!!</p>";
                }
                ?>

                <label class="w3-text-black">New Last Name</label>
                <input type="text" class="w3-input w3-hover-blue w3-text-black" name="adoptchenewlname" required="" onkeypress="return (event.charCode>64 && event.charCode<91) || (event.charCode>96 && event.charCode<123) || event.charCode==32" value="<?php echo $NewLName; ?>">
                <?php 
                if(isset($_POST['updateadopt']) && !preg_match("/^[A-Za-z]/",$AdoptChildNewLName)){
                    echo"<p class='w3-text-red w3-center'>Invalid Format of adopt child new last name!!</p>";
                }
                ?>
                
                <i class="fa fa-balance-scale" style="font-size:36px;color: blue;"></i> <label class="w3-text-black"><h3 class="w3-text-black"><b>Parent Info</b></h3></label><i class="fa fa-balance-scale" style="font-size:36px;color: blue;"></i>
                
                <label class="w3-text-black">Full Name</label>
                <input type="text" class="w3-input w3-hover-blue w3-text-black" name="adoptchnewpersonfname" required="" onkeypress="return (event.charCode>64 && event.charCode<91) || (event.charCode>96 && event.charCode<123) || event.charCode==32" value="<?php echo $AdotpPerson; ?>">
                <?php 
                if(isset($_POST['updateadopt']) && !preg_match("/^[A-Za-z]/",$AdoptChildNewParentFName)){
                    echo"<p class='w3-text-red w3-center'>Invalid Format of adopt child new parent first name!!</p>";
                }
                ?>
                
                <label class="w3-text-black">Residence Place</label>
                <input type="text" class="w3-input w3-hover-blue w3-text-black" name="adoptchnewresidanceplace" required="" value="<?php echo $AdoptPersonPlace; ?>">
                <?php 
                if(isset($_POST['updateadopt']) && !preg_match("/^[A-Za-z]/",$AdoptChildNewParentResidance)){
                    echo"<p class='w3-text-red w3-center'>Invalid Format of adopt child new parent residence place!!</p>";
                }
                ?>
            </div>
            
            <!-- Column 3 -->
            <div class="col-md-4">
                <br><br>
                
                <label class="w3-text-black">Phone</label>
                <input type="number" class="w3-input w3-hover-blue w3-text-black" name="adoptchnewpersonphone" maxlength="10" required="" onkeypress="return (event.charCode>47 && event.charCode<58)" value="<?php echo $AdoptPersonPhone; ?>">
                <?php 
                if(isset($_POST['updateadopt']) && !preg_match("/^[0-9]/",$AdoptChildPersonPhone)){
                    echo"<p class='w3-text-red w3-center'>Invalid Format of phone number !!</p>";
                }
                ?>
                
                <label class="w3-text-black"><h3>Legal Information</h3></label><br>
                
                <label class="w3-text-black">Court Name</label>
                <input type="text" class="w3-input w3-hover-blue w3-text-black" name="adoptcourtname" required="" onkeypress="return (event.charCode>64 && event.charCode<91) || (event.charCode>96 && event.charCode<123) || event.charCode==32" value="<?php echo $Court; ?>">
                <?php 
                if(isset($_POST['updateadopt']) && !preg_match("/^[A-Za-z]/",$AdoptChildCourtName)){
                    echo"<p class='w3-text-red w3-center'>Invalid Format of court name!!</p>";
                }
                ?>
                
                <label class="w3-text-black">Attorney Full Name</label>
                <input type="text" class="w3-input w3-hover-blue w3-text-black" name="adoptattorneyfname" required="" onkeypress="return (event.charCode>64 && event.charCode<91) || (event.charCode>96 && event.charCode<123) || event.charCode==32" value="<?php echo $Attorney; ?>">
                <?php 
                if(isset($_POST['updateadopt']) && !preg_match("/^[A-Za-z]/",$AttorneyFullName)){
                    echo"<p class='w3-text-red w3-center'>Invalid Format of Attorney Name !!</p>";
                }
                ?>
                
                <label class="w3-text-black">Attorney Phone</label>
                <input type="number" class="w3-input w3-hover-blue w3-text-black" name="adoptattorneyphone" maxlength="10" required="" onkeypress="return (event.charCode>47&& event.charCode<58)" value="<?php echo $AttorneyPhone; ?>">
                <?php 
                if(isset($_POST['updateadopt']) && !preg_match("/^[0-9]/",$AttorneyPhone)){
                    echo"<p class='w3-text-red w3-center'>Invalid Format of phone number !!</p>";
                }
                ?>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-7"></div>
            <div class="col-md-2">
                <br>
                <input type="submit" class="form-control btn btn-sm w3-blue" value="Update" name="updateadopt">
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
