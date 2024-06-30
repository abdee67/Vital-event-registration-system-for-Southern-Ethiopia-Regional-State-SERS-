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

    <!--==============================DEATH CERTIFICATE BEGINS HERE==========================-->
    <div class="right_col" role="main">
                <!-- top tiles -->
                <div class="row tile_count " style="border-bottom: 5px solid cadetblue;">
                    <div class="" style="margin-top: 10px;">
                    <span ><h2 class="w3-center" style="font-size: 30px; color: black;"><?php echo "<b>CERITFICATE PAGE</b>";?> </h2></span>
                    </div>
                </div>
                <!--let begin here-->
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
                   <input type="button" name="" onclick="printDiv('print-content')" value="Print Cert" style="float: right; margin-bottom: -10px; margin-right: 15px;" class="w3-text-blue">
                </form>
                <div class="main-content" id="content-wrapper">
                    <div class="container-fluid" style="background-color: white;" id="print-content">
                     
                        <form style="border:thick solid red;">
                           
                           <?php

                               if (!isset($_GET['DeathCert']))
                                {
                                  echo "<script>";
                                    echo "window.location='death-view.php'";
                                  echo "</script>"; 
                                }
                               $_SESSION['deathnumber']=$_GET['DeathCert'] ;
                               $DeathID= $_SESSION['deathnumber'];

                               $selectdeath="SELECT * FROM deathevent WHERE eventnumber='$DeathID'";
                               $deathresult=mysqli_query($con,$selectdeath);
                               while ($deathlist=mysqli_fetch_assoc($deathresult))
                                   {    

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
                                        $cause=$deathlist['cause'];
                                        $dateofdeath=$deathlist['dateofdeath'];
                                    }
                           
                           ?> 


                           <div class="row">
                               <div class="col-md-1">
                               
                                 <?php # echo "photo"; ?> 
                               </div>
                               <div class="col-md-10">
                                 <div class="" style="margin-top: 7px; text-align: center;">
                                     <img src="../images/sers.png" width="100px" height="50px">
                                 </div><br>
                                   <h4 class=" w3-text-black" style="font-family: sans-serif;text-align: center;"><b>SERS </b></h4>
                                   <h5 class=" w3-text-black" style="font-family: sans-serif;text-align: center;"><b>VITAL EVENTS REGISTRATION AGENCY</b></h5>
                                   <br>
                                   <h5 class="w3-text-black" style="font-family: sans-serif; text-align: center;"><b>DEATH CERTIFICATE</b></h5>
                               </div>
                           </div>
                           <br><br>
                           <table style="color: black;">
                              <tr>
                                <td width="280px"><h5><b> &nbsp;&nbsp;&nbsp;&nbsp;Birth Registration Number:<b/><h5></td><td width="200px"><?php echo $DeathID; ?></td>
                              </tr>
                               <tr>
                                   <td width="280px"><h5><b> &nbsp;&nbsp;&nbsp;&nbsp;Death Registration Number:<b/><h5></td><td width="200px"><?php echo $Birth_ID; ?></td>
                                   

                                   <td width="50px" ></td>
                                   <td width="200px"  style="padding: 5px;"><h5> <b>Religion:</b></h5></td><td width="200px"><?php echo $religion; ?></td>
                               </tr>
                               <tr>
                                   <td width="270px"><h5><b> &nbsp;&nbsp;&nbsp;&nbsp;First Name:<b/><h5></td><td width="200px"><?php echo $FirstName; ?></td>
                                   <td width="50px" ></td>
                                   <td width="200px"  style="padding: 5px;"><h5> <b>Job:</b></h5></td><td width="200px"><?php echo $job; ?></td>
                               </tr>
                               <tr>
                                   <td width="270px"><h5><b> &nbsp;&nbsp;&nbsp;&nbsp;Middle Name:<b/><h5></td><td width="200px"><?php echo $MiddleName; ?></td>
                                   <td width="50px" ></td>
                                   <td width="200px"  style="padding: 5px;"><h5> <b>Date of Birth:</b></h5></td><td width="200px"><?php echo $Dob; ?></td>
                               </tr>
                               <tr>
                                 <td width="270px"><h5><b> &nbsp;&nbsp;&nbsp;&nbsp;Last Name:<b/><h5></td><td width="200px"><?php echo $LastName; ?></td>
                               </tr>
                                <tr>

                                   <td width="270px"><h5><b> &nbsp;&nbsp;&nbsp;&nbsp;Sex:<b/><h5></td><td width="200px"><?php echo $Sex; ?></td>
                                   <td width="50px" ></td>
                                   <td width="200px"  style="padding: 5px;"><h5> <b>Cause of Death:</b></h5></td><td width="200px"><?php echo $cause; ?></td>
                               </tr>
                                <tr>
                                   <td width="270px"><h5><b> &nbsp;&nbsp;&nbsp;&nbsp;Nationality:<b/><h5></td><td width="200px"><?php echo $Nationality; ?></td>
                                   <td width="50px" ></td>
                                   <td width="200px"  style="padding: 5px;"><h5> <b> Death date</b></h5></td><td width="200px"><?php echo $dateofdeath; ?></td>
                               </tr>
                               <!--Retrive name of stations here==-->
                               <?php
                                    $selectregion="SELECT * FROM region WHERE num='$regcode'";
                                    $regionresult=mysqli_query($con,$selectregion);
                                    $regionlist=mysqli_fetch_assoc($regionresult);
                                    $regionname=$regionlist['name'];
                                    #zone
                                    $selectzone="SELECT * FROM zone WHERE num='$ZCode'";
                                    $zoneresult=mysqli_query($con,$selectzone);
                                    $zonelist=mysqli_fetch_assoc($zoneresult);
                                    $zonename= $zonelist['name'];
                                    #Retrieve woreda
                                  
                                    $selectworeda="SELECT * FROM woreda WHERE zone='$ZCode' AND num='$WCode'";
                                    $woredaresuslt=mysqli_query($con,$selectworeda);
                                    $woredalist=mysqli_fetch_assoc($woredaresuslt);
                                    $woredaname=$woredalist['name'];

                                    #Retrive kebele
                                    $selectkebele="SELECT * FROM Kebele WHERE woreda='$WCode' AND num='$KCode' AND zone='$ZCode'";
                                    $kebeleresult=mysqli_query($con,$selectkebele);
                                    $kebelelist=mysqli_fetch_assoc($kebeleresult);
                                    $kname=$kebelelist['name'];

                                    #retrive user
                                    $selectuser="SELECT * FROM memberuser WHERE name='$LoggedInName'";
                                    $userresult=mysqli_query($con,$selectuser);
                                    $userlist=mysqli_fetch_assoc($userresult);
                                    $username= $userlist['name'];
                                    $FullName=$userlist['FullName'];
                                    #Get date
                                    $getdate=date('d-m-Y');
                               ?>
                               <tr>
                                  <td width="270px"><h5><b> &nbsp;&nbsp;&nbsp;&nbsp;Registration Place:<b/><h5></td>
                               </tr>
                               <tr>
                                  <td><h6>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Region:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $regionname;  ?> </h6></td>
                                  <td><h6>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Zone:&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $zonename;   ?> </h6></td>
                                  <td><h6>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Woreda:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo  $woredaname; ?> </h6></td>
                                  <td><h6>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kebele:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo  $kname;?> </h6></td>
                               </tr>
                               <tr>
                                   <td width="270px"><h5><b><br><br> &nbsp;&nbsp;&nbsp;&nbsp;Prepared By:<b/><h5></td><td width="200px">&nbsp;&nbsp;&nbsp;<br><br> <?php echo $FullName; ?></td>
                                   <td width="50px" ></td>
                                   <td width="200px"  style="padding: 5px;"><h5> <b> <br><br>Certified Date:</b></h5></td><td width="200px"><br><br><?php echo $getdate; ?></td>
                               </tr>
                           </table>
                           <br><br><br><br><br><br><br>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--==============================DEATH CERTIFICATE ENDS HERE===========================-->
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
