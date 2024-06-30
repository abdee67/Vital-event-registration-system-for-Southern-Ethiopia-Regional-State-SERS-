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
                <div class="row tile_count " style="border-bottom: 5px solid cadetblue;">
                    <div class="" style="margin-top: 10px;">
                        <span class="w3-hide-small w3-center"><h2>CERTIFICATE PAGE</h1></span>
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
                   <input type="button" name="" onclick="printDiv('print-content')" value="Print Cert" style="float: right; margin-bottom: -10px; margin-right: 15px;" class="w3-text-white w3-blue">
                </form>
                <div class="main-content" id="content-wrapper">
                   <div class="container-fluid" style="background-color: white;" id="print-content">
                      <form style="border:thick solid blue;">
                           <?php
                              if (!isset($_GET['AdotpCert'])) {
                                  echo "<script>";
                                    echo "window.location='adoption-view.php'";
                                  echo "</script>"; 
                                }
                               $_SESSION['adoptnumber']=$_GET['AdotpCert'] ;
                               $AdoptID= $_SESSION['adoptnumber'];

                               $selectadopt="SELECT * FROM adoptevent WHERE adoptnum='$AdoptID'";
                               $adoptresult=mysqli_query($con, $selectadopt);
                               while ($adoptlist=mysqli_fetch_assoc($adoptresult))
                                   {    

                                           $AdoptionID=$adoptlist['adoptnum'];
                                           $Birth_ID=$adoptlist['childbirthnum'];
                                           $FirstName=$adoptlist['fnameadopt'];
                                           $MiddleName=$adoptlist['mnameadopt'];
                                           $LastName=$adoptlist['lnameadopt'];
                                          
                                           $Dob=$adoptlist['dobadopt'];
                                           $Sex=$adoptlist['sexadopt'];
                                           $Nationality=$adoptlist['nationlityadopt'];
                                           

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
                           <div class="row">
                               <div class="col-md-1">
                               
                                 <?php # echo "photo"; ?> 
                               </div>
                               <div class="col-md-10">
                                 <div class="" style="margin-top: 7px; text-align: center;">
                                     <img src="../images/sers.png" width="100px" height="50px">
                                 </div><br>
                                   <h4 class=" w3-text-black" style="font-family: sans-serif;text-align: center;"><b>SERS</b></h4>
                                   <h5 class=" w3-text-black" style="font-family: sans-serif;text-align: center;"><b>VITAL EVENTS REGISTRATION AGENCY</b></h5>
                                   <br>
                                   <h5 class="w3-text-black" style="font-family: sans-serif; text-align: center;"><b>ADOPTION CERTIFICATE</b></h5>
                               </div>
                           </div>
                           <br><br>
                           <table style="color: black;">
                               <tr>
                                   <td width="280px"><h5><b> &nbsp;&nbsp;&nbsp;&nbsp;Birth Registration Number:</b><h5></td><td width="200px"><?php echo $Birth_ID; ?></td>
                                   
                               </tr>
                               <tr>
                                   <td width="280px"><h5><b> &nbsp;&nbsp;&nbsp;&nbsp;Adoption Reg Number:</b><h5></td><td width="200px"><?php echo $AdoptionID; ?></td>
                                   <td width="50px" ></td>
                               
                               </tr>
                               <tr>
                                   <td width="270px"><h5><b> &nbsp;&nbsp;&nbsp;&nbsp;First Name:</b><h5></td><td width="200px"><?php echo $FirstName; ?></td>
                                   <td width="50px" ></td>
                                   <td width="200px"  style="padding: 5px;"><h5> <b>New First Name:</b></h5></td><td width="200px"><?php echo $NewFName; ?></td>
                               </tr>
                               <tr>
                                   <td width="270px"><h5><b> &nbsp;&nbsp;&nbsp;&nbsp;Middle Name:</b><h5></td><td width="200px"><?php echo $MiddleName; ?></td>
                                   <td width="50px" ></td>
                                   <td width="200px"  style="padding: 5px;"><h5> <b>New Middle Name:</b></h5></td><td width="200px"><?php echo $NewMName; ?></td>
                               </tr>
                               <tr>
                                 <td width="270px"><h5><b> &nbsp;&nbsp;&nbsp;&nbsp;Last Name:</b><h5></td><td width="200px"><?php echo $LastName; ?></td>
                                  <td width="50px" ></td>
                                  <td width="200px"  style="padding: 5px;"><h5> <b>New Last Name:</b></h5></td><td width="200px"><?php echo $NewLName; ?></td>
                               </tr>
                                <tr>
                                   <td width="270px"><h5><b> &nbsp;&nbsp;&nbsp;&nbsp;Sex:</b><h5></td><td width="200px"><?php echo $Sex; ?></td>
                                   <td width="50px" ></td>
                                   <td width="200px"  style="padding: 5px;"><h5> <b>Date of Birth:</b></h5></td><td width="200px"><?php echo $Dob; ?></td>
                               </tr>
                                <tr>
                                   <td width="270px"><h5><b> &nbsp;&nbsp;&nbsp;&nbsp;Nationality:</b><h5></td><td width="200px"><?php echo $Nationality; ?></td>
                               </tr>
                               <tr>
                                   <td width="270px"><h5><b> &nbsp;&nbsp;&nbsp;&nbsp;Adopt Person:</b><h5></td><td width="200px"><?php echo $AdotpPerson; ?></td>
                                   <td width="50px" ></td>
                                   <td width="200px"  style="padding: 5px;"><h5> <b>Adopt Res Place:</b></h5></td><td width="200px"><?php echo $AdoptPersonPlace; ?></td>
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
                                  <td width="270px"><h5><b> &nbsp;&nbsp;&nbsp;&nbsp;Registration Place:</b><h5></td>
                               </tr>
                               <tr>
                                  <td><h6>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Region:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $regionname;  ?> </h6></td>
                                  <td><h6>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Zone:&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $zonename;   ?> </h6></td>
                                  <td><h6>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Woreda:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo  $woredaname; ?> </h6></td>
                                  <td><h6>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Kebele:&nbsp;&nbsp;&nbsp;&nbsp;<?php echo  $kname;?> </h6></td>
                               </tr>
                               <tr>
                                   <td width="270px"><h5><b><br><br> &nbsp;&nbsp;&nbsp;&nbsp;Prepared By:</b><h5></td><td width="200px">&nbsp;&nbsp;&nbsp;<br><br> <?php echo $username; ?></td>
                                   <td width="50px" ></td>
                                   <td width="200px"  style="padding: 5px;"><h5> <b> <br><br>Certified Date:</b></h5></td><td width="200px"><br><br><?php echo $getdate; ?></td>
                               </tr>
                           </table>
                           <br><br><br><br><br>
                        </form>
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
