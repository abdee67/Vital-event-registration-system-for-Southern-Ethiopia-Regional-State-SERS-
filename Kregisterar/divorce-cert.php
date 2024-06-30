  <style type="text/css">
    .wifephoto{
     /* width: 120px;
      height: 130px;*/
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
    <div class="right_col" role="main">
                <!-- top tiles -->
                <div class="row tile_count " style="border-bottom: 5px solid cadetblue;">
                    <div class="" style="margin-top: 10px;">
                    <span ><h2 class="w3-center" style="font-size: 30px; color: black;"><?php echo "<b>CERIFICATE PAGE</b>";?> </h2></span>
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
                   <input type="button" name="" onclick="printDiv('print-content')" value="Print cert" style="float: right; margin-bottom: -10px; margin-right: 15px;" class="w3-text-white w3-blue">
                </form>
                <div class="main-content" id="content-wrapper">
                   <div class="container-fluid" style="background-color: white;" id="print-content">
                      <form style="border:thick solid black;">
                           <?php
                              if (!isset($_GET['DivCert'])) {
                                  echo "<script>";
                                    echo "window.location='divorce-view.php'";
                                  echo "</script>"; 
                                }
                               $_SESSION['divnum']=$_GET['DivCert'] ;
                               $DivID= $_SESSION['divnum'];

                               $selectdivorce="SELECT * FROM divorceevent WHERE dveventnum='$DivID'";
                               $divorceresult=mysqli_query($con, $selectdivorce);
                               while ($divorcelist=mysqli_fetch_assoc($divorceresult))
                                   {    
                                             #WIFE INFORMATION
                                            $WifeFNameDv=$divorcelist['wfnamedv'];
                                            $WifeMNameDv=$divorcelist['wmnamedv'];
                                            $WifeLNameDv=$divorcelist['wlnamedv'];
                                            $WifeNationDv=$divorcelist['wnationalitydv'];
                                            $WifeReligionDv=$divorcelist['wreligiondv'];
                                            $WifeJob=$divorcelist['wjobdv'];


                                            #HUSBAND INFORMATION
                                            $HusbandFNameDv=$divorcelist['hfnamedv'];
                                            $HusbandMNameDv=$divorcelist['hmnamedv'];
                                            $HusbandLNameDv=$divorcelist['hlnamedv'];
                                            $HusbandNationDv=$divorcelist['hnationalitydv'];
                                            $HusbandReligionDv=$divorcelist['hreligiondv'];
                                            $HusbandJob=$divorcelist['hjobdv'];

                                            $DvPlace=$divorcelist['placedv'];
                                            $ChildNum=$divorcelist['childnum'];
                                            $ReasonDv=$divorcelist['reasondv'];
                                            $CourtName=$divorcelist['courtnamedv'];
                                            $Datedv=$divorcelist['daydv'];

                                            $DvNum=$divorcelist['dveventnum'];
                                            $Marrg=$divorcelist['marriagenum'];

                                    }
                           
                           ?>

                           <div class="row">
                              <div class="col-md-1">
                                 <?php # echo "photo"; ?> 
                               </div>
                               <div class="col-md-10">
                                 <div class="" style="margin-top: 7px; text-align: center;">
                                     <img src="../images/SERS.png" width="100px" height="50px">
                                 </div><br>
                                   <h4 class=" w3-text-black" style="font-family: sans-serif;text-align: center;"><b>SERS </b></h4>
                                   <h5 class=" w3-text-black" style="font-family: sans-serif;text-align: center;"><b>VITAL EVENTS REGISTRATION AND REPORTING SYSTEM</b></h5>
                                   <br>
                                   <h5 class="w3-text-black" style="font-family: sans-serif; text-align: center;"><b>DIVORCE CERTIFICATE</b></h5>
                               </div>
                           </div>
                           <table>
                                <?php
                                      $selectimg="SELECT * FROM divorceevent WHERE dveventnum='$DivID'";
                                      $resultimg=mysqli_query($con,$selectimg);  
                                      $imglist=mysqli_fetch_assoc($resultimg);
                                      $WifePhot=$imglist['wphotodv'];
                                      $HusPhoto=$imglist['hphotodv'];
                                     # echo "<img src='../StaffPic/$WifePhot' alt='Wifephoto' class='wifephoto' >";
                                      
                                   ?>  
                               <tr>
                                  <td width="100px"><h5><b><b/><h5></td>
                                    <td width="200px"><?php  echo "<img style='border:5px solid; border-color:red; border-radius:25px;' width='120px' height='130px' src='../StaffPic/$WifePhot' alt='Wifephoto' class='wifephoto' >";?>
                                    <br>
                                    
                                    </td>
                                   <td width="370px" >
                                     
                                   </td>

                                   <td width="100px"  style="padding: 5px;"><h5> <b></b></h5></td><td width="200px"><?php  echo "<img style='border:5px solid; border-color:red; border-radius:25px;' width='120px' height='130px' src='../StaffPic/$HusPhoto' alt='Husbandphoto' class='wifephoto' > "; ?>
                                     
                                      <br> 
                                   </td>
                               </tr>                 

                           </table>
                           <br><br>
                           <table style="color: black;">
                               <tr>
                                  <td width="280px"><h5><b> &nbsp;&nbsp;&nbsp;&nbsp;Marriage Number:<b/><h5></td><td width="200px"><?php echo $Marrg; ?></td>
                                   
                               </tr>
                               <tr>
                                   <td width="270px"><h5><b> &nbsp;&nbsp;&nbsp;&nbsp;Divorce Number:<b/><h5></td><td width="200px"><?php echo $DvNum; ?></td>
                                   <td width="50px" ></td>
                               </tr>
                               <tr>
                                   <td width="270px"><h5><b> &nbsp;&nbsp;&nbsp;&nbsp;First Name:<b/><h5></td><td width="200px"><?php echo $WifeFNameDv; ?></td>
                                   <td width="50px" ></td>
                                   <td width="200px"  style="padding: 5px;"><h5> <b>First Name:</b></h5></td><td width="200px"><?php echo $HusbandFNameDv; ?></td>
                               </tr>
                               <tr>
                                   <td width="270px"><h5><b> &nbsp;&nbsp;&nbsp;&nbsp;Middle Name:<b/><h5></td><td width="200px"><?php echo $WifeMNameDv; ?></td>
                                   <td width="50px" ></td>
                                   <td width="200px"  style="padding: 5px;"><h5> <b>Middle Name:</b></h5></td><td width="200px"><?php echo $HusbandMNameDv; ?></td>
                               </tr>
                               <tr>
                                 <td width="270px"><h5><b> &nbsp;&nbsp;&nbsp;&nbsp;Last Name:<b/><h5></td><td width="200px"><?php echo $WifeLNameDv; ?></td>
                                  <td width="50px" ></td>
                                  <td width="200px"  style="padding: 5px;"><h5> <b>Last Name:</b></h5></td><td width="200px"><?php echo $HusbandLNameDv; ?></td>
                               </tr>
                               <tr>
                                   <td width="270px"><h5><b> &nbsp;&nbsp;&nbsp;&nbsp;Nationality:<b/><h5></td><td width="200px"><?php echo $WifeNationDv; ?></td>
                                   <td width="50px" ></td>
                                   <td width="200px"  style="padding: 5px;"><h5> <b>Nationality:</b></h5></td><td width="200px"><?php echo $HusbandNationDv; ?></td>
                               </tr>
                               <tr>
                                   <td width="270px"><h5><b> &nbsp;&nbsp;&nbsp;&nbsp;Religion:<b/><h5></td><td width="200px"><?php echo $WifeReligionDv; ?></td>
                                   <td width="50px" ></td>
                                   <td width="200px"  style="padding: 5px;"><h5> <b>Religion:</b></h5></td><td width="200px"><?php echo $HusbandReligionDv; ?></td>
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
                                   <td width="270px"><h5><b><br><br> &nbsp;&nbsp;&nbsp;&nbsp;Prepared By:<b/><h5></td><td width="200px">&nbsp;&nbsp;&nbsp;<br><br> <?php echo $username; ?></td>
                                   <td width="50px" ></td>
                                   <td width="200px"  style="padding: 5px;"><h5> <b> <br><br>Certified Date:</b></h5></td><td width="200px"><br><br><?php echo $getdate; ?></td>
                               </tr>
                           </table>
                        </form>
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
