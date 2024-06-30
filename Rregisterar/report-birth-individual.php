
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

    <!--==============================VIEW BIRTH HERE BEGINS HERE==========================-->
    <div class="right_col" role="main">
                <div class="row tile_count " style="border-bottom: 3px solid cadetblue;">
                    <div class="" style="margin-top: 20px;">
                    <span ><h2 class="w3-center" style="font-size: 30px; color: black;"><?php echo " "." ".'<b>'."GENERATE REPORT FOR BIRTH EVENT ".'</b>';?> </h2></span>
                    </div>
                </div>
                <div class="main-content" id="content-wrapper">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-12 clear-padding-xs">
                                <div class="dash-item fist-dash-item">
                                  <div class="report" style="border:thick solid black;" >
                                    <?php
                                        $today=date("M d,Y");
                                      ?>
                                      <h5 class="w3-text-black" style="float: right;font:sans-serif;margin-right: 5px;"><u>Date:-<?php echo $today;?></u></h5>
                                      <br><br>
                                      <div style="border-bottom: 3px solid gray;">
                                          <h3 class="w3-text-black w3-center" style="font:sans-serif;font-weight: bolder;margin-top: 20px;">SERS <br> <br> Vital Events Registraion Agency</h3>
                                      </div>
                                      <br>
                                     
                                      <h4 class="w3-center w3-text-black" style="font-weight: bold;font:serif;">Birth Report</h4>
                                      <br>
                                    <form action="" method="POST"> 

                                      <label style="color: black; font-weight: black; margin-left: 100px;">
                                         For:&nbsp;&nbsp;</label>
                                         <input type="text" name="forwhom" style="border-top:none;border-bottom: 1px solid black;border-left: none; color: black;width: 600px;">
                                         <br> <br> <br>
                                         <?php
                                         
                                             $LoggedInName=$_SESSION['LoginUsername'];
                                             $selectUser="SELECT * FROM memberuser  WHERE name='$LoggedInName'";
                                             $userResult=mysqli_query($con,$selectUser);
                                             if ($userResult) {
                                               $UserList=mysqli_fetch_assoc($userResult);
                                               $role=$UserList['role'];
                                             }
                                         ?>
                                      <label style="color: black; font-weight: black; margin-left: 100px;">Title:</label>

                                       <input type="text" name="reportTitle" style="border-top:none;border-bottom: 1px solid black;border-left: none; color: black;width: 600px;">
                                         <br><br>
                                         <label style="color: black; font-weight: black; margin-left: 100px;">Report Description:</label>
                                         <br>
                                         <div class="row" style="margin-left: 70px;" style="border: solid 2px; height: 100px;">
                                           <div class="col-md-4" style="border: solid 2px;height: 600px;">
                                             
                                              <?php
                                                if(isset($_GET['BirthRep'])){

                                                   $birthid=$_GET['BirthRep'];
                                                   $selectbirth="SELECT * FROM birthevent WHERE eventnumber='$birthid'";
                                                   $birthresult=mysqli_query($con,$selectbirth);
                                                   $birthlist=mysqli_fetch_assoc($birthresult);
                                                    $birthnum=$birthlist['eventnumber'];
                                                    $fname=$birthlist['fname'];
                                                    $mname=$birthlist['mname'];
                                                    $lname=$birthlist['lname'];
                                                    $sex=$birthlist['sex'];
                                                    $Nationality=$birthlist['nationality'];
                                                    $momName=$birthlist['momName'];
                                                    $DOB=$birthlist['day'];
                                                    $weight=$birthlist['weight'];
                                                    $blood=$birthlist['blood'];
                                                    $zone=$birthlist['zone'];
                                                    $woreda=$birthlist['woreda'];
                                                    $kebele=$birthlist['kebele'];
                                                    #RETRIVE ZONE NAME
                                                    $selectZ="SELECT * FROM zone WHERE num='$zone'";
                                                    $zResult=mysqli_query($con,$selectZ);
                                                    if ($zResult) {
                                                      $zlist=mysqli_fetch_assoc($zResult);
                                                      $zName=$zlist['name'];
                                                    }
                                                    $selectW="SELECT * FROM woreda WHERE num='$woreda'";
                                                    $wResult=mysqli_query($con,$selectW);
                                                    if ($wResult) {
                                                      $wlist=mysqli_fetch_assoc($wResult);
                                                      $wName=$wlist['name'];
                                                    }

                                                     $selectK="SELECT * from kebele WHERE num='$kebele' AND woreda='$woreda' AND zone='$zone'";
                                                    $result=mysqli_query($con,$selectK);
                                                    if ($result) {
                                                      
                                                      $klist=mysqli_fetch_assoc($result);
                                                      $kname=$klist['name'];
                                                    }
                                                    ?>
                                                    <table>
                                                      <tr>
                                                        <td><p style="font-weight: bold;color: black;">Birth Num:</p></td><td width="5px;"></td><td><p style="color: black;"><?php echo $birthnum; ?></p></td>
                                                      </tr>
                                                     <tr>
                                                      <br>

                                                       <td><p style="font-weight: bold;color: black;">Full Name:</p></td><td width="10px;"></td><td><p style="color: black;"><?php echo $fname." ".$mname." ".$lname;?></p></td>
                                                     </tr>
                                                     <tr>
                                                      <td><p style="font-weight: bold;color: black;">Sex:</p></td><td width="5px;"></td><td><p style="color: black;"><?php echo $sex; ?></p></td>
                                                       
                                                     </tr>
                                                     <tr>
                                                        <td><p style="font-weight: bold;color: black;">DOB:</p></td><td width="5px;"></td><td><p style="color: black;"><?php echo $DOB; ?></p></td>
                                                     </tr>
                                                     <tr>
                                                      <td><p style="font-weight: bold;color: black;">Nationality:</p></td><td width="5px;"></td><td><p style="color: black;"><?php echo $Nationality; ?></p></td>
                                                       
                                                     </tr>
                                                      <tr>
                                                      <td><p style="font-weight: bold;color: black;">Weight:</p></td><td width="5px;"></td><td><p style="color: black;"><?php echo $weight; ?></p></td>
                                                       
                                                     </tr>
                                                      <tr>
                                                        <td><p style="font-weight: bold;color: black;">Blood type:</p></td><td width="5px;"></td><td><p style="color: black;"><?php echo $blood; ?></p></td>
                                                     </tr>
                                                 
                                                     <tr>
                                                        <td><p style="font-weight: bold;color: black;">Mother Name:</p></td><td width="5px;"></td><td><p style="color: black;"><?php echo $momName; ?></p></td>
                                                     </tr>
                                                      <tr>
                                                        <td><p style="font-weight: bold;color: black;">Place of Birth:</p></td>
                                                     </tr>
                                                     <tr>
                                                        <td><p style="font-weight: bold;color: black;"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Region:</p></td><td width="5px;"></td><td><p style="color: black;"><?php echo "SNNPR"; ?></p></td>
                                                      </tr>
                                                      <tr>
                                                        <td><p style="font-weight: bold;color: black;"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Zone:</p></td><td width="5px;"></td><td><p style="color: black;"><?php echo $zName; ?></p></td>
                                                      </tr>
                                                      <tr>
                                                         <td><p style="font-weight: bold;color: black;"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Woreda:</p></td><td width="5px;"></td><td><p style="color: black;"><?php echo $wName; ?></p></td>
                                                      </tr>
                                                      <tr>
                                                          <td><p style="font-weight: bold;color: black;"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kebele:</p></td><td width="5px;"></td><td><p style="color: black;"><?php echo $kname; ?></p></td>
                                                     </tr>
                                                    </table>
                                               <?php }
                                              ?>
                                           </div>
                                           <div class="col-md-8" style="border: solid 2px;height: 500px;">
                                             
                                              <!--============================-->
                                              <div class="" style="">
                                                 <div>
                                                   <script type="text/javascript" src="ckeditor/ckeditor.js">
                                                     
                                                   </script>
                                                  
                                                     <label style="color: black;">Additional Information</label>
                                                <?php
                                                   $LoggedInName=$_SESSION['LoginUsername'];
                                                  if(isset($_POST['savereport'])) {
                                                  
                                                    $for=$_POST['forwhom'];
                                                    $title=$_POST['reportTitle'];
                                                    $reportdet=$_POST['birthreport'];
                                                    if (!empty($for) && !empty($title) && !empty($reportdet)) {
                                                      $insertRe="INSERT INTO report(eventnumber,forwhom,title,detail,zone,woreda,kebele,role,reportby,type) VALUES ('$birthnum','$for','$title','$reportdet','$zone','$woreda','$kebele','$role','$LoggedInName','Birth')";
                                                       $InsertResult=mysqli_query($con,$insertRe);
                                                       if ($InsertResult) {

                                                         echo "<script>alert('Report Saved Successfully !!');</script>";
                                                         echo "<p style='color:green;'>Well Done !!!</p>";
                                                       }

                                                    }
                                                    elseif (empty($for)) {
                                                      echo "<p style='color:red;'>Please fill field for whom you want to send<p>";
                                                    }
                                                    elseif (empty($title)) {
                                                      echo "<p style='color:red;'>Please fill title of the report</p>";
                                                    }
                                                    elseif (empty($reportdet)) {
                                                      echo "<p style='color:red;'>Please file repot detail</p>";
                                                    }
                                                    else {
                                                      echo "<p style='color:red;'>Some error happended</p>";
                                                    }

                                             }

                                           ?>
                                              <textarea class="ckeditor  w3-input w3-hover-opacity" name="birthreport" style="height: 450px;color: black;">
                                                     </textarea>
                                                   
                                                 </div>
                                              </div>
                                           </div>

                                         </div>
                                         <br>
                                         <input type="submit" name="savereport" value="Save" style="margin-left: 100px;width: 100px;background-color: blue; color: white;">
                                         <a href="print-birth-report.php?ID=<?php echo $birthnum;?>" style="margin-left: 30px; color: blue;font-weight: bold;">Open</a>
                                    </form>
                                 
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
</body>
</html
