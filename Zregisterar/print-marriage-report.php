
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

    <!--==============================VIEW Marriage HERE BEGINS HERE==========================-->
    <div class="right_col" role="main">
                <!-- top tiles -->
                <div class="row tile_count " style="border-bottom: 3px solid cadetblue;">
                    <div class="" style="margin-top: 20px;">
                    <span ><h2 class="w3-center" style="font-size: 30px; color: black;"><?php echo " "." ".'<b>'." PRINT REPORT FOR MARRIAGE".'</b>';?> </h2></span>
                    </div>
                </div>

               <script type="text/javascript">
                  function printDiv(divname){
                    var printcontents=document.getElementById(divname).innerHTML;
                    w=window.open();
                    w.document.write(printcontents);
                    w.print();
                    w.close();
                    }

                </script>
                <form>
                   <input type="button" name="" onclick="printDiv('print-content')" value="Print Report" style="float: left; margin-bottom: -10px; margin-left: 15px;" class="w3-text-black w3-blue">
                </form>
                <div class="main-content" id="content-wrapper">
                    <div class="container-fluid" id="print-content">
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
                                          <h3 class="w3-text-black" style="font:sans-serif;font-weight: bolder;margin-top: 20px;text-align: center;">SERS<br> <br> Vital Events Registraion Agency</h3>
                                      </div>
                                      <br>
                                     
                                      <h4 class="w3-text-black" style="font-weight: bold;font:serif;text-align: center;">Marriage Report</h4>
                                      <br>
                                    <form action="" method="POST"> 
                                    	<?php 
                                    		 $LoggedInName=$_SESSION['LoginUsername'];
                                    		 $selectuser="SELECT * FROM memberuser WHERE name='$LoggedInName'";
                                    		 $userR=mysqli_query($con,$selectuser);
                                    		 $userL=mysqli_fetch_assoc($userR);
                                    		 $role=$userL['role'];
                                    		
                                             if(isset($_GET['MarrId'])){

                                                   $marrgid=$_GET['MarrId'];
                                                    
                                                    $selectreport="SELECT * FROM report WHERE eventnumber ='$marrgid'AND reportby='$LoggedInName' AND role='$role' AND type='Marriage' ORDER BY id DESC";
                                                    $resultReport=mysqli_query($con,$selectreport);
                                                      
                                                     if ($resultReport) 
                                                        {
                                                           $reportList=mysqli_fetch_assoc($resultReport);
                                                           $ReportDet=$reportList['detail'];
                                                           $Title=$reportList['title'];
                                                           $who=$reportList['forwhom'];
                                                         }
                                            }

                                            ?>

                                      <label style="color: black; font-weight: black; margin-left: 100px;"><b>
                                         For:</b>&nbsp;&nbsp;</label>
                                         <input type="text" name="forwhom" value="<?php echo $who;?>" readonly="" style="border-top:none;border-bottom: 1px solid black;border-left: none; color: black;width: 400px;">
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
                                      <label style="color: black; font-weight: black; margin-left: 100px;"><b>Title:</b></label>

                                       <input type="text" name="reportTitle" value="<?php echo $Title;?>" readonly="" style="border-top:none;border-bottom: 1px solid black;border-left: none; color: black;width: 400px;">
                                         <br><br>
                                         <label style="color: black; font-weight: bold;color: black; margin-left: 100px;"><h2 style="font-weight: bold;text-align: center;"><u>Couple's Information</u></h2></label>
                                         <br>
                                         <div class="row" style="margin-left: 70px;" style="border: solid 2px; height: 100px;">
                                           <div class="col-md-11" style="height: 555px; color: black;border-bottom: none;">
                                             
                                              <?php

                                                if(isset($_GET['MarrId'])){

                                                   $marrgId=$_GET['MarrId'];
                                                   $selectmarriage="SELECT * FROM marriagevent WHERE marriagenum='$marrgId'";
                                                   $marriageResult=mysqli_query($con,$selectmarriage);
                                                   
                                                     $marriageList=mysqli_fetch_assoc($marriageResult);
                                                     $marriagenum=$marriageList['marriagenum'];

                                                     #RETRIEVE WIFE INFORMATION 
                                                     $wbirthnum=$marriageList['wbirthnum'];
                                                     $wfname=$marriageList['wfname'];
                                                     $wmname=$marriageList['wmname'];
                                                     $wlname=$marriageList['wlname'];
                                                     $wsex=$marriageList['wsex'];
                                                     $wnationality=$marriageList['wnationality'];
                                                     $wreligion=$marriageList['wreligion'];
                                                     $wjob=$marriageList['wjob'];

                                                      #RETRIEVE HUSBAND INFORMATION

                                                     $hbirthnum=$marriageList['hbirthnum'];
                                                     $hfname=$marriageList['hfname'];
                                                     $hmname=$marriageList['hmname'];
                                                     $hlname=$marriageList['hlname'];
                                                     $hsex=$marriageList['hsex'];
                                                     $hnationality=$marriageList['hnationality'];
                                                     $hreligion=$marriageList['hreligion'];
                                                     $hjob=$marriageList['hjob'];
                                               
                                                    $zone=$marriageList['zcode'];
                                                    $woreda=$marriageList['wcode'];
                                                    $kebele=$marriageList['kcode'];
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
                                                    <!--======COLUMN TWO=============================-->

                                                    <div class="col-md-10">
                                                      <table style="color: black;">
                                                        <br>
                                                        <h3 style="text-align: center;font-weight: bold;">Wife's Information</h3>
                                                      
                                                        <tr>
                                                          <br>
                                                          <td style="font-weight: bold;">Birth Num:</td><td width="20px;"></td><td><?php echo $wbirthnum; ?></td>
                                                        </tr>
                                                       
                                                        <tr>
                                                          
                                                          <td style="font-weight: bold;"><br>Full Name:</td><td width="20px;"></td><td><?php echo "<br>"." ".$wfname." ".$wmname." ".$wlname; ?></td>
                                                        </tr>
                                                         <tr>
                                                          
                                                          <td style="font-weight: bold;"><br>Sex:</td><td width="20px;"></td><td><?php echo "<br>".$wsex; ?></td>
                                                        </tr>
                                                         <tr>
                                                          
                                                          <td style="font-weight: bold;"><br>Nationality:</td><td width="20px;"></td><td><?php echo "<br>".$wnationality; ?></td>
                                                        </tr>
                                                         <tr>
                                                          
                                                          <td style="font-weight: bold;"><br>Religion:</td><td width="20px;"></td><td><?php echo "<br>".$wreligion; ?></td>
                                                        </tr>
                                                        
                                                          <tr>
                                                          
                                                          <td style="font-weight: bold;"><br>Job:</td><td width="20px;"></td><td><?php echo "<br>".$wjob; ?></td>
                                                        </tr>
                                                        <tr>


                                                        <tr><td width="250px;"></td><td style="text-align: center;"><h3 style="text-align: center;font-weight: bold;">Husband's Information</h3></td></tr>

                                                                                                                <tr>
                                                          <br>
                                                          <td style="font-weight: bold;">Birth Num:</td><td width="20px;"></td><td><?php echo $hbirthnum; ?></td>
                                                        </tr>
                                                       
                                                        <tr>
                                                          
                                                          <td style="font-weight: bold;"><br>Full Name:</td><td width="20px;"></td><td><?php echo "<br>"." ".$hfname." ".$hmname." ".$hlname; ?></td>
                                                        </tr>
                                                         <tr>
                                                          
                                                          <td style="font-weight: bold;"><br>Sex:</td><td width="20px;"></td><td><?php echo "<br>".$hsex; ?></td>
                                                        </tr>
                                                         <tr>
                                                          
                                                          <td style="font-weight: bold;"><br>Nationality:</td><td width="20px;"></td><td><?php echo "<br>".$hnationality; ?></td>
                                                        </tr>
                                                         <tr>
                                                          
                                                          <td style="font-weight: bold;"><br>Religion:</td><td width="20px;"></td><td><?php echo "<br>".$hreligion; ?></td>
                                                        </tr>
                                                        
                                                          <tr>
                                                          
                                                          <td style="font-weight: bold;"><br>Job:</td><td width="20px;"></td><td><?php echo "<br>".$hjob; ?></td>
                                                        </tr>

                                                          <td><br><br><br><b>Marriage Num: </b></td><td></td><td><br><br><br><?php echo $marriagenum; ?></td>

                                                        </tr>
                                                        <tr>
                                                          <td><p style="font-weight: bold;color: black;"><br><br>Place of Marriage</p></td>
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

                                                    </div>
                                                
                                               <?php }
                                              ?>
                                           </div>
                                    
                                        <div class="row" style="margin-left: 0px;" style="border: solid 2px; height: 100px;padding-right: 100px;">
                                            <div class="col-md-11" style="color: black;width: 897px;border-top: none;">
                                              <?php
                                              		$LoggedInName=$_SESSION['LoginUsername'];
                                    				$selectuser="SELECT * FROM memberuser WHERE name='$LoggedInName'";
                                    			 	$userR=mysqli_query($con,$selectuser);
                                    		 		$userL=mysqli_fetch_assoc($userR);
                                    				$role=$userL['role'];

                                                  if(isset($_GET['MarrId'])){

                                                    $marrgid=$_GET['MarrId'];
                                                    $selectRep="SELECT * FROM report WHERE eventnumber ='$marrgid'AND reportby='$LoggedInName' AND role='$role' AND type='Marriage' ORDER BY id DESC";
                                                    $Res=mysqli_query($con,$selectRep);
                                                         
                                                    if ($Res) {
                                                        $rePList=mysqli_fetch_assoc($Res);
                                                         $reDet=$rePList['detail'];

                                                        echo "<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><p style='margin-right:150px;'>$reDet</p>";
                                                   }
                                                 }
                                               ?>
                                           </div>
                                         </div>
                                         </div>
                                         <br>
                                        <div class="row">
                                        <div class="col-md-12" style="color: black;margin-left: 50px;padding-right:100px; ">
                                            <?php
                                               $LoggedInName=$_SESSION['LoginUsername'];
                                               $selctu="SELECT * FROM memberuser WHERE name ='$LoggedInName'";
                                               $userR=mysqli_query($con,$selctu);
                                               $userL=mysqli_fetch_assoc($userR);
                                               $fullName=$userL['FullName'];
                                               $nameUp=ucwords($fullName);
                                               
                                               echo "<br><br><br><br>";
                                               echo "<b><p style='margin-left:450px;'>$nameUp</p></b>";

                                               echo "<b><p style='margin-left:450px;'><i>Zone Vital Event Registrar </i></p><b>";
                                            ?>
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
